<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="mb-0 fw-bold">All Notices</h5>
    <a href="<?= base_url('admin/notices/create') ?>" class="btn btn-primary btn-sm"><i class="bi bi-plus me-1"></i>Add Notice</a>
</div>
<div class="card">
    <div class="card-header">
        <form class="d-flex gap-2 flex-wrap" method="get">
            <input type="text" name="search" class="form-control form-control-sm" placeholder="Search notices..." value="<?= esc($this->request->getGet('search')) ?>" style="max-width:200px">
            <select name="category" class="form-select form-select-sm" style="max-width:160px">
                <option value="">All Categories</option>
                <?php foreach ($categories as $c): ?>
                <option value="<?= $c['id'] ?>" <?= $this->request->getGet('category') == $c['id'] ? 'selected' : '' ?>><?= esc($c['name']) ?></option>
                <?php endforeach; ?>
            </select>
            <select name="status" class="form-select form-select-sm" style="max-width:120px">
                <option value="">All Status</option>
                <option value="active" <?= $this->request->getGet('status') === 'active' ? 'selected' : '' ?>>Active</option>
                <option value="inactive" <?= $this->request->getGet('status') === 'inactive' ? 'selected' : '' ?>>Inactive</option>
            </select>
            <button class="btn btn-sm btn-outline-secondary">Filter</button>
            <a href="<?= base_url('admin/notices') ?>" class="btn btn-sm btn-outline-danger">Reset</a>
        </form>
    </div>
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead><tr><th>Title</th><th>Category</th><th>Date</th><th>Featured</th><th>Status</th><th>Actions</th></tr></thead>
            <tbody>
            <?php if (empty($notices)): ?>
            <tr><td colspan="6" class="text-center py-4 text-muted">No notices found.</td></tr>
            <?php else: foreach ($notices as $n): ?>
            <tr>
                <td class="fw-500"><?= esc($n['title']) ?></td>
                <td><span class="badge bg-light text-dark"><?= esc($n['category_name'] ?? '—') ?></span></td>
                <td class="text-muted small"><?= esc($n['publish_date'] ?? '') ?></td>
                <td><?= $n['is_featured'] ? '<i class="bi bi-star-fill text-warning"></i>' : '' ?></td>
                <td>
                    <form action="<?= base_url('admin/notices/toggle/' . $n['id']) ?>" method="post" class="d-inline">
                        <?= csrf_field() ?>
                        <button class="badge border-0 bg-<?= $n['status'] === 'active' ? 'success' : 'secondary' ?> text-white" title="Click to toggle"><?= esc($n['status']) ?></button>
                    </form>
                </td>
                <td>
                    <a href="<?= base_url('admin/notices/edit/' . $n['id']) ?>" class="btn btn-sm btn-outline-primary me-1"><i class="bi bi-pencil"></i></a>
                    <form action="<?= base_url('admin/notices/delete/' . $n['id']) ?>" method="post" class="d-inline">
                        <?= csrf_field() ?>
                        <button class="btn btn-sm btn-outline-danger" data-confirm="Delete this notice?"><i class="bi bi-trash"></i></button>
                    </form>
                </td>
            </tr>
            <?php endforeach; endif; ?>
            </tbody>
        </table>
    </div>
    <?php if ($pager): ?><div class="card-footer"><?= $pager->links() ?></div><?php endif; ?>
</div>