@extends('layouts.admin')
@section('content')
<div id="detaillokasi">
<div class="container d-flex justify-content-center">
        <div class="table-box"  >
            <div class="spacer-20"></div>
            <div class="title">Detail Lokasi</div>
            <div class="spacer-50"></div>
            <div class="card">
                <h5 class="card-header">Featured</h5>
                <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                </div>
            <a  href="{{ route('detaillapang') }} ">cek</a>
            </div>
            
            
            <div class="spacer-50"></div>
            <div class="card">
                <h5 class="card-header">Featured</h5>
                <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                   
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
