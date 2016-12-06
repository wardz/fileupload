@extends('layouts.app')

@section('title', 'Browse projects')
@section('description', 'TODO')

@section('content')
	<div class="container">
		<div class="row">
			<h3>Select categories</h3>

			<div class="collection">
				<a href="{{ action('ProjectBrowseController@show', 'all') }}" class="collection-item">
					<span>All</span>
				</a>

				@foreach ($tags as $tag)
					<a href="{{ action('ProjectBrowseController@show', $tag) }}" class="collection-item">
						<span>{{ $tag }}</span>
					</a>
				@endforeach
			</div>
		</div>
	</div>
@endsection
