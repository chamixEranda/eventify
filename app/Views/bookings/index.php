<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="container" style="margin-left:220px; max-width:calc(100% - 220px);">
    <h2 class="text-start py-4">Booking List</h2>
    <a href="<?= site_url('bookings/create') ?>" class="btn btn-dark mb-3 ">
        <i class="bi bi-plus-circle"></i> Add New Booking
    </a>
    <div class="table-responsive">
        <table class="table table-striped table-hover align-middle mb-0">
            <thead class="table-dark">
                <tr>
                    <th>Customer Name</th>
                    <th>Event Title</th>
                    <th>Event Date</th>
                    <th>Ticket Price</th>
                    <th>Ticket Count</th>
                    <th>Category</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($bookings)): ?>
                    <?php foreach ($bookings as $booking): ?>
                        <tr>
                            <td><?= esc($booking['customer_name']) ?></td>
                            <td><?= esc($booking['event_title']) ?></td>
                            <td><?= date('d M Y H:i', strtotime($booking['event_date'])) ?></td>
                            <td><?= number_format($booking['event_ticket_price'], 2) ?></td>
                            <td><?= esc($booking['ticket_count']) ?></td>
                            <td><?= esc($booking['event_category']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else:
                    echo '<tr><td colspan="6" class="text-center">No events found.</td></tr>';
                ?>
                <?php endif; ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="6">
                        <?= $pager->links() ?>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
<?= $this->endSection() ?>