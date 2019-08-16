@extends('layouts.client')
@section('content')
<div id="location-detail">
    <div>
        <location-detail id-location="{{ $id }}"></location-detail>
        <div class="spacer-50"></div>
    </div>
</div>

@endsection
