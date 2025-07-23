<?php
namespace App\Controllers\Api\V1;

use CodeIgniter\RESTful\ResourceController;
use App\Models\EventModel;

/**
 * API Controller for managing events (RESTful)
 */
class Events extends ResourceController
{
    /**
     * List all events as JSON
     * @return \CodeIgniter\HTTP\ResponseInterface
     */
    public function listEvents()
    {
        $eventModel = new EventModel(); // Model instance for events
        // Return all events as JSON
        return $this->response->setJSON($eventModel->findAll());
    }

    /**
     * Get a single event by ID as JSON
     * @param int $id Event ID
     * @return \CodeIgniter\HTTP\ResponseInterface
     */
    public function getEvent($id)
    {
        $eventModel = new EventModel(); // Model instance for events
        $event = $eventModel->find($id); // Find event by ID
        if (!$event) {
            // Return 404 if not found
            return $this->failNotFound('Event not found');
        }
        // Return event as JSON
        return $this->response->setJSON($event);
    }
}