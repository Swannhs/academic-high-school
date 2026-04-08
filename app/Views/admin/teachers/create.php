<?php $isEdit = isset($teacher); $action = $isEdit ? base_url('admin/teachers/update/' . $teacher['id']) : base_url('admin/teachers/store'); ?>
<a href="<?= base_url('admin/teachers') ?>" class="btn btn-sm btn-outline-secondary mb-4"><i class="bi bi-arrow-left me-1"></i>Back</a>
<div class="card shadow-sm border-0">
    <div class="card-header bg-white py-3">
        <h5 class="card-title mb-0"><?= $isEdit ? 'Edit Teacher' : 'Add Teacher' ?></h5>
    </div>
    <div class="card-body p-4">
        <form action="<?= $action ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>

            <!-- Language Tabs -->
            <ul class="nav nav-tabs mb-4" id="teacherLangTab" role="tablist">
                <li class="nav-item">
                    <button class="nav-link active" id="en-tab" data-bs-toggle="tab" data-bs-target="#en-info" type="button" role="tab">English Info</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" id="bn-tab" data-bs-toggle="tab" data-bs-target="#bn-info" type="button" role="tab">Bengali Info (বাং)</button>
                </li>
            </ul>

            <div class="tab-content" id="teacherLangTabContent">
                <!-- English Content -->
                <div class="tab-pane fade show active" id="en-info" role="tabpanel">
                    <div class="row mb-3">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Full Name (EN) <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" value="<?= esc(old('name', $teacher['name'] ?? '')) ?>" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Designation (EN) <span class="text-danger">*</span></label>
                            <input type="text" name="designation" class="form-control" value="<?= esc(old('designation', $teacher['designation'] ?? '')) ?>" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Department (EN)</label>
                            <input type="text" name="department" class="form-control" value="<?= esc(old('department', $teacher['department'] ?? '')) ?>">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Subject (EN)</label>
                            <input type="text" name="subject" class="form-control" value="<?= esc(old('subject', $teacher['subject'] ?? '')) ?>">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Qualification (EN)</label>
                            <textarea name="qualification" class="form-control richtext-simple" rows="2"><?= esc(old('qualification', $teacher['qualification'] ?? '')) ?></textarea>
                        </div>
                    </div>
                </div>

                <!-- Bengali Content -->
                <div class="tab-pane fade" id="bn-info" role="tabpanel">
                    <div class="row mb-3">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Full Name (BN)</label>
                            <input type="text" name="name_bn" class="form-control" value="<?= esc(old('name_bn', $teacher['name_bn'] ?? '')) ?>">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Designation (BN)</label>
                            <input type="text" name="designation_bn" class="form-control" value="<?= esc(old('designation_bn', $teacher['designation_bn'] ?? '')) ?>">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Department (BN)</label>
                            <input type="text" name="department_bn" class="form-control" value="<?= esc(old('department_bn', $teacher['department_bn'] ?? '')) ?>">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Subject (BN)</label>
                            <input type="text" name="subject_bn" class="form-control" value="<?= esc(old('subject_bn', $teacher['subject_bn'] ?? '')) ?>">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Qualification (BN)</label>
                            <textarea name="qualification_bn" class="form-control richtext-simple" rows="2"><?= esc(old('qualification_bn', $teacher['qualification_bn'] ?? '')) ?></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="my-4 text-muted opacity-25">

            <div class="row mb-4">
                <div class="col-md-4 mb-3">
                    <label class="form-label">Phone</label>
                    <input type="text" name="phone" class="form-control" value="<?= esc(old('phone', $teacher['phone'] ?? '')) ?>">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="<?= esc(old('email', $teacher['email'] ?? '')) ?>">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Joining Date</label>
                    <input type="date" name="joining_date" class="form-control" value="<?= esc(old('joining_date', $teacher['joining_date'] ?? '')) ?>">
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-md-4 mb-3">
                    <label class="form-label">Profile Photo</label>
                    <input type="file" name="photo" class="form-control" accept=".jpg,.jpeg,.png,.webp">
                    <?php if ($isEdit && (! empty($teacher['photo_url']) || ! empty($teacher['photo']))): ?>
                    <div class="mt-2 text-center p-2 border rounded" style="width: fit-content;">
                        <img src="<?= esc(upload_url('teachers', $teacher['photo_url'] ?? $teacher['photo'])) ?>" style="width:80px;height:80px;object-fit:cover;border-radius:8px;">
                        <div class="mt-1 small text-muted">Current</div>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Display Order</label>
                    <input type="number" name="display_order" class="form-control" value="<?= esc(old('display_order', $teacher['display_order'] ?? 0)) ?>">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="active" <?= old('status', $teacher['status'] ?? 'active') === 'active' ? 'selected' : '' ?>>Active</option>
                        <option value="inactive" <?= old('status', $teacher['status'] ?? '') === 'inactive' ? 'selected' : '' ?>>Inactive</option>
                    </select>
                </div>
            </div>

            <div class="pt-3 border-top d-flex gap-2">
                <button type="submit" class="btn btn-primary px-4 shadow-sm"><i class="bi bi-save me-1"></i>Save Teacher</button>
                <a href="<?= base_url('admin/teachers') ?>" class="btn btn-light px-4 border">Cancel</a>
            </div>
        </form>
    </div>
</div>

<?= view('admin/layouts/_editor') ?>
