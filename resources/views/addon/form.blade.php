<fieldset>
	<legend>Addon information</legend>

	@include('addon.textinput', ['name' => 'name', 'label' => 'Addon name'])
	@include('addon.textinput', ['name' => 'author', 'label' => 'Author'])
	@include('addon.textinput', ['name' => 'license', 'label' => 'License'])

	<div class="form-group{!! $errors->has('category_id') ? ' has-error' : '' !!}">
		{!! Form::label('category', 'Select category') !!}
		{!! Form::select('category_id', config('addonCategories.vanilla'), null, ['class' => 'form-control']) !!}
		@if ($errors->has('category_id'))
			<span class="help-block">
				<strong>{{ $errors->first('category_id') }}</strong>
			</span>
		@endif
	</div>

	<div class="form-group{!! $errors->has('description') ? ' has-error' : '' !!}">
		{!! Form::label('description', 'Description') !!}
		{!! Form::textarea('description', null, ['class' => 'form-control']) !!}
		@if ($errors->has('description'))
			<span class="help-block">
				<strong>{{ $errors->first('description') }}</strong>
			</span>
		@endif
	</div>
</fieldset>

<fieldset>
	<legend>File information</legend>

	@include('addon.textinput', ['name' => 'version', 'label' => 'Version', 'value' => !empty($addon->files) ? $addon->files->version : null])

	<div class="form-group{!! $errors->has('changelog') ? ' has-error' : '' !!}">
		{!! Form::label('changelog', 'Changelog') !!}
		{!! Form::textarea('changelog', !empty($addon->files) ? $addon->files->changelog : null, ['class' => 'form-control']) !!}
		@if ($errors->has('changelog'))
			<span class="help-block">
				<strong>{{ $errors->first('changelog') }}</strong>
			</span>
		@endif
	</div>

	<div class="form-group{!! $errors->has('file') ? ' has-error' : '' !!}">
		{!! Form::label('file', 'Select file') !!}
		{!! Form::file('file') !!}
		@if ($errors->has('file'))
			<span class="help-block">
				<strong>{{ $errors->first('file') }}</strong>
			</span>
		@endif
	</div>
</fieldset>

<input class="btn btn-primary" type="submit" value="Submit">
