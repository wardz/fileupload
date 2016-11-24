@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">

			@foreach($projects as $project)
				<div class="col s6">
					<div class="card small">
						<div class="card-image">
							<img src="http://static6.businessinsider.com/image/564372019dd7cc02308bdbfe-538/html-code.jpg">
						</div>

						<div class="card-content">
							<span class="card-title">{{ $project->name }}</span>
						</div>

						<div class="card-action">
							<span>{{ $project->description }}</span>
						</div>
					</div>
				</div>
			@endforeach

		</div>
	</div>
@endsection