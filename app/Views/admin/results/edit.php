<?php $isEdit = isset($result); $action = $isEdit ? base_url('admin/results/update/' . $result['id']) : base_url('admin/results/store'); ?>
<a href="<?= base_url('admin/results') ?>" class="btn btn-sm btn-outline-secondary mb-4"><i class="bi bi-arrow-left me-1"></i>Back</a>
<div class="card shadow-sm border-0" style="max-width:800px">
    <div class="card-header bg-white py-3">
        <h5 class="card-title mb-0"><?= $isEdit ? 'Edit Result' : 'Add New Result' ?></h5>
    </div>
    <div class="card-body p-4">
        <form action="<?= $action ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            
            <!-- Language Tabs -->
            <ul class="nav nav-tabs mb-4" id="resultLangTab" role="tablist">
                <li class="nav-item">
                    <button class="nav-link active" id="en-tab" data-bs-toggle="tab" data-bs-target="#en-content" type="button" role="tab">English</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" id="bn-tab" data-bs-toggle="tab" data-bs-target="#bn-content" type="button" role="tab">Bengali (বাং)</button>
                </li>
            </ul>

            <div class="tab-content" id="resultLangTabContent">
                <!-- English Content -->
                <div class="tab-pane fade show active" id="en-content" role="tabpanel">
                    <div class="mb-3">
                        <label class="form-label">Result Title (EN) <span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control" value="<?= esc(old('title', $result['title'] ?? '')) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Exam Name (EN) <span class="text-danger">*</span></label>
                        <input type="text" name="exam_name" class="form-control" value="<?= esc(old('exam_name', $result['exam_name'] ?? '')) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description (EN)</label>
                        <textarea name="description" class="form-control" rows="3"><?= esc(old('description', $result['description'] ?? '')) ?></textarea>
                    </div>
                </div>

                <!-- Bengali Content -->
                <div class="tab-pane fade" id="bn-content" role="tabpanel">
                    <div class="mb-3">
                        <label class="form-label">Result Title (BN)</label>
                        <input type="text" name="title_bn" class="form-control" value="<?= esc(old('title_bn', $result['title_bn'] ?? '')) ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Exam Name (BN)</label>
                        <input type="text" name="exam_name_bn" class="form-control" value="<?= esc(old('exam_name_bn', $result['exam_name_bn'] ?? '')) ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description (BN)</label>
                        <textarea name="description_bn" class="form-control" rows="3"><?= esc(old('description_bn', $result['description_bn'] ?? '')) ?></textarea>
                    </div>
                </div>
            </div>

            <hr class="my-4 text-muted opacity-25">

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Class</label>
                    <input type="text" name="class_name" class="form-control" value="<?= esc(old('class_name', $result['class_name'] ?? '')) ?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Session/Year</label>
                    <input type="text" name="session_year" class="form-control" value="<?= esc(old('session_year', $result['session_year'] ?? '')) ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">Exam Type</label>
                    <select name="exam_type" class="form-select">
                        <option value="board" <?= old('exam_type', $result['exam_type'] ?? 'board') === 'board' ? 'selected' : '' ?>>Board Examination</option>
                        <option value="internal" <?= old('exam_type', $result['exam_type'] ?? '') === 'internal' ? 'selected' : '' ?>>Internal School Exam</option>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Category</label>
                    <input type="text" name="category" class="form-control" value="<?= esc(old('category', $result['category'] ?? '')) ?>" placeholder="e.g. Science, Arts">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Stats / Summary</label>
                    <input type="text" name="stats" class="form-control" value="<?= esc(old('stats', $result['stats'] ?? '')) ?>" placeholder="e.g. 100% Pass, 50 A+">
                </div>
            </div>
            <div class="mb-4">
                <label class="form-label">Result File (PDF Only) <span class="text-danger">*</span></label>
                <input type="file" name="file_path" class="form-control" <?= $isEdit ? '' : 'required' ?> accept=".pdf">
                <?php if ($isEdit && ! empty($result['file_path'])): ?>
                <div class="mt-2"><a href="<?= upload_url('results', $result['file_path']) ?>" target="_blank" class="btn btn-sm btn-light border"><i class="bi bi-file-earmark-pdf me-1"></i>View Current File</a></div>
                <?php endif; ?>
            </div>
            <div class="row mb-4">
                <div class="col-md-6">
                    <label class="form-label">Publish Date</label>
                    <input type="date" name="publish_date" class="form-control" value="<?= esc(old('publish_date', $result['publish_date'] ?? date('Y-m-d'))) ?>">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="active" <?= old('status', $result['status'] ?? 'active') === 'active' ? 'selected' : '' ?>>Active</option>
                        <option value="inactive" <?= old('status', $result['status'] ?? '') === 'inactive' ? 'selected' : '' ?>>Inactive</option>
                    </select>
                </div>
            </div>
            <div class="pt-3 border-top d-flex gap-2">
                <button type="submit" class="btn btn-primary px-4 shadow-sm"><i class="bi bi-save me-1"></i>Save Result</button>
                <a href="<?= base_url('admin/results') ?>" class="btn btn-light px-4 border">Cancel</a>
            </div>
        </form>
    </div>
</div>
