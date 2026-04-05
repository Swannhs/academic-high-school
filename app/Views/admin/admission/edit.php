<h5 class="fw-bold mb-4">Admission Information Management</h5>
<div class="card">
    <div class="card-body">
        <form action="<?= base_url('admin/admission/save') ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <input type="hidden" name="id" value="<?= $info['id'] ?? '' ?>">
            <div class="row mb-3">
                <div class="col-md-8">
                    <label class="form-label">Circular Title</label>
                    <input type="text" name="title" class="form-control" value="<?= esc(old('title', $info['title'] ?? '')) ?>" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Session</label>
                    <input type="text" name="session_year" class="form-control" value="<?= esc(old('session_year', $info['session_year'] ?? '')) ?>">
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Overview</label>
                <textarea name="overview" class="form-control" rows="3"><?= esc(old('overview', $info['overview'] ?? '')) ?></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Eligibility & Requirements</label>
                <textarea name="eligibility" class="form-control" rows="4"><?= esc(old('eligibility', $info['eligibility'] ?? '')) ?></textarea>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Application Form (PDF)</label>
                    <input type="file" name="application_form_file" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Official Circular (PDF)</label>
                    <input type="file" name="circular_file" class="form-control">
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-select">
                    <option value="active" <?= old('status', $info['status'] ?? '') === 'active' ? 'selected' : '' ?>>Active</option>
                    <option value="inactive" <?= old('status', $info['status'] ?? '') === 'inactive' ? 'selected' : '' ?>>Inactive</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary"><i class="bi bi-save me-1"></i>Save All Information</button>
        </form>
    </div>
</div>