# Eventify - Event Management & Ticket Booking System

Eventify is a modern web application built with CodeIgniter 4 for managing events and ticket bookings. It features a user-friendly admin panel, event and booking management, authentication, and a RESTful API for integrations.

## Features
- User authentication (login/logout)
- Admin dashboard with event and booking stats
- Event Create/List
- Booking Create/List
- Responsive Bootstrap UI
- RESTful API for events and bookings

## Requirements
- PHP 8.0+
- MySQL/MariaDB
- Composer
- XAMPP/WAMP/LAMP recommended for local development

## user credentials
username: admin@gmail.com
pw: 123456

## Installation
1. **Clone the repository:**
   ```sh
   git clone <your-repo-url> eventify
   ```
2. **Install dependencies:**
   ```sh
   composer install
   ```
3. **Copy and configure the environment file:**
   ```sh
   cp env .env
   # Edit .env with your database credentials
   ```
4. **Set writable permissions:**
   - Ensure the `writable/` directory is writable by the web server.
5. **Create the database:**
   - Import the provided SQL or use migrations to create tables for users, events, and bookings.
6. **Run the application:**
   ```sh
   php spark serve
   ```
   Visit [http://localhost:8080](http://localhost:8080) in your browser.

## Folder Structure
- `app/Controllers` - Application controllers
- `app/Models` - Models for database tables
- `app/Views` - Views for UI
- `public/` - Public assets (CSS)
- `writable/` - Logs, cache, uploads

## API Endpoints
- `/api/v1/events` - List all events
- `/api/v1/events/{id}` - Get event by ID
- `/api/v1/bookings` - List all bookings
- `/api/v1/bookings` (POST) - Create a booking

## Customization
- Update sidebar and dashboard in `app/Views/layouts/`
- Add new fields or features in models and migrations

## License
MIT

---

**Eventify** - Simplifying event management and ticketing.
# CodeIgniter 4 Application Starter

## What is CodeIgniter?

CodeIgniter is a PHP full-stack web framework that is light, fast, flexible and secure.
More information can be found at the [official site](https://codeigniter.com).

This repository holds a composer-installable app starter.
It has been built from the
[development repository](https://github.com/codeigniter4/CodeIgniter4).

More information about the plans for version 4 can be found in [CodeIgniter 4](https://forum.codeigniter.com/forumdisplay.php?fid=28) on the forums.

You can read the [user guide](https://codeigniter.com/user_guide/)
corresponding to the latest version of the framework.

## Installation & updates

`composer create-project codeigniter4/appstarter` then `composer update` whenever
there is a new release of the framework.

When updating, check the release notes to see if there are any changes you might need to apply
to your `app` folder. The affected files can be copied or merged from
`vendor/codeigniter4/framework/app`.

## Setup

Copy `env` to `.env` and tailor for your app, specifically the baseURL
and any database settings.

## Important Change with index.php

`index.php` is no longer in the root of the project! It has been moved inside the *public* folder,
for better security and separation of components.

This means that you should configure your web server to "point" to your project's *public* folder, and
not to the project root. A better practice would be to configure a virtual host to point there. A poor practice would be to point your web server to the project root and expect to enter *public/...*, as the rest of your logic and the
framework are exposed.

**Please** read the user guide for a better explanation of how CI4 works!

## Repository Management

We use GitHub issues, in our main repository, to track **BUGS** and to track approved **DEVELOPMENT** work packages.
We use our [forum](http://forum.codeigniter.com) to provide SUPPORT and to discuss
FEATURE REQUESTS.

This repository is a "distribution" one, built by our release preparation script.
Problems with it can be raised on our forum, or as issues in the main repository.

## Server Requirements

PHP version 8.1 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)

> [!WARNING]
> - The end of life date for PHP 7.4 was November 28, 2022.
> - The end of life date for PHP 8.0 was November 26, 2023.
> - If you are still using PHP 7.4 or 8.0, you should upgrade immediately.
> - The end of life date for PHP 8.1 will be December 31, 2025.

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php) if you plan to use MySQL
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library
