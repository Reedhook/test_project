<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    <title>Музыка</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    @vite(['resources/js/app.js', 'resources/sass/app.scss'])
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <!-- /.navbar -->
    @yield('content')

</body>
</html>
