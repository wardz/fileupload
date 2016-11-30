@extends('layouts.app')

@section('title', $project->name)
@section('description', $project->description)

@section('content')
	<div class="container">
		@if ($project->userOwned())
			<div class="left">
				<a class="btn-floating btn-large waves-effect waves-light red" href="{{ action('ProjectController@edit', $project->getSlug()) }}">
					<i class="material-icons">mode_edit</i>
				</a>
			</div>
		@endif

		<div class="row">
			<div class="col s12 m7">
				<div class="card large">
					<div class="card-image">
						<img src="{{ $project->image }}">
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

			@if ($project->files->first())
				<ul class="collection col s12 m4">
					@foreach ($project->files->all() as $file)
						<li class="collection-item avatar">
							<a href="{!! action('DownloadController@get', $file->id) !!}">
								<i class="material-icons circle">folder</i>
								<span class="title">{{ $file->file_name }}</span>
								<span class="title right">{{ $file->file_downloads }} downloads</span>
								<p>{{ $file->file_version }}
								<br>
								{{ $file->file_size }}
								</p>
							</a>
						</li>
					@endforeach
				</ul>
			@else
				<p class="text-grey text-darken-4">No files uploaded</p>
			@endif
		</div>

		@foreach ($project->tag_list_name as $tag)
			<div class="chip">
				{{ $tag }}
			</div>
		@endforeach
	</div>
@endsection
