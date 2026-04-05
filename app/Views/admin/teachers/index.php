<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="mb-0 fw-bold">Teachers</h5>
    <a href="<?= base_url('admin/teachers/create') ?>" class="btn btn-primary btn-sm"><i class="bi bi-plus me-1"></i>Add Teacher</a>
</div>
<div class="card">
    <div class="card-header">
        <form class="d-flex gap-2" method="get">
            <input type="text" name="search" class="form-control form-control-sm" placeholder="Search..." value="<?= esc($this->request->getGet('search')) ?>" style="max-width:200px">
            <select name="status" class="form-select form-select-sm" style="max-width:130px">
                <option value="">All Status</option>
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>
            <button class="btn btn-sm btn-outline-secondary">Filter</button>
        </form>
    </div>
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead><tr><th>Photo</th><th>Name</th><th>Designation</th><th>Department</th><th>Status</th><th>Actions</th></tr></thead>
            <tbody>
            <?php if (empty($teachers)): ?>
            <tr><td colspan="6" class="text-center py-4 text-muted">No teachers found.</td></tr>
            <?php else: foreach ($teachers as $t): ?>
            <tr>
                <td><img src="<?= esc(upload_url('teachers', $t['photo_url'] ?? $t['photo'] ?? null) ?? 'https://placehold.co/72x72?text=T') ?>" class="table-avatar" alt=""></td>
                <td>
                    <div class="fw-500 small"><?= esc($t['name']) ?></div>
                    <?php if ($t['name_bn']): ?><div class="text-muted" style="font-size:.7rem"><?= esc($t['name_bn']) ?></div><?php endif; ?>
                </td>
                <td class="small"><?= esc($t['designation']) ?></td>
                <td class="small text-muted"><?= esc($t['department']) ?></td>
                <td>
                    <form action="<?= base_url('admin/teachers/toggle/' . $t['id']) ?>" method="post" class="d-inline">
                        <?= csrf_field() ?>
                        <button class="badge border-0 bg-<?= $t['status'] === 'active' ? 'success' : 'secondary' ?> text-white"><?= esc($t['status']) ?></button>
                    </form>
                </td>
                <td>
                    <a href="<?= base_url('admin/teachers/edit/' . $t['id']) ?>" class="btn btn-sm btn-outline-primary me-1"><i class="bi bi-pencil"></i></a>
                    <form action="<?= base_url('admin/teachers/delete/' . $t['id']) ?>" method="post" class="d-inline">
                        <?= csrf_field() ?>
                        <button class="btn btn-sm btn-outline-danger" data-confirm="Delete this teacher?"><i class="bi bi-trash"></i></button>
                    </form>
                </td>
            </tr>
            <?php endforeach; endif; ?>
            </tbody>
        </table>
    </div>
    <?php if ($pager): ?><div class="card-footer"><?= $pager->links() ?></div><?php endif; ?>
</div>
