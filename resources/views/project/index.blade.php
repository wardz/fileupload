@extends('layouts.app')

@section('title', 'Your projects')

@section('content')
	<div class="container">
		<div class="row">
			<h3>Your projects</h3>

			<div class="row">
				<div class="col s6">
					<a href="{{ action('ProjectController@create') }}" class="btn waves-effect waves-light">Create new
						<i class="material-icons right">note_add</i>
					</a>
				</div>
			</div>

			<table class="bordered highlight" style="cursor: pointer">
				<thead>
					<tr>
						<th data-field="name">Name</th>
						<th data-field="tags">Tags</th>
						<th data-field="date">Last change</th>
					</tr>
				</thead>
				<tbody>
					@foreach($projects as $project)
						<tr onclick="window.location = '{{ action('ProjectController@show', $project->getSlug()) }}'">
							<td>
								{{ $project->name }}
							</td>

							<td>
								@foreach ($project->tag_list_name as $tag)
									<div class="chip">
										{{ $tag }}
									</div>
								@endforeach
							</td>

							<td>{{ $project->updated_at }}</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>

		{!! $projects->links() !!}
	</div>
@endsection