<a href="<?= base_url('admin/users') ?>" class="btn btn-sm btn-outline-secondary mb-4">Back</a>
<div class="card" style="max-width:600px">
    <div class="card-header">Add New User</div>
    <div class="card-body">
        <form action="<?= base_url('admin/users/store') ?>" method="post">
            <?= csrf_field() ?>
            <div class="mb-3"><label class="form-label">Full Name</label><input type="text" name="name" class="form-control" value="<?= esc(old('name')) ?>" required></div>
            <div class="mb-3"><label class="form-label">Username</label><input type="text" name="username" class="form-control" value="<?= esc(old('username')) ?>" required></div>
            <div class="mb-3"><label class="form-label">Email</label><input type="email" name="email" class="form-control" value="<?= esc(old('email')) ?>" required></div>
            <div class="mb-3"><label class="form-label">Password</label><input type="password" name="password" class="form-control" required></div>
            <div class="mb-3">
                <label class="form-label">Role</label>
                <select name="role_id" class="form-select">
                    <?php foreach ($roles as $r): ?>
                    <option value="<?= $r['id'] ?>" <?= old('role_id') == $r['id'] ? 'selected' : '' ?>><?= esc($r['label']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-select">
                    <option value="active" <?= old('status', 'active') === 'active' ? 'selected' : '' ?>>Active</option>
                    <option value="inactive" <?= old('status') === 'inactive' ? 'selected' : '' ?>>Inactive</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Create User</button>
        </form>
    </div>
</div>
