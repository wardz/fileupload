<li class="{!! isActiveUrl('/projects') !!}">
	<a href="{!! action('ProjectBrowseController@index') !!}">Browse projects</a>
</li>

@if (Auth::user())
	<li class="{!! isActiveUrl('/project') !!}">
		<a href="{!! action('ProjectController@index') !!}">My Projects</a>
	</li>
@endif

<li class="{!! isActiveUrl('/help') !!}">
	<a href="{!! url('/help') !!}">Help</a>
</li>