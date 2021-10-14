<x-my-app-layout>
    
<!-- product category -->
<section id="aa-product-details">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="aa-product-details-area">
					<div class="aa-product-details-content">
						<div class="row">
								<!-- Modal view slider -->
							<div class="col-md-5 col-sm-5 col-xs-12">                              
								<div class="aa-product-view-slider">                                
									<div id="demo-1" class="simpleLens-gallery-container">
										<div class="simpleLens-container">
											<div class="simpleLens-big-image-container">
												<a data-lens-image="{{ $product->image }}" class="simpleLens-lens-image">
													<img src="{{ $product->image }}" class="simpleLens-big-image">
												</a>
											</div>
										</div>
										<div class="simpleLens-thumbnails-container">
											<a data-big-image="{{ $product->image }}" data-lens-image="{{ $product->image }}" class="simpleLens-thumbnail-wrapper" href="#">
												<img src="{{ $product->image }}" width="50px" height="50px">
											</a>                                    
											<a data-big-image="{{ $product->image }}" data-lens-image="{{ $product->image }}" class="simpleLens-thumbnail-wrapper" href="#">
												<img src="{{ $product->image }}" width="50px" height="50px">
											</a>
											<a data-big-image="{{ $product->image }}" data-lens-image="{{ $product->image }}" class="simpleLens-thumbnail-wrapper" href="#">
												<img src="{{ $product->image }}" width="50px" height="50px">
											</a>
										</div>
									</div>
								</div>
								</div>
								<!-- Modal view content -->
								<div class="col-md-7 col-sm-7 col-xs-12">
									<div class="aa-product-view-content">
									<h3>{{ $product->name }}</h3>
									<div class="aa-price-block">
										@if ($product->sale_off > 0)
											<span class="aa-product-price">{{ $product->price }}.000đ</span>
											<span class="aa-product-price"><del>{{ $product->price_off }}.000đ</del></span>
										@else
											<span class="aa-product-price">{{ $product->price }}.000đ</span>
										@endif
										<p class="aa-product-avilability">Avilability: <span>In stock</span></p>
									</div>
									<p>{{ $product->description }}</p>
									<h4>Size</h4>
									<div class="aa-prod-view-size">
										<a href="#">S</a>
										<a href="#">M</a>
										<a href="#">L</a>
										<a href="#">XL</a>
									</div>
									<h4>Color</h4>
									<div class="aa-color-tag">
										<a href="#" class="aa-color-green"></a>
										<a href="#" class="aa-color-yellow"></a>
										<a href="#" class="aa-color-pink"></a>                      
										<a href="#" class="aa-color-black"></a>
										<a href="#" class="aa-color-white"></a>                      
									</div>
									<div class="aa-prod-quantity">
									<form action="">
										<select name="quantity" id="quantity" class="product-quantity">
											<option value="1" selected="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
											<option value="6">6</option>
										</select>
									</form>
										<p class="aa-prod-category">
											Category: <a href="#">Polo T-Shirt</a>
										</p>
								</div>
								<div class="aa-prod-view-bottom">
									<a class="aa-add-to-cart-btn cart" data-product_id="{{ $product->id }}" href="#">Add To Cart</a>
								</div>
							</div>
						</div>
						</div>
						</div>
						<div class="aa-product-details-bottom">
						<ul class="nav nav-tabs" id="myTab2">
							<li><a href="#description" data-toggle="tab">Description</a></li>
							<li><a href="#review" data-toggle="tab">Reviews</a></li>                
						</ul>

						<!-- Tab panes -->
						<div class="tab-content">
								<div class="tab-pane fade in active" id="description">
								<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
								<ul>
									<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod, culpa!</li>
									<li>Lorem ipsum dolor sit amet.</li>
									<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>
									<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor qui eius esse!</li>
									<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam, modi!</li>
								</ul>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum, iusto earum voluptates autem esse molestiae ipsam, atque quam amet similique ducimus aliquid voluptate perferendis, distinctio!</p>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis ea, voluptas! Aliquam facere quas cumque rerum dolore impedit, dicta ducimus repellat dignissimos, fugiat, minima quaerat necessitatibus? Optio adipisci ab, obcaecati, porro unde accusantium facilis repudiandae.</p>
								</div>
								<div class="tab-pane fade " id="review">
								<div class="aa-product-review-area">
								<h4>2 Reviews for T-Shirt</h4> 
								<ul class="aa-review-nav">
										<li>
												<div class="media">
												<div class="media-left">
													<a href="#">
													<img class="media-object" src="/themes/dailyShop/img/testimonial-img-3.jpg" alt="girl image">
													</a>
												</div>
												<div class="media-body">
													<h4 class="media-heading"><strong>Marla Jobs</strong> - <span>March 26, 2016</span></h4>
													<div class="aa-product-rating">
													<span class="fa fa-star"></span>
													<span class="fa fa-star"></span>
													<span class="fa fa-star"></span>
													<span class="fa fa-star"></span>
													<span class="fa fa-star-o"></span>
													</div>
													<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
												</div>
												</div>
										</li>
										<li>
												<div class="media">
												<div class="media-left">
													<a href="#">
													<img class="media-object" src="/themes/dailyShop/img/testimonial-img-3.jpg" alt="girl image">
													</a>
												</div>
												<div class="media-body">
														<h4 class="media-heading"><strong>Marla Jobs</strong> - <span>March 26, 2016</span></h4>
														<div class="aa-product-rating">
														<span class="fa fa-star"></span>
														<span class="fa fa-star"></span>
														<span class="fa fa-star"></span>
														<span class="fa fa-star"></span>
														<span class="fa fa-star-o"></span>
														</div>
														<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
												</div>
												</div>
										</li>
								</ul>
								<h4>Add a review</h4>
								<div class="aa-your-rating">
										<p>Your Rating</p>
										<a href="#"><span class="fa fa-star-o"></span></a>
										<a href="#"><span class="fa fa-star-o"></span></a>
										<a href="#"><span class="fa fa-star-o"></span></a>
										<a href="#"><span class="fa fa-star-o"></span></a>
										<a href="#"><span class="fa fa-star-o"></span></a>
								</div>
								<!-- review form -->
								<form action="" class="aa-review-form">
										<div class="form-group">
												<label for="message">Your Review</label>
												<textarea class="form-control" rows="3" id="message"></textarea>
										</div>
										<div class="form-group">
												<label for="name">Name</label>
												<input type="text" class="form-control" id="name" placeholder="Name">
										</div>  
										<div class="form-group">
												<label for="email">Email</label>
												<input type="email" class="form-control" id="email" placeholder="example@gmail.com">
										</div>

										<button type="submit" class="btn btn-default aa-review-submit">Submit</button>
								</form>
								</div>
								</div>            
						</div>
						</div>
						<!-- Related product -->
						<div class="aa-product-related-item">
						<h3>Related Products</h3>
						<ul class="aa-product-catg aa-related-item-slider">
							<!-- start single product item -->
							<li>
								<figure>	
									<a class="aa-product-img" href="#"><img src="{{ $product->image }}" alt="polo shirt img"></a>
									<a class="aa-add-card-btn cartAuto" data-product_id="{{ $product->id }}" href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
									<figcaption>
									<h4 class="aa-product-title"><a href="#">{{ $product->name }}</a></h4>
									@if ($product->sale_off > 0)
										<span class="aa-product-price">{{ $product->price }}.000đ</span>
										<span class="aa-product-price"><del>{{ $product->price_off }}.000đ</del></span>
									@else
										<span class="aa-product-price">{{ $product->price }}.000đ</span>
									@endif
									</figcaption>
								</figure>                     
								<div class="aa-product-hvr-content">
									<a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
									<a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
									<a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>                            
								</div>
								<!-- product badge -->
								@if ($product->sale_off > 0)
									<span class="aa-badge aa-sale" href="#">{{ $product->sale_off }}%</span>
								@endif
							</li>
							<!-- start single product item -->                                                                                 
						</ul>
						<!-- quick view modal -->                  
						<div class="modal fade" id="quick-view-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-dialog">
								<div class="modal-content">                      
										<div class="modal-body">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										<div class="row">
												<!-- Modal view slider -->
											<div class="col-md-6 col-sm-6 col-xs-12">                              
												<div class="aa-product-view-slider">                                
													<div class="simpleLens-gallery-container" id="demo-1">
														<div class="simpleLens-container">
															<div class="simpleLens-big-image-container">
																<a class="simpleLens-lens-image" data-lens-image="{{ $product->image }}">
																	<img src="{{ $product->image }}" class="simpleLens-big-image">
																</a>
															</div>
														</div>
														<div class="simpleLens-thumbnails-container">
															<a href="#" class="simpleLens-thumbnail-wrapper"
																data-lens-image="{{ $product->image }}"
																data-big-image="{{ $product->image }}">
																<img src="{{ $product->image }}" width="50px" height="50px">
															</a>                                    
															<a href="#" class="simpleLens-thumbnail-wrapper"
																data-lens-image="{{ $product->image }}"
																data-big-image="{{ $product->image }}">
																<img src="{{ $product->image }}" width="50px" height="50px">
															</a>

															<a href="#" class="simpleLens-thumbnail-wrapper"
																data-lens-image="{{ $product->image }}"
																data-big-image="{{ $product->image }}">
																<img src="{{ $product->image }}" width="50px" height="50px">
															</a>
														</div>
													</div>
												</div>
											</div>
												<!-- Modal view content -->
											<div class="col-md-6 col-sm-6 col-xs-12">
												<div class="aa-product-view-content">
													<h3>{{ $product->name }}</h3>
													<div class="aa-price-block">
														@if ($product->sale_off > 0)
															<span class="aa-product-price">{{ $product->price }}.000đ</span>
															<span class="aa-product-price"><del>{{ $product->price_off }}.000đ</del></span>
														@else
															<span class="aa-product-price">{{ $product->price }}.000đ</span>
														@endif
													<p class="aa-product-avilability">Avilability: <span>In stock</span></p>
													</div>
													<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis animi, veritatis quae repudiandae quod nulla porro quidem, itaque quis quaerat!</p>
													<h4>Size</h4>
													<div class="aa-prod-view-size">
														<a href="#">S</a>
														<a href="#">M</a>
														<a href="#">L</a>
														<a href="#">XL</a>
													</div>
													<div class="aa-prod-quantity">
														<form action="">
															<select name="quantity" id="quantity" class="product-quantity">
																<option value="1" selected="1">1</option>
																<option value="2">2</option>
																<option value="3">3</option>
																<option value="4">4</option>
																<option value="5">5</option>
																<option value="6">6</option>
															</select>
														</form>
														<p class="aa-prod-category">
																Category: <a href="#">Polo T-Shirt</a>
														</p>
													</div>
													<div class="aa-prod-view-bottom">
														<a href="#" class="aa-add-to-cart-btn cart" data-product_id="{{ $product->id }}"s><span class="fa fa-shopping-cart"></span>Add To Cart</a>
														<a href="{{ route('products.product-detail', ['id' => $product->id]) }}" class="aa-add-to-cart-btn">View Details</a>
													</div>
												</div>
											</div>	
										</div>
										</div>                        
								</div><!-- /.modal-content -->
								</div><!-- /.modal-dialog -->
						</div>
						<!-- / quick view modal -->   
						</div>  
				</div>
				</div>
		</div>
	</div>
</section>
    <!-- / product category -->
@section('script')
<script type="text/javascript">
	$(document).ready(function() {
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		Object.size = function(obj) {
			var size = 0,
				key;
			for (key in obj) {
				if (obj.hasOwnProperty(key)) size++;
			}
			return size;
		};
		$(document).ready(function() {
			$('.cart').click(function(e) {
				//auto_cart
				e.preventDefault();

				// var currentQuantity = parseInt($('.cart-quantity').text());
				// var addQuantity = parseInt($('#quantity').val());
				// var newQuantity = currentQuantity + addQuantity;
				//$('.cart-quantity').text(newQuantity);
				//auto_cart
				//call ajax to server
				//lay data
				var product_id = $(this).data('product_id');
				var quantity = $('.product-quantity').val();

				var url = "{{ route('order.save') }}";

				$.ajax(url, {
						type: 'POST',
						data: {
								product_id: product_id,
								quantity: quantity,
						},
						success: function (data) {
								console.log('success');
								
								var objData = JSON.parse(data);
								var newQuantity = Object.size(objData.cart);
								console.log(objData);
								console.log(newQuantity);
								$('.cart-quantity').text(newQuantity);

								Swal.fire({
										position: 'center',
										icon: 'success',
										title: 'Add to cart success!',
										showConfirmButton: false,
										timer: 1000
									});
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
			});
			
			$('.cartAuto').click(function(e) {
					//auto_cart
					e.preventDefault();

					//var quantity = $('#quantity').val();
					var currentQuantity = parseInt($('.cart-quantity').text());
					var addQuantity = 1;
					var newQuantity = currentQuantity + addQuantity;
					console.log('newQuantity');
					console.log(newQuantity);
					$('.cart-quantity').text(newQuantity);

					Swal.fire({
							position: 'center',
							icon: 'success',
							title: 'add to cart success',
							showConfirmButton: false,
							timer: 1000
					})
					//auto_cart
			});
		});
	});
</script>
@endsection
</x-my-app-layout>
