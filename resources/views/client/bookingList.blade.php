@extends('layouts.client')
@section('content')

<div id='bookinglist'>
    <div class="container  blue-gradient d-flex justify-content-center">
        <div class="table-box">
            <div class="spacer-30"></div>
            <div class="title"> Booking List</div>
            <div class="spacer-50"></div>
            <booking-list></booking-list>
            <div class="spacer-50"></div>
        </div>
    </div>
</div>

@endsection