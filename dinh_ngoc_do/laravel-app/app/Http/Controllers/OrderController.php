<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderProduct;

class OrderController extends Controller
{
    protected $productModel;
    protected $categoryModel;

    public function __construct(Product $product, Category $category, Order $order, OrderProduct $orderproduct)
    {
        $this->productModel = $product;
        $this->categoryModel = $category;
        $this->orderModel = $order;
        $this->orderProductModel = $orderproduct;
    }

    public function saveProductsToSession(Request $request)
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

    public function orderList()
    {
        $cartData = session('cart');
        $cartData = collect($cartData);

        $productData = $cartData->pluck('quantity', 'id')->toArray();
        $productIds = $cartData->pluck('id');
        /* dd($productData); */

        $products = $this->productModel->whereIn('id', $productIds)->get();

        $subtotal = 0;
        $delivery = 20;
        $discount = 10;
        
        foreach ($products as $product) {
            $subtotal += $product->price * $productData[$product->id];
        }

        $total = $subtotal * (1 - $discount / 100) + $delivery;

        return view('shopper-cart', [
            'products' => $products,
            'productData' => $productData,
            'subtotal' => $subtotal,
            'delivery' => $delivery,
            'discount' => $discount,
            'total' => $total,
        ]);
    }

    public function removeDataFromSession(Request $request)
    {
        $productId = (int) $request->product_id;
        $cartData = session('cart');
        
        foreach ($cartData as $key => $productData) {
            if ($productData['id'] == $productId) {
                //Remove product when the product_id in cartData coincides with the product_id get from request
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
        /* dd($productId, $cartData, 'success'); */
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
    
    public function checkout()
    {
        $cartData = session('cart');
        $cartData = collect($cartData);

        $productData = $cartData->pluck('quantity', 'id')->toArray();
        $productIds = $cartData->pluck('id');

        $products = $this->productModel->whereIn('id', $productIds)->get();

        $subtotal = 0;
        $delivery = 20;
        $discount = 10;
        
        foreach ($products as $product) {
            $subtotal += $product->price * $productData[$product->id];
        }

        $total = $subtotal * (1 - $discount / 100) + $delivery;

        return view('shopper-checkout', [
            'products' => $products,
            'productData' => $productData,
            'subtotal' => $subtotal,
            'discount' => $discount,
            'delivery' => $delivery,
            'total' => $total,
        ]);
    }

    public function orderPlace(Request $request)
    {
        $input = $request->only([
            'name',
            'address',
            'email',
            'note',
            'payment',
        ]);

        $phone = (int) $request->phone;
        $discount = (float) $request->discount;
        $delivery = (float) $request->delivery;
        $totalPrice = (float) $request->total_price;

        $orderSession = session('cart');

        $code = 'JPG464GF4S84FD';

        $orderData = [
            'code' => $code,
            'name' => $input['name'],
            'address' => $input['address'],
            'email' => $input['email'],
            'note' => $input['note'],
            'payment' => $input['payment'],
            'phone' => $phone,
            'discount' => $discount,
            'delivery' => $delivery,
            'total_price' => $totalPrice,
        ];

        try {
            $order = $this->orderModel->create($orderData);

            $orderId = $order->id;
            
            $productOrderData = [];

            foreach ($orderSession as $product) {
                $productId = $product['id'];
                $productRecord = $this->productModel->find($productId);

                $productOrderData[] = [
                    'order_id' => $orderId,
                    'product_id' => $productId,
                    'price' => $productRecord->price,
                    'quantity' => $product['quantity'],
                ];
            }

            $this->orderProductModel->insert($productOrderData);

            session()->flush();
        } catch (\Exception $e) {
            \Log::error($e);
        }
    }
}
