<h5 class="fw-bold mb-4">Feedback & Complaints</h5>
<div class="card">
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead><tr><th>Name</th><th>Type</th><th>Subject</th><th>Status</th><th>Actions</th></tr></thead>
            <tbody>
            <?php foreach ($items as $m): ?>
            <tr>
                <td><?= esc($m['name']) ?></td>
                <td><span class="badge bg-info"><?= esc($m['type']) ?></span></td>
                <td><?= esc($m['subject']) ?></td>
                <td><span class="badge bg-<?= $m['status'] === 'new' ? 'danger' : 'success' ?>"><?= esc($m['status']) ?></span></td>
                <td>
                    <a href="<?= base_url('admin/feedback/'.$m['id']) ?>" class="btn btn-sm btn-outline-primary"><i class="bi bi-eye"></i></a>
                </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>