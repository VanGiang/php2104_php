<x-admin-layout>
<div class="card">
  <div class="card-header">
    <!-- Alert -->
    @if (session('msg'))
      <div id="toastsContainerTopRight" class="toasts-top-right fixed">
        <div class="toast bg-success fade show" role="alert" aria-live="assertive" aria-atomic="true">
          <div class="toast-header">
            <strong class="mr-auto">Message</strong>
            <small>Category</small>
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
            <small>Category</small>
            <button id="close-alert" data-dismiss="toast" type="button" class="ml-2 mb-1 close close-alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="toast-body">{{ session('error') }}</div>
        </div>
      </div>
    @endif
    <h3 class="card-title">Categories Table</h3>
  </div>
    
  <div class="card-body">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th style="width: 10px">#</th>
          <th>Name</th>
          <th>Image</th>
          <th>Quantity</th>
          <th>Public</th>
          <th style="width: 40px">Action</th>
        </tr>
      </thead>
      <tbody>
      @foreach ($categories as $category)
        <tr>
            <td>{{ $loop->iteration + ($categories->currentPage() - 1) * $categories->perPage() }}.</td>
            <td>
              <a href="#" target="_blank">
                {{ $category->name }}
              </a>
            </td>
            <td>
              <img src="{{ showProductImage($category->image) }}" 
              alt="{{ $category->name }}" 
              class="img-fluid"
              style="width: 60px; height: 45px;">
            </td>
            <td>{{ $category->quantity }}</td>
            @if ($category->is_public == 1)
              <td>Yes</td>
            @elseif ($category->is_public == 0)
              <td>No</td>
            @endif
            <td>
              <div class="btn-group btn-group-sm">
                <a href="#" class="btn btn-success" target="_blank">
                  <i class="fas fa-eye"></i>
                </a>
                <a href="{{ route('admin.category.edit', ['id' => $category->id]) }}" class="btn btn-info"><i class="fas fa-pen"></i></a>
                <button type="button" 
                  class="btn btn-danger confirm-delete" 
                  data-toggle="modal" 
                  data-target="#modal-danger"
                  data-url="{{ route('admin.category.destroy', ['id' => $category->id]) }}">
                  <i class="fas fa-trash"></i>
                </button>
              </div>
            </td>
        </tr>
      @endforeach
      </tbody>
    </table>
  </div>

  {{ $categories->links('admin.partials.admin-paginate') }}

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
