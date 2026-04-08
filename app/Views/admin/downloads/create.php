<?php $isEdit = isset($item); $action = $isEdit ? base_url('admin/downloads/update/' . $item['id']) : base_url('admin/downloads/store'); ?>
<a href="<?= base_url('admin/downloads') ?>" class="btn btn-sm btn-outline-secondary mb-4"><i class="bi bi-arrow-left me-1"></i>Back</a>
<div class="card shadow-sm border-0" style="max-width:800px">
    <div class="card-header bg-white py-3">
        <h5 class="card-title mb-0"><?= $isEdit ? 'Edit Download' : 'Add New Download' ?></h5>
    </div>
    <div class="card-body p-4">
        <form action="<?= $action ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>

            <!-- Language Tabs -->
            <ul class="nav nav-tabs mb-4" id="downloadLangTab" role="tablist">
                <li class="nav-item">
                    <button class="nav-link active" id="en-tab" data-bs-toggle="tab" data-bs-target="#en-content" type="button" role="tab">English</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" id="bn-tab" data-bs-toggle="tab" data-bs-target="#bn-content" type="button" role="tab">Bengali (বাং)</button>
                </li>
            </ul>

            <div class="tab-content" id="downloadLangTabContent">
                <!-- English Content -->
                <div class="tab-pane fade show active" id="en-content" role="tabpanel">
                    <div class="mb-3">
                        <label class="form-label">Title (EN) <span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control" value="<?= esc(old('title', $item['title'] ?? '')) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description (EN)</label>
                        <textarea name="description" class="form-control" rows="3"><?= esc(old('description', $item['description'] ?? '')) ?></textarea>
                    </div>
                </div>

                <!-- Bengali Content -->
                <div class="tab-pane fade" id="bn-content" role="tabpanel">
                    <div class="mb-3">
                        <label class="form-label">Title (BN)</label>
                        <input type="text" name="title_bn" class="form-control" value="<?= esc(old('title_bn', $item['title_bn'] ?? '')) ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description (BN)</label>
                        <textarea name="description_bn" class="form-control" rows="3"><?= esc(old('description_bn', $item['description_bn'] ?? '')) ?></textarea>
                    </div>
                </div>
            </div>

            <hr class="my-4 text-muted opacity-25">

            <div class="mb-4">
                <label class="form-label">Category</label>
                <input type="text" name="category" class="form-control" value="<?= esc(old('category', $item['category'] ?? '')) ?>" placeholder="e.g. Admission, Academic">
            </div>

            <div class="row mb-4">
                <div class="col-md-6 mb-3">
                    <label class="form-label">PDF File <span class="text-danger">*</span></label>
                    <input type="file" name="file_path" class="form-control" accept=".pdf" <?= $isEdit ? '' : 'required' ?>>
                    <?php if ($isEdit && ! empty($item['file_path'])): ?>
                    <div class="mt-2 text-muted small"><i class="bi bi-file-earmark-pdf me-1"></i><?= esc($item['file_path']) ?></div>
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
            <div class="pt-3 border-top d-flex gap-2">
                <button type="submit" class="btn btn-primary px-4 shadow-sm"><i class="bi bi-save me-1"></i>Save Download</button>
                <a href="<?= base_url('admin/downloads') ?>" class="btn btn-light px-4 border">Cancel</a>
            </div>
        </form>
    </div>
</div>
