<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Chalom Investment Borrow | Invest</title>
    <meta name="description" content="Free Bootstrap 4 Theme by uicookies.com">
    <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">


    <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,700" rel="stylesheet">

    <link rel="stylesheet" href="{{  asset('places/assets/css/bootstrap/bootstrap.css')  }}">
    <link rel="stylesheet" href="{{ asset('places/assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset ('places/assets/fonts/ionicons/css/ionicons.min.css') }}">

    <link rel="stylesheet" href="{{ asset ('places/assets/css/owl.carousel.min.css') }}">

    <link rel="stylesheet" href="{{ asset ('places/assets/fonts/flaticon/font/flaticon.css') }}">

    <link rel="stylesheet" href="{{ asset ('places/assets/fonts/fontawesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset ('places/assets/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('places/assets/css/select2.css') }}">


    <link rel="stylesheet" href="{{ asset('places/assets/css/helpers.css') }}">
    <link rel="stylesheet" href="{{ asset('places/assets/css/style.css') }}">

    @stack('style-sheets')

</head>
<body>



@include('layouts.website.nav')
<!-- END nav -->

@yield('content')

<!-- END section -->

@include('layouts.website.footer')

<script src="{{ asset('places/assets/js/jquery.min.js') }}"></script>

<script src="{{ asset('places/assets/js/popper.min.js') }}"></script>
<script src="{{ asset('places/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('places/assets/js/owl.carousel.min.js') }}"></script>

<script src="{{ asset('places/assets/js/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('places/assets/js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('places/assets/js/jquery.easing.1.3.js') }}"></script>

<script src="{{ asset('places/assets/js/select2.min.js') }}"></script>

<script src="{{ asset('places/assets/js/main.js') }}"></script>

@stack('scripts')
</body>
</html>