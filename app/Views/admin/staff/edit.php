<?php $isEdit = isset($member); $action = $isEdit ? base_url('admin/staff/update/' . $member['id']) : base_url('admin/staff/store'); ?>
<a href="<?= base_url('admin/staff') ?>" class="btn btn-sm btn-outline-secondary mb-4"><i class="bi bi-arrow-left me-1"></i>Back</a>
<div class="card" style="max-width:600px">
    <div class="card-header"><?= $isEdit ? 'Edit Member' : 'Add Staff/Committee' ?></div>
    <div class="card-body">
        <form action="<?= $action ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <div class="mb-3">
                <label class="form-label">Full Name</label>
                <input type="text" name="name" class="form-control" value="<?= esc(old('name', $member['name'] ?? '')) ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Role / Designation</label>
                <input type="text" name="role" class="form-control" value="<?= esc(old('role', $member['role'] ?? '')) ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Department</label>
                <input type="text" name="department" class="form-control" value="<?= esc(old('department', $member['department'] ?? '')) ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Photo</label>
                <input type="file" name="photo" class="form-control">
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Display Order</label>
                    <input type="number" name="display_order" class="form-control" value="<?= old('display_order', $member['display_order'] ?? 0) ?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="active" <?= old('status', $member['status'] ?? 'active') === 'active' ? 'selected' : '' ?>>Active</option>
                        <option value="inactive" <?= old('status', $member['status'] ?? '') === 'inactive' ? 'selected' : '' ?>>Inactive</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary"><i class="bi bi-save me-1"></i>Save Member</button>
        </form>
    </div>
</div>