<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'payment_status',
        'amount',
    ];
    
    public function orders()
    {
        return $this->belongsTo(Orders::class, 'order_id');
    }
}
