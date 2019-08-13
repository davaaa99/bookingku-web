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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400" rel="stylesheet"/>

    <!--  -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


</head>
<body>
    <div id="app">
    @include('layouts.sidebarclient')
        <main>
            <div class="jumbotron jumbotron-fluid"></div>
            <div class="content">
                @yield('content')
            </div>
        </main>
    </div>
</body>

</html>