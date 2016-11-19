@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h3>Registration</h3>
        
        <form class="col s12" role="form" method="POST" action="{{ url('/register') }}">
            {{ csrf_field() }}

            <div class="row">
                <div class="input-field col s6">
                    <i class="material-icons prefix">email</i>
                    <input type="email" class="validate {!! $errors->first('email') ? 'invalid' : 'valid' !!}" name="email" id="email" value="{{ old('email') }}" required>
                    <label for="email" data-error="{!! $errors->first('email') !!}">E-Mail Address</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s6">
                    <i class="material-icons prefix">lock</i>
                    <input id="password" type="password" class="validate {!! $errors->first('password') ? 'invalid' : 'valid' !!}" name="password" required>
                    <label for="password" data-error="{!! $errors->first('password') !!}">Password</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s6">
                    <i class="material-icons prefix">lock</i>
                    <input id="password-confirm" type="password" class="validate {!! $errors->first('password_confirmation') ? 'invalid' : 'valid' !!}" name="password_confirmation" required>
                    <label for="password-confirm" data-error="{!! $errors->first('password_confirmation') !!}">Confirm Password</label>
                </div>
            </div>

            <div class="row">
                <div class="col s6">
                    <label>Human verification
                        {!! Recaptcha::render() !!}
                        @if ($errors->has('g-recaptcha-response'))
                            <b style="color:#F44336">{!! $errors->first('g-recaptcha-response') !!}</b>
                        @endif
                    </label>
                </div>
            </div>

            <div class="row">
                <div class="col s6">
                    <button type="submit" class="btn waves-effect waves-light">Register
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
