<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Forgot Password') ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center justify-content-center min-vh-100">
    <div class="card shadow-sm border-0" style="max-width: 480px; width: 100%;">
        <div class="card-body p-4 p-lg-5">
            <h1 class="h4 fw-bold mb-3">Password Reset</h1>
            <p class="text-muted mb-4">This placeholder is ready for a future email reset flow. For now, please contact the system administrator to reset your password manually.</p>
            <a href="<?= base_url('admin/login') ?>" class="btn btn-primary w-100">Back to Login</a>
        </div>
    </div>
</body>
</html>
