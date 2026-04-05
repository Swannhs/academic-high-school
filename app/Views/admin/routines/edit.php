<?php $isEdit = isset($routine); $action = $isEdit ? base_url('admin/routines/update/' . $routine['id']) : base_url('admin/routines/store'); ?>
<a href="<?= base_url('admin/routines') ?>" class="btn btn-sm btn-outline-secondary mb-4"><i class="bi bi-arrow-left me-1"></i>Back</a>
<div class="card" style="max-width:700px">
    <div class="card-header"><?= $isEdit ? 'Edit Routine' : 'Add Routine' ?></div>
    <div class="card-body">
        <form action="<?= $action ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control" value="<?= esc(old('title', $routine['title'] ?? '')) ?>" required>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Routine Type</label>
                    <select name="routine_type" class="form-select" required>
                        <option value="Class Routine" <?= old('routine_type', $routine['routine_type'] ?? '') === 'Class Routine' ? 'selected' : '' ?>>Class Routine</option>
                        <option value="Exam Routine" <?= old('routine_type', $routine['routine_type'] ?? '') === 'Exam Routine' ? 'selected' : '' ?>>Exam Routine</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Class</label>
                    <input type="text" name="class_name" class="form-control" value="<?= esc(old('class_name', $routine['class_name'] ?? '')) ?>">
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Upload File (PDF)</label>
                <input type="file" name="file_path" class="form-control" <?= $isEdit ? '' : 'required' ?>>
            </div>
            <div class="mb-3">
                <label class="form-label">Publish Date</label>
                <input type="date" name="publish_date" class="form-control" value="<?= old('publish_date', $routine['publish_date'] ?? date('Y-m-d')) ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Notes</label>
                <textarea name="notes" class="form-control" rows="3"><?= esc(old('notes', $routine['notes'] ?? '')) ?></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-select">
                    <option value="active" <?= old('status', $routine['status'] ?? 'active') === 'active' ? 'selected' : '' ?>>Active</option>
                    <option value="inactive" <?= old('status', $routine['status'] ?? '') === 'inactive' ? 'selected' : '' ?>>Inactive</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Save Routine</button>
        </form>
    </div>
</div>
