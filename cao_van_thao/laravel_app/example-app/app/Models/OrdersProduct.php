<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdersProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'order_id',
        'price',
        'sale_off',
        'quantity',
    ];
}
