<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}| PERSEWAAAN ASET</title>
    <link rel="icon" href="{{ asset('img/icon-logo.png') }}">
    <link href="https://icons8.com/icon/E4FAF4hA9ugF/help">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <div class="flex flex-col">
        <header class="bg-transparent absolute top-0 left-0 w-full flex items-center z-10">
            <div class="container ">
                <div class="flex items-center justify-between relative">
                    <div class=" flex items-center xl:px-8 py-2">
                        <img src="{{ asset('img/LogoPoltekbang.png') }}" class="h-11 w-15" alt="Logo">
                        <div class="ml-1">
                            <a href="{{ asset('') }}" class="font-bold xl:text-lg md:text-lg  text-black">
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
                                    <a href="{{ route('login') }}"
                                        class="text-base text-black py-2 mx-6 flex group-hover:text-primary">Login</a>
                                </li>
                            </ul>
                        </nav>
                    </div>

                </div>
        </header>

        <div class="h-screen">
            @yield('content')
        </div>

        <!-- footer New -->
        @include('layouts-home.footer.foot')
    </div>
    <!-- end footer new -->
    @vite('resources/js/app.js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    @stack('script')
</body>

</html>
