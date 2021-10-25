<x-admin-layout>
	<div class="card card-warning">
		<div class="card-header">
			<h3 class="card-title">Create Category</h3>
		</div>
		@include('partials.admin.from-category', [
			'action' => route('admincategories.store'),
			'method' => 'POST',
		])
	</div>
</x-admin-layout>