<x-my-app-layout>
  <div class="bg-light py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mb-0"><a href="index.html">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Cart</strong></div>
      </div>
    </div>
  </div>
  
  <div class="site-section">
    <div class="container">
      <div class="row mb-5">
        <form class="col-md-12" method="post">
          <div class="site-blocks-table">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th class="product-thumbnail">Image</th>
                  <th class="product-name">Product</th>
                  <th class="product-price">Price</th>
                  <th class="product-quantity">Quantity</th>
                  <th class="product-total">Total</th>
                  <th class="product-remove">Remove</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($products as $product)
                <tr>
                  <td class="product-thumbnail">
                    <img src="{{ showProductImage($product->image) }}" alt="Image" class="img-fluid">
                  </td>
                  <td class="product-name">
                    <h2 class="h5 text-black">
                      <a href="{{ route('product.info', ['id' => $product->id]) }}" target="_blank">
                        {{ $product->name }}
                      </a>
                    </h2>
                  </td>
                  <td>$<span class="price">{{ $product->price }}</span></td>
                  <td>
                    <div class="input-group mb-3" style="max-width: 120px;">
                      <div class="input-group-prepend">
                        <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                      </div>
                      <input type="text" 
                        class="form-control text-center product-quantity" 
                        value="{{ $productData[$product->id] }}" 
                        placeholder="" 
                        aria-label="Example text with button addon" 
                        aria-describedby="button-addon1"
                        data-product_id="{{ $product->id }}"
                      >
                      <div class="input-group-append">
                        <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                      </div>
                    </div>
                  </td>
                  <td>$<span class="total">{{ $product->price * $productData[$product->id] }}</span></td>
                  <td>
                    <a href="" class="btn btn-primary btn-sm product-delete" data-product-id="{{ $product->id }}">
                      X
                    </a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </form>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="row mb-5">
            <div class="col-md-6 mb-3 mb-md-0">
              <a href="{{ route('order.list') }}" class="btn btn-primary btn-sm btn-block">Update Cart</a>
            </div>
            <div class="col-md-6">
              <a href="{{ route('shopper.shop') }}" class="btn btn-outline-primary btn-sm btn-block">Continue Shopping</a>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <label class="text-black h4" for="coupon">Coupon</label>
              <p>Enter your coupon code if you have one.</p>
            </div>
            <div class="col-md-8 mb-3 mb-md-0">
              <input type="text" class="form-control py-3" id="coupon" placeholder="Coupon Code">
            </div>
            <div class="col-md-4">
              <button class="btn btn-primary btn-sm">Apply Coupon</button>
            </div>
          </div>
        </div>
        <div class="col-md-6 pl-5">
          <div class="row justify-content-end">
            <div class="col-md-7">
              <div class="row">
                <div class="col-md-12 text-right border-bottom mb-5">
                  <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-md-6">
                  <span class="text-black">Subtotal</span>
                </div>
                <div class="col-md-6 text-right">
                  <strong class="text-black">$<span id="subtotal">{{ $subtotal }}</span></strong>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-md-6">
                  <span class="text-black">Delivery</span>
                </div>
                <div class="col-md-6 text-right">
                  <strong class="text-black">$<span id="delivery">{{ $delivery }}</span></strong>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-md-6">
                  <span class="text-black">Discount</span>
                </div>
                <div class="col-md-6 text-right">
                  <strong class="text-black"><span id="discount">{{ $discount }}</span>%</strong>
                </div>
              </div>
              <div class="row mb-5">
                <div class="col-md-6">
                  <span class="text-black">Total</span>
                </div>
                <div class="col-md-6 text-right">
                  <strong class="text-black">$<span id="total">{{ $total }}</span></strong>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <!-- <button class="btn btn-primary btn-lg py-3 btn-block" onclick="window.location='checkout.html'">
                    Proceed To Checkout
                  </button> -->
                  <a href="{{ route('order.checkout') }}" class="btn btn-primary btn-lg py-3 btn-block">Proceed To Checkout</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<section>
  @section('script')
  <script type="text/javascript">
    $(document).ready(function() {
      $('.product-delete').click(function(e) {
        e.preventDefault();

        var product_id = $(this).data('product-id');
        var url = "{{ route('order.remove') }}";
        var productEl = $(this).parent().parent();
    
        Swal.fire({
        title: 'Do you want to remove this product?',
        showDenyButton: false,
        showCancelButton: true,
        confirmButtonText: 'Remove',
        denyButtonText: `Don't save`,
        }).then((result) => {
          /* Read more about isConfirmed, isDenied below */
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

                $('.count').text(newQuantity);
                productEl.remove();

                Swal.fire('Saved!', '', 'success')
              },
              error: function (e) {
                console.log('fail');

                Swal.fire('Error, Some thing went wrong!', '', 'info')
              }
            });
          } 
        });
      });

      $('.product-quantity').keyup(function(e) {
        var newQuantity = $(this).val();

        var url = "{{ route('order.update') }}";
        var product_id = $(this).data('product_id')

        var trElement = $(this).closest('tr');
        var totalElement = trElement.find('.total');
        var price = parseInt(trElement.find('.price').text());
        var totalPrice = price * newQuantity;
        totalPrice = Math.round(totalPrice * 100) / 100;

        $.ajax(url, {
          type: 'PUT',
          data: {
            product_id: product_id,
            quantity: newQuantity,
          },
          success: function (data) {
            console.log('success');

            var objData = JSON.parse(data);

            if (objData === false) {
              location.reload();
            }

            totalElement.text(totalPrice);

            var subtotal = 0;
            var discount = parseInt($('#discount').text());
            var delivery = parseInt($('#delivery').text());

            $('.total').each(function() {
              subtotal += parseFloat($(this).text());
            });

            subtotal = Math.round(subtotal * 100) / 100;

            var totalFinal = subtotal * (1 - discount / 100) + delivery;
            totalFinal = Math.round(totalFinal * 100) / 100;

            $('#total').text(totalFinal);
          },
          error: function (e) {
            console.log('fail');

            Swal.fire('Error, Some thing went wrong!', '', 'info')
          }
        });
      });
    });
  </script>
  @endsection
</section>
</x-my-app-layout>