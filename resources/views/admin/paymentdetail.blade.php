@extends('layouts.admin')
@section('content')
<div id="paymentdetail">

    <div class="container">
        <div class="table-box">
            <div class="spacer-50"></div>
            <payment-detail client-id="{{$id}}"></payment-detail>
            <div class="spacer-50"></div>
        </div>
        <div class="spacer-50"></div>
    </div>
</div>

@endsection
