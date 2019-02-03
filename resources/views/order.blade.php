@extends('layouts.app')
@section('content')
	<div class="content">
		
		{!! Form::model($order,[
            'id'=>'adminForm',
            'class'=>'form-horizontal',
            'route' => [
                'orders.update',
                'order'=>$order->id
            ],
            'method'=>'put',
        ]) !!}
		
		{{ Form::bsEmail('client_email') }}
		
		{{ Form::bsSelect(
					'partner_id',
					$partners,
					$order->partner_id,
					__('system.partner')
			) }}
		<div class="form-group row">
			<div class="col-sm-2"></div>
			<div class="col-sm-4 text-primary">{{ __('system.products') }}</div>
			<div class="col-sm-2 text-primary text-center">{{ __('system.quantity') }}</div>
		</div>
		@foreach($products as $product)
		<div class="form-group row">
			<div class="col-sm-2"></div>
			<div class="col-sm-4">{{ $product['name'] }}</div>
			<div class="col-sm-2 text-center">{{ $product['quantity'] }}</div>
		</div>
		@endforeach
		{{ Form::bsSelect(
					'status',
					$order->getStatusesList(),
					$order->status,
					__('system.status')
			) }}
		
		{{ Form::bsText('totalPrice', $order->getTotalPrice(), __('system.price_total'),['disabled'=>true] ) }}
		
		{{ Form::submit(__('system.save'),['class' => 'btn btn-success']) }}
		
		
		{!! Form::close() !!}
	</div>
@endsection