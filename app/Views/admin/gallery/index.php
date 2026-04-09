<div class="row align-items-center mb-4">
    <div class="col">
        <h4 class="fw-bold mb-0">Media Gallery</h4>
        <p class="text-muted small mb-0">Organize and showcase school events through photo albums.</p>
    </div>
    <div class="col-auto">
        <a href="<?= base_url('admin/gallery/create') ?>" class="btn btn-primary d-flex align-items-center gap-2">
            <i class="bi bi-folder-plus fs-5"></i>
            <span>Create New Album</span>
        </a>
    </div>
</div>

<div class="row g-4">
    <?php if (empty($albums)): ?>
        <div class="col-12">
            <div class="card bg-light border-0 py-5 text-center">
                <div class="card-body">
                    <i class="bi bi-images fs-1 text-muted opacity-25"></i>
                    <h5 class="mt-3 text-muted">No albums created yet</h5>
                    <p class="text-muted small">Start by creating your first photo album to showcase your school's events.</p>
                    <a href="<?= base_url('admin/gallery/create') ?>" class="btn btn-outline-primary mt-2">Get Started</a>
                </div>
            </div>
        </div>
    <?php else: foreach ($albums as $a): ?>
    <div class="col-md-4 col-xl-3">
        <div class="card h-100 border-0 shadow-sm gallery-album-card position-relative overflow-hidden">
            <!-- Badges -->
            <div class="position-absolute top-0 end-0 p-2 z-1">
                <span class="badge rounded-pill bg-dark bg-opacity-75 backdrop-blur px-3">
                    <i class="bi bi-image me-1"></i> <?= $a['image_count'] ?>
                </span>
            </div>
            
            <!-- Cover image -->
            <div class="ratio ratio-16x9">
                <?php if ($a['cover_image']): ?>
                    <img src="<?= safe_upload_url('gallery', $a['cover_image']) ?>" class="card-img-top object-fit-cover" alt="<?= esc($a['title']) ?>">
                <?php else: ?>
                    <div class="bg-light d-flex align-items-center justify-content-center border-bottom">
                        <i class="bi bi-images text-muted opacity-25" style="font-size: 3rem"></i>
                    </div>
                <?php endif; ?>
            </div>

            <div class="card-body d-flex flex-column">
                <div class="flex-grow-1">
                    <h6 class="fw-bold text-dark mb-1 text-truncate"><?= esc($a['title']) ?></h6>
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <span class="badge bg-primary bg-opacity-10 text-primary small fw-normal"><?= esc($a['category'] ?: 'Event') ?></span>
                        <span class="text-muted" style="font-size: 0.72rem"><?= $a['event_date'] ? date('M j, Y', strtotime($a['event_date'])) : 'No date' ?></span>
                    </div>
                    <?php if ($a['description']): ?>
                        <p class="text-muted small mb-3 line-clamp-2"><?= esc(strip_tags($a['description'])) ?></p>
                    <?php endif; ?>
                </div>
                
                <div class="pt-3 border-top mt-auto d-flex gap-2">
                    <a href="<?= base_url('admin/gallery/edit/'.$a['id']) ?>" class="btn btn-sm btn-outline-primary flex-grow-1">
                        <i class="bi bi-pencil-square me-1"></i> Edit Album
                    </a>
                    <form action="<?= base_url('admin/gallery/delete/'.$a['id']) ?>" method="post" class="d-inline" onsubmit="return confirm('Delete this entire album and all its images?')">
                        <?= csrf_field() ?>
                        <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete Album">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; endif; ?>
</div>

<style>
.gallery-album-card { transition: transform 0.2s ease, shadow 0.2s ease; }
.gallery-album-card:hover { transform: translateY(-4px); box-shadow: 0 10px 20px rgba(0,0,0,0.08) !important; }
.line-clamp-2 { display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; }
.backdrop-blur { backdrop-filter: blur(4px); -webkit-backdrop-filter: blur(4px); }
</style>