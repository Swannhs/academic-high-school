<a href="<?= base_url('admin/gallery') ?>" class="btn btn-sm btn-outline-secondary mb-4"><i class="bi bi-arrow-left me-1"></i>Back</a>
<div class="row">
    <div class="col-lg-5">
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-header bg-white py-3">
                <h5 class="card-title mb-0">Album Details</h5>
            </div>
            <div class="card-body p-4">
                <form action="<?= base_url('admin/gallery/update/' . $album['id']) ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field() ?>

                    <!-- Language Tabs -->
                    <ul class="nav nav-tabs mb-4" id="galleryLangTab" role="tablist">
                        <li class="nav-item">
                            <button class="nav-link active px-3" id="en-tab" data-bs-toggle="tab" data-bs-target="#en-content" type="button" role="tab">English</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link px-3" id="bn-tab" data-bs-toggle="tab" data-bs-target="#bn-content" type="button" role="tab">Bengali (বাং)</button>
                        </li>
                    </ul>

                    <div class="tab-content" id="galleryLangTabContent">
                        <div class="tab-pane fade show active" id="en-content" role="tabpanel">
                            <div class="mb-3">
                                <label class="form-label fw-bold small">Album Title (EN) <span class="text-danger">*</span></label>
                                <input type="text" name="title" class="form-control" value="<?= esc(old('title', $album['title'])) ?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold small">Description (EN)</label>
                                <textarea name="description" class="form-control" rows="3"><?= esc(old('description', $album['description'])) ?></textarea>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="bn-content" role="tabpanel">
                            <div class="mb-3">
                                <label class="form-label fw-bold small">Album Title (BN)</label>
                                <input type="text" name="title_bn" class="form-control" value="<?= esc(old('title_bn', $album['title_bn'] ?? '')) ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold small">Description (BN)</label>
                                <textarea name="description_bn" class="form-control" rows="3"><?= esc(old('description_bn', $album['description_bn'] ?? '')) ?></textarea>
                            </div>
                        </div>
                    </div>

                    <hr class="my-3 opacity-25">

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold small">Category</label>
                            <select name="category" class="form-select">
                                <option value="campus" <?= $album['category'] == 'campus' ? 'selected' : '' ?>>Campus</option>
                                <option value="events" <?= $album['category'] == 'events' ? 'selected' : '' ?>>Events</option>
                                <option value="sports" <?= $album['category'] == 'sports' ? 'selected' : '' ?>>Sports</option>
                                <option value="cultural" <?= $album['category'] == 'cultural' ? 'selected' : '' ?>>Cultural</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold small">Event Date</label>
                            <input type="date" name="event_date" class="form-control" value="<?= esc($album['event_date']) ?>">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold small">Album Status</label>
                        <select name="status" class="form-select">
                            <option value="active" <?= $album['status'] == 'active' ? 'selected' : '' ?>>Active</option>
                            <option value="inactive" <?= $album['status'] == 'inactive' ? 'selected' : '' ?>>Inactive</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold small">Update Cover Image</label>
                        <input type="file" name="cover_image" class="form-control mb-2" accept="image/*">
                        <?php if(!empty($album['cover_image'])): ?>
                            <div class="p-2 border rounded text-center bg-light">
                                <img src="<?= base_url('uploads/gallery/'.$album['cover_image']) ?>" class="img-fluid rounded" style="max-height: 150px;">
                                <div class="small mt-1 text-muted">Current Cover</div>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-4 p-3 bg-primary-subtle rounded border border-primary-subtle">
                        <label class="form-label fw-bold small"><i class="bi bi-cloud-arrow-up me-1"></i>Add More Photos</label>
                        <input type="file" name="images[]" class="form-control" multiple accept="image/*">
                        <small class="text-muted d-block mt-1">Select multiple files to upload into this album.</small>
                    </div>

                    <div class="pt-3 border-top">
                        <button type="submit" class="btn btn-primary w-100 shadow-sm"><i class="bi bi-save me-1"></i>Save Overall Updates</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-7">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">Photos in this Album (<?= count($images) ?>)</h5>
            </div>
            <div class="card-body p-4">
                <div class="row g-3">
                    <?php if (empty($images)): ?>
                        <div class="col-12 text-center py-5">
                            <i class="bi bi-images display-1 text-muted opacity-25"></i>
                            <p class="mt-2 text-muted">No photos in this album yet.</p>
                        </div>
                    <?php endif; ?>
                    <?php foreach ($images as $img): ?>
                    <div class="col-md-4 col-6 position-relative group-hover">
                        <div class="gallery-img-wrapper rounded overflow-hidden shadow-sm border">
                            <img src="<?= base_url('uploads/gallery/'.$img['image_path']) ?>" class="img-fluid w-100" style="height: 160px; object-fit: cover;">
                            <div class="overlay position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center bg-dark bg-opacity-50 opacity-0 transition-all">
                                <form action="<?= base_url('admin/gallery/image-delete/'.$img['id']) ?>" method="post" onsubmit="return confirm('Delete this image?')">
                                    <?= csrf_field() ?>
                                    <button class="btn btn-danger btn-sm rounded-circle shadow">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.transition-all { transition: all 0.3s ease; }
.group-hover:hover .overlay { opacity: 1 !important; }
.gallery-img-wrapper { height: 160px; }
</style>