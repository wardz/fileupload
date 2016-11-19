@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">TODO</div>

                <div class="panel-body">
					{!! Form::model($addon, ['method' => 'PATCH', 'files' => true, 'action' => ['AddonUploadController@update', $addon->id]]) !!}
						@include('addon.form');
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
