<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description"
        content="Optimalkan semua resource yang Anda miliki, buat semuanya lebih mudah hanya dalam satu link.">

    <meta property="fb:app_id" content="1252534281494046" />
    <meta property="og:url" content="{{ url('/') }}" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta property="twitter:url" content="{{ url('/') }}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Zeeals ~ Semua Dalam Satu Link" />
    <meta property="og:description"
        content="Optimalkan semua resource yang Anda miliki, buat semuanya lebih mudah hanya dalam satu link." />
    <meta property="twitter:title" content="Zeeals ~ Semua Dalam Satu Link" />
    <meta property="twitter:description"
        content="Optimalkan semua resource yang Anda miliki, buat semuanya lebih mudah hanya dalam satu link." />
    <meta property="og:image" content="{{ asset('images/zeeals-banner.png') }}" />
    <meta property="twitter:image" content="{{ asset('images/zeeals-banner.png') }}" />
    <meta property="og:image:width" content="1200" />

    <title>Bookingku ~ </title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
  
    <script src="https://www.google.com/recaptcha/api.js?render=explicit" async defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,400i,600,800" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Rajdhani&display=swap" rel="stylesheet">



    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body>
    <div id="app">
        <header class="position-relative">
            <div class="position-absolute d-flex head-nav">
                <div class="container">
                    <nav class="navbar navbar-expand-lg ">
                        <a href="" class="navbar-brand">
                            <img src="{{asset('logo/logo.png')}}" width="40" height="40" alt="">
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#bokingkuNavbar" aria-controls="bokingkuNavbar" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span></span>
                            <span></span>
                            <span></span>
                        </button>
                        <div class="collapse navbar-collapse" id="bokingkuNavbar">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a href="" class="nav-link">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a href="" class="nav-link">Booking</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('clientregister')}}" class="nav-link">Registrasi</a>
                                </li>
                                <li class="nav-item">
                                    <a href="" class="nav-link">Contact</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </header>

        <main>
            <div>
                @yield('content')
            </div>
        </main>
        <footer class=" d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <div class="footer-item">
                            <div class="footer-link mb-3">
                                <a class="d-inline" href="">Home</a>
                            </div>
                            <div class="footer-link mb-3">
                                <a href="">Booking</a>
                            </div>
                            <div class="footer-link mb-3">
                                <a href="https://app.zeeals.com">Registrasi</a>
                            </div>
                            <div class="footer-link mb-3">
                                <a href="">Contact</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="spacer"></div>
                <div class="footer-copyright text-center py-3">&copy; 2019. Crafted by <a
                        href="https://kongcreativestudio.com/" target="_blank"> PT. Kong Teknologi Asia.</a>
                </div>
            </div>
        </footer>


    </div>
</body>

</html>
