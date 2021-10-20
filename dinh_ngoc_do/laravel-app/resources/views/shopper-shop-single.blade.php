<x-my-app-layout>
<div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="index.html">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Tank Top T-Shirt</strong></div>
        </div>
      </div>
    </div>  

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <img src="{{ showProductImage($product->image) }}" alt="{{ $product->name }}" class="img-fluid">
          </div>
          <div class="col-md-6">
            <h2 class="text-black">{{ $product->name }}</h2>
            <p>Description: {{ $product->description }}</p>
            <p>Color: </p>
            <p>Quantity: {{ $product->quantity }}</p>
            <p>Category: {{ $product->category->name }}</p>
            <p class="mb-4"></p>
            <p><strong class="text-primary h4">${{ $product->price }}</strong></p>
            <div class="mb-1 d-flex">
              <label for="option-sm" class="d-flex mr-3 mb-3">
                <span class="d-inline-block mr-2" style="top:-2px; position: relative;"><input type="radio" id="option-sm" name="shop-sizes"></span> <span class="d-inline-block text-black">Small</span>
              </label>
              <label for="option-md" class="d-flex mr-3 mb-3">
                <span class="d-inline-block mr-2" style="top:-2px; position: relative;"><input type="radio" id="option-md" name="shop-sizes"></span> <span class="d-inline-block text-black">Medium</span>
              </label>
              <label for="option-lg" class="d-flex mr-3 mb-3">
                <span class="d-inline-block mr-2" style="top:-2px; position: relative;"><input type="radio" id="option-lg" name="shop-sizes"></span> <span class="d-inline-block text-black">Large</span>
              </label>
              <label for="option-xl" class="d-flex mr-3 mb-3">
                <span class="d-inline-block mr-2" style="top:-2px; position: relative;"><input type="radio" id="option-xl" name="shop-sizes"></span> <span class="d-inline-block text-black"> Extra Large</span>
              </label>
            </div>
            <div class="mb-5">
              <div class="input-group mb-3" style="max-width: 120px;">
              <div class="input-group-prepend">
                <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
              </div>
              <input id="quantity" type="text" class="form-control text-center" value="1" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
              <div class="input-group-append">
                <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
              </div>
            </div>

            </div>
            <p>
              <a href="" class="buy-now btn btn-sm btn-primary add-to-card" 
                data-product_id="{{ $product->id }}">
                Add To Cart
              </a>
              <!-- <button type="button" class="btn btn-success toastrDefaultSuccess" style=""></button> -->
            </p>

          </div>
        </div>
      </div>
    </div>

    <div class="site-section block-3 site-blocks-2 bg-light">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7 site-section-heading text-center pt-4">
            <h2>Featured Products</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="nonloop-block-3 owl-carousel">
              @foreach ($products as $product)
              <div class="item">
                <div class="block-4 text-center">
                  <figure class="block-4-image">
                    <img src="{{ showProductImage($product->image) }}" alt="Image placeholder" class="img-fluid">
                  </figure>
                  <div class="block-4-text p-4">
                    <h3><a href="{{ route('product.info', ['id' => $product->id]) }}">{{ $product->name }}</a></h3>
                    <p class="mb-0">{{ $product->title }}</p>
                    <p class="text-primary font-weight-bold">${{ $product->price }}</p>
                  </div>
                </div>
              </div>
              @endforeach
              <!-- <div class="item">
                <div class="block-4 text-center">
                  <figure class="block-4-image">
                    <img src="/themes/shopper_fashion/images/cloth_1.jpg" alt="Image placeholder" class="img-fluid">
                  </figure>
                  <div class="block-4-text p-4">
                    <h3><a href="#">Tank Top</a></h3>
                    <p class="mb-0">Finding perfect t-shirt</p>
                    <p class="text-primary font-weight-bold">$50</p>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="block-4 text-center">
                  <figure class="block-4-image">
                    <img src="/themes/shopper_fashion/images/shoe_1.jpg" alt="Image placeholder" class="img-fluid">
                  </figure>
                  <div class="block-4-text p-4">
                    <h3><a href="#">Corater</a></h3>
                    <p class="mb-0">Finding perfect products</p>
                    <p class="text-primary font-weight-bold">$50</p>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="block-4 text-center">
                  <figure class="block-4-image">
                    <img src="/themes/shopper_fashion/images/cloth_2.jpg" alt="Image placeholder" class="img-fluid">
                  </figure>
                  <div class="block-4-text p-4">
                    <h3><a href="#">Polo Shirt</a></h3>
                    <p class="mb-0">Finding perfect products</p>
                    <p class="text-primary font-weight-bold">$50</p>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="block-4 text-center">
                  <figure class="block-4-image">
                    <img src="/themes/shopper_fashion/images/cloth_3.jpg" alt="Image placeholder" class="img-fluid">
                  </figure>
                  <div class="block-4-text p-4">
                    <h3><a href="#">T-Shirt Mockup</a></h3>
                    <p class="mb-0">Finding perfect products</p>
                    <p class="text-primary font-weight-bold">$50</p>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="block-4 text-center">
                  <figure class="block-4-image">
                    <img src="/themes/shopper_fashion/images/shoe_1.jpg" alt="Image placeholder" class="img-fluid">
                  </figure>
                  <div class="block-4-text p-4">
                    <h3><a href="#">Corater</a></h3>
                    <p class="mb-0">Finding perfect products</p>
                    <p class="text-primary font-weight-bold">$50</p>
                  </div>
                </div>
              </div> -->
            </div>
          </div>
        </div>
      </div>
    </div>

    @section('script')
    <script type="text/javascript">
      $(document).ready(function () {
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

        $('.add-to-card').click(function(e) {
          e.preventDefault();

          /* var currentQuantity = parseInt($('.count').text());
          var addMoreQuantity = parseInt($('#quantity').val());
          var newQuantity = currentQuantity + addMoreQuantity; */
     
          //Ajax
          var url = "{{ route('order.save') }}";
          var product_id = $(this).data('product_id');
          var quantity = $('#quantity').val();
          
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
              
              $('.count').text(newQuantity);

              //Alert add product to cart successfully
              Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'This product has been added to cart',
                showConfirmButton: false,
                timer: 1500
              })
            },
            error: function () {
              console.log('fail');

              Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: 'Failed!',
                showConfirmButton: false,
                timer: 1500
              })
            }
          });
        });
      });
    </script>
    @endsection

</x-my-app-layout>