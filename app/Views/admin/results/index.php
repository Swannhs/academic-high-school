<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="mb-0 fw-bold">Published Results</h5>
    <a href="<?= base_url('admin/results/create') ?>" class="btn btn-primary btn-sm"><i class="bi bi-plus me-1"></i>Add Result</a>
</div>
<div class="card">
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead><tr><th>Title</th><th>Exam</th><th>Class</th><th>Session</th><th>Actions</th></tr></thead>
            <tbody>
            <?php foreach ($results as $r): ?>
            <tr>
                <td class="fw-500"><?= esc($r['title']) ?></td>
                <td><?= esc($r['exam_name']) ?></td>
                <td><?= esc($r['class_name']) ?></td>
                <td><?= esc($r['session_year']) ?></td>
                <td>
                    <a href="<?= base_url('uploads/results/'.$r['file_path']) ?>" target="_blank" class="btn btn-sm btn-outline-secondary"><i class="bi bi-eye"></i></a>
                    <a href="<?= base_url('admin/results/edit/' . $r['id']) ?>" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></a>
                    <form action="<?= base_url('admin/results/delete/' . $r['id']) ?>" method="post" class="d-inline">
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