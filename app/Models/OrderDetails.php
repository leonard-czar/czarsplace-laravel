<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;
    public function products(){
        return $this->belongsTo(Product::class, 'product_id');
    }
    public function orders(){
        return $this->belongsTo(Orders::class,'order_id');
    }
}
