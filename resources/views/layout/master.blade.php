<!DOCTYPE html>
<html class="no-js" lang="en">
<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>Calvin</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="{{asset('assets/css/vendor.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/styles.css')}}">

    <!-- script
    ================================================== -->
    <script src="{{asset('assets/js/modernizr.js')}}"></script>
    <script defer src="{{asset('assets/js/fontawesome/all.min.js')}}"></script>

    <!-- favicons
    ================================================== -->
    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="icon" type="{{asset('assets/image/png')}}" sizes="32x32" href="favicon-32x32.png">
    <link rel="icon" type="{{asset('assets/image/png')}}" sizes="16x16" href="favicon-16x16.png">
    <link rel="manifest" href="site.webmanifest">

</head>

<body id="top">
    @include('layout.header')
    @yield('content')
    @include('layout.footer')
</body>
</html>