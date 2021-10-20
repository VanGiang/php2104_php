<x-my-app-layout>
	<section id="aa-catg-head-banner">
		<img src="/themes/dailyShop/img/fashion/fashion-header-bg-8.jpg" alt="fashion img">
		<div class="aa-catg-head-banner-area">
			<div class="container">
				<div class="aa-catg-head-banner-content">
					<h2>Cart Page</h2>
					<ol class="breadcrumb">
						<li><a href="{{ route('home-page') }}">Home</a></li>                   
						<li class="active">Cart</li>
					</ol>
				</div>
			</div>
		</div>
	</section>
	<section id="cart-view">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="cart-view-area">
						<div class="cart-view-table">
							<form action="">
								<div class="table-responsive">
									 <table class="table">
										 <thead>
											 <tr>
												 <th></th>
												 <th></th>
												 <th>Product</th>
												 <th>Price</th>
												 <th>sale_off</th>
												 <th>Quantity</th>
												 <th>Total</th>
											 </tr>
										 </thead>
										 <tbody>									
											 @foreach ($products as $product)
												<tr>
													<td><a class="remove delete-product" 
														data-product_id="{{ $product->id }}" href="#">
														<fa class="fa fa-close"></fa></a>
													</td>
													<td><a href="{{ route('products.product-detail', ['id' => $product->id]) }}"><img src="{{ showImageProduct($product->image) }}" alt="img"></a></td>
													<td><a class="aa-cart-title" href="{{ route('products.product-detail', ['id' => $product->id]) }}">{{ $product->name }}</a></td>
													<td>${{ $product->price }}</td>
													<td>{{ $product->sale_off }}%</td>
													<td><input class="aa-cart-quantity" type="text" value="{{ $productData[$product->id] }}" minlength="1" maxlength="100"></td>
													<td>${{ $product->price * $productData[$product->id] * ((100-$product->sale_off) / 100) }}</td>
												</tr>
											 @endforeach
											 <tr>
												 <td colspan="6" class="aa-cart-view-bottom">
													 <div class="aa-cart-coupon">
														 <input class="aa-coupon-code" type="text" placeholder="Coupon">
														 <input class="aa-cart-view-btn" type="submit" value="Apply Coupon">
													 </div>
												 </td>
											 </tr>
											</tbody>
									 </table>
								 </div>
							</form>
							<!-- Cart Total view -->
							<div class="cart-view-total">
								<h4>Cart Totals</h4>
								<table class="aa-totals-table">
									<tbody>
										<tr>
											<th>Subtotal</th>
											<td>${{ $subToTal }}</td>
										</tr>
										<tr>
											<th>Delivery</th>
											<td>${{ $delivery }}</td>
										</tr>
										<tr>
											<th>Discount</th>
											<td>${{ $discount }}</td>
										</tr>
										<tr>
											<th>Total</th>
											<td>${{ $toTal }}</td>
										</tr>
									</tbody>
								</table>
								<a href="#" class="aa-cart-view-btn">Proced to Checkout</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	@section('script')
	<script type="text/javascript">
		$(document).ready(function() {
			$('.delete-product').click(function(e) {
				e.preventDefault();
				
				var productEL = $(this).parent().parent();

				var product_id = $(this).data('product_id');
	
				var url = "{{ route('order.remove') }}";
				Swal.fire({
					title: 'Are you sure?',
					text: "You won't be able to revert this!",
					icon: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Yes, delete it!'
				}).then((result) => {
					if (result.isConfirmed) {
						$.ajax(url, {
							type: 'POST',
							data: {
								product_id: product_id,
							},
							success: function (data) {
								console.log('success');
								
								var objData = JSON.parse(data);
								var newQuantity = Object.size(objData.cart);

								$('.cart-quantity').text(newQuantity);
								productEL.remove();
							},
							error: function () {
								console.log('fail');

								Swal.fire({
									position: 'center',
									icon: 'error',
									title: 'Failed!',
									showConfirmButton: false,
									timer: 1000
								});
							}
						});
						Swal.fire(
							'Deleted!',
							'Your file has been deleted.',
							'success'
						)
					}
				})
			});
		});
	</script>
	@endsection
</x-my-app-layout>