<a href="<?= base_url('admin/gallery') ?>" class="btn btn-sm btn-outline-secondary mb-4">Back</a>
<div class="card" style="max-width:500px">
    <div class="card-header">Create New Album</div>
    <div class="card-body">
        <form action="<?= base_url('admin/gallery/store') ?>" method="post">
            <?= csrf_field() ?>
            <div class="mb-3">
                <label class="form-label">Album Title</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="2"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Create Album</button>
        </form>
    </div>
</div>