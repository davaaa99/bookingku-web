@extends('layouts.auth')

@section('content')
<template>
    <div id="verify" class="position-relative d-flex">
        <div class="container d-flex align-items-center justify-content-center justify-content-sm-center flex-column mt-auto mb-auto">
            <div class="verify-header d-flex flex-column align-items-center">
                <div class="d-flex mb-n3">
                    <img src="{{asset('logo/logo.png')}}" width="30" height="30" alt="" class="mr-3 mt-2">
                    <p>BOOKINGKU</p>
                </div>
            </div>
            <div class="spacer-50"></div>
            <div class="card">
                <div class="card-body d-flex flex-column align-items-center">
                    <div class="header">
                        <p>Hello</p>
                    </div>
                    <div class="sub-title">
                        <p>Thank you for registering an account.</p>
                    </div>
                    <div class="spacer-20"></div>

                    @if (session('resent'))
                    <div class="alert alert-success" role="alert" style="font-size: 13px; text-align: center;">
                        {{ __('A fresh verification link has been sent to your email address.') }}
                    </div>
                    @endif
                    <div class="verify-content d-flex flex-column align-items-center">
                        <p>Before proceeding, please check your email for a verification link.</p>
                        <p class="mt-n3">If you did not receive the email, <span><a href="{{ route('verification.resend') }}"> click here to request another.</a></span></p>
                    </div>
                </div>
            </div>
            <div class="spacer-50"></div>
        </div>
    </div>
</template>
@endsection