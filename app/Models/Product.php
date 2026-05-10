<?php

namespace App\Models;

use App\Models\Concerns\ResolvesStorageImageUrl;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    use ResolvesStorageImageUrl;

    protected $fillable = [
        'brand_id',
        'watch_name',
        'watch_description',
        'watch_price',
        'collection',
        'reference_number',
        'case_description',
        'gender',
        'movement',
        'dial',
        'Bezel',
        'crystal',
        'caliber',
        'watch_function',
        'mechanism',
        'number_of_jewels',
        'total_diameter',
        'power_reserve',
        'number_of_parts',
        'frequency',
        'bracelet',
        'clasp',
        'water_resistance',
        'watch_image',
    ];

    /**
     * Public URL for the stored watch image (public disk and legacy Watchimages symlink).
     */
    public function getImageUrlAttribute(): string
    {
        return $this->urlForStoredPath($this->watch_image);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetails::class);
    }

    public function cart()
    {
        return $this->hasMany(Cart::class);
    }
}
