@extends('layouts.admin')
@section('content')

<div id="detailapangan">
    <div class="container d-flex justify-content-center">
        <div class="table-box"  >
        <div class="spacer-30"></div>
        <div class="title">Detail Lapangan</div>
        <div class="spacer-50"></div>
        <detail-lapangan id-lokasi="{{$id}}"></detail-lapangan>
        <div class="spacer-50"></div>
        </div>
    </div>
</div>

@endsection
