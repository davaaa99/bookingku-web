<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>

    <!-- Scripts -->
    <script src="{{ asset('js/admin/admin.js') }}" defer></script>


    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/admin/admin.css') }}">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">


</head>

<body>
    <div id="app">
        @include('layouts.sidebar')
        <main>
            <div class="jumbotron jumbotron-fluid"></div>
            <div class="content">
                @yield('content')
            </div>
        </main>
    </div>
</body>

</html>
