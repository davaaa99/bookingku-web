@extends('layouts.admin')
@section('content')

<verify-component inline-template="inline-template">
    <div id="verify-booking">
        <div class="container">
            <div class="table-box">
                <div class="spacer-50"></div>
                <div class="title">Verify Booking</div>
                <div class="spacer-50"></div>
                <booking-list></booking-list>
                <div class="spacer-50 "></div>
            </div>
            <div class="spacer"></div>
        </div>
    </div>
</verify-component>
@endsection
