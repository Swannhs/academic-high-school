<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="mb-0 fw-bold">Academic Calendar</h5>
    <a href="<?= base_url('admin/academic-calendar/create') ?>" class="btn btn-primary btn-sm"><i class="bi bi-plus me-1"></i>Add Event</a>
</div>
<div class="card">
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead><tr><th>Event Title</th><th>Category</th><th>Dates</th><th>Actions</th></tr></thead>
            <tbody>
            <?php foreach ($events as $e): ?>
            <tr>
                <td class="fw-500"><?= esc($e['title']) ?></td>
                <td><span class="badge bg-light text-dark"><?= esc($e['category']) ?></span></td>
                <td class="small"><?= esc($e['event_date']) ?> to <?= esc($e['end_date'] ?? '') ?></td>
                <td>
                    <a href="<?= base_url('admin/academic-calendar/edit/' . $e['id']) ?>" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></a>
                    <form action="<?= base_url('admin/academic-calendar/delete/' . $e['id']) ?>" method="post" class="d-inline">
                        <?= csrf_field() ?>
                        <button class="btn btn-sm btn-outline-danger" data-confirm="Delete?"><i class="bi bi-trash"></i></button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>