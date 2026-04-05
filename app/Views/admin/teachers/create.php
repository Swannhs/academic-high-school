<?php $isEdit = isset($teacher); $action = $isEdit ? base_url('admin/teachers/update/' . $teacher['id']) : base_url('admin/teachers/store'); ?>
<a href="<?= base_url('admin/teachers') ?>" class="btn btn-sm btn-outline-secondary mb-4"><i class="bi bi-arrow-left me-1"></i>Back</a>
<div class="card">
    <div class="card-header"><?= $isEdit ? 'Edit Teacher' : 'Add Teacher' ?></div>
    <div class="card-body">
        <form action="<?= $action ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Full Name (English) <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control" value="<?= esc(old('name', $teacher['name'] ?? '')) ?>" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Full Name (Bengali)</label>
                    <input type="text" name="name_bn" class="form-control" value="<?= esc(old('name_bn', $teacher['name_bn'] ?? '')) ?>">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Designation <span class="text-danger">*</span></label>
                    <input type="text" name="designation" class="form-control" value="<?= esc(old('designation', $teacher['designation'] ?? '')) ?>" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Department</label>
                    <input type="text" name="department" class="form-control" value="<?= esc(old('department', $teacher['department'] ?? '')) ?>">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Subject</label>
                    <input type="text" name="subject" class="form-control" value="<?= esc(old('subject', $teacher['subject'] ?? '')) ?>">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Qualification</label>
                    <input type="text" name="qualification" class="form-control" value="<?= esc(old('qualification', $teacher['qualification'] ?? '')) ?>">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <label class="form-label">Phone</label>
                    <input type="text" name="phone" class="form-control" value="<?= esc(old('phone', $teacher['phone'] ?? '')) ?>">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="<?= esc(old('email', $teacher['email'] ?? '')) ?>">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Joining Date</label>
                    <input type="date" name="joining_date" class="form-control" value="<?= esc(old('joining_date', $teacher['joining_date'] ?? '')) ?>">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <label class="form-label">Photo</label>
                    <input type="file" name="photo" class="form-control" accept=".jpg,.jpeg,.png,.webp">
                    <?php if ($isEdit && (! empty($teacher['photo_url']) || ! empty($teacher['photo']))): ?>
                    <div class="mt-2"><img src="<?= esc(upload_url('teachers', $teacher['photo_url'] ?? $teacher['photo'])) ?>" style="width:60px;height:60px;object-fit:cover;border-radius:8px;"></div>
                    <?php endif; ?>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Display Order</label>
                    <input type="number" name="display_order" class="form-control" value="<?= esc(old('display_order', $teacher['display_order'] ?? 0)) ?>">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="active" <?= old('status', $teacher['status'] ?? 'active') === 'active' ? 'selected' : '' ?>>Active</option>
                        <option value="inactive" <?= old('status', $teacher['status'] ?? '') === 'inactive' ? 'selected' : '' ?>>Inactive</option>
                    </select>
                </div>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary"><i class="bi bi-save me-1"></i>Save</button>
                <a href="<?= base_url('admin/teachers') ?>" class="btn btn-outline-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
