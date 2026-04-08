<?php $isEdit = isset($category); $action = $isEdit ? base_url('admin/notice-categories/update/' . $category['id']) : base_url('admin/notice-categories/store'); ?>
<a href="<?= base_url('admin/notice-categories') ?>" class="btn btn-sm btn-outline-secondary mb-4"><i class="bi bi-arrow-left me-1"></i>Back</a>
<div class="card shadow-sm border-0" style="max-width:500px">
    <div class="card-header bg-white py-3">
        <h5 class="card-title mb-0"><?= $isEdit ? 'Edit Category' : 'Add New Category' ?></h5>
    </div>
    <div class="card-body p-4">
        <form action="<?= $action ?>" method="post">
            <?= csrf_field() ?>
            <div class="mb-3">
                <label class="form-label fw-bold small">Category Name (English) <span class="text-danger">*</span></label>
                <input type="text" name="name" class="form-control" value="<?= esc(old('name', $category['name'] ?? '')) ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold small">Category Name (Bengali)</label>
                <input type="text" name="name_bn" class="form-control" value="<?= esc(old('name_bn', $category['name_bn'] ?? '')) ?>">
            </div>
            <div class="mb-4">
                <label class="form-label fw-bold small">Status</label>
                <select name="status" class="form-select">
                    <option value="active" <?= old('status', $category['status'] ?? 'active') === 'active' ? 'selected' : '' ?>>Active</option>
                    <option value="inactive" <?= old('status', $category['status'] ?? '') === 'inactive' ? 'selected' : '' ?>>Inactive</option>
                </select>
            </div>
            <div class="pt-3 border-top">
                <button type="submit" class="btn btn-primary px-4 shadow-sm w-100 mb-2"><i class="bi bi-save me-1"></i>Save Category</button>
                <a href="<?= base_url('admin/notice-categories') ?>" class="btn btn-light w-100 border text-muted">Cancel</a>
            </div>
        </form>
    </div>
</div>