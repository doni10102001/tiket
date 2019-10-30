<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('judul')</title>
    <!--CSS -->
    <link rel="stylesheet" href="{{asset('css/core/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/sweet-alert.css')}}">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/popper.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
</head>
<body>
    @include('layouts.partials.header-user')
   
            @yield('content')
        
    @include('layouts.partials.footer')

    <script src="{{asset('js/sweet-alert.js')}}"></script>

    @include('sweet::alert')
</body>
</html>