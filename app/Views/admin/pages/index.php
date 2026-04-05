<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="mb-0 fw-bold">Static Pages</h5>
    <a href="<?= base_url('admin/pages/create') ?>" class="btn btn-primary btn-sm"><i class="bi bi-plus me-1"></i>Add Page</a>
</div>
<div class="card">
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead><tr><th>Title</th><th>Slug</th><th>Status</th><th>Last Update</th><th>Actions</th></tr></thead>
            <tbody>
            <?php foreach ($pages as $p): ?>
            <tr>
                <td class="fw-500"><?= esc($p['title']) ?></td>
                <td class="text-muted small">/<?= esc($p['slug']) ?></td>
                <td><span class="badge bg-<?= $p['status'] === 'active' ? 'success' : 'secondary' ?>"><?= esc($p['status']) ?></span></td>
                <td class="text-muted small"><?= $p['updated_at'] ?></td>
                <td>
                    <a href="<?= base_url('admin/pages/edit/' . $p['id']) ?>" class="btn btn-sm btn-outline-primary me-1"><i class="bi bi-pencil"></i></a>
                    <form action="<?= base_url('admin/pages/delete/' . $p['id']) ?>" method="post" class="d-inline">
                        <?= csrf_field() ?>
                        <button class="btn btn-sm btn-outline-danger" data-confirm="Delete this page?"><i class="bi bi-trash"></i></button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>