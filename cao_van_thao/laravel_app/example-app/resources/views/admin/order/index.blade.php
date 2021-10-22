<x-admin-layout>
    <div class="card">
		<div class="card-body">
			<table class="table table-bordered">
				<thead>
				<tr>
					<th>Id</th>
					<th style="width: 10px; height: 15px;">Name</th>
					<th>user_id</th>
					<th>phone</th>
					<th>address</th>
					<th>email</th>
					<th>city</th>
					<th>appartment</th>
					<th>district</th>
                    <th>toTalFinal</th>
					<th>tax</th>
                    <th>toTalCheckout</th>
					<th>couponCode</th>
                    <th>status</th>
				</tr>
				</thead>
				<tbody>
				@php
					$index = (( $orders->currentPage() - 1) * $orders->perPage()) + 1;
				@endphp
				@foreach ($orders as $order)
				<tr>
					<td>{{ $index }}.</td>
                    @php
						$index++;
					@endphp
					<td>{{ $order->name }}</td>
					<td>{{ $order->user_id }}</td>
					<td>{{ $order->phone }}</td>
					<td>{{ $order->address }}</td>
					<td>{{ $order->email }}</td>
					<td>{{ $order->city }}</td>
					<td>{{ $order->appartment }}</td>
                    <td>{{ $order->district }}</td>
                    <td>{{ $order->toTalFinal }}</td>
                    <td>{{ $order->tax }}</td>
                    <td>{{ $order->toTalFinalCheckout }}</td>
                    <td>{{ $order->couponCode }}</td>
                    <td>{{ $order->status }}</td>
				 </tr> 
				@endforeach
				</tbody>
			</table>
		</div>
		<div class="card-footer clearfix">
			{{ $orders->links('partials.my-pagination') }}
		</div>
	</div>
	@include('partials.admin.from-delete')
</x-admin-layout>