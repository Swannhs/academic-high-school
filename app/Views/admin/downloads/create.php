<?php $isEdit = isset($item); $action = $isEdit ? base_url('admin/downloads/update/' . $item['id']) : base_url('admin/downloads/store'); ?>
<a href="<?= base_url('admin/downloads') ?>" class="btn btn-sm btn-outline-secondary mb-4"><i class="bi bi-arrow-left me-1"></i>Back</a>
<div class="card" style="max-width:700px">
    <div class="card-header"><?= $isEdit ? 'Edit Download' : 'Add Download' ?></div>
    <div class="card-body">
        <form action="<?= $action ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <div class="mb-3">
                <label class="form-label">Title <span class="text-danger">*</span></label>
                <input type="text" name="title" class="form-control" value="<?= esc(old('title', $item['title'] ?? '')) ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Category</label>
                <input type="text" name="category" class="form-control" value="<?= esc(old('category', $item['category'] ?? '')) ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="3"><?= esc(old('description', $item['description'] ?? '')) ?></textarea>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">PDF File <?= $isEdit ? '' : '<span class="text-danger">*</span>' ?></label>
                    <input type="file" name="file_path" class="form-control" accept=".pdf" <?= $isEdit ? '' : 'required' ?>>
                    <?php if ($isEdit && ! empty($item['file_path'])): ?>
                    <small class="text-muted">Current: <?= esc($item['file_path']) ?></small>
                    <?php endif; ?>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label">Publish Date</label>
                    <input type="date" name="publish_date" class="form-control" value="<?= esc(old('publish_date', $item['publish_date'] ?? date('Y-m-d'))) ?>">
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="active" <?= old('status', $item['status'] ?? 'active') === 'active' ? 'selected' : '' ?>>Active</option>
                        <option value="inactive" <?= old('status', $item['status'] ?? '') === 'inactive' ? 'selected' : '' ?>>Inactive</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Save Download</button>
        </form>
    </div>
</div>
