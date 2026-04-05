<?php $isEdit = isset($page); $action = $isEdit ? base_url('admin/pages/update/' . $page['id']) : base_url('admin/pages/store'); ?>
<a href="<?= base_url('admin/pages') ?>" class="btn btn-sm btn-outline-secondary mb-4"><i class="bi bi-arrow-left me-1"></i>Back</a>
<form action="<?= $action ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>
    <div class="row">
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Page Title</label>
                        <input type="text" name="title" class="form-control" value="<?= esc(old('title', $page['title'] ?? '')) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Slug</label>
                        <input type="text" name="slug" class="form-control" value="<?= esc(old('slug', $page['slug'] ?? '')) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Banner Title</label>
                        <input type="text" name="banner_title" class="form-control" value="<?= esc(old('banner_title', $page['banner_title'] ?? '')) ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Content</label>
                        <textarea name="content" class="form-control" rows="12"><?= esc(old('content', $page['content'] ?? '')) ?></textarea>
                    </div>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header">SEO Settings</div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Meta Title</label>
                        <input type="text" name="meta_title" class="form-control" value="<?= esc(old('meta_title', $page['meta_title'] ?? '')) ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Meta Description</label>
                        <textarea name="meta_description" class="form-control" rows="3"><?= esc(old('meta_description', $page['meta_description'] ?? '')) ?></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-header">Publishing</div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select">
                            <option value="active" <?= old('status', $page['status'] ?? '') === 'active' ? 'selected' : '' ?>>Active</option>
                            <option value="draft" <?= old('status', $page['status'] ?? '') === 'draft' ? 'selected' : '' ?>>Draft</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary w-100"><i class="bi bi-save me-1"></i>Save Page</button>
                </div>
            </div>
            <div class="card">
                <div class="card-header">Featured Image</div>
                <div class="card-body text-center">
                    <?php if ($isEdit && $page['featured_image']): ?>
                        <img src="<?= base_url('uploads/pages/' . $page['featured_image']) ?>" class="img-fluid mb-3 rounded shadow-sm">
                    <?php endif; ?>
                    <input type="file" name="featured_image" class="form-control">
                </div>
            </div>
        </div>
    </div>
</form>