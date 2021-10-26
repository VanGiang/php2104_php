<x-admin-layout>
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Update Category !</h3>
    </div>
    <!-- /.card-header -->
    @include('admin.partials.admin-form-category', [
      'action' => route('admin.category.update', ['id' => $category->id]),
      'method' => 'PUT'
    ])  
    <!-- /.card-body -->
  </div>
</x-admin-layout>