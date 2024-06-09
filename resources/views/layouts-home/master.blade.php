<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}| PERSEWAAAN ASET</title>
    <link rel="icon" href="{{ asset('img/icon-logo.png') }}">
    <link href="https://icons8.com/icon/E4FAF4hA9ugF/help">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <!-- <link rel="stylesheet" href="{{ asset('css/slider.css') }}"> -->
    <!-- Link Swiper's CSS -->
    <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @yield('scriptlink')
    @yield('head')
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')

</head>

<body>


    @include('layouts-home.navbar.nav-old')

    @yield('content')
    <!-- footer New -->
    @include('layouts-home.footer.foot')

    @vite('resources/js/app.js')
    @yield('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
</body>

</html>
