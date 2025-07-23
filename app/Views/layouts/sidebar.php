<nav class="sidebar bg-dark text-white vh-100 p-3" style="width: 220px; position: fixed;">
    <h4 class="mb-4">Eventify Admin</h4>
    <ul class="nav flex-column">
        <li class="nav-item mb-2">
            <a class="nav-link text-white" href="<?= site_url('dashboard') ?>"><i class="bi bi-speedometer2"></i> Dashboard</a>
        </li>
        <li class="nav-item mb-2">
            <a class="nav-link text-white" href="<?= site_url('events') ?>"><i class="bi bi-calendar-event"></i> Events</a>
        </li>
        <li class="nav-item mb-2">
            <a class="nav-link text-white" href="<?= site_url('bookings') ?>"><i class="bi bi-ticket-perforated"></i> Bookings</a>
        </li>
        <li class="nav-item mt-4">
            <a class="nav-link text-danger" href="<?= site_url('logout') ?>"><i class="bi bi-box-arrow-right"></i> Logout</a>
        </li>
    </ul>
</nav>
