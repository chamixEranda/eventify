<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Define the default route
$routes->get('/', 'Auth::login');
// Define the login route
$routes->post('login', 'Auth::attemptLogin');
// Define the logout route
$routes->get('logout', 'Auth::logout');
// Define the dashboard route
$routes->get('dashboard', 'Dashboard::index');

// Define routes for Events
$routes->get('events', 'Events::index');
$routes->get('events/create', 'Events::create');
$routes->post('events/store', 'Events::store');

// Define routes for Bookings
$routes->get('bookings', 'Bookings::index');
$routes->get('bookings/create', 'Bookings::create');
$routes->post('bookings/store', 'Bookings::store');

// Define API routes
$routes->group('api/v1', ['namespace' => 'App\Controllers\Api\V1'], function($routes) {
    $routes->get('events', 'Events::listEvents');
    $routes->get('events/(:num)', 'Events::getEvent/$1');
    $routes->get('bookings', 'Bookings::listBookings');
    $routes->post('bookings', 'Bookings::createBooking');
});
