<h5 class="fw-bold mb-4">Inbound Messages (<?= $unread ?> Unread)</h5>
<div class="card">
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead><tr><th>Name</th><th>Subject</th><th>Date</th><th>Status</th><th>Actions</th></tr></thead>
            <tbody>
            <?php foreach ($messages as $m): ?>
            <tr class="<?= $m['is_read'] ? '' : 'table-light fw-bold' ?>">
                <td><?= esc($m['name']) ?></td>
                <td><?= esc($m['subject']) ?></td>
                <td class="small"><?= $m['created_at'] ?></td>
                <td><span class="badge bg-<?= $m['is_read'] ? 'secondary' : 'danger' ?>"><?= $m['is_read'] ? 'Read' : 'New' ?></span></td>
                <td>
                    <a href="<?= base_url('admin/messages/'.$m['id']) ?>" class="btn btn-sm btn-outline-primary"><i class="bi bi-eye"></i></a>
                    <form action="<?= base_url('admin/messages/delete/'.$m['id']) ?>" method="post" class="d-inline">
                        <?= csrf_field() ?>
                        <button class="btn btn-sm btn-outline-danger" data-confirm="Delete?"><i class="bi bi-trash"></i></button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="card-footer"><?= $pager->links() ?></div>
</div>