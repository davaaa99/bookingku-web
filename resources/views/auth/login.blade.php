@extends('layouts.auth')

@section('content')
<template>
    <div id="login" class="position-relative d-flex">
        <div class="container d-flex align-items-center justify-content-center justify-content-sm-center flex-column mt-auto mb-auto">
            <div class="login-header d-flex flex-column align-items-center">
                <div class="d-flex mb-n3">
                    <img src="{{asset('logo/logo.png')}}" width="30" height="30" alt="" class="mr-3 mt-2">
                    <p>BOOKINGKU</p>
                </div>
                <p class="sub-title">Welcome back! Please login to your account.</p>
            </div>
            <div class="spacer-50"></div>
            <form id="login-form" method="POST" action="{{ route('login') }}">
                @csrf

                <div class="login-label">
                    <label for="email">{{ __('E-Mail Address') }}</label>
                    <input id="email" type="email" class="login-input form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="spacer-10"></div>
                <div class="login-label mt">
                    <label for="password">{{ __('Password') }}</label>
                    <input id="password" type="password" class="login-input form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="login-checkbox d-flex">
                    <input class="pt-1" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="pl-2" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                    @if (Route::has('password.request'))
                    <a class="sub-title ml-auto" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                    @endif
                </div>
                <div class="spacer-20"></div>
                <div class="login-footer d-flex">
                    <button type="submit" class="btn login-button">
                        {{ __('Login') }}
                    </button>
                    <a href="{{ route('clientregister') }}" class="btn signup-button">
                        {{ __('Sign up') }}
                    </a>
                </div>
                <script type="application/javascript">
                    var msg = '{{Session::get('alert ')}}';
                    var exist = '{{Session::has('alert ')}}';
                    if (exist) {
                        alert(msg);
                    }
                </script>
            </form>
        </div>
    </div>
</template>
@endsection