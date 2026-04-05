<?php

if (! function_exists('admin_has_permission')) {
    function admin_has_permission(string $permission): bool
    {
        return in_array($permission, session()->get('admin_permissions') ?? [], true);
    }
}

if (! function_exists('upload_url')) {
    function upload_url(string $folder, ?string $filename): ?string
    {
        if (empty($filename)) {
            return null;
        }

        if (str_starts_with($filename, 'http://') || str_starts_with($filename, 'https://')) {
            return $filename;
        }

        return base_url('uploads/' . trim($folder, '/') . '/' . ltrim($filename, '/'));
    }
}

if (! function_exists('status_badge_class')) {
    function status_badge_class(?string $status): string
    {
        return match ($status) {
            'active', 'published', 'resolved' => 'success',
            'inactive', 'draft' => 'secondary',
            'pending', 'in_review' => 'warning text-dark',
            'closed' => 'dark',
            default => 'light text-dark',
        };
    }
}
