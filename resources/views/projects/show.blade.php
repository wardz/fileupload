@extends('layouts.app')

@section('title', 'Browse projects')
@section('description', 'TODO')

@section('content')
	<div class="container">

		<!-- Dropdown Trigger -->
		<a class='dropdown-button btn' href='#' data-activates='dropdown1'>Sort by..</a>

		<!-- Dropdown Structure -->
		<ul id='dropdown1' class='dropdown-content'>
			<li><a href="#sname">Name</a></li>
			<li><a href="#sdl">Downloads</a></li>
			<li><a href="#sdate">Date</a></li>
		</ul>

		{!! $projects->links() !!}
		@foreach ($projects as $project)
			<div class="row">
				<div class="col s6">
					<h2 class="header">{{ $project->name }}</h2>
					<div class="card horizontal">
						<div class="card-image">
							<img src="{{ $project->image }}">
						</div>
						
						<div class="card-stacked">
							<div class="card-content">
								<p>{{ $project->description }}</p>
							</div>
							<div class="card-action">
								<a href="{{ action('ProjectController@show', $project->name) }}">Show</a>
								<span class="right">By {{ $project->user->name }}</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		@endforeach

		{!! $projects->links() !!}
	</div>
@endsection
