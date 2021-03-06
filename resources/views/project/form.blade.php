<?php
	if (isset($project) && !isset($project->files)) {
		$project->files = [];
	}
?>

<div class="row">
	<div class="input-field col s6">
		{{ Form::text('name', null, [
			'class' => 'validate',
			'id' => 'name',
			'placeholder' => 'Test...',
			'pattern' => '[A-Za-z]{3,32}',
			'title' => 'Name may only contain letters A to Z, with a max length of 32 characters.',
			'required'
		]) }}

		<label for="name" data-error="{!! $errors->first('name') !!}">Project name</label>
	</div>
</div>

<div class="row">
	<div class="input-field col s6">
		{{ Form::text('license', null, [
			'class' => 'validate',
			'id' => 'license',
			'placeholder' => 'MIT...',
			'pattern' => '[A-Za-z0-9]{3,32}',
			'title' => 'License may only contain letters A to Z, and digits 0 to 9, with a max length of 50 characters.',
			'required'
		]) }}

		<label for="license" data-error="{!! $errors->first('license') !!}">License name</label>
	</div>
</div>

<div class="row">
	<div class="input-field col s6">

		{{ Form::select('tag_list[]', $tags, isset($project) ? $project->tagList : null, [
			'class' => 'validate',
			'id' => 'select_tag',
			'multiple',
			'required'
		]) }}

		<label for="select_tag" data-error="{!! $errors->first('tag_list') !!}">Select categories</label>

		@if ($errors->has('tag_list'))
			<!-- Materialize doesn't seem to like 'invalid' class for select so we'll have to add our own error msg-->
			<div><strong class="red-text text-darken-1"> {!! $errors->first('tag_list') !!} </strong></div>
		@endif
	</div>
</div>

<div class="row">
	<div class="input-field col s6">
		{{ Form::textarea('description', null, [
			'class' => 'materialize-textarea validate',
			'id' => 'description',
			'placeholder' => 'Lorem ipsum...',
			'pattern' => '.{10,999}',
			'title' => 'Description requires minimum 10 characters and below 999 characters.',
		]) }}

		<label for="description" data-error="{!! $errors->first('description') !!}">Description</label>
	</div>
</div>

<div class="row">
	<div class="input-field col s6">
		{{ Form::text('file_version', isset($project) ? $project->files->first()->file_version : null, [
			'class' => 'validate',
			'id' => 'file_version',
			'placeholder' => 'v1...',
			'pattern' => '[A-Za-z0-9.]{1,32}',
			'title' => 'Version may only contain letters A to Z and ".", and digits 0 to 9, with a max length of 20 characters.',
		]) }}

		<label for="file_version" data-error="{!! $errors->first('file_version') !!}">Version</label>
	</div>
</div>

<div class="row">
	<div class="input-field col s6">
		{{ Form::textarea('file_changelog', isset($project) ? $project->files->first()->file_changelog : null, [
			'class' => 'materialize-textarea validate',
			'id' => 'file_changelog',
			'placeholder' => 'ipsum dolor sit amet consectetur.',
			'pattern' => '.{10,999}',
			'title' => 'Changelog requires minimum 10 characters and below 999 characters.',
		]) }}

		<label for="file_changelog" data-error="{!! $errors->first('file_changelog') !!}">Changelog</label>
	</div>
</div>

<div class="row">
	<div><label for="file">Select file</label></div>

	<div class="file-field input-field col s6">
		<div class="btn">
			<span>File</span>
			{!! Form::file('file') !!}
		</div>

		<div class="file-path-wrapper">
			<input class="file-path validate" id="file" type="text"
				value="{{ isset($project) ? $project->files->first()->file_name : null }}">
		</div>
	</div>

	@if ($errors->has('file'))
		<div><strong class="red-text text-darken-1"> {!! $errors->first('file') !!} </strong></div>
	@endif
</div>

<div class="row">
	<div class="col s6">
		<button type="submit" class="btn waves-effect waves-light" name="submit">Submit
			<i class="material-icons right">send</i>
		</button>
	</div>
</div>
