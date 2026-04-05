<!-- Dashboard -->
<div class="row g-4 mb-4">
    <div class="col-md-2 col-sm-4 col-6">
        <div class="card stat-card p-3 border-0 shadow-sm bg-white">
            <div class="stat-icon bg-success bg-opacity-10 text-success mb-2"><i class="bi bi-megaphone"></i></div>
            <div class="fw-800 fs-3 fw-bold"><?= $totalNotices ?></div>
            <div class="text-muted small">Notices</div>
        </div>
    </div>
    <div class="col-md-2 col-sm-4 col-6">
        <div class="card stat-card p-3 border-0 shadow-sm bg-white">
            <div class="stat-icon bg-primary bg-opacity-10 text-primary mb-2"><i class="bi bi-people"></i></div>
            <div class="fs-3 fw-bold"><?= $totalTeachers ?></div>
            <div class="text-muted small">Teachers</div>
        </div>
    </div>
    <div class="col-md-2 col-sm-4 col-6">
        <div class="card stat-card p-3 border-0 shadow-sm bg-white">
            <div class="stat-icon bg-warning bg-opacity-10 text-warning mb-2"><i class="bi bi-clipboard-data"></i></div>
            <div class="fs-3 fw-bold"><?= $totalResults ?></div>
            <div class="text-muted small">Results</div>
        </div>
    </div>
    <div class="col-md-2 col-sm-4 col-6">
        <div class="card stat-card p-3 border-0 shadow-sm bg-white">
            <div class="stat-icon bg-info bg-opacity-10 text-info mb-2"><i class="bi bi-calendar3"></i></div>
            <div class="fs-3 fw-bold"><?= $totalRoutines ?></div>
            <div class="text-muted small">Routines</div>
        </div>
    </div>
    <div class="col-md-2 col-sm-4 col-6">
        <div class="card stat-card p-3 border-0 shadow-sm bg-white">
            <div class="stat-icon bg-secondary bg-opacity-10 text-secondary mb-2"><i class="bi bi-download"></i></div>
            <div class="fs-3 fw-bold"><?= $totalDownloads ?></div>
            <div class="text-muted small">Downloads</div>
        </div>
    </div>
    <div class="col-md-2 col-sm-4 col-6">
        <div class="card stat-card p-3 border-0 shadow-sm bg-white">
            <div class="stat-icon bg-purple bg-opacity-10 text-purple mb-2"><i class="bi bi-images"></i></div>
            <div class="fs-3 fw-bold"><?= $totalGalleryAlbums ?></div>
            <div class="text-muted small">Albums</div>
        </div>
    </div>
    <div class="col-md-2 col-sm-4 col-6">
        <div class="card stat-card p-3 border-0 shadow-sm <?= $unreadMessages > 0 ? 'bg-danger text-white' : 'bg-white' ?>">
            <div class="stat-icon <?= $unreadMessages > 0 ? 'bg-white bg-opacity-20 text-white' : 'bg-danger bg-opacity-10 text-danger' ?> mb-2">
                <i class="bi bi-envelope"></i>
            </div>
            <div class="fs-3 fw-bold"><?= $unreadMessages ?></div>
            <div class="<?= $unreadMessages > 0 ? 'text-white-50' : 'text-muted' ?> small">Unread Msgs</div>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="card mb-4">
    <div class="card-header d-flex align-items-center gap-2">
        <i class="bi bi-lightning-charge-fill text-warning"></i> Quick Actions
    </div>
    <div class="card-body d-flex flex-wrap gap-2">
        <a href="<?= base_url('admin/notices/create') ?>" class="btn btn-sm btn-primary"><i class="bi bi-plus me-1"></i>New Notice</a>
        <a href="<?= base_url('admin/teachers/create') ?>" class="btn btn-sm btn-outline-primary"><i class="bi bi-plus me-1"></i>Add Teacher</a>
        <a href="<?= base_url('admin/results/create') ?>" class="btn btn-sm btn-outline-warning"><i class="bi bi-plus me-1"></i>Publish Result</a>
        <a href="<?= base_url('admin/routines/create') ?>" class="btn btn-sm btn-outline-info"><i class="bi bi-plus me-1"></i>Add Routine</a>
        <a href="<?= base_url('admin/gallery/create') ?>" class="btn btn-sm btn-outline-secondary"><i class="bi bi-plus me-1"></i>New Album</a>
        <a href="<?= base_url('admin/downloads/create') ?>" class="btn btn-sm btn-outline-dark"><i class="bi bi-plus me-1"></i>Add Download</a>
        <a href="<?= base_url('admin/messages') ?>" class="btn btn-sm btn-outline-danger"><i class="bi bi-envelope me-1"></i>Messages</a>
    </div>
</div>

<div class="row g-4">
    <!-- Recent Notices -->
    <div class="col-lg-7">
        <div class="card h-100">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span><i class="bi bi-megaphone me-2 text-success"></i>Recent Notices</span>
                <a href="<?= base_url('admin/notices') ?>" class="btn btn-sm btn-outline-secondary">View All</a>
            </div>
            <div class="card-body p-0">
                <div class="list-group list-group-flush">
                    <?php if (empty($recentNotices)): ?>
                    <div class="list-group-item text-muted small py-3 text-center">No notices yet.</div>
                    <?php else: foreach ($recentNotices as $n): ?>
                    <div class="list-group-item d-flex justify-content-between align-items-center py-2">
                        <div>
                            <div class="fw-600 small"><?= esc($n['title']) ?></div>
                            <div class="text-muted" style="font-size:.72rem"><?= esc($n['publish_date'] ?? '') ?></div>
                        </div>
                        <span class="badge bg-<?= $n['status'] === 'active' ? 'success' : 'secondary' ?>">
                            <?= esc($n['status']) ?>
                        </span>
                    </div>
                    <?php endforeach; endif; ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Recent Messages -->
    <div class="col-lg-5">
        <div class="card h-100">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span><i class="bi bi-envelope me-2 text-primary"></i>Recent Messages</span>
                <a href="<?= base_url('admin/messages') ?>" class="btn btn-sm btn-outline-secondary">View All</a>
            </div>
            <div class="card-body p-0">
                <div class="list-group list-group-flush">
                    <?php if (empty($recentMessages)): ?>
                    <div class="list-group-item text-muted small py-3 text-center">No messages yet.</div>
                    <?php else: foreach ($recentMessages as $m): ?>
                    <a href="<?= base_url('admin/messages/' . $m['id']) ?>" class="list-group-item list-group-item-action py-2 <?= $m['is_read'] ? '' : 'fw-bold' ?>">
                        <div class="d-flex justify-content-between">
                            <span class="small"><?= esc($m['name']) ?></span>
                            <?php if (! $m['is_read']): ?><span class="badge bg-danger">New</span><?php endif; ?>
                        </div>
                        <div class="text-muted" style="font-size:.72rem"><?= esc(substr($m['subject'], 0, 40)) ?>…</div>
                    </a>
                    <?php endforeach; endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
