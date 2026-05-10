<?php

namespace App\Models;

use App\Models\Concerns\ResolvesStorageImageUrl;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    use ResolvesStorageImageUrl;

    /**
     * Public URL for the stored brand image (public disk and legacy Watchimages symlink).
     */
    public function getImageUrlAttribute(): string
    {
        return $this->urlForStoredPath($this->brandimg);
    }

    /**
     * Route name for dedicated brand collection pages (rolex, hublot, audemars), or null.
     * Resolved from brand name so DB primary keys are not hard-coded in controllers or views.
     */
    public function catalogRouteName(): ?string
    {
        $n = strtolower(trim((string) $this->brandname));

        if (str_contains($n, 'rolex')) {
            return 'rolex';
        }
        if (str_contains($n, 'hublot')) {
            return 'hublot';
        }
        if (str_contains($n, 'audemars')) {
            return 'audemars';
        }

        return null;
    }

    /**
     * Brand id for a storefront catalog slug, or null if no brand matches.
     */
    public static function idForCatalogSlug(string $slug): ?int
    {
        $slug = strtolower(trim($slug));

        foreach (static::query()->orderBy('brandname')->get() as $brand) {
            if ($brand->catalogRouteName() === $slug) {
                return (int) $brand->id;
            }
        }

        return null;
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
