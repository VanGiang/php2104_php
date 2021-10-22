<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'email',
        'address',
        'total_price',
        'code',
        'status',
        'user_id',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_orders');
    }
}
