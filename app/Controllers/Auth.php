<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

/**
 * Auth Controller
 *
 * Handles user authentication (login/logout)
 */
class Auth extends Controller
{
    /**
     * Show the login form
     * @return \CodeIgniter\HTTP\Response|string
     */
    public function login()
    {
        // Render the login view
        return view('auth/login');
    }

    /**
     * Attempt to log the user in
     * @return \CodeIgniter\HTTP\RedirectResponse
     */
    public function attemptLogin()
    {
        $session = session(); // Get session instance

        $userModel = new \App\Models\UserModel(); // User model instance
        // Find user by username
        $user = $userModel->where('username', $this->request->getPost('username'))->first();

        // Verify user exists and password matches
        if ($user && password_verify($this->request->getPost('password'), $user['password'])) {
            // Set session data for logged in user
            $session->set([
                'isLoggedIn' => true,
                'username' => $user['username']
            ]);
            return redirect()->to('/dashboard');
        }

        // Redirect back with error if login fails
        return redirect()->back()->with('error', 'Invalid credentials');
    }

    public function logout()
    {
        $session = session(); // Get session instance
        $session->destroy(); // Destroy the session to log out
        return redirect()->to('/'); // Redirect to login page
    }
}