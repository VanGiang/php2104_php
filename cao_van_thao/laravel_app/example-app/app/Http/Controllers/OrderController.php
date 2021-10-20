<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class OrderController extends Controller
{
	protected $productModel;

	public function __construct(Product $product)
	{
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
	public function orderList(Request $request)
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
		$toTal = $subToTal + $delivery - $discount;
		return view('order.order-list', [
			'products' => $products,
			'productData' => $productData,
			'subToTal' => $subToTal,
			'delivery' => $delivery,
			'discount' => $discount,
			'toTal' => $toTal,

	]);
	}
}
