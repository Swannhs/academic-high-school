<?php
$current = current_url();
$base    = base_url('admin');

$adminLink = static function (string $url, string $icon, string $label) use ($current): string {
    $active = str_starts_with($current, $url) ? 'active' : '';

    return "<a href=\"{$url}\" class=\"nav-link {$active}\"><i class=\"bi bi-{$icon}\"></i> {$label}</a>";
};
?>
<div class="py-2">
    <!-- Dashboard -->
    <div class="nav-section">Main</div>
    <?= $adminLink($base . '/', 'speedometer2', 'Dashboard') ?>

    <!-- Content -->
    <?php if (in_array('manage_notices', $permissions) || in_array('manage_pages', $permissions)): ?>
    <div class="nav-section mt-2">Content</div>
    <?php if (in_array('manage_notices', $permissions)): ?>
    <?= $adminLink($base . '/notices', 'megaphone', 'Notices') ?>
    <?= $adminLink($base . '/notice-categories', 'tags', 'Notice Categories') ?>
    <?php endif; ?>
    <?php if (in_array('manage_pages', $permissions)): ?>
    <?= $adminLink($base . '/pages', 'file-earmark-text', 'Pages') ?>
    <?php endif; ?>
    <?php endif; ?>

    <!-- People -->
    <?php if (in_array('manage_teachers', $permissions) || in_array('manage_staff', $permissions)): ?>
    <div class="nav-section mt-2">People</div>
    <?php if (in_array('manage_teachers', $permissions)): ?>
    <?= $adminLink($base . '/teachers', 'people', 'Teachers') ?>
    <?php endif; ?>
    <?php if (in_array('manage_staff', $permissions)): ?>
    <?= $adminLink($base . '/staff', 'person-badge', 'Staff / Committee') ?>
    <?php endif; ?>
    <?php endif; ?>

    <!-- Academic -->
    <?php if (in_array('manage_results', $permissions) || in_array('manage_routines', $permissions) || in_array('manage_calendar', $permissions) || in_array('manage_admission', $permissions)): ?>
    <div class="nav-section mt-2">Academic</div>
    <?php if (in_array('manage_results', $permissions)): ?>
    <?= $adminLink($base . '/results', 'clipboard-data', 'Results') ?>
    <?php endif; ?>
    <?php if (in_array('manage_routines', $permissions)): ?>
    <?= $adminLink($base . '/routines', 'calendar3', 'Routines') ?>
    <?php endif; ?>
    <?php if (in_array('manage_calendar', $permissions)): ?>
    <?= $adminLink($base . '/academic-calendar', 'calendar-event', 'Academic Calendar') ?>
    <?php endif; ?>
    <?php if (in_array('manage_admission', $permissions)): ?>
    <?= $adminLink($base . '/admission', 'door-open', 'Admission') ?>
    <?php endif; ?>
    <?php endif; ?>

    <!-- Media -->
    <?php if (in_array('manage_gallery', $permissions) || in_array('manage_downloads', $permissions)): ?>
    <div class="nav-section mt-2">Media</div>
    <?php if (in_array('manage_gallery', $permissions)): ?>
    <?= $adminLink($base . '/gallery', 'images', 'Gallery') ?>
    <?php endif; ?>
    <?php if (in_array('manage_downloads', $permissions)): ?>
    <?= $adminLink($base . '/downloads', 'download', 'Downloads') ?>
    <?php endif; ?>
    <?php endif; ?>

    <!-- Communication -->
    <?php if (in_array('manage_messages', $permissions) || in_array('manage_feedback', $permissions)): ?>
    <div class="nav-section mt-2">Communication</div>
    <?php if (in_array('manage_messages', $permissions)): ?>
    <?= $adminLink($base . '/messages', 'envelope', 'Messages') ?>
    <?php endif; ?>
    <?php if (in_array('manage_feedback', $permissions)): ?>
    <?= $adminLink($base . '/feedback', 'chat-dots', 'Feedback') ?>
    <?php endif; ?>
    <?php endif; ?>

    <!-- System -->
    <?php if (in_array('manage_users', $permissions) || in_array('manage_roles', $permissions) || in_array('manage_settings', $permissions)): ?>
    <div class="nav-section mt-2">System</div>
    <?php if (in_array('manage_users', $permissions)): ?>
    <?= $adminLink($base . '/users', 'person-lines-fill', 'Users') ?>
    <?php endif; ?>
    <?php if (in_array('manage_roles', $permissions)): ?>
    <?= $adminLink($base . '/roles', 'shield-lock', 'Roles & Permissions') ?>
    <?php endif; ?>
    <?php if (in_array('manage_settings', $permissions)): ?>
    <?= $adminLink($base . '/settings', 'gear', 'Settings') ?>
    <?php endif; ?>
    <?php endif; ?>

    <!-- Profile (always visible) -->
    <div class="nav-section mt-2">Account</div>
    <?= $adminLink($base . '/profile', 'person-circle', 'My Profile') ?>
    <a href="<?= base_url('admin/logout') ?>" class="nav-link text-danger-emphasis mt-1">
        <i class="bi bi-box-arrow-right"></i> Logout
    </a>

    <div style="height:2rem"></div>
</div>
