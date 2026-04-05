<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="mb-0 fw-bold">Downloads Manager</h5>
    <a href="<?= base_url('admin/downloads/create') ?>" class="btn btn-primary btn-sm">Add File</a>
</div>
<div class="card">
    <div class="card-header">
        <form method="get" class="row g-2 align-items-end">
            <div class="col-md-4">
                <label class="form-label mb-1">Search</label>
                <input type="text" name="search" class="form-control form-control-sm" value="<?= esc($this->request->getGet('search')) ?>" placeholder="Title...">
            </div>
            <div class="col-md-3">
                <label class="form-label mb-1">Category</label>
                <input type="text" name="category" class="form-control form-control-sm" value="<?= esc($this->request->getGet('category')) ?>" placeholder="Category">
            </div>
            <div class="col-md-3">
                <label class="form-label mb-1">Status</label>
                <select name="status" class="form-select form-select-sm">
                    <option value="">All Status</option>
                    <option value="active" <?= $this->request->getGet('status') === 'active' ? 'selected' : '' ?>>Active</option>
                    <option value="inactive" <?= $this->request->getGet('status') === 'inactive' ? 'selected' : '' ?>>Inactive</option>
                </select>
            </div>
            <div class="col-md-2">
                <button class="btn btn-sm btn-outline-secondary w-100">Filter</button>
            </div>
        </form>
    </div>
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead><tr><th>Title</th><th>Category</th><th>Publish Date</th><th>Status</th><th>Actions</th></tr></thead>
            <tbody>
            <?php if (empty($downloads)): ?>
            <tr><td colspan="5" class="text-center py-4 text-muted">No downloads found.</td></tr>
            <?php else: foreach ($downloads as $d): ?>
            <tr>
                <td class="fw-500"><?= esc($d['title']) ?></td>
                <td><?= esc($d['category']) ?></td>
                <td><?= esc($d['publish_date']) ?></td>
                <td><span class="badge bg-<?= $d['status'] === 'active' ? 'success' : 'secondary' ?>"><?= esc($d['status']) ?></span></td>
                <td>
                    <a href="<?= base_url('admin/downloads/edit/'.$d['id']) ?>" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></a>
                    <form action="<?= base_url('admin/downloads/delete/'.$d['id']) ?>" method="post" class="d-inline">
                        <?= csrf_field() ?>
                        <button class="btn btn-sm btn-outline-danger" data-confirm="Delete file?"><i class="bi bi-trash"></i></button>
                    </form>
                </td>
            </tr>
            <?php endforeach; endif; ?>
            </tbody>
        </table>
    </div>
    <?php if (! empty($pager)): ?><div class="card-footer"><?= $pager->links() ?></div><?php endif; ?>
</div>
