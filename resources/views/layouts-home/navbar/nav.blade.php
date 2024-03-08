<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    @vite('resources/css/app.css')
</head>
<body>
    <header class="bg-transparent absolute top-0 left-0 w-full flex items-center z-10">
        <div class="container px-4">
            <div class="flex items-center justify-between relative">
                <div class="mb-2 sm:mb-0 flex flex-row">
                    <div class="mt-3 h-12 w-12 self-center  ">
                    <img src="{{ ('img/LogoPoltekbang.png')}}" alt="logo navbar">
                    </div>
                <div>
                    <a href="#" class="font-bold text-lg text-black ">
                    SEWA ASET</a><br>
                    <span class="font-bold text-lg text-black">POLITEKNIK PENERBANGAN SURABAYA</span></a>
                </div>
            </div>
            <div class="flex items-center px-4">
                <button id="hamburger" name="hamburger" type="button" class="block absolute right-4 lg:hidden">
                    <span class="hamburger-line transition duration-300 origin-top-left"></span>
                    <span class="hamburger-line"></span>
                    <span class="hamburger-line origin-bottom-left"></span>
                </button>
                <nav id="nav-menu" class="hidden absolute py-5 bg-transparent shadow-lg rounded-lg max-w-[250px] w-full right-4 top-full lg:block lg:static lg:bg-transparent lg:max-w-full lg:shadow-none lg:rounded-none">
              <ul class="block lg:flex">
                <li class="group"></li>
                <a href="#home" class="text-base text-black py-2 mx-8 flex group-hover:text-primary">Beranda</a>
                <li class="group">
                  <a href="#kategori" class="text-base text-black py-2 mx-8 flex group-hover:text-primary">Kategori</a>
                </li>
                <li class="group">
                  <a href="#promo" class="text-base text-black py-2 mx-8 flex group-hover:text-primary">Promo</a>
                </li>
                <li class="group">
                  <a href="#FAQ" class="text-base text-black py-2 mx-8 flex group-hover:text-primary">FAQ</a>
                </li>
                <li class="group">
                  <a href="#syarat" class="text-base text-black py-2 mx-8 flex group-hover:text-primary">Syarat</a>
                </li>
                </li>
                <li class="group">
                  <a href="#" class="text-base text-black py-2 mx-8 flex group-hover:text-primary">Log In</a>
                </li>
              </ul>
            </nav>
            </div>
        </div>
    </header>
    @yield('content')
    @vite('resources/js/app.js')
</body>
</html>