<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\BookingModel;
use App\Models\EventModel;

/**
 * Bookings Controller
 *
 * Handles booking CRUD and validation logic
 */
class Bookings extends Controller
{
    /**
     * List bookings with event details
     * @return \CodeIgniter\HTTP\Response|string
     */
    public function index()
    {
        $bookingModel = new BookingModel(); // Booking model instance
        $data['bookings'] = $bookingModel->paginate(10);
        $data['pager'] = $bookingModel->pager;

        // Attach event details to each booking
        $eventModel = new EventModel();
        foreach ($data['bookings'] as $key => $booking) {
            $event = $eventModel->find($booking['event_id']);
            if ($event) {
                $data['bookings'][$key]['event_title'] = $event['title'];
                $data['bookings'][$key]['event_date'] = $event['event_date'];
                $data['bookings'][$key]['event_venue'] = $event['venue'];
                $data['bookings'][$key]['event_ticket_price'] = $event['ticket_price'];
                $data['bookings'][$key]['event_capacity'] = $event['capacity'];
                $data['bookings'][$key]['event_category'] = $event['category'];
            }
        }

        return view('bookings/index', $data);
    }

    /**
     * Show booking creation form
     * @return \CodeIgniter\HTTP\Response|string
     */
    public function create()
    {
        // Get all events for dropdown
        $eventModel = new EventModel();
        $data['events'] = $eventModel->findAll();

        helper('form'); // Loads set_value() and form helpers
        return view('bookings/create', $data);
    }

    /**
     * Store a new booking with validation and event capacity check
     * @return \CodeIgniter\HTTP\Response|string
     */
    public function store()
    {
        helper(['form']);
        $validation =  \Config\Services::validation();
        $rules = [
            'customer_name' => 'required|min_length[2]|max_length[100]',
            'email' => 'required|valid_email',
            'event_id' => 'required|is_natural_no_zero',
            'num_tickets' => 'required|integer|greater_than[0]'
        ];

        // Validate input
        if (! $this->validate($rules)) {
            $eventModel = new EventModel();
            $data['events'] = $eventModel->findAll();
            $data['validation'] = $this->validator;
            return view('bookings/create', $data);
        }

        $eventModel = new EventModel();
        // Get event as array for easier access
        $event = $eventModel->asArray()->find($this->request->getPost('event_id'));
        if (!$event) {
            $data['validation'] = $validation;
            $data['events'] = $eventModel->findAll();
            $validation->setError('event_id', 'Selected event does not exist.');
            return view('bookings/create', $data);
        }

        $bookingModel = new BookingModel();
        // Get total tickets already booked for this event
        $bookedCountRow = $bookingModel->selectSum('ticket_count')->where('event_id', $event['id'])->first();
        $alreadyBooked = isset($bookedCountRow['ticket_count']) ? (int)$bookedCountRow['ticket_count'] : 0;
        $requested = (int)$this->request->getPost('num_tickets');
        $capacity = (int)$event['capacity'];

        // Check if booking exceeds event capacity
        if ($alreadyBooked + $requested > $capacity) {
            $eventModel = new EventModel();
            $data['events'] = $eventModel->findAll();
            $data['validation'] = $validation;
            $validation->setError('num_tickets', 'Booking exceeds event capacity. Only '.max(0, $capacity - $alreadyBooked).' tickets left.');
            return view('bookings/create', $data);
        }

        // Save booking
        $bookingModel->save([
            'customer_name' => $this->request->getPost('customer_name'),
            'email' => $this->request->getPost('email'),
            'event_id' => $event['id'],
            'ticket_count' => $requested,
        ]);

        return redirect()->to('/bookings')->with('success', 'Booking created successfully!');
    }
}