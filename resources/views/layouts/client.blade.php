<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>Bookingku - Client</title>

    <!-- Scripts -->
    <script src="{{ asset('js/client/client.js') }}" defer></script>


    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/client/client.css') }}">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">


</head>

<body>
    <div id="app">
        @include('layouts.clientSidebar')
        <main>
            <div class="jumbotron jumbotron-fluid"></div>
            <div class="content">
                @yield('content')
            </div>
        </main>
    </div>
</body>

</html>
