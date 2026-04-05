<?php $isEdit = isset($result); $action = $isEdit ? base_url('admin/results/update/' . $result['id']) : base_url('admin/results/store'); ?>
<a href="<?= base_url('admin/results') ?>" class="btn btn-sm btn-outline-secondary mb-4"><i class="bi bi-arrow-left me-1"></i>Back</a>
<div class="card" style="max-width:760px">
    <div class="card-header"><?= $isEdit ? 'Edit Result' : 'Add Result' ?></div>
    <div class="card-body">
        <form action="<?= $action ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <div class="mb-3">
                <label class="form-label">Result Title</label>
                <input type="text" name="title" class="form-control" value="<?= esc(old('title', $result['title'] ?? '')) ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Exam Name</label>
                <input type="text" name="exam_name" class="form-control" value="<?= esc(old('exam_name', $result['exam_name'] ?? '')) ?>" required>
            </div>
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
                        <option value="board" <?= old('exam_type', $result['exam_type'] ?? 'board') === 'board' ? 'selected' : '' ?>>Board</option>
                        <option value="internal" <?= old('exam_type', $result['exam_type'] ?? '') === 'internal' ? 'selected' : '' ?>>Internal</option>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Category</label>
                    <input type="text" name="category" class="form-control" value="<?= esc(old('category', $result['category'] ?? '')) ?>">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Stats / Summary</label>
                    <input type="text" name="stats" class="form-control" value="<?= esc(old('stats', $result['stats'] ?? '')) ?>" placeholder="Pass rate, GPA, etc.">
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Upload Result File (PDF)</label>
                <input type="file" name="file_path" class="form-control" <?= $isEdit ? '' : 'required' ?>>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Publish Date</label>
                    <input type="date" name="publish_date" class="form-control" value="<?= esc(old('publish_date', $result['publish_date'] ?? date('Y-m-d'))) ?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="active" <?= old('status', $result['status'] ?? 'active') === 'active' ? 'selected' : '' ?>>Active</option>
                        <option value="inactive" <?= old('status', $result['status'] ?? '') === 'inactive' ? 'selected' : '' ?>>Inactive</option>
                    </select>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="3"><?= esc(old('description', $result['description'] ?? '')) ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Save Result</button>
        </form>
    </div>
</div>
