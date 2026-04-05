<?php $isEdit = isset($event); $action = $isEdit ? base_url('admin/academic-calendar/update/' . $event['id']) : base_url('admin/academic-calendar/store'); ?>
<a href="<?= base_url('admin/academic-calendar') ?>" class="btn btn-sm btn-outline-secondary mb-4"><i class="bi bi-arrow-left me-1"></i>Back</a>
<div class="card" style="max-width:600px">
    <div class="card-header"><?= $isEdit ? 'Edit Event' : 'Add Calendar Event' ?></div>
    <div class="card-body">
        <form action="<?= $action ?>" method="post">
            <?= csrf_field() ?>
            <div class="mb-3">
                <label class="form-label">Event Title</label>
                <input type="text" name="event_title" class="form-control" value="<?= esc(old('event_title', $event['event_title'] ?? '')) ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Category</label>
                <input type="text" name="category" class="form-control" value="<?= esc(old('category', $event['category'] ?? 'Holiday')) ?>">
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Start Date</label>
                    <input type="date" name="start_date" class="form-control" value="<?= old('start_date', $event['start_date'] ?? date('Y-m-d')) ?>" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">End Date</label>
                    <input type="date" name="end_date" class="form-control" value="<?= old('end_date', $event['end_date'] ?? date('Y-m-d')) ?>">
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="3"><?= esc(old('description', $event['description'] ?? '')) ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Save Event</button>
        </form>
    </div>
</div>