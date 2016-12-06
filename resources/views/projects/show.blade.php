@extends('layouts.app')

@section('title', 'Browse projects')
@section('description', 'TODO')

@section('content')
	<div class="container">

		<h5>{!! $projects->total() !!} results.</h5>
		{!! $projects->links() !!}

		<div class="row">
			<button class="waves-effect waves-light btn hide-on-med-and-up" id="projects-show-btn">Show options</button>
		</div>

		<div class="row">
			<div class="col s12 m4 right hide-on-small-only" id="projects-widgets">
				<div class="input-field">
					<select>
						<option value="1" selected>Date</option>
						<option value="2">Name</option>
						<option value="3">Downloads</option>
					</select>

					<label>Sort by</label>
				</div>

				<div class="col">
					<h5>Narrow by related tags</h5>
					@foreach ($tags as $tag)
						<p>
							{!! Form::checkbox($tag, $tag, isChecked($tag), [
								'id' => $tag,
								'class' => 'tag-select'
							]) !!}
							<label for="{{ $tag }}">{{ $tag }}</label>
						</p>
					@endforeach
				</div>
			</div>


			<div class="scroll-on-med-and-up">
				@foreach ($projects as $project)
					<div class="row">
						<div class="col s11 m11">
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
			</div>

		</div>
	</div>
@endsection
