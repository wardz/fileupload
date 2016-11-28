<li>
	<a href="{!! action('ProjectBrowseController@index') !!}">Browse projects</a>
</li>

@if (Auth::user())
	<li>
		<a href="{!! action('ProjectController@index') !!}">My Projects</a>
	</li>
@endif

<li>
	<a href="{!! url('/help') !!}">Help</a>
</li>