<x-admin-layout>
    @if (session('msg'))
		<div class="alert alert-success">
			{{ session('msg') }}
		</div>
	@endif

	@if (session('error'))
		<div class="alert alert-danger">
			{{ session('error') }}
		</div>
	@endif
    <div class="card">
		<div class="card-body">
			<table class="table table-bordered">
				<thead>
				<tr>
					<th>Id</th>
                    <th>name</th>
                    <th>is_public</th>
                    <th>setting</th>
				</tr>
				</thead>
				<tbody>
				@php
					$index = (( $categories->currentPage() - 1) * $categories->perPage()) + 1;
				@endphp
				@foreach ($categories as $category)
				<tr>
					<td>{{ $index }}.</td>
                    @php
						$index++;
					@endphp
					<td>{{ $category->name }}</td>
					<td>{{ $category->is_public }}</td>
                    <td>
                        @csrf
						<div class="row">
                            <div class="col-md-4">
                                <a href="{{ route('admincategories.edit', ['category' => $category->id]) }}" class="btn btn-info btn-xs">
                                    Edit
                                </a>
                            </div>
                            <div class="col-md-4">
                                <button type="button"
                                    class="btn btn-danger btn-xs confirm-delete"
                                    data-toggle="modal"
                                    data-target="#modal-delete"
                                    data-url="{{ route('admincategories.destroy', ['category' => $category->id]) }}"
                                >
                                    Delete
                                </button>
                            </div>
						</div>
					</td>
				 </tr> 
				@endforeach
				</tbody>
			</table>
		</div>
		{{-- <div class="card-footer clearfix">
			{{ $categories->links('partials.my-pagination') }}
		</div> --}}
	</div>
	@include('partials.admin.from-delete')
</x-admin-layout>