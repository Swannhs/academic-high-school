<?php $isEdit = isset($category); $action = $isEdit ? base_url('admin/notice-categories/update/' . $category['id']) : base_url('admin/notice-categories/store'); ?>
<a href="<?= base_url('admin/notice-categories') ?>" class="btn btn-sm btn-outline-secondary mb-4"><i class="bi bi-arrow-left me-1"></i>Back</a>
<div class="card" style="max-width:500px">
    <div class="card-header"><?= $isEdit ? 'Edit Category' : 'Add Category' ?></div>
    <div class="card-body">
        <form action="<?= $action ?>" method="post">
            <?= csrf_field() ?>
            <div class="mb-3">
                <label class="form-label">Category Name <span class="text-danger">*</span></label>
                <input type="text" name="name" class="form-control" value="<?= esc(old('name', $category['name'] ?? '')) ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-select">
                    <option value="active" <?= old('status', $category['status'] ?? '') === 'active' ? 'selected' : '' ?>>Active</option>
                    <option value="inactive" <?= old('status', $category['status'] ?? '') === 'inactive' ? 'selected' : '' ?>>Inactive</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary"><i class="bi bi-save me-1"></i>Save</button>
        </form>
    </div>
</div>