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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    @vite('resources/css/app.css')
    @vite('resources/js/app.js')

</head>

<body>

    <header class="bg-transparent absolute top-0 left-0 w-full flex items-center z-10">
        <div class="container ">
            <div class="flex items-center justify-between relative">
                <div class=" flex items-center xl:px-8 py-2">
                    <!-- <img src="./dist/img/Logo Poltekbang.png" width="50" alt="" /> -->
                    <img src="{{ asset('img/LogoPoltekbang.png') }}" class="h-11 w-15" alt="Logo">
                    <div class="ml-1">
                        <a href="/index #home" class="font-bold xl:text-lg md:text-lg  text-black">
                            SEWA ASET<br>
                            <span class="font-bold xl:text-lg md:text-lg text-xs text-black">POLITEKNIK PENERBANGAN
                                SURABAYA</span>
                        </a>
                    </div>
                </div>
                <div class="flex items-center px-8">
                    <button id="hamburger" name="hamburger" type="button" class="block absolute right-4 lg:hidden">
                        <span class="hamburger-line transition duration-300 origin-top-left"></span>
                        <span class="hamburger-line"></span>
                        <span class="hamburger-line origin-bottom-left"></span>
                    </button>

                    <nav id="nav-menu"
                        class="hidden absolute py-5 bg-transparent shadow-lg rounded-lg max-w-[250px] w-full right-4 top-full lg:block lg:static lg:max-w-full lg:shadow-none lg:rounded-none  ">
                        <ul class="block lg:flex">
                            <li class="group"></li>
                            <a href="#home"
                                class="text-base font-normal text-black py-2 mx-6 flex group-hover:text-primary">Beranda</a>
                            <li class="group">
                                <a href="#kategori"
                                    class="text-base text-black py-2 mx-6 flex group-hover:text-primary">Kategori</a>
                            </li>
                            <li class="group">
                                <a href="#promo"
                                    class="text-base text-black py-2 mx-6 flex group-hover:text-primary">Promo</a>
                            </li>
                            <li class="group">
                                <a href="#syarat"
                                    class="text-base text-black py-2 mx-6 flex group-hover:text-primary">Syarat</a>
                            </li>
                            <li class="group">
                                <a href="/login"
                                    class="text-base text-black py-2 mx-6 flex group-hover:text-primary">Daftar</a>
                            </li>
                            <div class="dropdownProfile">
                                <li class="group">
                                    <button id="dropdownHoverButton" data-dropdown-toggle="dropdownHover"
                                        data-dropdown-trigger="hover">
                                        <img src="{{ asset('img/lab.jpg') }}" alt=""
                                            class="w-8 h-8 rounded-full mx-6 flex p-1">
                                    </button>
                                </li>
                                <div id="dropdownHover"
                                    class="z-10 hidden bg-white shadow-xl divide-y divide-gray-100 rounded-lg  w-32">
                                    <ul class="py-2 text-sm text-gray-700 " aria-labelledby="dropdownHoverButton">
                                        <li><a href="/dashboard"
                                                class="px-4 py-2 hover:bg-gray-100 hover:w-full">Dashboard</a></li>
                                        <li><a href="" class="px-4 py-2 hover:bg-gray-100">Logout</a></li>
                                    </ul>
                                </div>
                            </div>
                        </ul>
                    </nav>
                </div>

            </div>
    </header>

    @yield('content')

    <!-- Footer Start -->
    <!-- <footer class="bg-plaster p-16">
      <div class="container ">
        <div class="flex flex-wrap">
          <div class="flex-grow w-full px-4 mb-6 font-medium md:w-1/4">
            <div class="flex ">
              {{-- <img src="{{ ('img/LogoPoltekbang.png') }}" class="h-11 w-15 " alt="Logo ">   --}}
              <p class="font-bold text-4xl ">SEWA ASET  <br>
              <span class="text-xl">POLITEKNIK PENERBANGAN SURABAYA</span>
              </p>
            </div>
            <div class="flex ">
                <a href="https://youtube/poltekbang" target="_blank" class="w-11 h-11 mr-3 rounded-full flex justify-center items-center border border-slate-300 text-slate-300 hover:border-primary hover:bg-primary hover:text-white">
                  <svg role="img" width="20" class="fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <title>YouTube</title>
                    <path
                      d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"
                    />
                  </svg>
                </a>

                <a href="" target="_blank" class="w-11 h-11 mr-3 rounded-full flex justify-center items-center border border-slate-300 text-slate-300 hover:border-primary hover:bg-primary hover:text-white ">
                  <svg role="img" width="20" class="fill-current " viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <title>Instagram</title>
                  <path d="M7.0301.084c-1.2768.0602-2.1487.264-2.911.5634-.7888.3075-1.4575.72-2.1228 1.3877-.6652.6677-1.075 1.3368-1.3802 2.127-.2954.7638-.4956 1.6365-.552 2.914-.0564 1.2775-.0689 1.6882-.0626 4.947.0062 3.2586.0206 3.6671.0825 4.9473.061 1.2765.264 2.1482.5635 2.9107.308.7889.72 1.4573 1.388 2.1228.6679.6655 1.3365 1.0743 2.1285 1.38.7632.295 1.6361.4961 2.9134.552 1.2773.056 1.6884.069 4.9462.0627 3.2578-.0062 3.668-.0207 4.9478-.0814 1.28-.0607 2.147-.2652 2.9098-.5633.7889-.3086 1.4578-.72 2.1228-1.3881.665-.6682 1.0745-1.3378 1.3795-2.1284.2957-.7632.4966-1.636.552-2.9124.056-1.2809.0692-1.6898.063-4.948-.0063-3.2583-.021-3.6668-.0817-4.9465-.0607-1.2797-.264-2.1487-.5633-2.9117-.3084-.7889-.72-1.4568-1.3876-2.1228C21.2982 1.33 20.628.9208 19.8378.6165 19.074.321 18.2017.1197 16.9244.0645 15.6471.0093 15.236-.005 11.977.0014 8.718.0076 8.31.0215 7.0301.0839m.1402 21.6932c-1.17-.0509-1.8053-.2453-2.2287-.408-.5606-.216-.96-.4771-1.3819-.895-.422-.4178-.6811-.8186-.9-1.378-.1644-.4234-.3624-1.058-.4171-2.228-.0595-1.2645-.072-1.6442-.079-4.848-.007-3.2037.0053-3.583.0607-4.848.05-1.169.2456-1.805.408-2.2282.216-.5613.4762-.96.895-1.3816.4188-.4217.8184-.6814 1.3783-.9003.423-.1651 1.0575-.3614 2.227-.4171 1.2655-.06 1.6447-.072 4.848-.079 3.2033-.007 3.5835.005 4.8495.0608 1.169.0508 1.8053.2445 2.228.408.5608.216.96.4754 1.3816.895.4217.4194.6816.8176.9005 1.3787.1653.4217.3617 1.056.4169 2.2263.0602 1.2655.0739 1.645.0796 4.848.0058 3.203-.0055 3.5834-.061 4.848-.051 1.17-.245 1.8055-.408 2.2294-.216.5604-.4763.96-.8954 1.3814-.419.4215-.8181.6811-1.3783.9-.4224.1649-1.0577.3617-2.2262.4174-1.2656.0595-1.6448.072-4.8493.079-3.2045.007-3.5825-.006-4.848-.0608M16.953 5.5864A1.44 1.44 0 1 0 18.39 4.144a1.44 1.44 0 0 0-1.437 1.4424M5.8385 12.012c.0067 3.4032 2.7706 6.1557 6.173 6.1493 3.4026-.0065 6.157-2.7701 6.1506-6.1733-.0065-3.4032-2.771-6.1565-6.174-6.1498-3.403.0067-6.156 2.771-6.1496 6.1738M8 12.0077a4 4 0 1 1 4.008 3.9921A3.9996 3.9996 0 0 1 8 12.0077"/></svg>
                </a>
                </div>
            </div>
                
                <div class="w-full px-4 mb-12 md:w-1/4">
                  <h3 class="font-semibold text-xl mb-5">Link Cepat</h3>
                  <ul class="">
                    <li>
                      <a href="#" class="inline-block text-base text-black hover:text-primary mb-3">Diklat</a>
                    </li>
                    <li>
                      <a href="#" class="inline-block text-base text-black hover:text-primary mb-3">Lab</a>
                    </li>
                    <li>
                      <a href="#" class="inline-block text-base text-black hover:text-primary mb-3">Web Utama</a>
                    </li>
                  </ul>
                </div>
                <div class="w-full px-4 mb-12 md:w-1/4">
                  <h3 class="font-semibold text-xl mb-5">Tautan</h3>
                  <ul class="">
                    <li>
                      <a href="#" class="inline-block text-base text-black hover:text-primary mb-3">Beranda</a>
                    </li>
                    <li>
                      <a href="#kategori" class="inline-block text-base text-black hover:text-primary mb-3">Kategori</a>
                    </li>
                    <li>
                      <a href="#FAQ" class="inline-block text-base text-black hover:text-primary mb-3">FAQ</a>
                    </li>
                    <li>
                <a href="#syarat" class="inline-block text-base text-black hover:text-primary mb-3">Syarat</a>
              </li>
            </ul>
          </div>
          <div class="w-full px-4 mb-6 font-medium md:w-1/4 text-justify">
            <h3 class="font-bold text-2xl mb-2 ">Hubungi Kami</h3>
            <p>mail@poltkebangsby.ac.id</p>
            <p>Jl. Jemur Andayani I No 73</p>
            <p>Surabaya</p>
          </div>
        </div>
        <div class="w-full pt-6 border-t border-slate-300">
          <div class="flex items-center justify-center mb-4">

          </div>
          <p class="font-medium text-xs text-state-500 text-center">Copyright <span>©</span> sewaaset poltekbang</p>
        </div>
      </div>
    </footer> -->
    <!-- Footer End -->
    <!-- footer New -->
    <footer class="bg-plaster p-16 ">
        <div class="container mx-auto  px-6 ">
            <div class="grid md:grid-cols-12 grid-cols-1 gap-7 pb-16">
                <div class="lg:col-span-5 col-span-12 ">
                    <div class="flex">
                        <a href="/">
                            <img src="{{ asset('img/LogoPoltekbang.png') }}" class="h-11 w-15 " alt="Logo ">
                        </a>
                        <p class="font-bold text-4xl ">SEWA ASET <br>
                            <span class="text-xl ">POLITEKNIK PENERBANGAN SURABAYA</span>
                        </p>
                    </div>
                    <div class="w-full pt-8 border-t border-black">
                        <p class="font-medium text-xs text-state-500 text-center -mb-6">
                            Copyright <span> © </span> sewaaset poltekbang
                        </p>
                    </div>
                </div>

    </footer>

    @vite('resources/js/app.js')
    <script src="{{ asset('js/main.js') }}"></script>
    <!-- <script src="../path/to/flowbite/dist/flowbite.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="../path/to/flowbite/dist/datepicker.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    @yield('script')
</body>

</html>
