<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700">
    <link rel="stylesheet" href="{{ asset('ui/fonts/icomoon/style.css') }}">

    <link rel="stylesheet" href="{{ asset('ui/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('ui/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('ui/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('ui/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('ui/css/owl.theme.default.min.css') }}">


    <link rel="stylesheet" href="{{ asset('ui/css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('ui/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
</head>
<body>

@include('sweetalert::alert')

<div class="site-wrap">
    @include('ui.layouts.header')

    @yield('content')

    @include('ui.layouts.footer')
</div>

<script src="{{ asset('ui/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('ui/js/jquery-ui.js') }}"></script>
<script src="{{ asset('ui/js/popper.min.js') }}"></script>
<script src="{{ asset('ui/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('ui/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('ui/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('ui/js/aos.js') }}"></script>

<script src="{{ asset('ui/js/main.js') }}"></script>

</body>
</html>
