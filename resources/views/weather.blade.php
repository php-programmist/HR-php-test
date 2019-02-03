@extends('layouts.app')

@section('content')
	@if($weather)
<h3>{{__('system.temperature')}}: {{$weather}}&deg; C</h3>
	@endif
@endsection