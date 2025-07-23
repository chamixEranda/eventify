<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="main-content">
    <h1 class="mb-4">Dashboard</h1>
    <div class="row g-4 mb-4">
        <div class="col-md-3">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <i class="bi bi-calendar-event display-5 text-primary mb-2"></i>
                    <h5 class="card-title">Events</h5>
                    <p class="card-text fs-4"><?= esc($eventCount) ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <i class="bi bi-ticket-perforated display-5 text-success mb-2"></i>
                    <h5 class="card-title">Tickets Sold</h5>
                    <p class="card-text fs-4"><?= esc($bookingCount) ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <i class="bi bi-people display-5 text-warning mb-2"></i>
                    <h5 class="card-title">Users</h5>
                    <p class="card-text fs-4"><?= esc($userCount) ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <i class="bi bi-cash-coin display-5 text-danger mb-2"></i>
                    <h5 class="card-title">Revenue</h5>
                    <p class="card-text fs-4">$4,500</p>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>