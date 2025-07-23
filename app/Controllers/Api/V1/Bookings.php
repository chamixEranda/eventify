<?php
namespace App\Controllers\Api\V1;

use CodeIgniter\RESTful\ResourceController;
use App\Models\BookingModel;

/**
 * API Controller for managing bookings (RESTful)
 */
class Bookings extends ResourceController
{
    /**
     * List all bookings as JSON
     * @return \CodeIgniter\HTTP\ResponseInterface
     */
    public function listBookings()
    {
        $model = new BookingModel();
        // Return all bookings as JSON
        return $this->response->setJSON($model->findAll());
    }

    /**
     * Create a new booking from JSON payload
     * @return \CodeIgniter\HTTP\ResponseInterface
     */
    public function createBooking()
    {
        $data = $this->request->getJSON(true);
        $model = new BookingModel();
        // Save booking data
        $model->save($data);
        return $this->response->setStatusCode(201)->setJSON(['message' => 'Booking created']);
    }
}