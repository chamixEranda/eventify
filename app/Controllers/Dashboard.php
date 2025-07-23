<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Dashboard extends Controller
{
    public function index()
    {
        // Check if user is logged in
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }
        
        // Get the dashboard counts (events, bookings, users)
        $eventModel = new \App\Models\EventModel();
        $bookingModel = new \App\Models\BookingModel();
        $userModel = new UserModel();

        // Load the dashboard view
        return view('dashboard', [
            'eventCount' => $eventModel->countAll(),
            'bookingCount' => $bookingModel->countAll(),
            'userCount' => $userModel->countAll(),
        ]);
    }
}