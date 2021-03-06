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
    <link href="https://fonts.googleapis.com/css?family=Rajdhani&display=swap" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Source Sans Pro' rel='stylesheet'>


</head>

<body>
    <div id="app">
        <main>
            <register-component></register-component>
        </main>
    </div>
</body>

</html>
