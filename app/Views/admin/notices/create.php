<?php $isEdit = isset($notice); $action = $isEdit ? base_url('admin/notices/update/' . $notice['id']) : base_url('admin/notices/store'); ?>
<div class="mb-4 d-flex justify-content-between align-items-center">
    <a href="<?= base_url('admin/notices') ?>" class="btn btn-sm btn-outline-secondary"><i class="bi bi-arrow-left me-1"></i>Back</a>
</div>
<div class="row">
<div class="col-lg-8">
<div class="card">
    <div class="card-header"><?= $isEdit ? 'Edit Notice' : 'Add New Notice' ?></div>
    <div class="card-body">
        <form action="<?= $action ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            
            <!-- Language Tabs -->
            <ul class="nav nav-tabs mb-4" id="noticeLangTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="en-tab" data-bs-toggle="tab" data-bs-target="#en-content" type="button" role="tab">English</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="bn-tab" data-bs-toggle="tab" data-bs-target="#bn-content" type="button" role="tab">Bengali (বাং)</button>
                </li>
            </ul>

            <div class="tab-content" id="noticeLangTabContent">
                <!-- English Content -->
                <div class="tab-pane fade show active" id="en-content" role="tabpanel">
                    <div class="mb-3">
                        <label class="form-label">Title (EN) <span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control" value="<?= esc(old('title', $notice['title'] ?? '')) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Short Description (EN) <small class="text-muted fw-normal">— shown in listing (no formatting)</small></label>
                        <textarea name="short_description" class="form-control richtext-simple" rows="2"><?= esc(old('short_description', $notice['short_description'] ?? '')) ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Full Content (EN)</label>
                        <textarea name="content" class="form-control richtext" rows="8"><?= old('content', $notice['content'] ?? '') ?></textarea>
                    </div>
                </div>

                <!-- Bengali Content -->
                <div class="tab-pane fade" id="bn-content" role="tabpanel">
                    <div class="mb-3">
                        <label class="form-label">Title (BN)</label>
                        <input type="text" name="title_bn" class="form-control" value="<?= esc(old('title_bn', $notice['title_bn'] ?? '')) ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Short Description (BN)</label>
                        <textarea name="short_description_bn" class="form-control richtext-simple" rows="2"><?= esc(old('short_description_bn', $notice['short_description_bn'] ?? '')) ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Full Content (BN)</label>
                        <textarea name="content_bn" class="form-control richtext" rows="8"><?= old('content_bn', $notice['content_bn'] ?? '') ?></textarea>
                    </div>
                </div>
            </div>

            <div class="mb-4">
                <label class="form-label">Category <span class="text-danger">*</span></label>
                <select name="category_id" class="form-select" required>
                    <option value="">Select Category</option>
                    <?php foreach ($categories as $c): ?>
                    <option value="<?= $c['id'] ?>" <?= old('category_id', $notice['category_id'] ?? '') == $c['id'] ? 'selected' : '' ?>><?= esc($c['name']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Attachment (PDF/Image)</label>
                    <input type="file" name="attachment" class="form-control" accept=".pdf,.jpg,.jpeg,.png,.webp">
                    <?php if ($isEdit && ! empty($notice['attachment'])): ?>
                    <small class="text-muted">Current: <?= esc($notice['attachment']) ?></small>
                    <?php endif; ?>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Publish Date</label>
                    <input type="date" name="publish_date" class="form-control" value="<?= esc(old('publish_date', $notice['publish_date'] ?? date('Y-m-d'))) ?>">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="active" <?= old('status', $notice['status'] ?? '') === 'active' ? 'selected' : '' ?>>Active</option>
                        <option value="inactive" <?= old('status', $notice['status'] ?? '') === 'inactive' ? 'selected' : '' ?>>Inactive</option>
                    </select>
                </div>
                <div class="col-md-6 d-flex align-items-end">
                    <div class="form-check">
                        <input type="checkbox" name="is_featured" value="1" class="form-check-input" id="featured"
                               <?= old('is_featured', $notice['is_featured'] ?? 0) ? 'checked' : '' ?>>
                        <label class="form-check-label" for="featured">Featured Notice</label>
                    </div>
                </div>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary"><i class="bi bi-save me-1"></i>Save Notice</button>
                <a href="<?= base_url('admin/notices') ?>" class="btn btn-outline-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
</div>

<?= view('admin/layouts/_editor') ?>

</div>