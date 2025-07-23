<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="container" style="margin-left:220px; max-width:calc(100% - 220px);">
    <h2 class="text-start py-4">Event List</h2>
    <a href="<?= site_url('events/create') ?>" class="btn btn-dark mb-3 ">
        <i class="bi bi-plus-circle"></i> Add New Event
    </a>
    <div class="table-responsive">
        <table class="table table-striped table-hover align-middle mb-0">
            <thead class="table-dark">
                <tr>
                    <th>Title</th>
                    <th>Event Date</th>
                    <th>Venue</th>
                    <th>Ticket Price</th>
                    <th>Capacity</th>
                    <th>Category</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($events)): ?>
                    <?php foreach ($events as $event): ?>
                        <tr>
                            <td><?= esc($event['title']) ?></td>
                            <td><?= date('d M Y H:i', strtotime($event['event_date'])) ?></td>
                            <td><?= esc($event['venue']) ?></td>
                            <td>$<?= number_format($event['ticket_price'], 2) ?></td>
                            <td><?= esc($event['capacity']) ?></td>
                            <td><?= esc($event['category']) ?></td>
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