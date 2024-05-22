<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}| PERSEWAAAN ASET</title>
    @yield('head')
    <link rel="icon" href="{{ asset('img/icon-logo.png') }}">
    <link href="https://icons8.com/icon/E4FAF4hA9ugF/help">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <!-- Link Swiper's CSS -->
    <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
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
                    <a href="/"><img src="{{ asset('img/LogoPoltekbang.png') }}" class="h-11 w-15" alt="Logo">
                    </a>
                    <div class="ml-1">
                        <a href="/" class="font-bold xl:text-lg md:text-lg  text-black">
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
                                    class="text-base text-black py-2 mx-6 flex group-hover:text-primary">Login</a>
                            </li>
                            @auth
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

                                            <li> <a class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                                    href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                      document.getElementById('logout-form').submit();">
                                                    {{ __('Logout') }}
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                    class="hidden">
                                                    @csrf
                                                </form>
                                            </li>
                                        @endauth
                                    </ul>
                                </div>
                            </div>
                        </ul>
                    </nav>
                </div>


                                                                <form id="logout-form" action="{{ route('logout') }}"
                                                                    method="POST" class="hidden">
                                                                    @csrf
                                                                </form>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </ul>
                                        </nav>
                                    </div>

                                </div>
                        </header>

                        @yield('content')
                        <!-- footer New -->
                        <footer class="bg-plaster 2xl:p-16 xl:p-16 lg:p-16 md:p-16 p-6 ">
                            <div class="container mx-auto  px-6 ">
                                <div class="grid md:grid-cols-12 grid-cols-1 gap-7 pb-16">
                                    <div class="lg:col-span-5 col-span-12 ">
                                        <div class="flex">
                                            <a href="/">
                                                <img src="{{ asset('img/LogoPoltekbang.png') }}" class="h-11 w-15 "
                                                    alt="Logo ">
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
                                    <div class="lg:col-span-2 md:col-span-4 col-span-12">
                                        <h5 class="font-semibold text-xl mb-5">Tautan Lainnya</h5>
                                        <ul class="list-none mt-6 space-y-2">
                                            <li>
                                                <a href="#"
                                                    class="inline-block text-base text-black hover:text-primary mb-3">Diklat</a>
                                            </li>
                                            <li>
                                                <a href="#"
                                                    class="inline-block text-base text-black hover:text-primary mb-3">Lab</a>
                                            </li>
                                            <li>
                                                <a href="#"
                                                    class="inline-block text-base text-black hover:text-primary mb-3">Web
                                                    Utama</a>
                                            </li>
                                            <li>
                                                <a href="#"
                                                    class="inline-block text-base text-black hover:text-primary mb-3">Klinik</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="lg:col-span-2 md:col-span-4 col-span-12">
                                        <h5 class="tracking-wide text-xl mb-5 font-semibold">
                                            Informasi
                                        </h5>
                                        <ul class="list-none space-y-2 mt-6">
                                            <li>
                                                <a href="#"
                                                    class="hover:text-primary mb-3 transition-all duration-500 ease-in-out">Beranda</a>
                                            </li>
                                            <li>
                                                <a href="#kategori"
                                                    class="hover:text-primary mb-3 transition-all duration-500 ease-in-out">Kategori</a>
                                            </li>
                                            <li>
                                                <a href="#FAQ"
                                                    class="hover:text-primary mb-3 transition-all duration-500 ease-in-out">FAQ</a>
                                            </li>
                                            <li>
                                                <a href="#syarat"
                                                    class="hover:text-primary mb-3 transition-all duration-500 ease-in-out">Syarat</a>
                                            </li>
                                        </ul>

                                    </div>
                                    <div class="lg:col-span-2 md:col-span-4 col-span-12">
                                        <h5 class="tracking-wide text-xl font-semibold">Hubungi Kami</h5>
                                        <p class="mt-6 mb-3">mail@poltekbangsby.ac.id</p>
                                        <p class="mb-3">

                                            Jl. Jemur Andayani I No 73
                                        </p>
                                        <p class="mb-3">Surabaya</p>
                                    </div>
                                </div>

                        </footer>

                        @vite('resources/js/app.js')
                        <script src="{{ asset('js/main.js') }}"></script>
                        {{-- boxicons --}}
                        <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
                        <!-- <script src="../path/to/flowbite/dist/flowbite.min.js"></script> -->
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
                        <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
                        <script src="../path/to/flowbite/dist/datepicker.js"></script>
                        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
                        @yield('script')
                    </body>

</html>
