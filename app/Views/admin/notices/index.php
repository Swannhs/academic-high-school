<div class="row align-items-center mb-4">
    <div class="col">
        <h4 class="fw-bold mb-0">Notice Board</h4>
        <p class="text-muted small mb-0">Publish and manage official announcements and school notices.</p>
    </div>
    <div class="col-auto">
        <a href="<?= base_url('admin/notice-categories') ?>" class="btn btn-outline-secondary btn-sm me-2">
            <i class="bi bi-tags me-1"></i>Categories
        </a>
        <a href="<?= base_url('admin/notices/create') ?>" class="btn btn-primary">
            <i class="bi bi-megaphone-fill me-2"></i>Post New Notice
        </a>
    </div>
</div>

<div class="card border-0 shadow-sm mb-4">
    <div class="card-body p-3">
        <form class="row g-2" method="get">
            <div class="col-md-4">
                <input type="text" name="search" class="form-control" placeholder="Search by title..." value="<?= esc(request()->getGet('search')) ?>">
            </div>
            <div class="col-md-3">
                <select name="category" class="form-select">
                    <option value="">All Categories</option>
                    <?php foreach ($categories as $cat): ?>
                        <option value="<?= $cat['id'] ?>" <?= request()->getGet('category') == $cat['id'] ? 'selected' : '' ?>><?= esc($cat['name']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-2">
                <select name="status" class="form-select">
                    <option value="">Status</option>
                    <option value="active" <?= request()->getGet('status') === 'active' ? 'selected' : '' ?>>Active</option>
                    <option value="inactive" <?= request()->getGet('status') === 'inactive' ? 'selected' : '' ?>>Inactive</option>
                </select>
            </div>
            <div class="col-auto">
                <button class="btn btn-primary px-4">Filter</button>
            </div>
        </form>
    </div>
</div>

<div class="card border-0 shadow-sm overflow-hidden">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="bg-light border-bottom">
                <tr>
                    <th class="ps-4 py-3">Notice Title</th>
                    <th class="py-3">Category</th>
                    <th class="py-3">Date</th>
                    <th class="py-3 text-center">Featured</th>
                    <th class="py-3 text-center">Status</th>
                    <th class="py-3 pe-4 text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($notices)): ?>
                <tr><td colspan="6" class="text-center py-5 text-muted">No notices found.</td></tr>
                <?php else: foreach ($notices as $n): ?>
                <tr>
                    <td class="ps-4 py-3">
                        <div class="fw-bold text-dark mb-0"><?= esc($n['title']) ?></div>
                        <?php if ($n['attachment']): ?>
                            <div class="small text-danger mt-1"><i class="bi bi-file-earmark-pdf-fill me-1"></i>Attached Document</div>
                        <?php endif; ?>
                    </td>
                    <td class="py-3">
                        <span class="badge bg-info-subtle text-info border border-info-subtle px-2">
                            <?= esc($n['category_name'] ?: 'Uncategorized') ?>
                        </span>
                    </td>
                    <td class="py-3">
                        <div class="small text-muted"><?= date('M j, Y', strtotime($n['publish_date'])) ?></div>
                    </td>
                    <td class="py-3 text-center">
                        <?php if ($n['is_featured']): ?>
                            <i class="bi bi-star-fill text-warning"></i>
                        <?php else: ?>
                            <i class="bi bi-star text-muted opacity-25"></i>
                        <?php endif; ?>
                    </td>
                    <td class="py-3 text-center">
                        <a href="<?= base_url('admin/notices/toggle/' . $n['id']) ?>" class="badge rounded-pill bg-<?= $n['status'] === 'active' ? 'success' : 'secondary' ?>-subtle text-<?= $n['status'] === 'active' ? 'success' : 'secondary' ?> text-decoration-none px-3">
                            <?= ucfirst($n['status']) ?>
                        </a>
                    </td>
                    <td class="py-3 pe-4 text-end">
                        <div class="btn-group">
                            <a href="<?= base_url('admin/notices/edit/' . $n['id']) ?>" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></a>
                            <form action="<?= base_url('admin/notices/delete/' . $n['id']) ?>" method="post" class="d-inline" onsubmit="return confirm('Delete this notice?')">
                                <?= csrf_field() ?>
                                <button type="submit" class="btn btn-sm btn-outline-danger border-start-0"><i class="bi bi-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                <?php endforeach; endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php if (isset($pager)): ?>
<div class="mt-4">
    <?= $pager->links() ?>
</div>
<?php endif; ?>