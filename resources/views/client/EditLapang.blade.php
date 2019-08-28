@extends('layouts.client')
@section('content')

<div id="addlapang">
    <div class="container d-flex justify-content-center">
        <div class="table-box"  >
        <div class="spacer-30"></div>
        <div class="title">Edit Lapang </div>
        <div class="spacer-50"></div>
        <edit-lapangan id-field="{{$id}}">
        </edit-lapangan>
        <div class="spacer-50"></div>
        </div>
    </div>
</div>

@endsection
