<a href="<?= base_url('admin/messages') ?>" class="btn btn-sm btn-outline-secondary mb-4"><i class="bi bi-arrow-left me-1"></i>Back</a>
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span>Message Details</span>
        <span class="text-muted small"><?= $message['created_at'] ?></span>
    </div>
    <div class="card-body">
        <div class="row mb-4">
            <div class="col-md-6">
                <label class="text-muted small fw-bold">From</label>
                <h5><?= esc($message['name']) ?></h5>
                <div class="text-primary small"><?= esc($message['email']) ?> | <?= esc($message['phone']) ?></div>
            </div>
            <div class="col-md-6 text-md-end">
                <label class="text-muted small fw-bold">Subject</label>
                <div class="fw-bold"><?= esc($message['subject']) ?></div>
            </div>
        </div>
        <hr>
        <div class="px-3 py-2 bg-light rounded" style="white-space:pre-wrap"><?= esc($message['message']) ?></div>
    </div>
</div>