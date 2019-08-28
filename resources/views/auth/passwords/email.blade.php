@extends('layouts.auth')

@section('content')
<template>
    <div id="reset" class="position-relative d-flex">
        <div class="container d-flex align-items-center justify-content-center justify-content-sm-center flex-column mt-auto mb-auto">
            <div class="reset-header d-flex flex-column align-items-center">
                <div class="d-flex mb-n3">
                    <img src="{{asset('logo/logo.png')}}" width="30" height="30" alt="" class="mr-3 mt-2">
                    <p>BOOKINGKU</p>
                </div>
            </div>
            <div class="spacer-50"></div>
            <div class="card align-items-center">
                <div class="card-body d-flex flex-column align-items-center">
                    <div class="header">
                        <p>Forgot Your Password?</p>
                    </div>
                    <div class="reset-content d-flex flex-column align-items-center">
                        <p>Please enter your email address below.</p>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif

                        <form id="reset-form" method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="reset-label">
                                <label for="email">{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email" class="reset-input form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="spacer-20"></div>
                            <div class="reset-footer d-flex flex-column align-items-center">
                                <button type="submit" class="btn reset-button ml-auto mr-auto">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                                <div class="spacer-10"></div>
                                <a href="{{ route('login') }}">
                                    {{ __('Back to Login') }}
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="spacer-50"></div>
        </div>
    </div>
</template>
@endsection