<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="mb-0 fw-bold">Class Routines</h5>
    <a href="<?= base_url('admin/routines/create') ?>" class="btn btn-primary btn-sm"><i class="bi bi-plus me-1"></i>Add Routine</a>
</div>
<div class="card">
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead><tr><th>Title</th><th>Type</th><th>Class</th><th>Date</th><th>Actions</th></tr></thead>
            <tbody>
            <?php foreach ($routines as $r): ?>
            <tr>
                <td class="fw-500"><?= esc($r['title']) ?></td>
                <td><span class="badge bg-info"><?= esc($r['routine_type']) ?></span></td>
                <td><?= esc($r['class_name']) ?></td>
                <td class="small text-muted"><?= $r['publish_date'] ?></td>
                <td>
                    <a href="<?= base_url('uploads/routines/'.$r['file_path']) ?>" target="_blank" class="btn btn-sm btn-outline-secondary me-1"><i class="bi bi-eye"></i></a>
                    <a href="<?= base_url('admin/routines/edit/' . $r['id']) ?>" class="btn btn-sm btn-outline-primary me-1"><i class="bi bi-pencil"></i></a>
                    <form action="<?= base_url('admin/routines/delete/' . $r['id']) ?>" method="post" class="d-inline">
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