<!DOCTYPE html>

<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Lavoro | Home 1</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="{{ asset('') }}">
    <!-- Favicon
    ============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/client/img/favicon.ico">

    <!-- Fonts
    ============================================ -->
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>

    <!-- CSS  -->

    <!-- Bootstrap CSS
    ============================================ -->
    <link rel="stylesheet" href="assets/client/css/bootstrap.min.css">

    <!-- owl.carousel CSS
    ============================================ -->
    <link rel="stylesheet" href="assets/client/css/owl.carousel.css">

    <!-- owl.theme CSS
    ============================================ -->
    <link rel="stylesheet" href="assets/client/css/owl.theme.css">

    <!-- owl.transitions CSS
    ============================================ -->
    <link rel="stylesheet" href="assets/client/css/owl.transitions.css">

    <!-- font-awesome.min CSS
    ============================================ -->
    <link rel="stylesheet" href="assets/client/css/font-awesome.min.css">

    <!-- font-icon CSS
    ============================================ -->
    <link rel="stylesheet" href="assets/client/fonts/font-icon.css">

    <!-- jquery-ui CSS
    ============================================ -->
    <link rel="stylesheet" href="assets/client/css/jquery-ui.css">

    <!-- mobile menu CSS
    ============================================ -->
    <link rel="stylesheet" href="assets/client/css/meanmenu.min.css">

    <!-- nivo slider CSS
    ============================================ -->
    <link rel="stylesheet" href="assets/client/custom-slider/css/nivo-slider.css" type="text/css" />
    <link rel="stylesheet" href="assets/client/custom-slider/css/preview.css" type="text/css" media="screen" />

    <!-- animate CSS
   ============================================ -->
    <link rel="stylesheet" href="assets/client/css/animate.css">

    <!-- normalize CSS
   ============================================ -->
    <link rel="stylesheet" href="assets/client/css/normalize.css">

    <!-- main CSS
    ============================================ -->
    <link rel="stylesheet" href="assets/client/css/main.css">

    <!-- style CSS
    ============================================ -->
    <link rel="stylesheet" href="assets/client/style.css">

    <!-- responsive CSS
    ============================================ -->
    <link rel="stylesheet" href="assets/client/css/responsive.css">

    <script src="assets/client/js/vendor/modernizr-2.8.3.min.js"></script>
</head>
<body class="home-one">
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<!-- Add your site or application content here -->
<!-- header area start -->
@include('layouts.header')
<!-- header area end -->
@yield('content')
<!-- FOOTER START -->
@include('layouts.footer')
<!-- FOOTER END -->

<!-- JS -->

<!-- jquery-1.11.3.min js
============================================ -->
<script src="assets/client/js/vendor/jquery-1.11.3.min.js"></script>

<!-- bootstrap js
============================================ -->
<script src="assets/client/js/bootstrap.min.js"></script>

<!-- Nivo slider js
============================================ -->
<script src="assets/client/custom-slider/js/jquery.nivo.slider.js" type="text/javascript"></script>
<script src="assets/client/custom-slider/home.js" type="text/javascript"></script>

<!-- owl.carousel.min js
============================================ -->
<script src="assets/client/js/owl.carousel.min.js"></script>

<!-- jquery scrollUp js
============================================ -->
<script src="assets/client/js/jquery.scrollUp.min.js"></script>

<!-- price-slider js
============================================ -->
<script src="assets/client/js/price-slider.js"></script>

<!-- elevateZoom js
============================================ -->
<script src="assets/client/js/jquery.elevateZoom-3.0.8.min.js"></script>

<!-- jquery.bxslider.min.js
============================================ -->
<script src="assets/client/js/jquery.bxslider.min.js"></script>

<!-- mobile menu js
============================================ -->
<script src="assets/client/js/jquery.meanmenu.js"></script>

<!-- wow js
============================================ -->
<script src="assets/client/js/wow.js"></script>

<script src="assets/client/js/gmap.js"></script>

<!-- plugins js
============================================ -->
<script src="assets/client/js/plugins.js"></script>

<!-- main js
============================================ -->
<script src="assets/client/js/main.js"></script>
@if(session('error'))
    <script type="text/javascript">
        toastr.error('{{ session('error') }}', 'Thông báo', {timeOut: 5000});
    </script>
@endif
</body>
</html>