<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class AdminOrderController extends Controller
{
    protected $productModel;
    protected $categoryModel;

    public function __construct(Product $product, Category $category)
    {
        $this->productModel = $product;
        $this->categoryModel = $category;
    }

    public function index()
    {
        return view('admin.order.admin-order');
    }
}
