@extends('layouts.admin')
@section('content')
<div id="detaillokasi">
<div class="container d-flex justify-content-center">
        <div class="table-box"  >
            <div class="spacer-30"></div>
            <div class="title">Detail Lokasi</div>
            <div class="spacer-50"></div>
            <detail-lokasi client-id="{{$id}}"></detail-lokasi>
            <div class="spacer-50"></div>
        </div>
        
    </div>
    <div class="spacer-50"></div>
</div>
@endsection
