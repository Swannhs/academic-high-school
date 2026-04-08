<div class="row align-items-center mb-4">
    <div class="col">
        <h4 class="fw-bold mb-0">Admission Portal Management</h4>
        <p class="text-muted small mb-0">Manage global admission info, circulars, and application forms.</p>
    </div>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body p-4">
        <form action="<?= base_url('admin/admission/save') ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <input type="hidden" name="id" value="<?= $info['id'] ?? '' ?>">

            <div class="row g-4 mb-4">
                <div class="col-md-9">
                    <label class="form-label fw-600">Active Circular Title</label>
                    <input type="text" name="title" class="form-control form-control-lg border-primary-subtle" 
                           value="<?= esc(old('title', $info['title'] ?? '')) ?>" 
                           placeholder="e.g. Admission Circular 2024-25" required>
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-600">Session Year</label>
                    <input type="text" name="session_year" class="form-control form-control-lg border-primary-subtle" 
                           value="<?= esc(old('session_year', $info['session_year'] ?? '')) ?>" 
                           placeholder="e.g. 2024-25">
                </div>
            </div>

            <div class="mb-4">
                <label class="form-label fw-600">Admission Overview</label>
                <textarea name="overview" class="form-control" rows="4" placeholder="Brief welcome message and overview for candidates..."><?= esc(old('overview', $info['overview'] ?? '')) ?></textarea>
            </div>

            <div class="row g-4 mb-4">
                <div class="col-md-6">
                    <label class="form-label fw-600">Eligibility Criteria</label>
                    <textarea name="eligibility" class="form-control" rows="6" placeholder="Who can apply? Requirements for different classes..."><?= esc(old('eligibility', $info['eligibility'] ?? '')) ?></textarea>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-600">Requirements & Documents</label>
                    <textarea name="requirements" class="form-control" rows="6" placeholder="Documents needed, age limits, etc..."><?= esc(old('requirements', $info['requirements'] ?? '')) ?></textarea>
                </div>
            </div>

            <div class="row g-4 mb-4">
                <div class="col-md-6">
                    <label class="form-label fw-600">Important Dates</label>
                    <textarea name="important_dates" class="form-control" rows="4" placeholder="Application start/end dates, exam dates..."><?= esc(old('important_dates', $info['important_dates'] ?? '')) ?></textarea>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-600">Application Instructions</label>
                    <textarea name="instructions" class="form-control" rows="4" placeholder="Step-by-step guide on how to apply..."><?= esc(old('instructions', $info['instructions'] ?? '')) ?></textarea>
                </div>
            </div>

            <hr class="my-5 border-light-subtle">

            <div class="row g-4 mb-4">
                <div class="col-md-6">
                    <div class="p-3 border rounded bg-light-subtle">
                        <label class="form-label fw-bold"><i class="bi bi-file-earmark-pdf text-danger me-2"></i>Application Form (PDF)</label>
                        <input type="file" name="application_form_file" class="form-control mb-2">
                        <?php if (!empty($info['application_form_file'])): ?>
                            <div class="d-flex align-items-center gap-2 mt-2 p-2 bg-white rounded border border-light">
                                <i class="bi bi-check-circle-fill text-success"></i>
                                <span class="small text-truncate flex-grow-1"><?= esc($info['application_form_file']) ?></span>
                                <a href="<?= base_url('uploads/admission/' . $info['application_form_file']) ?>" target="_blank" class="btn btn-xs btn-outline-primary py-0">Download</a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="p-3 border rounded bg-light-subtle">
                        <label class="form-label fw-bold"><i class="bi bi-file-earmark-pdf text-danger me-2"></i>Official Circular (PDF)</label>
                        <input type="file" name="circular_file" class="form-control mb-2">
                        <?php if (!empty($info['circular_file'])): ?>
                            <div class="d-flex align-items-center gap-2 mt-2 p-2 bg-white rounded border border-light">
                                <i class="bi bi-check-circle-fill text-success"></i>
                                <span class="small text-truncate flex-grow-1"><?= esc($info['circular_file']) ?></span>
                                <a href="<?= base_url('uploads/admission/' . $info['circular_file']) ?>" target="_blank" class="btn btn-xs btn-outline-primary py-0">Download</a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="row align-items-center mt-5">
                <div class="col-md-4">
                    <label class="form-label fw-600">Application Status</label>
                    <select name="status" class="form-select form-select-lg">
                        <option value="active" <?= old('status', $info['status'] ?? '') === 'active' ? 'selected' : '' ?>>Open / Accepting Applications</option>
                        <option value="inactive" <?= old('status', $info['status'] ?? '') === 'inactive' ? 'selected' : '' ?>>Closed / Not Accepting</option>
                    </select>
                </div>
                <div class="col-md-8 text-end pt-4">
                    <button type="submit" class="btn btn-primary btn-lg px-5 shadow-sm">
                        <i class="bi bi-cloud-arrow-up-fill me-2"></i>Publish Admission Updates
                    </button>
                </div>
            </div>

        </form>
    </div>
</div>