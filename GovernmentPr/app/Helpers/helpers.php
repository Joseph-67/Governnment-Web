<?php

if (!function_exists('formatFileSize')) {
    # code...
    function formatFileSize(?int $bytes): string{
        if (is_null($bytes) || $bytes === 0) {
            return '0 B';
        }

        if ($bytes >= 1048576) {
            return number_format($bytes / 1048576, 1) . ' MB';
        }

        if ($bytes >= 1024) {
            return number_format($bytes / 1024, 1) . ' KB';
        }

        return $bytes . ' B';
    }
}