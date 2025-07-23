
<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="container" style="margin-left:220px; max-width:calc(100% - 220px);">
    <div class="row justify-content-center">
        <div class="col-lg-7 col-md-9 col-12 my-4">
            <div class="card">
                <div class="card-header bg-dark text-white">
                    <h3 class="mb-0 text-center">Create New Event</h3>
                </div>
                <div class="card-body">
                    <?php if (isset($validation)): ?>
                        <div class="alert alert-danger" role="alert">
                            <?= $validation->listErrors() ?>
                        </div>
                    <?php endif; ?>
                    <form action="<?= site_url('events/store') ?>" method="post" autocomplete="off">
                        <?= csrf_field() ?>
                        <div class="mb-3">
                            <label for="title" class="form-label">Event Title</label>
                            <input type="text" class="form-control" id="title" name="title" required value="<?= set_value('title') ?>">
                        </div>
                        <div class="mb-3">
                            <label for="datetime" class="form-label">Date & Time</label>
                            <input type="datetime-local" class="form-control" id="datetime" name="event_date" required value="<?= set_value('event_date') ?>">
                        </div>
                        <div class="mb-3">
                            <label for="venue" class="form-label">Venue</label>
                            <input type="text" class="form-control" id="venue" name="venue" required value="<?= set_value('venue') ?>">
                        </div>
                        <div class="mb-3">
                            <label for="ticket_price" class="form-label">Ticket Price</label>
                            <input type="number" class="form-control" id="ticket_price" name="ticket_price" min="0" step="0.01" required value="<?= set_value('ticket_price') ?>">
                        </div>
                        <div class="mb-3">
                            <label for="capacity" class="form-label">Capacity</label>
                            <input type="number" class="form-control" id="capacity" name="capacity" min="1" required value="<?= set_value('capacity') ?>">
                        </div>
                        <div class="mb-3">
                            <label for="category" class="form-label">Category</label>
                            <select class="form-select" id="category" name="category" required>
                                <option value="">Select Category</option>
                                <option value="Workshop" <?= set_select('category', 'Workshop') ?>>Workshop</option>
                                <option value="Concert" <?= set_select('category', 'Concert') ?>>Concert</option>
                                <option value="Meetup" <?= set_select('category', 'Meetup') ?>>Meetup</option>
                                <option value="Exhibition" <?= set_select('category', 'Exhibition') ?>>Exhibition</option>
                                <option value="Festival" <?= set_select('category', 'Festival') ?>>Festival</option>
                                <option value="Conference" <?= set_select('category', 'Conference') ?>>Conference</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-dark w-100">Create Event</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
