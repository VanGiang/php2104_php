<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'quantity',
        'start_date',
        'description',
        'user_id',
        'status',
        'rate',
        'start_sale_date',
        'image',
        'sale_off',
        'price_off',
        'is_public',
        'categories_id',
        'image_name',
    ];

    public function category()
    {
        return $this->belongsTo(Categories::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'orders_products');
    }
}
