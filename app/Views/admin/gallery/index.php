<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="mb-0 fw-bold">Photo Gallery (Albums)</h5>
    <a href="<?= base_url('admin/gallery/create') ?>" class="btn btn-primary btn-sm">New Album</a>
</div>
<div class="row g-4">
    <?php foreach ($albums as $a): ?>
    <div class="col-md-4 col-lg-3">
        <div class="card h-100">
            <?php if ($a['cover_image']): ?>
                <img src="<?= base_url('uploads/gallery/'.$a['cover_image']) ?>" class="card-img-top" style="height:150px;object-fit:cover">
            <?php else: ?>
                <div class="bg-light d-flex align-items-center justify-content-center" style="height:150px"><i class="bi bi-images text-muted fs-1"></i></div>
            <?php endif; ?>
            <div class="card-body">
                <h6 class="fw-bold mb-1"><?= esc($a['title']) ?></h6>
                <div class="text-muted small mb-2"><?= $a['image_count'] ?> Photos</div>
                <div class="d-flex gap-1">
                    <a href="<?= base_url('admin/gallery/edit/'.$a['id']) ?>" class="btn btn-sm btn-outline-primary">Manage</a>
                    <form action="<?= base_url('admin/gallery/delete/'.$a['id']) ?>" method="post" class="d-inline">
                        <?= csrf_field() ?>
                        <button class="btn btn-sm btn-outline-danger" data-confirm="Delete album?"><i class="bi bi-trash"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>