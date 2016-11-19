<div class="form-group{!! $errors->has($name) ? ' has-error' : '' !!}">
	{!! Form::label($name, $label) !!}
	{!! Form::text($name, !empty($value) ? $value : null, ['class' => 'form-control']) !!}

	@if ($errors->has($name))
		<span class="help-block">
			<strong>{{ $errors->first($name) }}</strong>
		</span>
	@endif
</div>