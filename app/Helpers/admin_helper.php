<?php

if (! function_exists('admin_has_permission')) {
    function admin_has_permission(string $permission): bool
    {
        return in_array($permission, session()->get('admin_permissions') ?? [], true);
    }
}

// upload_url logic moved to app/Common.php for global availability and priority


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

if (! function_exists('ld')) {
    /**
     * Localized Data Helper
     * Fetches the field based on current session locale (en or bn)
     */
    function ld($item, string $field): string
    {
        $lang = session('lang') ?? 'en';
        $key = ($lang === 'bn') ? "{$field}_bn" : $field;
        
        $data = (array)$item;
        
        // Return translated field if exists and not empty
        if ($lang === 'bn' && !empty($data[$key])) {
            return (string)$data[$key];
        }
        
        // Fallback to primary field (English)
        return (isset($data[$field]) ? (string)$data[$field] : '');
    }
}
