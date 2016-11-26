@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <h3>Authentication</h3>

        <form class="col s12" role="form" method="POST" action="{!! url('/login') !!}">
            {!! csrf_field() !!}

            <div class="row">
                <div class="input-field col s6">
                    <i class="material-icons prefix">email</i>
                    <input type="email" class="validate" id="email" name="email" value="{{ old('email') }}" required autofocus>
                    <label for="email" data-error="{!! $errors->first('email') !!}">E-Mail Address</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s6">
                    <i class="material-icons prefix">lock</i>
                    <input type="password" class="validate" name="password" id="password" required>
                    <label for="password" data-error="{!! $errors->first('password') !!}">Password</label>
                </div>
            </div>

            <div class="row">
                <div class="col s6">
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember">Remember me</label>
                </div>
            </div>

            <div class="row">
                <div class="col s6">
                    <label>Human verification
                        {!! Recaptcha::render() !!}

                        @if ($errors->has('g-recaptcha-response'))
                            <strong class="red-text text-darken-1">{!! $errors->first('g-recaptcha-response') !!}</strong>
                        @endif
                    </label>
                </div>
            </div>

            <div class="row">
                <div class="col s6">
                    <button type="submit" class="btn waves-effect waves-light">Login
                        <i class="material-icons right">send</i>
                    </button>

                    <a href="{!! url('/password/reset') !!}">
                        Forgot Your Password?
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
