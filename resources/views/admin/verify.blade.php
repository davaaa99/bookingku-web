@extends('layouts.admin')
@section('content')

<verify-component inline-template="inline-template">
    <div id="verify">
        <div class="container">
            <div class="table">
                <div class="title">Verify Booking</div>
               
                <booking-list></booking-list>

                <div class="spacer-50 "></div>

               
            </div>
            <div class="spacer"></div>
        </div>
    </div>
</verify-component>
@endsection
