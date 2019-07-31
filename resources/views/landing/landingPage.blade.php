@extends('layouts.appnew')
@section('content')

<div id="landingPage">
    <div class="section-1 position-relative d-flex flex-column">
        <div
            class="container d-flex align-items-center justify-content-center justify-content-sm-center justify-content-lg-start flex-grow-1 mb-auto">
            <div class="content position-relative">
                <div class="text position-relative">
                    <div class="page-title col-lg-6 col-md-8 col-12">
                        <img src="{{asset('svg/Vector.svg')}}" alt="" class="position-absolute decor">
                        <p>BOOKINGKU</p>
                    </div>
                    <div class="page-desc  col-lg-6 col-md-8 col-12">Lorem ipsum dolor sit amet, consectetur adipiscing
                        elit. Donec elementum,
                        leo in venenatis ultrices,
                        enim enim pulvinar elit, quis vestibulum tortor
                        mauris et tortor. Proin porta magna ex, tristique
                        nunc finibus sed, donec tristique.
                    </div>
                </div>
                <div class="spacer-50"></div>
                <div class="btn-aksi d-flex align-items-center col-lg-6 col-md-8 col-12">
                    <a href="" class="btn btn-daftar">DAFTAR</a>
                    <a href="" class="btn btn-pelajari">PELAJARI</a>
                </div>
                <div class="spacer-50"></div>
                <div class="btn-aksi d-flex align-items-center col-lg-6 col-md-8 col-12">
                    <a href="" class="">
                        <div class="play-store position-relative"></div>
                    </a>
                </div>

            </div>
        </div>
    </div>
    <div class="section-2 position-relative d-flex  align-items-center">
        <div class="container">
            <div class="content position-relative  d-flex  align-items-center">
                <div class="text col-lg-6 col-md-6 col-12 ">
                    <div class="page-title ">
                        <img src="{{asset('svg/Vector.svg')}}" alt="" class="position-absolute decor">
                        <p>INTRO</p>
                    </div>
                    <div class="spacer-20"></div>
                    <div class="page-desc ">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec elementum,
                        leo in venenatis ultrices,
                        enim enim pulvinar elit, quis vestibulum tortor
                        mauris et tortor. Proin porta magna ex, tristique
                        nunc finibus sed, donec tristique.
                    </div>
                    <div class="page-desc ">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec elementum,
                        leo in venenatis ultrices,
                        enim enim pulvinar elit, quis vestibulum tortor
                        mauris et tortor. Proin porta magna ex, tristique
                        nunc finibus sed, donec tristique.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section-3 position-relative">
        <div class="container position-relative">
            <div class="col-lg-6 col-md-6 col-12 d-flex justify-content-center">
                <div class="content ">
                    <div class="d-flex justify-content-center">
                        <div class="page-title d-flex">
                            <img src="{{asset('svg/Vector-2.svg')}}" alt="" class="position-absolute decor">
                            <p>FITUR</p>
                        </div>
                    </div>
                    <div class="spacer-20"></div>
                    <div class="page-desc">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec elementum, leo
                        in venenatis ultrices,
                        enim enim pulvinar elit, quis vestibulum tortor
                        mauris et tortor. Proin porta magna ex,
                    </div>
                    <div class="d-flex justify-content-center">
                        <fitur-component></fitur-component>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12  d-flex justify-content-center align-items-center">
                <div class="phone-section ">
                    <div class="phone"></div>
                    <div class="spacer-50"></div>
                    <a href="" class>
                        <div class="play-store"></div>
                    </a>
                </div>
            </div>
        </div>
        <img src="{{asset('svg/SVG.svg')}}" alt="" class=" cirle">
    </div>
    <div class="section-4 position-relative d-flex flex-column">
        <div
            class="container d-flex align-items-center justify-content-center justify-content-sm-center justify-content-lg-start flex-grow-1 mb-auto">
            <div class="content position-relative">
                <div class="text position-relative">
                    <div class="d-flex justify-content-center">
                        <div class="page-title">
                            <img src="{{asset('svg/Vector.svg')}}" alt="" class="position-absolute decor">
                            <p>REGISTRASI</p>
                        </div>
                    </div>
                    <div class="spacer-20"></div>
                    <div class="d-flex justify-content-center">
                        <div class="page-desc col-lg-8 col-md-10 col-12">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec elementum, leo in venenatis
                            ultrices, enim enim pulvinar elit, quis vestibulum tortor mauris et tortor. Proin porta
                            magna
                            ex, tristique nunc finibus sed, donec tristique. Donec
                            elementum, leo in venenatis ultrices. Lorem ipsum dolor sit amet, consectetur adipiscing
                            elit. Donec elementum, leo in venenatis
                            ultrices, enim enim pulvinar elit, quis vestibulum tortor mauris et tortor.
                        </div>
                    </div>
                </div>
                <div class="spacer-50"></div>
                <div class="d-flex align-items-center justify-content-center">
                    <a href="" class="btn btn-daftar">DAFTAR</a>
                </div>
            </div>
        </div>
    </div>

    <div class="section-5 position-relative">
        <div class="container position-relative">
            <div class="col-lg-6 col-md-6 col-12 d-flex justify-content-center">
                <div class="content ">
                    <div class="d-flex justify-content-center">
                        <div class="page-title d-flex">
                            <img src="{{asset('svg/Vector-2.svg')}}" alt="" class="position-absolute decor">
                            <p>CONTACT</p>
                        </div>
                    </div>
                    <div class="spacer-20"></div>
                    <div class="page-desc">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec elementum, leo
                        in venenatis ultrices,
                        enim enim pulvinar elit, quis vestibulum tortor
                        mauris et tortor. Proin porta magna ex,
                    </div>
                    <div class="spacer-20"></div>
                    <div class="d-flex justify-content-center">
                        <a href="">
                            <div class="sosmed d-flex justify-content-center align-items-center">
                                <i class="fab fa-instagram"></i>
                            </div>
                        </a>
                        <a href="">
                            <div class="sosmed d-flex justify-content-center align-items-center">
                                <i class="fab fa-youtube"></i>
                            </div>
                        </a>
                        <a href="">
                            <div class="sosmed d-flex justify-content-center align-items-center"> </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class=" test col-lg-6 col-md-6 d-flex justify-content-center">

                <img src="{{asset('images/section-5.png')}}" alt="" class="people">

            </div>
        </div>

    </div>
</div>
</div>
@endsection
