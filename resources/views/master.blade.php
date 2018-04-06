<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <title>@yield('title', 'Parcial')</title>
</head>
<body>
    
    @yield('header')

    @yield('body')

    @yield('footer')

</body>
</html>