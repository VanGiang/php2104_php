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
													<td>$<span class="price">{{ $product->price }}</span></td>
													<td><span class="sale-off">{{ $product->sale_off }}</span>%</td>
													<td><input class="aa-cart-quantity number-quantity" type="text"
																value="{{ $productData[$product->id] }}"
																data-product_id="{{ $product->id }}"
																minlength="1" maxlength="100"></td>
													<td>$<span class="total">{{ $product->price * $productData[$product->id] * ((100-$product->sale_off) / 100) }}</span></td>
												</tr>
											 @endforeach
											 {{-- <tr>
												 <td colspan="6" class="aa-cart-view-bottom">
													 <div class="aa-cart-coupon">
														 <input class="aa-coupon-code" type="text" placeholder="Coupon">
														 <input class="aa-cart-view-btn" type="submit" value="Apply Coupon">
													 </div>
												 </td>
											 </tr> --}}
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
											<td>$<span id="subToTal">{{ $subToTal }}</span></td>
										</tr>
										<tr>
											<th>Delivery</th>
											<td>$<span id="delivery">{{ $delivery }}</span></td>
										</tr>
										<tr>
											<th>Discount</th>
											<td>$<span id="discount">{{ $discount }}</span></td>
										</tr>
										<tr>
											<th>Total</th>
											<td>$<span id="toTalFinal">{{ $toTalFinal }}</span></td>
										</tr>
									</tbody>
								</table>
								<a href="{{ route('order.chekout') }}" class="aa-cart-view-btn">Proced to Checkout</a>
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
			$('.number-quantity').keyup(function(){
				var numberQuantity = $(this).val();
				console.log(numberQuantity);

				var trElement = $(this).closest('tr');
				var url = "{{ route('order.updateNumber') }}";
				var product_id = $(this).data('product_id');


				var price = parseInt(trElement.find('.price').text());
				var saleOff = parseInt(trElement.find('.sale-off').text());
				var totalPrice = price * numberQuantity * ((100-saleOff) / 100);
				totalPrice = Math.round(totalPrice * 100) / 100;
				console.log(totalPrice);
				var totalElement = trElement.find('.total');

				$.ajax(url, {
							type: 'PUT',
							data: {
								product_id: product_id,
								quantity: numberQuantity,
							},
							success: function (data) {
								console.log('success');

								var objData = JSON.parse(data);
								console.log(objData);

								if(objData.status === false) {
									location.reload();
								}
								totalElement.text(totalPrice);

								var subToTal = 0;
								$('.total').each(function() {
									 subToTal += parseFloat($(this).text());
									 toTasubToTallFinal = Math.round(toTalFinal * 100) / 100;
								});
								$('#subToTal').text(subToTal);
								var toTalFinal =subToTal + parseFloat($('#delivery').text()) - parseFloat($('#discount').text());
								//toTalFinal = Math.round(toTalFinal * 100) / 100;
								console.log(toTalFinal);
								$('#toTalFinal').text(toTalFinal);
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
						})
			});
		});
	</script>
	@endsection
</x-my-app-layout>