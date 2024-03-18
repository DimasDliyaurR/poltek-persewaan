<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title }}| PERSEWAAAN ASET</title>
    <link  href="https://icons8.com/icon/E4FAF4hA9ugF/help">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')

</head>
<body >
    
<header class="bg-transparent absolute top-0 left-0 w-full flex items-center z-10">
      <div class="container">
        <div class="flex items-center justify-between relative">
          <div class="px-4 flex items-center">
            <!-- <img src="./dist/img/Logo Poltekbang.png" width="50" alt="" /> -->
            <img src="{{ ('img/LogoPoltekbang.png') }}" class="h-11 w-15" alt="Logo ">  
            <div class="ml-1">
            <a href="/index #home" class="font-bold text-lg text-black">
            SEWA ASET<br>
            <span class="font-bold text-lg text-black">POLITEKNIK PENERBANGAN SURABAYA</span>
          </a>
            </div>
            
          </div>
          <div class="flex items-center px-4">
            <button id="hamburger" name="hamburger" type="button" class="block absolute right-4 lg:hidden">
              <span class="hamburger-line transition duration-300 origin-top-left"></span>
              <span class="hamburger-line"></span>
              <span class="hamburger-line origin-bottom-left"></span>
            </button>

            <nav id="nav-menu" class="hidden absolute py-5 bg-transparent shadow-lg rounded-lg max-w-[250px] w-full right-4 top-full lg:block lg:static lg:max-w-full lg:shadow-none lg:rounded-none  ">
              <ul class="block lg:flex">
                <li class="group"></li>
                <a href="#home" class="text-base font-normal text-black py-2 mx-8 flex group-hover:text-primary">Beranda</a>
                <li class="group">
                  <a href="#kategori" class="text-base text-black py-2 mx-8 flex group-hover:text-primary">Kategori</a>
                </li>
                <li class="group">
                  <a href="#promo" class="text-base text-black py-2 mx-8 flex group-hover:text-primary">Promo</a>
                </li>
                <!-- <li class="group">
                  <a href="#FAQ" class="text-base text-black py-2 mx-8 flex group-hover:text-primary">FAQ</a>
                </li> -->
                <li class="group">
                  <a href="#syarat" class="text-base text-black py-2 mx-8 flex group-hover:text-primary">Syarat</a>
                </li>
                <li class="group">
                  <a href="#FAQ" class="text-base text-black py-2 mx-8 flex group-hover:text-primary">Pesanan</a>
                </li>
                <li class="group">
                  <a href="/login" class="text-base text-black py-2 mx-8 flex group-hover:text-primary">Daftar</a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </header>

    @yield('content')
<footer class="bg-plaster pt-24 pb-2 ">
            <!-- Footer Start -->
    <div class="container">
        <div class="flex flex-wrap">
          <div class="w-full px-4 mb-12 font-medium md:w-1/3">
            <h2 class="font-bold text-4xl mb-5">SEWA ASET</h2>
            <h3 class="font-bold text-2xl mb-2">Hubungi Kami</h3>
            <p>mail@poltkebangsby.ac.id</p>
            <p>Jl. Jemur Andayani I No 73</p>
            <p>Surabaya</p>
          </div>
          <div class="w-full px-4 mb-12 md:w-1/3">
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
          <div class="w-full px-4 mb-12 md:w-1/3">
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
        </div>
        <div class="w-full pt-3 border-t border-black">
          <div class="flex items-center justify-center mb-3">
            <!-- youtube -->
            <a href="https://youtube/poltekbang" target="_blank" class="w-11 h-11 mr-3 rounded-full flex justify-center items-center border border-slate-300 text-slate-300 hover:border-primary hover:bg-primary hover:text-white">
              <svg role="img" width="20" class="fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <title>YouTube</title>
                <path
                  d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"
                />
              </svg>
            </a>
            <!-- ig -->
            <a href="https://youtube/poltekbang" target="_blank" class="w-11 h-11 mr-3 rounded-full flex justify-center items-center border border-slate-300 text-slate-300 hover:border-primary hover:bg-primary hover:text-white">
              <svg role="img" width="20" class="fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <title>Instagram</title>
                <path
                  d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"
                />
              </svg>
            </a>
          </div>
          <p class="font-medium text-xs text-state-500 text-center">Copyright <span>©</span> sewaaset poltekbang</p>
        </div>
      </div>

    <!-- Footer End -->
</footer>
    @vite('resources/js/app.js')
    <!-- <script src="../path/to/flowbite/dist/flowbite.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
</html>