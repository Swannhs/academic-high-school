<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="mb-0 fw-bold">Staff & Committee</h5>
    <a href="<?= base_url('admin/staff/create') ?>" class="btn btn-primary btn-sm"><i class="bi bi-plus me-1"></i>Add Member</a>
</div>
<div class="card">
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead><tr><th>Photo</th><th>Name</th><th>Role</th><th>Status</th><th>Order</th><th>Actions</th></tr></thead>
            <tbody>
            <?php foreach ($staff as $m): ?>
            <tr>
                <td><img src="<?= $m['photo'] ? base_url('uploads/staff/'.$m['photo']) : base_url('assets/img/avatar-placeholder.png') ?>" class="table-avatar"></td>
                <td><div class="fw-500"><?= esc($m['name']) ?></div></td>
                <td class="small"><?= esc($m['role']) ?></td>
                <td><span class="badge bg-<?= $m['status'] === 'active' ? 'success' : 'secondary' ?>"><?= esc($m['status']) ?></span></td>
                <td><?= $m['display_order'] ?></td>
                <td>
                    <a href="<?= base_url('admin/staff/edit/' . $m['id']) ?>" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></a>
                    <form action="<?= base_url('admin/staff/delete/' . $m['id']) ?>" method="post" class="d-inline">
                        <?= csrf_field() ?>
                        <button class="btn btn-sm btn-outline-danger" data-confirm="Delete?"><i class="bi bi-trash"></i></button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>