<div class="row align-items-center mb-4">
    <div class="col">
        <h4 class="fw-bold mb-0">Faculty & Teachers</h4>
        <p class="text-muted small mb-0">Manage the academic staff directory and profiles.</p>
    </div>
    <div class="col-auto">
        <a href="<?= base_url('admin/teachers/create') ?>" class="btn btn-primary">
            <i class="bi bi-person-plus-fill me-2"></i>Add New Teacher
        </a>
    </div>
</div>

<div class="card border-0 shadow-sm mb-4">
    <div class="card-body p-3">
        <form class="row g-2" method="get">
            <div class="col-md-4">
                <div class="input-group">
                    <span class="input-group-text bg-transparent border-end-0 text-muted"><i class="bi bi-search"></i></span>
                    <input type="text" name="search" class="form-control border-start-0" placeholder="Search by name, designation..." value="<?= esc(request()->getGet('search')) ?>">
                </div>
            </div>
            <div class="col-md-2">
                <select name="status" class="form-select">
                    <option value="">All Statuses</option>
                    <option value="active" <?= request()->getGet('status') === 'active' ? 'selected' : '' ?>>Active</option>
                    <option value="inactive" <?= request()->getGet('status') === 'inactive' ? 'selected' : '' ?>>Inactive</option>
                </select>
            </div>
            <div class="col-auto">
                <button class="btn btn-light border px-4">Filter</button>
                <?php if (request()->getGet('search') || request()->getGet('status')): ?>
                    <a href="<?= base_url('admin/teachers') ?>" class="btn btn-link btn-sm text-decoration-none text-muted">Reset</a>
                <?php endif; ?>
            </div>
        </form>
    </div>
</div>

<div class="card border-0 shadow-sm overflow-hidden">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="bg-light border-bottom">
                <tr>
                    <th class="ps-4 py-3" style="width: 80px">Photo</th>
                    <th class="py-3">Name & Details</th>
                    <th class="py-3">Position</th>
                    <th class="py-3">Contact</th>
                    <th class="py-3 text-center" style="width: 120px">Order</th>
                    <th class="py-3 text-center" style="width: 120px">Status</th>
                    <th class="py-3 pe-4 text-end" style="width: 150px">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($teachers)): ?>
                <tr>
                    <td colspan="7" class="text-center py-5">
                        <div class="text-muted mb-3"><i class="bi bi-people fs-1 opacity-25"></i></div>
                        <p class="text-muted mb-0">No teachers found matching your criteria.</p>
                        <a href="<?= base_url('admin/teachers/create') ?>" class="btn btn-sm btn-link text-primary mt-2">Add your first teacher</a>
                    </td>
                </tr>
                <?php else: foreach ($teachers as $t): ?>
                <tr>
                    <td class="ps-4 py-3">
                        <div class="avatar-container">
                            <?php if (!empty($t['photo'])): ?>
                                <img src="<?= safe_upload_url('teachers', $t['photo']) ?>" class="rounded shadow-sm object-fit-cover" width="56" height="56" alt="<?= esc($t['name']) ?>">
                            <?php else: ?>
                                <div class="bg-primary bg-opacity-10 text-primary rounded d-flex align-items-center justify-content-center fw-bold" style="width: 56px; height: 56px">
                                    <?= substr($t['name'], 0, 1) ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </td>
                    <td class="py-3">
                        <div class="fw-bold text-dark mb-0"><?= esc($t['name']) ?></div>
                        <div class="text-muted small"><?= esc($t['name_bn']) ?></div>
                        <div class="text-primary-emphasis" style="font-size: 0.75rem"><?= esc($t['department'] ?? 'General') ?> Department</div>
                    </td>
                    <td class="py-3">
                        <span class="badge bg-light text-dark fw-normal border"><?= esc($t['designation']) ?></span>
                        <div class="text-muted small mt-1"><?= esc($t['subject'] ?? '') ?></div>
                    </td>
                    <td class="py-3">
                        <div class="small"><i class="bi bi-phone me-1 text-muted"></i><?= esc($t['phone'] ?: 'N/A') ?></div>
                        <div class="small"><i class="bi bi-envelope me-1 text-muted"></i><?= esc($t['email'] ?: 'N/A') ?></div>
                    </td>
                    <td class="py-3 text-center">
                        <span class="badge bg-secondary bg-opacity-10 text-secondary"><?= $t['display_order'] ?></span>
                    </td>
                    <td class="py-3 text-center">
                        <form action="<?= base_url('admin/teachers/toggle/' . $t['id']) ?>" method="post">
                            <?= csrf_field() ?>
                            <button type="submit" class="btn btn-sm border-0 p-0">
                                <?php if ($t['status'] === 'active'): ?>
                                    <span class="badge rounded-pill bg-success-subtle text-success px-3">Active</span>
                                <?php else: ?>
                                    <span class="badge rounded-pill bg-danger-subtle text-danger px-3">Inactive</span>
                                <?php endif; ?>
                            </button>
                        </form>
                    </td>
                    <td class="py-3 pe-4 text-end">
                        <div class="btn-group shadow-sm">
                            <a href="<?= base_url('admin/teachers/edit/' . $t['id']) ?>" class="btn btn-sm btn-white border" title="Edit">
                                <i class="bi bi-pencil-fill text-primary"></i>
                            </a>
                            <form action="<?= base_url('admin/teachers/delete/' . $t['id']) ?>" method="post" class="d-inline" onsubmit="return confirm('Delete this teacher?')">
                                <?= csrf_field() ?>
                                <button type="submit" class="btn btn-sm btn-white border border-start-0 text-danger" title="Delete">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
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
<div class="mt-4 px-2">
    <?= $pager->links() ?>
</div>
<?php endif; ?>
