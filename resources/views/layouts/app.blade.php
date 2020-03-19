<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- icon -->
    <link rel="icon" href="{{asset('assets/img/Fevicon.png')}}" type="image/png">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('assets/vendors/bootstrap/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/themify-icons/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/nice-select/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/owl-carousel/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/owl-carousel/owl.carousel.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    @stack('styles')
</head>
<body>
    <div id="app">
        @include('shared.header')

        @yield('content')

        @include('shared.footer')
    </div>
    <!-- Scripts -->
    <script src="{{asset('assets/vendors/jquery/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('assets/vendors/bootstrap/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/vendors/skrollr.min.js')}}"></script>
    <script src="{{asset('assets/vendors/owl-carousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/vendors/nice-select/jquery.nice-select.min.js')}}"></script>
    @stack('scripts')
    <script src="{{asset('assets/vendors/jquery.ajaxchimp.min.js')}}"></script>
    <script src="{{asset('assets/vendors/mail-script.js')}}"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>

    <script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
