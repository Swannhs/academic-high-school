<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="mb-0 fw-bold">System Users</h5>
    <a href="<?= base_url('admin/users/create') ?>" class="btn btn-primary btn-sm">Add User</a>
</div>
<div class="card">
    <div class="card-header">
        <form method="get" class="row g-2 align-items-end">
            <div class="col-md-6">
                <label class="form-label mb-1">Search</label>
                <input type="text" name="search" class="form-control form-control-sm" value="<?= esc($this->request->getGet('search')) ?>" placeholder="Name, username, email">
            </div>
            <div class="col-md-3">
                <label class="form-label mb-1">Status</label>
                <select name="status" class="form-select form-select-sm">
                    <option value="">All Status</option>
                    <option value="active" <?= $this->request->getGet('status') === 'active' ? 'selected' : '' ?>>Active</option>
                    <option value="inactive" <?= $this->request->getGet('status') === 'inactive' ? 'selected' : '' ?>>Inactive</option>
                </select>
            </div>
            <div class="col-md-3">
                <button class="btn btn-sm btn-outline-secondary w-100">Filter</button>
            </div>
        </form>
    </div>
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead><tr><th>Name</th><th>Username</th><th>Email</th><th>Role</th><th>Status</th><th>Actions</th></tr></thead>
            <tbody>
            <?php foreach ($users as $u): ?>
            <tr>
                <td><?= esc($u['name']) ?></td>
                <td><?= esc($u['username']) ?></td>
                <td><?= esc($u['email']) ?></td>
                <td><span class="badge bg-light text-dark"><?= esc($u['role_label']) ?></span></td>
                <td><span class="badge bg-<?= $u['status'] === 'active' ? 'success' : 'danger' ?>"><?= esc($u['status']) ?></span></td>
                <td>
                    <a href="<?= base_url('admin/users/edit/'.$u['id']) ?>" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></a>
                    <form action="<?= base_url('admin/users/toggle/'.$u['id']) ?>" method="post" class="d-inline">
                        <?= csrf_field() ?>
                        <button class="btn btn-sm btn-outline-warning"><i class="bi bi-arrow-repeat"></i></button>
                    </form>
                    <form action="<?= base_url('admin/users/delete/'.$u['id']) ?>" method="post" class="d-inline">
                        <?= csrf_field() ?>
                        <button class="btn btn-sm btn-outline-danger" data-confirm="Delete this user?"><i class="bi bi-trash"></i></button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
