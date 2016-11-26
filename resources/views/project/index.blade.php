@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<h3>Your projects</h3>
			
			<table class="bordered highlight" style="cursor: pointer">
				<thead>
					<tr>
						<th data-field="name" onclick="window.location = '{{ url('project?column=name') }}'">*Name</th>
						<th data-field="tags">Tags</th>
						<th data-field="date" onclick="window.location = '{{ url('project?column=updated_at') }}'">*Last change</th>
					</tr>
				</thead>
				<tbody>
					@foreach($projects as $project)
						<tr onclick="window.location = '{{ action('ProjectController@show', $project->name) }}'">
							<td>
								{{ $project->name }}
							</td>

							<td>
								@foreach ($project->tag_list as $tag)
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