<div class="row">
<div class="col-lg-6">
    <div class="card mb-4">
        <div class="card-header">Personal Information</div>
        <div class="card-body">
            <form action="<?= base_url('admin/profile/update') ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="text-center mb-4">
                    <?php if ($user['avatar']): ?>
                        <img src="<?= base_url('uploads/settings/' . $user['avatar']) ?>" class="rounded-circle mb-2" style="width:100px;height:100px;object-fit:cover">
                    <?php else: ?>
                        <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center mx-auto mb-2" style="width:100px;height:100px;font-size:2rem">
                            <?= strtoupper(substr($user['name'],0,1)) ?>
                        </div>
                    <?php endif; ?>
                    <input type="file" name="avatar" class="form-control form-control-sm mx-auto" style="max-width:200px">
                </div>
                <div class="mb-3">
                    <label class="form-label">Full Name</label>
                    <input type="text" name="name" class="form-control" value="<?= esc($user['name']) ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email Address</label>
                    <input type="email" name="email" class="form-control" value="<?= esc($user['email']) ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Update Profile</button>
            </form>
        </div>
    </div>
</div>
<div class="col-lg-6">
    <div class="card">
        <div class="card-header">Change Password</div>
        <div class="card-body">
            <form action="<?= base_url('admin/profile/change-password') ?>" method="post">
                <?= csrf_field() ?>
                <div class="mb-3"><label class="form-label">Old Password</label><input type="password" name="old_password" class="form-control" required></div>
                <div class="mb-3"><label class="form-label">New Password</label><input type="password" name="new_password" class="form-control" required></div>
                <div class="mb-3"><label class="form-label">Confirm Password</label><input type="password" name="confirm_password" class="form-control" required></div>
                <button type="submit" class="btn btn-outline-danger">Change Password</button>
            </form>
        </div>
    </div>
</div>
</div>