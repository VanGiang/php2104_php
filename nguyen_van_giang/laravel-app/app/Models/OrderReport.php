<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderReport extends Model
{

    protected $fillable = [
        'day',
        'order_quantity',
        'total_price',
        'product_quantity',
    ];
}
