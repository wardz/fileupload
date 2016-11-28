@extends('layouts.app')

@section('title', 'Edit project')

@section('content')
<div class="container">
	<div class="row">
		<div class="center">
			<a class="btn-floating btn-large waves-effect waves-light red jquery-postback" href="#!" data-href="{{ action('ProjectController@destroy', $project->getSlug()) }}" data-method="delete">
				<i class="material-icons">delete</i>
			</a>
		</div>

		{!! Form::model($project, [
			'method' => 'PATCH',
			'files' => true,
			'action' => ['ProjectController@update', $project->name],
			'class' => 'col s12'
		]) !!}

			@include('project.form')
		
		{!! Form::close() !!}
	</div>
</div>
@endsection
