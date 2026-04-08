<?php $isEdit = isset($event); $action = $isEdit ? base_url('admin/academic-calendar/update/' . $event['id']) : base_url('admin/academic-calendar/store'); ?>
<a href="<?= base_url('admin/academic-calendar') ?>" class="btn btn-sm btn-outline-secondary mb-4"><i class="bi bi-arrow-left me-1"></i>Back</a>
<div class="card shadow-sm border-0" style="max-width:800px">
    <div class="card-header bg-white py-3">
        <h5 class="card-title mb-0"><?= $isEdit ? 'Edit Event' : 'Add Calendar Event' ?></h5>
    </div>
    <div class="card-body p-4">
        <form action="<?= $action ?>" method="post">
            <?= csrf_field() ?>

            <!-- Language Tabs -->
            <ul class="nav nav-tabs mb-4" id="calendarLangTab" role="tablist">
                <li class="nav-item">
                    <button class="nav-link active" id="en-tab" data-bs-toggle="tab" data-bs-target="#en-content" type="button" role="tab">English</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" id="bn-tab" data-bs-toggle="tab" data-bs-target="#bn-content" type="button" role="tab">Bengali (বাং)</button>
                </li>
            </ul>

            <div class="tab-content" id="calendarLangTabContent">
                <!-- English Content -->
                <div class="tab-pane fade show active" id="en-content" role="tabpanel">
                    <div class="mb-3">
                        <label class="form-label">Event Title (EN) <span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control" value="<?= esc(old('title', $event['title'] ?? '')) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description (EN)</label>
                        <textarea name="description" class="form-control" rows="3"><?= esc(old('description', $event['description'] ?? '')) ?></textarea>
                    </div>
                </div>

                <!-- Bengali Content -->
                <div class="tab-pane fade" id="bn-content" role="tabpanel">
                    <div class="mb-3">
                        <label class="form-label">Event Title (BN)</label>
                        <input type="text" name="title_bn" class="form-control" value="<?= esc(old('title_bn', $event['title_bn'] ?? '')) ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description (BN)</label>
                        <textarea name="description_bn" class="form-control" rows="3"><?= esc(old('description_bn', $event['description_bn'] ?? '')) ?></textarea>
                    </div>
                </div>
            </div>

            <hr class="my-4 text-muted opacity-25">

            <div class="mb-4">
                <label class="form-label">Category</label>
                <select name="category" class="form-select">
                    <option value="general" <?= old('category', $event['category'] ?? '') === 'general' ? 'selected' : '' ?>>General Event</option>
                    <option value="exam" <?= old('category', $event['category'] ?? '') === 'exam' ? 'selected' : '' ?>>Examination</option>
                    <option value="holiday" <?= old('category', $event['category'] ?? '') === 'holiday' ? 'selected' : '' ?>>Holiday</option>
                    <option value="admission" <?= old('category', $event['category'] ?? '') === 'admission' ? 'selected' : '' ?>>Admission</option>
                </select>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Start Date <span class="text-danger">*</span></label>
                    <input type="date" name="event_date" class="form-control" value="<?= old('event_date', $event['event_date'] ?? date('Y-m-d')) ?>" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">End Date</label>
                    <input type="date" name="end_date" class="form-control" value="<?= old('end_date', $event['end_date'] ?? '') ?>">
                </div>
            </div>

            <div class="mb-4">
                <label class="form-label">Status</label>
                <select name="status" class="form-select">
                    <option value="active" <?= old('status', $event['status'] ?? 'active') === 'active' ? 'selected' : '' ?>>Active</option>
                    <option value="inactive" <?= old('status', $event['status'] ?? '') === 'inactive' ? 'selected' : '' ?>>Inactive</option>
                </select>
            </div>

            <div class="pt-3 border-top d-flex gap-2">
                <button type="submit" class="btn btn-primary px-4 shadow-sm"><i class="bi bi-save me-1"></i>Save Event</button>
                <a href="<?= base_url('admin/academic-calendar') ?>" class="btn btn-light px-4 border">Cancel</a>
            </div>
        </form>
    </div>
</div>