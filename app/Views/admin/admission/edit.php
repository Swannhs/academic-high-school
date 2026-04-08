<div class="row align-items-center mb-5">
    <div class="col">
        <div class="d-flex align-items-center gap-3">
            <div class="bg-primary bg-opacity-10 p-3 rounded-circle text-primary">
                <i class="bi bi-mortarboard-fill fs-3"></i>
            </div>
            <div>
                <h3 class="fw-bolder mb-1 text-dark" style="letter-spacing: -0.5px;">Admission Portal Settings</h3>
                <p class="text-secondary small mb-0">Manage global admission circulars, requirements, and downloadable forms.</p>
            </div>
        </div>
    </div>
</div>

<style>
/* Premium Form Overrides for Admission Page */
.premium-card {
    background: #ffffff;
    border-radius: 20px;
    box-shadow: 0 10px 40px rgba(0,0,0,0.03);
    border: 1px solid rgba(0,0,0,0.04);
    overflow: hidden;
}
.premium-nav-tabs {
    border-bottom: none;
    gap: 10px;
}
.premium-nav-tabs .nav-link {
    border: 1px solid rgba(0,0,0,0.05) !important;
    border-radius: 12px !important;
    color: #64748b;
    font-weight: 600;
    padding: 12px 24px;
    background: #f8fafc;
    transition: all 0.3s ease;
}
.premium-nav-tabs .nav-link:hover {
    background: #f1f5f9;
    color: #0f172a;
}
.premium-nav-tabs .nav-link.active {
    background: #065f46 !important;
    color: #fff !important;
    border-color: #065f46 !important;
    box-shadow: 0 4px 15px rgba(6, 95, 70, 0.2);
}
.premium-input {
    border-radius: 10px;
    border: 1px solid #e2e8f0;
    padding: 14px 18px;
    font-size: 15px;
    background: #f8fafc;
    transition: all 0.2s ease;
}
.premium-input:focus {
    background: #fff;
    border-color: #065f46;
    box-shadow: 0 0 0 4px rgba(6, 95, 70, 0.1);
}
.premium-label {
    font-weight: 700;
    font-size: 13px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    color: #475569;
    margin-bottom: 8px;
}
.tox-tinymce {
    border-radius: 12px !important;
    border: 1px solid #e2e8f0 !important;
    box-shadow: 0 2px 10px rgba(0,0,0,0.02) !important;
    overflow: hidden !important;
}
</style>

<div class="premium-card mb-5">
    <div class="card-body p-5">
        <form action="<?= base_url('admin/admission/save') ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <input type="hidden" name="id" value="<?= $info['id'] ?? '' ?>">

            <!-- Language Tabs -->
            <ul class="nav nav-tabs premium-nav-tabs mb-5" id="admissionLangTab" role="tablist">
                <li class="nav-item">
                    <button class="nav-link active" id="en-tab" data-bs-toggle="tab" data-bs-target="#en-content" type="button" role="tab"><i class="bi bi-globe2 me-2"></i>English Content</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" id="bn-tab" data-bs-toggle="tab" data-bs-target="#bn-content" type="button" role="tab"><i class="bi bi-translate me-2"></i>Bengali (বাং)</button>
                </li>
            </ul>

            <div class="tab-content" id="admissionLangTabContent">

                <!-- English Content -->
                <div class="tab-pane fade show active" id="en-content" role="tabpanel">
                    <div class="bg-white rounded-4 border-light p-0">
                        <div class="mb-5">
                            <label class="premium-label">Active Circular Title (EN)</label>
                            <input type="text" name="title" class="form-control premium-input form-control-lg fw-bold" 
                                   value="<?= esc(old('title', $info['title'] ?? '')) ?>" 
                                   placeholder="e.g. Admission Circular 2024-25" required>
                        </div>
                        <div class="mb-5">
                            <label class="premium-label">Admission Overview (EN)</label>
                            <textarea name="overview" class="form-control richtext" rows="4"><?= esc(old('overview', $info['overview'] ?? '')) ?></textarea>
                        </div>
                        <div class="row g-5 mb-5">
                            <div class="col-md-6">
                                <label class="premium-label">Eligibility Criteria (EN)</label>
                                <textarea name="eligibility" class="form-control richtext" rows="5"><?= esc(old('eligibility', $info['eligibility'] ?? '')) ?></textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="premium-label">Requirements & Documents (EN)</label>
                                <textarea name="requirements" class="form-control richtext" rows="5"><?= esc(old('requirements', $info['requirements'] ?? '')) ?></textarea>
                            </div>
                        </div>
                        <div class="row g-5">
                            <div class="col-md-6">
                                <label class="premium-label">Important Dates (EN)</label>
                                <textarea name="important_dates" class="form-control richtext" rows="4"><?= esc(old('important_dates', $info['important_dates'] ?? '')) ?></textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="premium-label">Application Instructions (EN)</label>
                                <textarea name="instructions" class="form-control richtext" rows="4"><?= esc(old('instructions', $info['instructions'] ?? '')) ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Bengali Content -->
                <div class="tab-pane fade" id="bn-content" role="tabpanel">
                    <div class="bg-white rounded-4 border-light p-0">
                        <div class="mb-5">
                            <label class="premium-label">Active Circular Title (BN)</label>
                            <input type="text" name="title_bn" class="form-control premium-input form-control-lg fw-bold" 
                                   value="<?= esc(old('title_bn', $info['title_bn'] ?? '')) ?>" 
                                   placeholder="উদাঃ ভর্তি বিজ্ঞপ্তি ২০২৪-২৫">
                        </div>
                        <div class="mb-5">
                            <label class="premium-label">Admission Overview (BN)</label>
                            <textarea name="overview_bn" class="form-control richtext" rows="4"><?= esc(old('overview_bn', $info['overview_bn'] ?? '')) ?></textarea>
                        </div>
                        <div class="row g-5 mb-5">
                            <div class="col-md-6">
                                <label class="premium-label">Eligibility Criteria (BN)</label>
                                <textarea name="eligibility_bn" class="form-control richtext" rows="5"><?= esc(old('eligibility_bn', $info['eligibility_bn'] ?? '')) ?></textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="premium-label">Requirements & Documents (BN)</label>
                                <textarea name="requirements_bn" class="form-control richtext" rows="5"><?= esc(old('requirements_bn', $info['requirements_bn'] ?? '')) ?></textarea>
                            </div>
                        </div>
                        <div class="row g-5">
                            <div class="col-md-6">
                                <label class="premium-label">Important Dates (BN)</label>
                                <textarea name="important_dates_bn" class="form-control richtext" rows="4"><?= esc(old('important_dates_bn', $info['important_dates_bn'] ?? '')) ?></textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="premium-label">Application Instructions (BN)</label>
                                <textarea name="instructions_bn" class="form-control richtext" rows="4"><?= esc(old('instructions_bn', $info['instructions_bn'] ?? '')) ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-5 mt-5 bg-light rounded-4 border border-light" style="background: linear-gradient(145deg, #f8fafc, #f1f5f9);">
                <div class="row g-4 align-items-end">
                    <div class="col-md-5">
                        <label class="premium-label">Session Year</label>
                        <input type="text" name="session_year" class="form-control premium-input form-control-lg" 
                               value="<?= esc(old('session_year', $info['session_year'] ?? '')) ?>" 
                               placeholder="e.g. 2024-25">
                    </div>
                    <div class="col-md-7">
                        <label class="premium-label">Global Application Status</label>
                        <div class="d-flex gap-3">
                            <div class="form-check form-check-inline m-0 flex-grow-1 p-0">
                                <input type="radio" class="btn-check" name="status" id="statusOpen" autocomplete="off" value="active" <?= old('status', $info['status'] ?? '') === 'active' ? 'checked' : '' ?>>
                                <label class="btn btn-outline-success w-100 py-3 rounded-3 fw-bold" for="statusOpen"><i class="bi bi-door-open me-2"></i>Open / Accepting</label>
                            </div>
                            <div class="form-check form-check-inline m-0 flex-grow-1 p-0">
                                <input type="radio" class="btn-check" name="status" id="statusClosed" autocomplete="off" value="inactive" <?= old('status', $info['status'] ?? '') === 'inactive' ? 'checked' : '' ?>>
                                <label class="btn btn-outline-danger w-100 py-3 rounded-3 fw-bold" for="statusClosed"><i class="bi bi-door-closed me-2"></i>Closed / Not Accepting</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <hr class="my-5 border-light" style="opacity: 0.1">

            <div class="row g-4 mb-5">
                <div class="col-md-6">
                    <div class="p-4 border rounded-4 bg-white hover-shadow-sm transition-all h-100" style="border-color: #e2e8f0 !important;">
                        <label class="premium-label d-flex align-items-center mb-3">
                            <div class="bg-danger bg-opacity-10 text-danger rounded-circle p-2 me-3">
                                <i class="bi bi-file-earmark-pdf-fill fs-5"></i>
                            </div>
                            Application Form (PDF)
                        </label>
                        <input type="file" name="application_form_file" class="form-control premium-input">
                        <?php if (!empty($info['application_form_file'])): ?>
                            <div class="d-flex align-items-center gap-3 mt-4 p-3 bg-light rounded-3 border">
                                <i class="bi bi-check-circle-fill text-success fs-5"></i>
                                <span class="small text-truncate flex-grow-1 fw-bold text-secondary"><?= esc($info['application_form_file']) ?></span>
                                <a href="<?= base_url('uploads/admission/' . $info['application_form_file']) ?>" target="_blank" class="btn btn-sm btn-light border fw-bold text-primary px-3 shadow-sm rounded-pill">View PDF</a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="p-4 border rounded-4 bg-white hover-shadow-sm transition-all h-100" style="border-color: #e2e8f0 !important;">
                        <label class="premium-label d-flex align-items-center mb-3">
                            <div class="bg-primary bg-opacity-10 text-primary rounded-circle p-2 me-3">
                                <i class="bi bi-file-earmark-text-fill fs-5"></i>
                            </div>
                            Official Circular (PDF)
                        </label>
                        <input type="file" name="circular_file" class="form-control premium-input">
                        <?php if (!empty($info['circular_file'])): ?>
                            <div class="d-flex align-items-center gap-3 mt-4 p-3 bg-light rounded-3 border">
                                <i class="bi bi-check-circle-fill text-success fs-5"></i>
                                <span class="small text-truncate flex-grow-1 fw-bold text-secondary"><?= esc($info['circular_file']) ?></span>
                                <a href="<?= base_url('uploads/admission/' . $info['circular_file']) ?>" target="_blank" class="btn btn-sm btn-light border fw-bold text-primary px-3 shadow-sm rounded-pill">View PDF</a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="mt-5 text-end border-top pt-4">
                <button type="submit" class="btn btn-primary px-5 py-3 rounded-pill fw-bold" style="background: linear-gradient(135deg, #065f46, #047857); border: none; box-shadow: 0 10px 20px rgba(6,95,70,0.2);">
                    <i class="bi bi-save2-fill me-2"></i>Update Portal Settings
                </button>
            </div>


        </form>
    </div>
</div>

<?= view('admin/layouts/_editor') ?>