@extends('layouts.app')

@section('content')
	@if($weather)
<h3>Температура в Брянске: {{$weather}}&deg; C</h3>
	@endif
@endsection