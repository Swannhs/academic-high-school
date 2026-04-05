<h5 class="fw-bold mb-4">Website Settings</h5>
<form action="<?= base_url('admin/settings/update') ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>
    <div class="row">
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-header">General Information</div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">School Name</label>
                        <input type="text" name="school_name" class="form-control" value="<?= esc($settings['school_name'] ?? '') ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tagline</label>
                        <input type="text" name="tagline" class="form-control" value="<?= esc($settings['tagline'] ?? '') ?>">
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" value="<?= esc($settings['email'] ?? '') ?>">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Phone</label>
                            <input type="text" name="phone" class="form-control" value="<?= esc($settings['phone'] ?? '') ?>">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Address</label>
                        <textarea name="address" class="form-control" rows="2"><?= esc($settings['address'] ?? '') ?></textarea>
                    </div>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header">Social Media Links</div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label text-primary"><i class="bi bi-facebook me-1"></i>Facebook Page URL</label>
                        <input type="text" name="facebook_url" class="form-control" value="<?= esc($settings['facebook_url'] ?? '') ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Office Hours</label>
                        <input type="text" name="office_hours" class="form-control" value="<?= esc($settings['office_hours'] ?? '') ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Homepage Hero Text</label>
                        <textarea name="homepage_hero" class="form-control" rows="2"><?= esc($settings['homepage_hero'] ?? '') ?></textarea>
                    </div>
                    <div class="mb-0">
                        <label class="form-label">Principal Message Snippet</label>
                        <textarea name="principal_message_snippet" class="form-control" rows="3"><?= esc($settings['principal_message_snippet'] ?? '') ?></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-header">Branding</div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Main Logo</label>
                        <input type="file" name="logo" class="form-control mb-2">
                        <?php if (! empty($settings['logo'])): ?>
                            <img src="<?= base_url('uploads/settings/' . $settings['logo']) ?>" class="img-fluid border rounded">
                        <?php endif; ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Favicon</label>
                        <input type="file" name="favicon" class="form-control">
                        <?php if (! empty($settings['favicon'])): ?>
                            <img src="<?= base_url('uploads/settings/' . $settings['favicon']) ?>" class="img-fluid border rounded mt-2" style="max-width:64px">
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary w-100 py-3 fw-bold">SAVE ALL SETTINGS</button>
        </div>
    </div>
</form>
