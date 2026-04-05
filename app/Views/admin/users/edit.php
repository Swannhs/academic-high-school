<a href="<?= base_url('admin/users') ?>" class="btn btn-sm btn-outline-secondary mb-4">Back</a>
<div class="card" style="max-width:680px">
    <div class="card-header">Edit User</div>
    <div class="card-body">
        <form action="<?= base_url('admin/users/update/' . $user['id']) ?>" method="post">
            <?= csrf_field() ?>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Full Name</label>
                    <input type="text" name="name" class="form-control" value="<?= esc(old('name', $user['name'])) ?>" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" value="<?= esc(old('username', $user['username'])) ?>" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="<?= esc(old('email', $user['email'])) ?>" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">New Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Leave blank to keep unchanged">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Role</label>
                    <select name="role_id" class="form-select">
                        <?php foreach ($roles as $r): ?>
                        <option value="<?= $r['id'] ?>" <?= (string) old('role_id', $user['role_id']) === (string) $r['id'] ? 'selected' : '' ?>><?= esc($r['label']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="active" <?= old('status', $user['status']) === 'active' ? 'selected' : '' ?>>Active</option>
                        <option value="inactive" <?= old('status', $user['status']) === 'inactive' ? 'selected' : '' ?>>Inactive</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Update User</button>
        </form>
    </div>
</div>
