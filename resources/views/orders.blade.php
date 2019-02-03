@extends('layouts.app')
@section('content')
	<div class="content">
		<div class="table-responsive">
			<table class="table table-striped">
				<thead>
				<tr>
					<th>{{ __('system.id') }}</th>
					<th>{{ __('system.partner') }}</th>
					<th>{{ __('system.price_total') }}</th>
					<th>{{ __('system.name') }}</th>
					<th>{{ __('system.status') }}</th>
				</tr>
				</thead>
				<tbody>
				@foreach($orders as $order)
					<tr>
						<td><a href="{{ route('orders.edit', $order->id) }}">{{ $order->id }}</a></td>
						<td>{{ $order->partner->name }}</td>
						<td>
							{{ $order->getTotalPrice() }}
						</td>
						<td>
							{{ $order->getProductsNames() }}
						</td>
						<td>{{ $order->getStatus($order->status) }}</td>
					</tr>
				@endforeach
				
				</tbody>
			</table>
		</div>
		<ul class="pagination">
			{{$orders->links()}}
		</ul>
	</div>
@endsection