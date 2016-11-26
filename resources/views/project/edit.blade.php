@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		{!! Form::model($project, [
			'method' => 'PATCH',
			'files' => true,
			'action' => ['ProjectController@update', $project->name],
			'class' => 'col s12'
		]) !!}

			@include('project.form');
		
		{!! Form::close() !!}
	</div>
</div>
@endsection
