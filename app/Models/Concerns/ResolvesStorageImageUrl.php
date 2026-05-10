<?php

namespace App\Models\Concerns;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait ResolvesStorageImageUrl
{
    /**
     * Build a browser URL for a path stored by Laravel's file storage.
     *
     * Prefers the public disk (/storage/...) used by store(..., 'public').
     * Falls back to legacy paths under storage/app/{path}, which this project
     * may expose via public/Watchimages → storage/app/Watchimages (see config/filesystems.php links).
     */
    protected function urlForStoredPath(?string $relativePath): string
    {
        if (! $relativePath) {
            return '';
        }

        if (Str::startsWith($relativePath, ['http://', 'https://', '//'])) {
            return $relativePath;
        }

        $relativePath = ltrim(str_replace('\\', '/', $relativePath), '/');

        /**
         * Root-relative URL works regardless of APP_URL host/port (avoids broken img when
         * visiting via 127.0.0.1 vs localhost).
         */
        $storagePublicUrl = '/storage/'.$relativePath;

        if (Storage::disk('public')->exists($relativePath)) {
            return $storagePublicUrl;
        }

        if (is_file(public_path('storage/'.$relativePath))) {
            return $storagePublicUrl;
        }

        if (Storage::disk('local')->exists($relativePath)) {
            return asset($relativePath);
        }

        if (is_file(public_path($relativePath))) {
            return asset($relativePath);
        }

        return $storagePublicUrl;
    }
}
