<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\EventModel;

/**
 * Events Controller
 *
 * Handles event CRUD and validation logic
 */
class Events extends Controller
{
    /**
     * List events with pagination
     * @return \CodeIgniter\HTTP\Response|string
     */
    public function index()
    {
        $eventModel = new EventModel(); // Event model instance
        $data['events'] = $eventModel->paginate(10);
        $data['pager'] = $eventModel->pager;
        $events = $data; // Prepare data for view
        return view('events/index', $events);
    }

    /**
     * Show event creation form
     * @return \CodeIgniter\HTTP\Response|string
     */
    public function create()
    {
        helper('form'); // Loads set_value() and form helpers
        return view('events/create');
    }

    /**
     * Store a new event with validation
     * @return \CodeIgniter\HTTP\RedirectResponse|\CodeIgniter\HTTP\Response|string
     */
    public function store()
    {
        helper(['form']);
        $validation =  \Config\Services::validation();
        $rules = [
            'title' => 'required|min_length[3]|max_length[255]',
            'event_date' => 'required',
            'venue' => 'required|min_length[3]|max_length[255]',
            'ticket_price' => 'required|numeric|greater_than_equal_to[0]',
            'capacity' => 'required|integer|greater_than[0]',
            'category' => 'required|in_list[Workshop,Concert,Meetup,Exhibition,Festival,Conference]'
        ];

        // Validate input
        if (! $this->validate($rules)) {
            return view('events/create', [
                'validation' => $this->validator
            ]);
        }

        $eventModel = new EventModel();
        // Save event data
        $eventModel->save([
            'title' => $this->request->getPost('title'),
            'event_date' => $this->request->getPost('event_date'),
            'venue' => $this->request->getPost('venue'),
            'ticket_price' => $this->request->getPost('ticket_price'),
            'capacity' => $this->request->getPost('capacity'),
            'category' => $this->request->getPost('category'),
        ]);

        return redirect()->to('/events')->with('success', 'Event created successfully!');
    }
}