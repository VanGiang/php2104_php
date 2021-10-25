<x-admin-layout>
    <div class="card card-warning">
      <div class="card-header">
        <h3 class="card-title">Update Product</h3>
      </div>
      @include('partials.admin.from-category', [
        'action' => route('admincategories.update',['category' => $categories->id]),
        'method' => 'PUT',
      ])
    </div>
</x-admin-layout>