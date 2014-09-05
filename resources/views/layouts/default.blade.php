<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laravel 4.3 Bootstrap</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">


    <style>
        body { padding-top:80px }
    </style>

</head>
<body>

    @include('layouts.default.navbar')

    @yield('content')

    <!-- Latest compiled and minified jQUery -->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

    <!-- Latest compiled and minified Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

</body>
</html>