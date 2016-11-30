@extends('layouts.app')

@section('title', 'Create project')

@section('content')
	<div class="container">
		<div class="row">
			{!! Form::open(['url' => 'project', 'files' => true, 'class' => 'col s12']) !!}
				@include('project.form')
			{!! Form::close() !!}
		</div>
	</div>
@endsection
