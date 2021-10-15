<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class OrderController extends Controller
{
    protected $categoryModel;
    protected $productModel;

    public function __construct(Category $category, Product $product)
    {
        $this->categoryModel = $category;
        $this->productModel = $product;
    }

    public function saveDataToSession(Request $request)
    {
        $productId = (int) $request->product_id;
        $quantity = (int) $request->quantity;
        $existFlg = false;

        if (session('cart')) {
            $data['cart'] = session('cart');

            foreach ($data['cart'] as $key => $value) {
                if ($productId == $value['id']) {
                    $data['cart'][$key]['quantity'] += $quantity;
                    $existFlg = true;
                }
            }

            if (!$existFlg) {
                $data['cart'][] = [
                    'id' => $productId,
                    'quantity' => $quantity
                ];
            }
        } else {
            $data = [
                'cart' => [
                    [
                        'id' => $productId,
                        'quantity' => $quantity
                    ],
                ],
            ];
        }

        session($data);

        return json_encode($data);
    }

    public function removeDataFromSession(Request $request)
    {
        $productId = (int) $request->product_id;
        $cartData = session('cart');

        foreach ($cartData as $key => $productData) {
            if ($productData['id'] == $productId) {
                unset($cartData[$key]);
            }
        }

        if (is_null($cartData)) {
            session()->forget('cart');

            return json_encode([]);
        }

        $request->session()->forget('cart');
        session(['cart' => $cartData]);

        return json_encode(['cart' => $cartData]);
    }

    public function orderList()
    {
        $cartData = session('cart');
        $cartData = collect($cartData);

        $productData = $cartData->pluck('quantity', 'id')->toArray();
        $productIds = $cartData->pluck('id');

        $products = $this->productModel->whereIn('id', $productIds)->get();

        $subtotal = 0;
        $delivery = 0;
        $discount = 0;

        foreach ($products as $product) {
            $subtotal += $product->price * $productData[$product->id] * ((100 - $product->sale_off) / 100);
        }

        $total = $subtotal + $delivery - $discount;

        return view('orders.order-list', [
            'products' => $products,
            'productData' => $productData,
            'subtotal' => $subtotal,
            'delivery' => $delivery,
            'discount' => $discount,
            'total' => $total,
        ]);
    }

    public function update(Request $request)
    {
        $productId = (int) $request->product_id;
        $quantity = (int) $request->quantity;

        if (session('cart')) {
            $data['cart'] = session('cart');

            foreach ($data['cart'] as $key => $value) {
                if ($productId == $value['id']) {
                    $data['cart'][$key]['quantity'] = $quantity;
                }
            }
            session($data);

            return json_encode($data);
        }

        return json_encode(['status' => false]);
    }
}
