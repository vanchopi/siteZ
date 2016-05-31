<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
    <title>Not simply test</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/body.css')}}" rel="stylesheet" type="text/css">
    @if (isset($_COOKIE['color-theme']))
        <link href="{{asset('css/black.css')}}" id="link_black" rel="stylesheet" type="text/css">
    @else
        <link href="{{asset('css/white.css')}}" id="link_white" rel="stylesheet" type="text/css">
    @endif
</head>
<body id="app-layout">

@yield('content')

</body>
</html>