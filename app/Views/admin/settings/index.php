<?php
$s = $settings; // shorthand
?>
<h5 class="fw-bold mb-1">Website Settings</h5>
<p class="text-muted small mb-4">Manage all public-facing content from this panel. Changes take effect immediately.</p>

<form action="<?= base_url('admin/settings/update') ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>
    <div class="row g-4">

        <!-- LEFT COLUMN -->
        <div class="col-lg-8">

            <!-- School Identity -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white fw-bold py-3">
                    <i class="bi bi-building me-2 text-primary"></i>School Identity
                </div>
                <div class="card-body p-4">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-600">School Name (English)</label>
                            <input type="text" name="school_name" class="form-control" value="<?= esc($s['school_name'] ?? '') ?>">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-600">School Name (Bengali)</label>
                            <input type="text" name="school_name_bn" class="form-control" value="<?= esc($s['school_name_bn'] ?? '') ?>">
                        </div>
                        <div class="col-md-8">
                            <label class="form-label fw-600">Tagline / Motto</label>
                            <input type="text" name="tagline" class="form-control" value="<?= esc($s['tagline'] ?? '') ?>">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-600">EIIN Number</label>
                            <input type="text" name="eiin" class="form-control" value="<?= esc($s['eiin'] ?? '') ?>">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Information -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white fw-bold py-3">
                    <i class="bi bi-telephone me-2 text-success"></i>Contact Information
                </div>
                <div class="card-body p-4">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-600">Email</label>
                            <input type="email" name="email" class="form-control" value="<?= esc($s['email'] ?? '') ?>">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-600">Phone</label>
                            <input type="text" name="phone" class="form-control" value="<?= esc($s['phone'] ?? '') ?>">
                        </div>
                        <div class="col-md-8">
                            <label class="form-label fw-600">Address</label>
                            <textarea name="address" class="form-control" rows="2"><?= esc($s['address'] ?? '') ?></textarea>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-600">Office Hours</label>
                            <input type="text" name="office_hours" class="form-control" value="<?= esc($s['office_hours'] ?? '') ?>">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Principal / Head Teacher -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white fw-bold py-3">
                    <i class="bi bi-person-badge me-2 text-warning"></i>Principal / Head Teacher
                </div>
                <div class="card-body p-4">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-600">Full Name (English)</label>
                            <input type="text" name="principal_name" class="form-control" value="<?= esc($s['principal_name'] ?? '') ?>" placeholder="e.g. Md. Rafiqul Islam">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-600">Full Name (Bengali)</label>
                            <input type="text" name="principal_name_bn" class="form-control" value="<?= esc($s['principal_name_bn'] ?? '') ?>" placeholder="e.g. মো. রফিকুল ইসলাম">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-600">Title / Designation (English)</label>
                            <input type="text" name="principal_title" class="form-control" value="<?= esc($s['principal_title'] ?? '') ?>" placeholder="e.g. Principal & Head Teacher">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-600">Title / Designation (Bengali)</label>
                            <input type="text" name="principal_title_bn" class="form-control" value="<?= esc($s['principal_title_bn'] ?? '') ?>" placeholder="e.g. প্রধান শিক্ষক">
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-600">Principal's Message (English) <small class="text-muted">— shown on homepage</small></label>
                            <textarea name="principal_message_snippet" class="form-control richtext-simple" rows="4" placeholder="Write a brief welcome message..."><?= esc($s['principal_message_snippet'] ?? '') ?></textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-600">Principal's Message (Bengali)</label>
                            <textarea name="principal_message_snippet_bn" class="form-control richtext-simple" rows="4" placeholder="বাংলায় স্বাগত বার্তা লিখুন..."><?= esc($s['principal_message_snippet_bn'] ?? '') ?></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Homepage Stats -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white fw-bold py-3">
                    <i class="bi bi-bar-chart me-2 text-info"></i>Homepage Statistics <small class="text-muted fw-normal">(3 counters shown on homepage)</small>
                </div>
                <div class="card-body p-4">
                    <?php for ($i = 1; $i <= 3; $i++): ?>
                    <div class="row g-3 mb-3 pb-3 <?= $i < 3 ? 'border-bottom' : '' ?>">
                        <div class="col-md-3">
                            <label class="form-label fw-600">Stat <?= $i ?> Value</label>
                            <input type="text" name="stat_<?= $i ?>_value" class="form-control fw-bold fs-5 text-center"
                                   value="<?= esc($s["stat_{$i}_value"] ?? '') ?>" placeholder="e.g. 98.5%">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-600">Label (English)</label>
                            <input type="text" name="stat_<?= $i ?>_label" class="form-control"
                                   value="<?= esc($s["stat_{$i}_label"] ?? '') ?>" placeholder="e.g. SSC Pass Rate">
                        </div>
                        <div class="col-md-5">
                            <label class="form-label fw-600">Label (Bengali)</label>
                            <input type="text" name="stat_<?= $i ?>_label_bn" class="form-control"
                                   value="<?= esc($s["stat_{$i}_label_bn"] ?? '') ?>" placeholder="বাংলায় লেবেল">
                        </div>
                    </div>
                    <?php endfor; ?>
                </div>
            </div>

            <!-- Homepage Hero Text -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white fw-bold py-3">
                    <i class="bi bi-image me-2 text-danger"></i>Homepage Hero Text
                </div>
                <div class="card-body p-4">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label fw-600">Hero Subtitle (English)</label>
                            <textarea name="homepage_hero" class="form-control" rows="2"><?= esc($s['homepage_hero'] ?? '') ?></textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-600">Hero Subtitle (Bengali)</label>
                            <textarea name="homepage_hero_bn" class="form-control" rows="2"><?= esc($s['homepage_hero_bn'] ?? '') ?></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Social Media -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white fw-bold py-3">
                    <i class="bi bi-share me-2 text-primary"></i>Social Media Links
                </div>
                <div class="card-body p-4">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label"><i class="bi bi-facebook text-primary me-1"></i>Facebook URL</label>
                            <input type="text" name="facebook_url" class="form-control" value="<?= esc($s['facebook_url'] ?? '') ?>" placeholder="https://facebook.com/...">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label"><i class="bi bi-youtube text-danger me-1"></i>YouTube URL</label>
                            <input type="text" name="youtube_url" class="form-control" value="<?= esc($s['youtube_url'] ?? '') ?>" placeholder="https://youtube.com/...">
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- RIGHT COLUMN -->
        <div class="col-lg-4">

            <!-- Save Button -->
            <div class="d-grid mb-4">
                <button type="submit" class="btn btn-primary btn-lg py-3 fw-bold shadow">
                    <i class="bi bi-save me-2"></i>SAVE ALL SETTINGS
                </button>
            </div>

            <!-- Branding -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white fw-bold py-3">
                    <i class="bi bi-palette me-2 text-secondary"></i>Branding
                </div>
                <div class="card-body p-4">
                    <div class="mb-3">
                        <label class="form-label fw-600">Main Logo</label>
                        <input type="file" name="logo" class="form-control mb-2" accept=".jpg,.jpeg,.png,.webp">
                        <?php if (!empty($s['logo'])): ?>
                            <div class="text-center p-2 border rounded bg-light">
                                <img src="<?= safe_upload_url('settings', $s['logo'] ?? null) ?>" class="img-fluid" style="max-height:80px;" alt="Logo">
                                <div class="small text-muted mt-1">Current logo</div>
                            </div>
                        <?php else: ?>
                            <div class="text-muted small text-center p-3 border rounded border-dashed">No logo uploaded</div>
                        <?php endif; ?>
                    </div>
                    <div>
                        <label class="form-label fw-600">Favicon</label>
                        <input type="file" name="favicon" class="form-control" accept=".png,.ico">
                        <?php if (!empty($s['favicon'])): ?>
                            <img src="<?= base_url('uploads/settings/' . $s['favicon']) ?>" class="mt-2 border rounded p-1" style="max-width:48px;" alt="Favicon">
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Quick Info Box -->
            <div class="card border-0 bg-primary text-white shadow-sm">
                <div class="card-body p-4">
                    <h6 class="fw-bold mb-3"><i class="bi bi-lightbulb me-2"></i>Quick Tips</h6>
                    <ul class="small mb-0 ps-3 opacity-90">
                        <li class="mb-2">Principal's name appears on the homepage below the message.</li>
                        <li class="mb-2">Stats appear in the right sidebar of the homepage notice board section.</li>
                        <li class="mb-2">Hero subtitle appears in the large banner on the homepage.</li>
                        <li>Logo should be transparent PNG for best results.</li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</form>

<?= view('admin/layouts/_editor') ?>

