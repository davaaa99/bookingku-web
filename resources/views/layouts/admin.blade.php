<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- Scripts -->
    <script src="{{ asset('js/admin/admin.js') }}" defer></script>


    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/admin/admin.css') }}">



</head>

<body>
    <main>
        @yield('content')
    </main>
</body>

</html>
