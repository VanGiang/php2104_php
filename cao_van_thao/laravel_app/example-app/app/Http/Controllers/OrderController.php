<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrdersProduct;
use Illuminate\Http\Request;


class OrderController extends Controller
{
	protected $productModel;
	protected $categoryModel;
	protected $orderModel;
	protected $orderProductModel;

	public function __construct(Product $product,
		Category $category,
		Order $order,
		OrdersProduct $ordersProduct
	) {
		$this->productModel = $product;
		$this->categoryModel = $category;
		$this->orderModel = $order;
		$this->orderProductModel = $ordersProduct;

	}

	public function saveDataToSession(Request $request)
	{
		//session()->flush();
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
	public function removeProductFromSesson(Request $request)
	{
		$productId = (int) $request->product_id;
		$cartData = session('cart');

		foreach ($cartData as $key => $productData) {
			if ($productData['id'] == $productId) {
				unset($cartData[$key]);
			}
		}
		if (is_null($cartData)) {
			session()->forger('cart');

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
		
		$subToTal = 0;
		$delivery = 0;
		$discount = 0;

		foreach ($products as $product) {
			$subToTal += $product->price * $productData[$product->id] * ((100 - $product->sale_off) / 100);
		}
		$toTalFinal = $subToTal + $delivery - $discount;
		return view('order.order-list', [
			'products' => $products,
			'productData' => $productData,
			'subToTal' => $subToTal,
			'delivery' => $delivery,
			'discount' => $discount,
			'toTalFinal' => $toTalFinal,
		]);
	}
	public function updateNumder(Request $request)
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
		
		$subToTal = 0;
		$delivery = 0;
		$discount = 0;
		$tax = 1;

		foreach ($products as $product) {
			$subToTal += $product->price * $productData[$product->id] * ((100 - $product->sale_off) / 100);
		}
		$toTalFinal = $subToTal + $delivery - $discount;
		$toTalFinalCheckout = $toTalFinal + $tax;
		return view('order.chekout', [
			'products' => $products,
			'productData' => $productData,
			'subToTal' => $subToTal,
			'delivery' => $delivery,
			'discount' => $discount,
			'toTalFinal' => $toTalFinal,
			'tax' => $tax,
			'toTalFinalCheckout' =>$toTalFinalCheckout,
		]);
	}
	public function checkoutBilling(Request $request)
	{
		$input = $request->only([
			'couponCode',
			'name',
			'email',
			'phone',
			'address',
			'city',
			'appartment',
			'district',
			'toTalFinal',
			'tax',
			'toTalFinalCheckout',
		]);
		$orderData = session('cart');

		$data = [
			'couponCode' => $input['couponCode'],
			'name' => $input['name'],
			'email' => $input['email'],
			'phone' => $input['phone'],
			'address' => $input['address'],
			'city' =>$input['city'],
			'appartment' => $input['appartment'],
			'district' => $input['district'],
			'toTalFinal' => $input['toTalFinal'],
			'tax' => $input['tax'],
			'toTalFinalCheckout' => $input['toTalFinalCheckout'],
		];
		try {
			$order = $this->orderModel->create($data);

			$orderId = $order->id;
			$productOrderData = [];

			foreach ($orderData as $product) {
				$productId = $product['id'];
				$productRecord = $this->productModel->find($productId);
				$productOrderData[] = [
					'order_id' => $orderId,
					'product_id' =>$productId,
					'price' => (int) $productRecord->price,
					'sale_off' => $productRecord->sale_off,
					'quantity' => $product['quantity'],
				];
			}
			$this->orderProductModel->insert($productOrderData);
			
			session()->flush();
		} catch (\Exception $e) {
			\Log::error($e);
		}
		return json_encode(['status' => true]);
	}
}
