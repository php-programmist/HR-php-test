<nav class="col-md-2 d-none d-md-block bg-light sidebar">
	<div class="sidebar-sticky">
		<ul class="nav flex-column">
			<li class="nav-item">
				<a class="nav-link active" href="{{ url('/') }}">
					<span data-feather="home"></span>
					{{__('system.weather')}} <span class="sr-only">(current)</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="{{ url('/orders') }}">
					<span data-feather="file"></span>
					{{__('system.orders')}}
				</a>
			</li>
		</ul>
	</div>
</nav>