@extends('layouts.app')

@section('title', '500')

@section('content')
<div class="container">
    <div class="row">
        <h1>Internal Server Error</h1>
        <p class="flow-text">Sorry, we were not able to process your request on our end.<br>
        Please try again shortly. If this continues over time, you can contact us: <a href="{!! url('/contact') !!}">here</a>
        </p>
    </div>
</div>
@endsection
