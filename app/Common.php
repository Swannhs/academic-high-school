<?php

/**
 * The goal of this file is to allow developers a location
 * where they can overwrite core procedural functions and
 * replace them with their own. This file is loaded during
 * the bootstrap process and is called during the framework's
 * execution.
 *
 * This can be looked at as a `master helper` file that is
 * loaded early on, and may also contain additional functions
 * that you'd like to use throughout your entire application
 *
 * @see: https://codeigniter.com/user_guide/extending/common.html
 */
if (! function_exists('safe_upload_url')) {
    /**
     * Get the full URL to an uploaded file with smart fallback for missing files.
     */
    function safe_upload_url(string $folder, ?string $filename, ?string $fallback = 'https://images.unsplash.com/photo-1523050335109-7efbbe195018?q=80&w=800'): string
    {
        if (empty($filename)) {
            return $fallback;
        }

        // Check if it's already a full URL
        if (filter_var($filename, FILTER_VALIDATE_URL) || str_starts_with($filename, 'http')) {
            return $filename;
        }

        // Detect if file exists on disk
        $localPath = FCPATH . 'uploads/' . trim($folder, '/') . '/' . ltrim($filename, '/');
        if (!is_file($localPath)) {
            // Human portrait fallback for teachers/staff
            if ($folder === 'teachers' || $folder === 'profiles' || $folder === 'staff') {
                return 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?q=80&w=800';
            }
            return $fallback;
        }

        return base_url('uploads/' . trim($folder, '/') . '/' . ltrim($filename, '/'));
    }
}
