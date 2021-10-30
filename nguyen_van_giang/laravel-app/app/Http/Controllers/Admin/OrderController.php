<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\ProductOrder;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderShipped;
use App\Exports\OrdersExport;
use Maatwebsite\Excel\Facades\Excel;

class OrderController
{
    protected $categoryModel;
    protected $productModel;
    protected $orderModel;
    protected $productOrderModel;

    public function __construct(
        Category $category,
        Product $product,
        Order $order,
        ProductOrder $productOrder
    ) {
        $this->categoryModel = $category;
        $this->productModel = $product;
        $this->orderModel = $order;
        $this->productOrderModel = $productOrder;
    }

    public function index()
    {
        $orders = $this->orderModel->with('productOrders')->where('created_at', '29')->get();
        $data = [];

        foreach ($orders as $order) {
            $day = $order->created_at->format('d-m-Y');

            if (isset($data[$day])) {
                $orderQuantity++;
                $totalPrice += $order->total_price;
                $productQuantity += $order->productOrders->sum('quantity');
            } else {
                $orderQuantity = 1;
                $totalPrice = $order->total_price;
                $productQuantity = $order->productOrders->sum('quantity');
            }

            $data[$day] = [
                'day' => $day,
                'order_quantity' => $orderQuantity,
                'total_price' => $totalPrice,
                'product_quantity' => $productQuantity
            ];
        }

        dd($data);

        return view('admin.orders.index');
    }

}
