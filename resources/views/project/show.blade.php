@extends('layouts.app')

@section('content')
	<div class="container">
		@if ($project->userOwned())
			<div class="left	">
				<a class="btn-floating btn-large waves-effect waves-light red" href="{{ action('ProjectController@edit', $project->name) }}">
					<i class="material-icons">mode_edit</i>
				</a>
			</div>
		@endif

		<div class="row">
			<div class="col s12 m7">
				<div class="card large">
					<div class="card-image">
						<img src="http://static6.businessinsider.com/image/564372019dd7cc02308bdbfe-538/html-code.jpg">
					</div>

					<div class="card-content">
						<span class="card-title">{{ $project->name }}<small class="right">{{ $project->user->name }}</small></span>
						<p>{{ $project->description }}</p>
					</div>

					<div class="card-action">
						<span>License: {{ $project->license }}</span>
						<span class="right">{{ $project->downloads }} Downloads</span>
					</div>
				</div>
			</div>

			<ul class="collection col s12 m4">
				@foreach ($project->files->all() as $file)
					<li class="collection-item avatar">
						<a href="{!! action('DownloadController@get', $file->id) !!}">
							<i class="material-icons circle">folder</i>
							<span class="title">{{ $file->file_name }}</span>
							<p>{{ $file->file_version }}
							<br>
							{{ $file->file_size }}
							</p>
						</a>
					</li>
				@endforeach
			</ul>
		</div>

		@foreach ($project->tag_list as $tag)
			<div class="chip">
				{{ $tag }}
			</div>
		@endforeach
	</div>
@endsection