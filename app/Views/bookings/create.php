<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="container" style="margin-left:220px; max-width:calc(100% - 220px);">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8 col-12 my-4">
            <div class="card">
                <div class="card-header bg-dark text-white">
                    <h3 class="mb-0 text-center">Create Booking</h3>
                </div>
                <div class="card-body">
                    <?php if (isset($validation)): ?>
                        <div class="alert alert-danger" role="alert">
                            <?= $validation->listErrors() ?>
                        </div>
                    <?php endif; ?>
                    <form action="<?= site_url('bookings/store') ?>" method="post" autocomplete="off">
                        <?= csrf_field() ?>
                        <div class="mb-3">
                            <label for="customer_name" class="form-label">Customer Name</label>
                            <input type="text" class="form-control" id="customer_name" name="customer_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="event_id" class="form-label">Event</label>
                            <select class="form-select" id="event_id" name="event_id" required>
                                <option value="">Select Event</option>
                                <?php foreach ($events as $event): ?>
                                    <option value="<?= esc($event['id']) ?>"><?= esc($event['title']) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="num_tickets" class="form-label">Number of Tickets</label>
                            <input type="number" class="form-control" id="num_tickets" name="num_tickets" min="1" required>
                        </div>
                        <button type="submit" class="btn btn-dark w-100">Book Now</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
