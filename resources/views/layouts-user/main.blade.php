<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title }} | PERSEWAAAN ASET</title>
    <link rel="icon" href="{{asset('img/logo.png') }}" type="image/png"  sizes="16x35">
    <link  href="https://icons8.com/icon/E4FAF4hA9ugF/help">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <!-- <link rel="stylesheet" href="{{asset('css/slider.css')}}"> -->
    <!-- Link Swiper's CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
  
</head>
<body >

<!-- drawer init and show -->
@include('layouts-user.nav')
<div class="p-4 sm:ml-64 mt-14 bg-softblue">

    @yield('content')

   
</div>

@include('layouts-user.sidebar')


@vite('resources/js/app.js')
    <!-- <script src="../path/to/flowbite/dist/flowbite.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="../path/to/flowbite/dist/datepicker.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
</body>
</html>