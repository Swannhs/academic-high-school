<?php $isEdit = isset($routine); $action = $isEdit ? base_url('admin/routines/update/' . $routine['id']) : base_url('admin/routines/store'); ?>
<a href="<?= base_url('admin/routines') ?>" class="btn btn-sm btn-outline-secondary mb-4"><i class="bi bi-arrow-left me-1"></i>Back</a>
<div class="card shadow-sm border-0" style="max-width:800px">
    <div class="card-header bg-white py-3">
        <h5 class="card-title mb-0"><?= $isEdit ? 'Edit Routine' : 'Add New Routine' ?></h5>
    </div>
    <div class="card-body p-4">
        <form action="<?= $action ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>

            <!-- Language Tabs -->
            <ul class="nav nav-tabs mb-4" id="routineLangTab" role="tablist">
                <li class="nav-item">
                    <button class="nav-link active" id="en-tab" data-bs-toggle="tab" data-bs-target="#en-content" type="button" role="tab">English</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" id="bn-tab" data-bs-toggle="tab" data-bs-target="#bn-content" type="button" role="tab">Bengali (বাং)</button>
                </li>
            </ul>

            <div class="tab-content" id="routineLangTabContent">
                <!-- English Content -->
                <div class="tab-pane fade show active" id="en-content" role="tabpanel">
                    <div class="mb-3">
                        <label class="form-label">Title (EN) <span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control" value="<?= esc(old('title', $routine['title'] ?? '')) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Notes (EN)</label>
                        <textarea name="notes" class="form-control" rows="3"><?= esc(old('notes', $routine['notes'] ?? '')) ?></textarea>
                    </div>
                </div>

                <!-- Bengali Content -->
                <div class="tab-pane fade" id="bn-content" role="tabpanel">
                    <div class="mb-3">
                        <label class="form-label">Title (BN)</label>
                        <input type="text" name="title_bn" class="form-control" value="<?= esc(old('title_bn', $routine['title_bn'] ?? '')) ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Notes (BN)</label>
                        <textarea name="notes_bn" class="form-control" rows="3"><?= esc(old('notes_bn', $routine['notes_bn'] ?? '')) ?></textarea>
                    </div>
                </div>
            </div>

            <hr class="my-4 text-muted opacity-25">

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Routine Type <span class="text-danger">*</span></label>
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
            <div class="mb-4">
                <label class="form-label">Routine File (PDF) <span class="text-danger">*</span></label>
                <input type="file" name="file_path" class="form-control" <?= $isEdit ? '' : 'required' ?> accept=".pdf">
                <?php if ($isEdit && ! empty($routine['file_path'])): ?>
                <div class="mt-2 text-muted small"><i class="bi bi-file-earmark-pdf me-1"></i><?= esc($routine['file_path']) ?></div>
                <?php endif; ?>
            </div>
            <div class="row mb-4">
                <div class="col-md-6">
                    <label class="form-label">Publish Date</label>
                    <input type="date" name="publish_date" class="form-control" value="<?= old('publish_date', $routine['publish_date'] ?? date('Y-m-d')) ?>">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="active" <?= old('status', $routine['status'] ?? 'active') === 'active' ? 'selected' : '' ?>>Active</option>
                        <option value="inactive" <?= old('status', $routine['status'] ?? '') === 'inactive' ? 'selected' : '' ?>>Inactive</option>
                    </select>
                </div>
            </div>
            <div class="pt-3 border-top d-flex gap-2">
                <button type="submit" class="btn btn-primary px-4 shadow-sm"><i class="bi bi-save me-1"></i>Save Routine</button>
                <a href="<?= base_url('admin/routines') ?>" class="btn btn-light px-4 border">Cancel</a>
            </div>
        </form>
    </div>
</div>
