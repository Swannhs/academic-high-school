<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="mb-0 fw-bold">Notice Categories</h5>
    <a href="<?= base_url('admin/notice-categories/create') ?>" class="btn btn-primary btn-sm"><i class="bi bi-plus me-1"></i>Add Category</a>
</div>
<div class="card">
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead><tr><th>#</th><th>Name</th><th>Slug</th><th>Notices</th><th>Status</th><th>Actions</th></tr></thead>
            <tbody>
            <?php if (empty($categories)): ?>
            <tr><td colspan="6" class="text-center py-4 text-muted">No categories found.</td></tr>
            <?php else: foreach ($categories as $c): ?>
            <tr>
                <td><?= $c['id'] ?></td>
                <td class="fw-500"><?= esc($c['name']) ?></td>
                <td class="text-muted small"><?= esc($c['slug']) ?></td>
                <td><span class="badge bg-info"><?= $c['notice_count'] ?></span></td>
                <td><span class="badge bg-<?= $c['status'] === 'active' ? 'success' : 'secondary' ?>"><?= esc($c['status']) ?></span></td>
                <td>
                    <a href="<?= base_url('admin/notice-categories/edit/' . $c['id']) ?>" class="btn btn-sm btn-outline-primary me-1"><i class="bi bi-pencil"></i></a>
                    <form action="<?= base_url('admin/notice-categories/delete/' . $c['id']) ?>" method="post" class="d-inline">
                        <?= csrf_field() ?>
                        <button class="btn btn-sm btn-outline-danger" data-confirm="Delete this category?"><i class="bi bi-trash"></i></button>
                    </form>
                </td>
            </tr>
            <?php endforeach; endif; ?>
            </tbody>
        </table>
    </div>
</div>