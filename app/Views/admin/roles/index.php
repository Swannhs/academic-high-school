<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="fw-bold mb-0">Roles & Permissions</h5>
    <a href="<?= base_url('admin/roles/create') ?>" class="btn btn-primary btn-sm">Create Role</a>
</div>
<div class="card">
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead><tr><th>Role Name</th><th>Key</th><th>Description</th><th>Actions</th></tr></thead>
            <tbody>
            <?php foreach ($roles as $r): ?>
            <tr>
                <td class="fw-bold text-primary"><?= esc($r['label']) ?></td>
                <td><code><?= esc($r['name']) ?></code></td>
                <td><?= esc($r['description']) ?></td>
                <td>
                    <a href="<?= base_url('admin/roles/edit/'.$r['id']) ?>" class="btn btn-sm btn-outline-primary">Manage Permissions</a>
                    <?php if (empty($r['is_protected'])): ?>
                    <form action="<?= base_url('admin/roles/delete/'.$r['id']) ?>" method="post" class="d-inline">
                        <?= csrf_field() ?>
                        <button class="btn btn-sm btn-outline-danger" data-confirm="Delete this role?">Delete</button>
                    </form>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
