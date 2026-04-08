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
if (! function_exists('upload_url')) {
    /**
     * Get the full URL to an uploaded file.
     *
     * @param string $folder   The subfolder in public/uploads/
     * @param string|null $filename The filename
     * @return string|null
     */
    function upload_url(string $folder, ?string $filename): ?string
    {
        if (empty($filename)) {
            return null;
        }

        // Check if it's already a full URL
        if (filter_var($filename, FILTER_VALIDATE_URL)) {
            return $filename;
        }

        return base_url('uploads/' . $folder . '/' . $filename);
    }
}
