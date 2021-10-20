<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'user_id',
        'name',
        'phone',
        'email',
        'address',
        'note',
        'discount',
        'delivery',
        'total_price',
        'payment',
        'status',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_products');
    }
}
