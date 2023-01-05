<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Chalom Investments">


    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('theme/borrow/assets/images/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('theme/borrow/assets/images/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('theme/borrow/assets/images/favicon-16x16.png')}}">



{{--    <link rel="stylesheet" href="{{asset('theme/bootstrap/css/bootstrap-theme.css')}}">--}}
{{--    <link rel="stylesheet" href="{{asset('theme/bootstrap/css/bootstrap.css')}}">--}}


    <!-- Libs CSS -->

    <link rel="stylesheet" href="{{asset('theme/borrow/assets/libs/bootstrap-icons/font/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{asset('theme/borrow/assets/libs/tiny-slider/dist/tiny-slider.css')}}">
    <link rel="stylesheet" href="{{asset('theme/borrow/assets/libs/nouislider/dist/nouislider.min.css')}}">
    <link rel="stylesheet" href="{{asset('theme/borrow/assets/fonts/flat-font-icons/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('theme/borrow/assets/fonts/fontello-icons/fontello.css')}}">
    <link rel="stylesheet" href="{{asset('theme/borrow/assets/libs/magnific-popup/dist/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('theme/borrow/assets/libs/jquery-ui/themes/base/all.css')}}">
    <link rel="stylesheet" href="{{asset('theme/borrow/assets/libs/jquery-ui/demos/demos.css')}}">
    <link rel="stylesheet" href="{{asset('theme/borrow/assets/libs/magnific-popup/dist/magnific-popup.css')}}">



    <style>
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>

@stack('custom-stylesheets')


    <!-- Theme CSS -->

    <link rel="stylesheet" href="{{asset('theme/borrow/assets/css/theme.min.css')}}">

    @livewireStyles


    <title>Chaloam</title>

</head>

<body>


<!-- main wrapper -->
<div class="docs-main-wrapper">
    <!-- navbar -->
   @include('layouts.dashboard.nav')
    <!-- left sidebar -->
   @include('layouts.dashboard.sidebar')
    <!-- wrapper -->
    <div class="docs-wrapper">
        <div class="container-fluid pl-0">

            @if(isset(  $slot ))
                {{ $slot }}
            @else
                @yield('content')
            @endif
        </div>
    </div>
</div>
<!-- footer -->
@include('layouts.dashboard.footer')
<!-- scripts -->

@livewireScripts

<!-- Libs JS -->
<script src="{{asset('theme/borrow/assets/libs/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('theme/borrow/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('theme/borrow/assets/libs/tiny-slider/dist/min/tiny-slider.js')}}"></script>
<script src="{{asset('theme/borrow/assets/libs/nouislider/dist/nouislider.min.js')}}"></script>
<script src="{{asset('theme/borrow/assets/libs/wnumb/wNumb.min.js')}}"></script>
<script src="{{asset('theme/borrow/assets/libs/magnific-popup/dist/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('theme/borrow/assets/libs/isotope-layout/dist/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('theme/borrow/assets/libs/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{asset('theme/borrow/assets/libs/magnific-popup/dist/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('theme/borrow/assets/libs/prismjs/prism.js')}}"></script>


@stack('custom-scripts')



<!-- Theme JS -->
<script src="{{asset('theme/borrow/assets/js/theme.min.js')}}"></script>

