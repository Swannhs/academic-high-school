<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login — Prottasha Academic</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        * { font-family: 'Inter', sans-serif; }
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #064e3b 0%, #065f46 50%, #047857 100%);
            display: flex; align-items: center; justify-content: center;
        }
        .login-card {
            background: #fff; border-radius: 1.25rem;
            box-shadow: 0 25px 50px rgba(0,0,0,.25);
            width: 100%; max-width: 420px; padding: 2.5rem;
        }
        .login-logo {
            width: 64px; height: 64px; background: #064e3b;
            border-radius: 1rem; display: flex; align-items: center;
            justify-content: center; margin: 0 auto 1.5rem; font-size: 2rem; color: #fff;
        }
        h2 { font-weight: 800; color: #0f172a; font-size: 1.6rem; }
        .form-control { border-radius: .6rem; border: 1.5px solid #e2e8f0; padding: .7rem 1rem; font-size: .9rem; }
        .form-control:focus { border-color: #065f46; box-shadow: 0 0 0 3px rgba(6,95,70,.15); }
        .btn-login { background: #065f46; border: none; border-radius: .6rem; padding: .75rem; font-weight: 700; font-size: .9rem; letter-spacing: .02em; }
        .btn-login:hover { background: #064e3b; }
        .input-group-text { background: #f8fafc; border-color: #e2e8f0; }
        .form-label { font-weight: 600; font-size: .82rem; color: #374151; }
        .back-link { color: rgba(255,255,255,.7); text-decoration: none; font-size: .82rem; }
        .back-link:hover { color: #fff; }
    </style>
</head>
<body>
    <?php $errors = session()->getFlashdata('errors') ?? []; ?>
    <div class="text-center">
        <div class="login-card">
            <div class="login-logo"><i class="bi bi-mortarboard-fill"></i></div>
            <h2 class="text-center mb-1"><?= lang('App.admin.login_title') ?></h2>
            <p class="text-muted text-center mb-4" style="font-size:.85rem;"><?= lang('App.admin.login_subtitle') ?></p>

            <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger py-2 small"><i class="bi bi-exclamation-triangle me-1"></i>
                <?= esc(session()->getFlashdata('error')) ?>
            </div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success py-2 small"><i class="bi bi-check-circle me-1"></i>
                <?= esc(session()->getFlashdata('success')) ?>
            </div>
            <?php endif; ?>

            <form action="<?= base_url('admin/login') ?>" method="POST">
                <?= csrf_field() ?>
                <div class="mb-3">
                    <label class="form-label"><?= lang('App.admin.email_username') ?></label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-person"></i></span>
                        <input type="text" name="login" class="form-control <?= isset($errors['login']) ? 'is-invalid' : '' ?>"
                                value="<?= old('login') ?>" placeholder="admin@prottasha.edu.bd" required autofocus>
                    </div>
                    <?php if (isset($errors['login'])): ?>
                    <div class="invalid-feedback d-block small"><?= esc($errors['login']) ?></div>
                    <?php endif; ?>
                </div>
                <div class="mb-4">
                    <label class="form-label"><?= lang('App.admin.password') ?></label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-lock"></i></span>
                        <input type="password" name="password" class="form-control <?= isset($errors['password']) ? 'is-invalid' : '' ?>"
                                placeholder="••••••••" required>
                    </div>
                    <?php if (isset($errors['password'])): ?>
                    <div class="invalid-feedback d-block small"><?= esc($errors['password']) ?></div>
                    <?php endif; ?>
                </div>
                <button type="submit" class="btn btn-login btn-primary text-white w-100">
                    <i class="bi bi-box-arrow-in-right me-2"></i><?= lang('App.admin.sign_in') ?>
                </button>
            </form>
            <a href="<?= base_url('admin/forgot-password') ?>" class="d-inline-block mt-3 small text-decoration-none"><?= lang('App.admin.forgot_pw') ?></a>
        </div>
        <a href="<?= base_url('/') ?>" class="back-link mt-3 d-block">
            <i class="bi bi-arrow-left me-1"></i><?= lang('App.admin.back_to_site') ?>
        </a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
