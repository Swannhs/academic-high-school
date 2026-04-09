<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Admin') ?> — Prottasha Academic Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #065f46;
            --primary-light: #d1fae5;
            --primary-dark: #064e3b;
            --sidebar-width: 260px;
            --topbar-height: 60px;
        }
        * { font-family: 'Inter', sans-serif; }
        body { background: #f8fafc; min-height: 100vh; }

        /* ── Sidebar ── */
        #sidebar {
            position: fixed; top: 0; left: 0; bottom: 0;
            width: var(--sidebar-width);
            background: var(--primary-dark);
            overflow-y: auto; z-index: 1040;
            transition: transform .3s ease;
        }
        #sidebar .brand {
            padding: 1.25rem 1.5rem;
            border-bottom: 1px solid rgba(255,255,255,.1);
        }
        #sidebar .brand h6 { color:#fff; font-weight:800; font-size:.85rem; margin:0; }
        #sidebar .brand small { color: rgba(255,255,255,.5); font-size:.7rem; }
        #sidebar .nav-section {
            padding: .5rem 1rem .25rem;
            color: rgba(255,255,255,.35);
            font-size: .65rem; font-weight: 700; text-transform: uppercase; letter-spacing: .1em;
        }
        #sidebar .nav-link {
            display: flex; align-items: center; gap: .6rem;
            padding: .5rem 1.5rem; color: rgba(255,255,255,.7);
            font-size: .82rem; font-weight: 500; border-radius: 0;
            transition: all .2s;
        }
        #sidebar .nav-link i { font-size: 1rem; }
        #sidebar .nav-link:hover { background: rgba(255,255,255,.08); color: #fff; }
        #sidebar .nav-link.active { background: var(--primary); color: #fff; font-weight: 600; }

        /* ── Topbar ── */
        #topbar {
            position: fixed; top: 0; left: var(--sidebar-width); right: 0;
            height: var(--topbar-height); background: #fff;
            border-bottom: 1px solid #e2e8f0; z-index: 1030;
            display: flex; align-items: center; padding: 0 1.5rem;
            justify-content: space-between;
        }
        #topbar .page-title { font-weight: 700; font-size: 1rem; color: #1e293b; }
        #topbar .admin-name { font-size: .82rem; font-weight: 600; color: #334155; }

        /* ── Main content ── */
        #main-content {
            margin-left: var(--sidebar-width);
            margin-top: var(--topbar-height);
            padding: 1.75rem;
            min-height: calc(100vh - var(--topbar-height));
        }

        /* ── Cards ── */
        .card { border: 1px solid #e2e8f0; border-radius: .75rem; box-shadow: 0 1px 3px rgba(0,0,0,.04); }
        .card-header { background: #fff; border-bottom: 1px solid #e2e8f0; font-weight: 600; padding: 1rem 1.25rem; }
        .stat-card { border-radius: .75rem; border: none; }
        .stat-card .stat-icon { width:48px;height:48px;border-radius:.6rem;display:flex;align-items:center;justify-content:center;font-size:1.4rem; }

        /* ── Tables ── */
        .table th { font-size: .72rem; font-weight: 700; text-transform: uppercase; letter-spacing: .05em; color: #64748b; border-bottom: 2px solid #e2e8f0; }
        .table td { font-size: .85rem; vertical-align: middle; }
        .badge { font-weight: 600; font-size: .7rem; }

        /* ── Buttons ── */
        .btn-primary { background: var(--primary); border-color: var(--primary); }
        .btn-primary:hover { background: var(--primary-dark); border-color: var(--primary-dark); }
        .btn-sm { font-size: .75rem; }

        /* ── Form ── */
        .form-label { font-size: .82rem; font-weight: 600; color: #374151; }
        .form-control, .form-select { font-size: .85rem; border-color: #d1d5db; border-radius: .5rem; }
        .form-control:focus, .form-select:focus { border-color: var(--primary); box-shadow: 0 0 0 3px rgba(6,95,70,.15); }
        .invalid-feedback { font-size: .75rem; }

        /* ── Avatar ── */
        .table-avatar { width:36px;height:36px;border-radius:8px;object-fit:cover; }

        /* ── Alert ── */
        .flash-alert { position: fixed; top: 70px; right: 1.5rem; z-index: 9999; min-width: 300px; animation: slideIn .3s ease; }
        @keyframes slideIn { from { transform: translateX(120%); } to { transform: translateX(0); } }

        @media (max-width: 991px) {
            #sidebar { transform: translateX(-100%); }
            #sidebar.show { transform: translateX(0); }
            #topbar, #main-content { left: 0; margin-left: 0; }
        }
    </style>
    <?= $extra_styles ?? '' ?>
</head>
<body>

<!-- ── Sidebar ── -->
<nav id="sidebar">
    <div class="brand">
        <h6><i class="bi bi-mortarboard-fill me-2"></i>Prottasha Admin</h6>
        <small><?= esc($adminUser['role_label'] ?? 'Staff') ?></small>
    </div>
    <?= view('admin/layouts/_sidebar', ['permissions' => $permissions]) ?>
</nav>

<!-- ── Topbar ── -->
<header id="topbar">
    <div class="d-flex align-items-center gap-3">
        <button class="btn btn-sm btn-outline-secondary d-lg-none" id="sidebarToggle"><i class="bi bi-list"></i></button>
        <span class="page-title"><?= esc($title ?? 'Dashboard') ?></span>
    </div>
    <div class="d-flex align-items-center gap-3">
        <?php if (! empty($unreadMessages ?? 0)): ?>
        <a href="<?= base_url('admin/messages?filter=unread') ?>" class="btn btn-sm btn-outline-danger position-relative">
            <i class="bi bi-envelope"></i>
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"><?= $unreadMessages ?></span>
        </a>
        <?php endif; ?>
        <div class="dropdown">
            <button class="btn btn-sm btn-light dropdown-toggle d-flex align-items-center gap-2" data-bs-toggle="dropdown">
                <?php if (! empty($adminUser['avatar'])): ?>
                    <img src="<?= safe_upload_url('profiles', $adminUser['avatar']) ?>" class="table-avatar" alt="">
                <?php else: ?>
                    <span class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width:32px;height:32px;font-size:.75rem;font-weight:700;">
                        <?= strtoupper(substr($adminUser['name'] ?? 'A', 0, 1)) ?>
                    </span>
                <?php endif; ?>
                <span class="admin-name"><?= esc($adminUser['name'] ?? 'Admin') ?></span>
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="<?= base_url('admin/profile') ?>"><i class="bi bi-person me-2"></i>My Profile</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <form action="<?= base_url('admin/logout') ?>" method="get">
                        <button class="dropdown-item text-danger"><i class="bi bi-box-arrow-right me-2"></i>Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</header>

<!-- ── Flash Messages ── -->
<?php if (session()->getFlashdata('success')): ?>
<div class="flash-alert alert alert-success alert-dismissible fade show shadow-lg" role="alert">
    <i class="bi bi-check-circle-fill me-2"></i><?= esc(session()->getFlashdata('success')) ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
<?php endif; ?>
<?php if (session()->getFlashdata('error')): ?>
<div class="flash-alert alert alert-danger alert-dismissible fade show shadow-lg" role="alert">
    <i class="bi bi-exclamation-triangle-fill me-2"></i><?= esc(session()->getFlashdata('error')) ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
<?php endif; ?>

<!-- ── Main Content ── -->
<main id="main-content">
    <?php if ($errors = session()->getFlashdata('errors')): ?>
    <div class="alert alert-danger mb-3">
        <strong><i class="bi bi-exclamation-circle me-1"></i>Please fix the following errors:</strong>
        <ul class="mb-0 mt-2">
            <?php foreach ($errors as $err): ?>
            <li><?= esc($err) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php endif; ?>
    <?= view($content_view ?? 'admin/dashboard/index', get_defined_vars()) ?>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Auto-dismiss flash after 4s
    setTimeout(() => document.querySelectorAll('.flash-alert').forEach(a => bootstrap.Alert.getOrCreateInstance(a).close()), 4000);
    // Mobile sidebar toggle
    document.getElementById('sidebarToggle')?.addEventListener('click', () => document.getElementById('sidebar').classList.toggle('show'));
    // Confirm delete
    document.querySelectorAll('[data-confirm]').forEach(btn => {
        btn.addEventListener('click', e => { if (! confirm(btn.dataset.confirm || 'Are you sure?')) e.preventDefault(); });
    });
</script>
<?= $extra_scripts ?? '' ?>
</body>
</html>
