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
    <h3 class="card-title">Products History</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th style="width: 10px">#</th>
          <th>Name</th>
          <th>Image</th>
          <th>Description</th>
          <th>Creator</th>
          <th>Update At</th>
          <th>Updated By</th>
          <th style="width: 40px">Action</th>
        </tr>
      </thead>
    </table>
  </div>
  <!-- /.card-body -->
</div>
</x-admin-layout>