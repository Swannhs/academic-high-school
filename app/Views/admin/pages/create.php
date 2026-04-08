<?php $isEdit = isset($page); $action = $isEdit ? base_url('admin/pages/update/' . $page['id']) : base_url('admin/pages/store'); ?>
<a href="<?= base_url('admin/pages') ?>" class="btn btn-sm btn-outline-secondary mb-4"><i class="bi bi-arrow-left me-1"></i>Back</a>

<form action="<?= $action ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>
    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header bg-white py-3">
                    <h5 class="card-title mb-0"><?= $isEdit ? 'Edit Page' : 'Add New Page' ?></h5>
                </div>
                <div class="card-body p-4">
                    <!-- Language Tabs -->
                    <ul class="nav nav-tabs mb-4" id="pageLangTab" role="tablist">
                        <li class="nav-item">
                            <button class="nav-link active px-4" id="en-tab" data-bs-toggle="tab" data-bs-target="#en-content" type="button" role="tab">English</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link px-4" id="bn-tab" data-bs-toggle="tab" data-bs-target="#bn-content" type="button" role="tab">Bengali (বাং)</button>
                        </li>
                    </ul>

                    <div class="tab-content" id="pageLangTabContent">
                        <!-- English Content -->
                        <div class="tab-pane fade show active" id="en-content" role="tabpanel">
                            <div class="mb-3">
                                <label class="form-label fw-bold small">Page Title (EN) <span class="text-danger">*</span></label>
                                <input type="text" name="title" class="form-control" value="<?= esc(old('title', $page['title'] ?? '')) ?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold small">Banner Title (EN)</label>
                                <input type="text" name="banner_title" class="form-control" value="<?= esc(old('banner_title', $page['banner_title'] ?? '')) ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold small">Page Content (EN)</label>
                                <textarea name="content" class="form-control richtext" rows="16"><?= old('content', $page['content'] ?? '') ?></textarea>
                            </div>
                        </div>

                        <!-- Bengali Content -->
                        <div class="tab-pane fade" id="bn-content" role="tabpanel">
                            <div class="mb-3">
                                <label class="form-label fw-bold small">Page Title (BN)</label>
                                <input type="text" name="title_bn" class="form-control" value="<?= esc(old('title_bn', $page['title_bn'] ?? '')) ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold small">Banner Title (BN)</label>
                                <input type="text" name="banner_title_bn" class="form-control" value="<?= esc(old('banner_title_bn', $page['banner_title_bn'] ?? '')) ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold small">Page Content (BN)</label>
                                <textarea name="content_bn" class="form-control richtext" rows="16"><?= old('content_bn', $page['content_bn'] ?? '') ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header bg-white py-3">
                    <h6 class="card-title mb-0"><i class="bi bi-search me-1"></i>SEO Settings</h6>
                </div>
                <div class="card-body p-4">
                    <ul class="nav nav-pills mb-3 small" id="seoLangTab" role="tablist">
                        <li class="nav-item"><button class="nav-link py-1 active" data-bs-toggle="tab" data-bs-target="#seo-en" type="button">English SEO</button></li>
                        <li class="nav-item"><button class="nav-link py-1" data-bs-toggle="tab" data-bs-target="#seo-bn" type="button">Bengali SEO</button></li>
                    </ul>
                    <div class="tab-content" id="seoTabContent">
                        <div class="tab-pane fade show active" id="seo-en">
                            <div class="mb-3">
                                <label class="form-label small">Meta Title (EN)</label>
                                <input type="text" name="meta_title" class="form-control" value="<?= esc(old('meta_title', $page['meta_title'] ?? '')) ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label small">Meta Description (EN)</label>
                                <textarea name="meta_description" class="form-control" rows="3"><?= esc(old('meta_description', $page['meta_description'] ?? '')) ?></textarea>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="seo-bn">
                            <div class="mb-3">
                                <label class="form-label small">Meta Title (BN)</label>
                                <input type="text" name="meta_title_bn" class="form-control" value="<?= esc(old('meta_title_bn', $page['meta_title_bn'] ?? '')) ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label small">Meta Description (BN)</label>
                                <textarea name="meta_description_bn" class="form-control" rows="3"><?= esc(old('meta_description_bn', $page['meta_description_bn'] ?? '')) ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header bg-white py-3">
                    <h6 class="card-title mb-0">Publishing</h6>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label fw-bold small">URL Slug <span class="text-danger">*</span></label>
                        <input type="text" name="slug" class="form-control" value="<?= esc(old('slug', $page['slug'] ?? '')) ?>" required>
                        <small class="text-muted">Unique identifier for the page URL.</small>
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-bold small">Status</label>
                        <select name="status" class="form-select">
                            <option value="active" <?= old('status', $page['status'] ?? '') === 'active' ? 'selected' : '' ?>>Published</option>
                            <option value="draft" <?= old('status', $page['status'] ?? '') === 'draft' ? 'selected' : '' ?>>Draft</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 shadow-sm"><i class="bi bi-save me-1"></i>Save Page</button>
                </div>
            </div>
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white py-3">
                    <h6 class="card-title mb-0">Banner Image</h6>
                </div>
                <div class="card-body text-center">
                    <?php if ($isEdit && !empty($page['featured_image'])): ?>
                        <div class="mb-3 p-2 border rounded bg-light">
                            <img src="<?= base_url('uploads/pages/' . $page['featured_image']) ?>" class="img-fluid rounded shadow-sm">
                            <div class="small mt-1 text-muted">Current Banner</div>
                        </div>
                    <?php endif; ?>
                    <label class="form-label small text-start w-100">Upload New Image</label>
                    <input type="file" name="featured_image" class="form-control" accept="image/*">
                </div>
            </div>
        </div>
    </div>
</form>

<?= view('admin/layouts/_editor') ?>