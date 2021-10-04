<x-admin-layout>
<div class="card">
  <div class="card-header">
    <!-- Alert -->
    @if (session('msg'))
      <div id="toastsContainerTopRight" class="toasts-top-right fixed">
        <div class="toast bg-success fade show" role="alert" aria-live="assertive" aria-atomic="true">
          <div class="toast-header">
            <strong class="mr-auto">Message</strong>
            <small>Product</small>
            <button id="close-alert" data-dismiss="toast" type="button" class="ml-2 mb-1 close close-alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="toast-body">{{ session('msg') }}</div>
        </div>
      </div>
    @elseif (session('error'))
      <div id="toastsContainerTopRight" class="toasts-top-right fixed">
        <div class="toast bg-danger fade show" role="alert" aria-live="assertive" aria-atomic="true">
          <div class="toast-header">
            <strong class="mr-auto">Message</strong>
            <small>Product</small>
            <button id="close-alert" data-dismiss="toast" type="button" class="ml-2 mb-1 close close-alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="toast-body">{{ session('error') }}</div>
        </div>
      </div>
    @endif
    <h3 class="card-title">Products Table</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th style="width: 10px">#</th>
          <th>Name</th>
          <th>Image</th>
          <th>Size</th>
          <th>Quantity</th>
          <th>Price</th>
          <th>Category</th>
          <th>Public</th>
          <th>Creator</th>
          <th style="width: 40px">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($products as $product)
          <tr>
            <td>{{ $loop->iteration + ($products->currentPage() - 1) * $products->perPage() }}.</td>
            <td>
              <a href="{{ route('product.info', ['id' => $product->id]) }}" target="_blank">
                {{ $product->name }}
              </a>
            </td>
            <td>
              <img src="{{ showProductImage($product->image) }}" 
              alt="{{ $product->name }}" 
              class="img-fluid"
              style="width: 60px; height: 45px;">
            </td>
            <td>{{ $product->size }}</td>
            <td>{{ $product->quantity }}</td>
            <td>${{ $product->price }}</td>
            <td><span class="badge bg-primary">{{ $product->category->name }}</span></td>
            @if ($product->is_public == 1)
              <td>Yes</td>
            @elseif ($product->is_public == 0)
              <td>No</td>
            @endif
            <td>{{ $product->user->name }}</td>
            <td>
              <div class="btn-group btn-group-sm">
                <a href="{{ route('product.info', ['id' => $product->id]) }}" class="btn btn-success" target="_blank">
                  <i class="fas fa-eye"></i>
                </a>
                <a href="{{ route('admin.products.edit', ['product' => $product->id]) }}" class="btn btn-info"><i class="fas fa-pen"></i></a>
                <button type="button" 
                  class="btn btn-danger confirm-delete" 
                  data-toggle="modal" 
                  data-target="#modal-danger"
                  data-url="{{ route('admin.products.destroy', ['product' => $product->id]) }}">
                  <i class="fas fa-trash"></i>
                </button>
              </div>
              </td>
            <!-- <td>
              <div class="progress progress-xs">
                <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
              </div>
            </td> -->
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <!-- /.card-body -->
  {{ $products->links('admin.partials.admin-paginate') }}
</div>

@include('admin.partials.admin-form-delete')

@section('script-close-alert')
<script type="text/javascript">
  $(document).ready(function() {
    $('#close-alert').click(function() {
      $('#toastsContainerTopRight').remove();
    });
  });
</script>
@endsection
</x-admin-layout>