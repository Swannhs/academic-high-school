<a href="<?= base_url('admin/gallery') ?>" class="btn btn-sm btn-outline-secondary mb-4">Back</a>
<div class="row">
    <div class="col-lg-4">
        <div class="card mb-4">
            <div class="card-header">Album Info</div>
            <div class="card-body">
                <form action="<?= base_url('admin/gallery/update/'.$album['id']) ?>" method="post">
                    <?= csrf_field() ?>
                    <div class="mb-3"><label class="form-label">Title</label><input type="text" name="title" class="form-control" value="<?= esc($album['title']) ?>"></div>
                    <button type="submit" class="btn btn-primary btn-sm">Update Title</button>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-header">Add Photos</div>
            <div class="card-body">
                <form action="<?= base_url('admin/gallery/update/'.$album['id']) ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <div class="mb-3"><input type="file" name="images[]" class="form-control" multiple accept="image/*"></div>
                    <button type="submit" class="btn btn-success btn-sm">Upload Photos</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">Photos in this Album</div>
            <div class="card-body">
                <div class="row g-2">
                    <?php foreach ($images as $img): ?>
                    <div class="col-md-3 position-relative">
                        <img src="<?= base_url('uploads/gallery/'.$img['image_path']) ?>" class="img-fluid rounded border">
                        <form action="<?= base_url('admin/gallery/image-delete/'.$img['id']) ?>" method="post" class="position-absolute top-0 end-0 m-1">
                            <?= csrf_field() ?>
                            <button class="btn btn-sm btn-danger rounded-circle p-0" style="width:24px;height:24px" title="Delete"><i class="bi bi-x"></i></button>
                        </form>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>