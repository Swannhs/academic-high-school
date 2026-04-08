<a href="<?= base_url('admin/gallery') ?>" class="btn btn-sm btn-outline-secondary mb-4"><i class="bi bi-arrow-left me-1"></i>Back</a>
<div class="card shadow-sm border-0" style="max-width:700px">
    <div class="card-header bg-white py-3">
        <h5 class="card-title mb-0">Create New Album</h5>
    </div>
    <div class="card-body p-4">
        <form action="<?= base_url('admin/gallery/store') ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>

            <!-- Language Tabs -->
            <ul class="nav nav-tabs mb-4" id="galleryLangTab" role="tablist">
                <li class="nav-item">
                    <button class="nav-link active" id="en-tab" data-bs-toggle="tab" data-bs-target="#en-content" type="button" role="tab">English</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" id="bn-tab" data-bs-toggle="tab" data-bs-target="#bn-content" type="button" role="tab">Bengali (বাং)</button>
                </li>
            </ul>

            <div class="tab-content" id="galleryLangTabContent">
                <!-- English Content -->
                <div class="tab-pane fade show active" id="en-content" role="tabpanel">
                    <div class="mb-3">
                        <label class="form-label">Album Title (EN) <span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control" value="<?= old('title') ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description (EN)</label>
                        <textarea name="description" class="form-control" rows="3"><?= old('description') ?></textarea>
                    </div>
                </div>

                <!-- Bengali Content -->
                <div class="tab-pane fade" id="bn-content" role="tabpanel">
                    <div class="mb-3">
                        <label class="form-label">Album Title (BN)</label>
                        <input type="text" name="title_bn" class="form-control" value="<?= old('title_bn') ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description (BN)</label>
                        <textarea name="description_bn" class="form-control" rows="3"><?= old('description_bn') ?></textarea>
                    </div>
                </div>
            </div>

            <hr class="my-4 text-muted opacity-25">

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Category</label>
                    <select name="category" class="form-select">
                        <option value="campus">Campus</option>
                        <option value="events">Events</option>
                        <option value="sports">Sports</option>
                        <option value="cultural">Cultural</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Event Date</label>
                    <input type="date" name="event_date" class="form-control" value="<?= date('Y-m-d') ?>">
                </div>
            </div>

            <div class="mb-4">
                <label class="form-label">Cover Image</label>
                <input type="file" name="cover_image" class="form-control" accept="image/*">
            </div>

            <div class="mb-4">
                <label class="form-label">Upload Images (Multiple)</label>
                <input type="file" name="images[]" class="form-control" accept="image/*" multiple>
                <small class="text-muted">You can select multiple images to upload at once.</small>
            </div>

            <div class="pt-3 border-top d-flex gap-2">
                <button type="submit" class="btn btn-primary px-4 shadow-sm"><i class="bi bi-save me-1"></i>Create Album</button>
                <a href="<?= base_url('admin/gallery') ?>" class="btn btn-light px-4 border">Cancel</a>
            </div>
        </form>
    </div>
</div>