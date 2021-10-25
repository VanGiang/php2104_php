<x-admin-layout>
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Create A New Category !</h3>
    </div>
    <!-- /.card-header -->
    @include('admin.partials.admin-form-category', [
      'action' => route('admin.category.store'),
      'method' => 'POST'
    ])  

    <!-- /.card-body -->
  </div>
</x-admin-layout>