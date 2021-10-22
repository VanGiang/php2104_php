<x-my-app-layout>
<section id="aa-catg-head-banner">
	<img src="/themes/dailyShop/img/fashion/fashion-header-bg-8.jpg" alt="fashion img">
	<div class="aa-catg-head-banner-area">
		<div class="container">
		<div class="aa-catg-head-banner-content">
			<h2>Checkout Page</h2>
			<ol class="breadcrumb">
				<li><a href="{{ route('home-page') }}">Home</a></li>                   
				<li class="active">Checkout</li>
			</ol>
		</div>
		</div>
	</div>
</section>
<section id="checkout">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="checkout-area">
					<form action="">
						<div class="row">
							<div class="col-md-8">
								<div class="checkout-left">
									<div class="panel-group" id="accordion">
										<!-- Coupon section -->
										<div class="panel panel-default aa-checkout-coupon">
											<div class="panel-heading">
												<h4 class="panel-title">
													<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" id="">
														Have a Coupon?
													</a>
												</h4>
											</div>
											<div id="collapseOne" class="panel-collapse collapse in">
												<div class="panel-body">
													<input type="text" placeholder="Coupon Code" class="aa-coupon-code" id="couponCode">
													<input type="submit" value="Apply Coupon" class="aa-browse-btn">
												</div>
											</div>
										</div>
										<!-- Login section -->
										<div class="panel panel-default aa-checkout-login">
											<div class="panel-heading">
												<h4 class="panel-title">
													<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
														Client Login 
													</a>
												</h4>
											</div>
											<div id="collapseTwo" class="panel-collapse collapse">
												<div class="panel-body">
													<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat voluptatibus modi pariatur qui reprehenderit asperiores fugiat deleniti praesentium enim incidunt.</p>
													<input type="text" placeholder="Username or email">
													<input type="password" placeholder="Password">
													<button type="submit" class="aa-browse-btn">Login</button>
													<label for="rememberme"><input type="checkbox" id="rememberme"> Remember me </label>
													<p class="aa-lost-password"><a href="#">Lost your password?</a></p>
												</div>
											</div>
										</div>
										<!-- Billing Details -->
										<div class="panel panel-default aa-checkout-billaddress">
											<div class="panel-heading">
												<h4 class="panel-title">
													<a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
														Billing Details
													</a>
												</h4>
											</div>
											<div id="collapseThree" class="panel-collapse collapse">
												<div class="panel-body">
													<div class="row">
														<div class="col-md-6">
															<div class="aa-checkout-single-bill">
																<input type="text" placeholder="Name*" id="name">
															</div>                             
														</div>
													</div>  
													<div class="row">
														<div class="col-md-6">
															<div class="aa-checkout-single-bill">
																<input type="email" placeholder="Email*" id="email">
															</div>                             
														</div>
														<div class="col-md-6">
															<div class="aa-checkout-single-bill">
																<input type="tel" placeholder="Phone*" id="phone">
															</div>
														</div>
													</div> 
													<div class="row">
														<div class="col-md-12">
															<div class="aa-checkout-single-bill">
																<textarea cols="8" rows="3" id="address" placeholder="Address."></textarea>
															</div>                             
														</div>                            
													</div>   
													<div class="row">
														<div class="col-md-12">
															<div class="aa-checkout-single-bill">
																<select id="city">
																	<option value="Hà Nội">Hà Nội</option>
																	<option value="Hồ Chí Minh">Hồ Chí Minh</option>
																	<option value="Đà Nẵng">Đà Nẵng</option>
																	<option value="Huế">Huế</option>
																	<option value="Hải Dương">Hải Dương</option>
																	<option value="Nghệ An">Nghệ An</option>
																</select>
															</div>                             
														</div>                            
													</div>
													<div class="row">
														<div class="col-md-6">
															<div class="aa-checkout-single-bill">
																<input type="text" placeholder="Appartment, Suite etc." id="appartment">
															</div>                             
														</div>
													</div>   
													<div class="row">
														<div class="col-md-6">
															<div class="aa-checkout-single-bill">
																<input type="text" placeholder="District*" id="district">
															</div>                             
														</div>
													</div>                                    
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="checkout-right">
									<h4>Order Summary</h4>
									<div class="aa-order-summary-area">
										<table class="table table-responsive">
											<thead>
												<tr>
													<th>Product</th>
													<th>Total</th>
												</tr>
											</thead>
											<tbody>
												@foreach ($products as $product)
													<tr>
														<td>{{ $product->name }}<strong>X<span>{{ $productData[$product->id] }}</span></strong></td>
														<td>$<span class="total">{{ $product->price * $productData[$product->id] * ((100-$product->sale_off) / 100) }}</span></td>
													</tr>
												@endforeach
											</tbody>
											<tfoot>
												<tr>
													<th>Subtotal</th>
													<td>$<span id="toTalFinal">{{ $toTalFinal }}</span></td>
												</tr>
												<tr>
													<th>Tax</th>
													<td>$<span id="tax">{{ $tax }}</span></td>
												</tr>
												<tr>
													<th>Total</th>
													<td>$<span class="toTalFinalCheckout">{{ $toTalFinalCheckout }}</span></td>
												</tr>
											</tfoot>
										</table>
									</div>
									<h4>Payment Method</h4>
									<div class="aa-payment-method">                    
										<label for="cashdelivery"><input type="radio" id="cashdelivery" name="optionsRadios"> Cash on Delivery </label>
										<label for="paypal"><input type="radio" id="paypal" name="optionsRadios" checked=""> Via Paypal </label>
										<img src="https://www.paypalobjects.com/webstatic/mktg/logo/AM_mc_vs_dc_ae.jpg" border="0" alt="PayPal Acceptance Mark">    
										{{-- <input type="submit" value="Place Order" class="aa-browse-btn" id="placeOrder"> --}}
										<a href="#" class="aa-browse-btn placeOrder">Place Order</a>                
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
@section('script')
	<script type="text/javascript">
		$(document).ready(function() {
			$('.placeOrder').click(function(e) {
				e.preventDefault();

				var couponCode = $('#couponCode').val();
				var name = $('#name').val();
				var email = $('#email').val();
				var phone = $('#phone').val();
				var address = $('#address').val();
				var city = $('#city').val();
				var appartment = $('#appartment').val();
				var district = $('#district').val();
				var toTalFinal = $('#toTalFinal').text();
				var tax = $('#tax').text();
				var toTalFinalCheckout = $('.toTalFinalCheckout').text();

				var url = "{{ route('order.checkoutBilling') }}";
				$.ajax(url, {
					type: 'POST',
					data: {
						couponCode,
						name,
						email,
						phone,
						address,
						city,
						appartment,
						district,
						toTalFinal,
						tax,
						toTalFinalCheckout,
					},
					success: function (data) {
						console.log('success');

						Swal.fire({
							position: 'center',
							icon: 'success',
							title: 'thank you for your purchase',
							showConfirmButton: false,
							timer: 1500
						});
						window.location.href = '/home-page';
					},
				});
			});
		});
	</script>
@endsection
</x-my-app-layout>