<a href="<?= base_url('admin/roles') ?>" class="btn btn-sm btn-outline-secondary mb-4">Back</a>
<div class="card">
    <div class="card-header"><?= $role ? 'Permissions for: ' . esc($role['label']) : 'Create Role' ?></div>
        <form action="<?= $role ? base_url('admin/roles/update/'.$role['id']) : base_url('admin/roles/store') ?>" method="post">
    <div class="card-body">
            <?= csrf_field() ?>
            <?php if (! $role): ?>
            <div class="row mb-4">
                <div class="col-md-6">
                    <label class="form-label">Role Key</label>
                    <input type="text" name="name" class="form-control" value="<?= esc(old('name')) ?>" placeholder="content_editor">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Role Label</label>
                    <input type="text" name="label" class="form-control" value="<?= esc(old('label')) ?>" placeholder="Content Editor">
                </div>
            </div>
            <?php else: ?>
            <div class="mb-4">
                <label class="form-label">Role Label</label>
                <input type="text" name="label" class="form-control" value="<?= esc(old('label', $role['label'])) ?>">
            </div>
            <?php endif; ?>
            <div class="mb-4">
                <label class="form-label">Role Description</label>
                <input type="text" name="description" class="form-control" value="<?= esc(old('description', $role['description'] ?? '')) ?>">
            </div>
            <p class="fw-bold small mb-2">Check the permissions to grant:</p>
            <div class="row g-3">
                <?php foreach ($allPerms as $p): ?>
                <div class="col-md-4 col-lg-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="permissions[]" value="<?= $p['id'] ?>" id="perm_<?= $p['id'] ?>"
                            <?= in_array($p['id'], $rolePermIds) ? 'checked' : '' ?>>
                        <label class="form-check-label small" for="perm_<?= $p['id'] ?>">
                            <?= esc($p['label']) ?> <br><small class="text-muted"><?= esc($p['key']) ?></small>
                        </label>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
    </div>
    <div class="card-footer">
            <button type="submit" class="btn btn-primary">Save Changes</button>
    </div>
        </form>
</div>
