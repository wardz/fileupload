@if (count(Request::segments()) > 0)
	<nav class="breadcrumb-nav">
		<div class="nav-wrapper">
			<div class="col s12">
				<a href="{{ url('/') }}" class="breadcrumb">Home</a>

				@for ($i = 1; $i <= count(Request::segments()); $i++)
					<a href="{{ url(Request::segment($i)) }}" class="breadcrumb"> {{ Request::segment($i) }} </a>
				@endfor
			</div>
		</div>
	</nav>
@endif