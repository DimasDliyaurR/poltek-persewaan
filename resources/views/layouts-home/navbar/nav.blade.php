<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }} | PERSEWAAN ASET</title>
    <link  href="https://icons8.com/icon/E4FAF4hA9ugF/help">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')

</head>
<body >
@yield('content')
<header class="bg-transparent absolute top-0 left-0 w-full flex items-center z-10">
      <div class="container">
        <div class="flex items-center justify-between relative">
          <div class="px-4 flex items-center">
            <!-- <img src="./dist/img/Logo Poltekbang.png" width="50" alt="" /> -->
            <img src="{{ ('img/LogoPoltekbang.png') }}" class="h-11 w-15" alt="Logo ">  
            <div class="ml-1">
            <a href="#home" class="font-bold text-lg text-black">
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
                  <a href="#syarat" class="text-base text-black py-2 mx-8 flex group-hover:text-primary">Daftar</a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </header>

    <section id="home" class="pt-36 pb-48 h-screen relative  ">
<div class="absolute inset-0 bg-white opacity-10">
  <div class=" h-full  bg-cover " style="background-image: url('{{ asset('img/lab.jpg') }}');">
  </div> 
</div>     
<div class="container relative z-10">
  <div class="flex flex-wrap">
    <div class="w-full self-end px-4  ">
      <div class="relative mt-10  pb-3 lg:mt-9 lg:right-0">
        <img src="{{  ('img/LogoPoltekbang.png')}}" alt="Logo Poltekbang" class="max-w-full mx-auto w-80 h-65" />
      </div>
    </div>
    <div class="w-full text-center px-4 ">
      <h1 class="block font-bold text-slate-900 text-4xl lg:text-5xl pb-2">SEWA ASET </h1>
        <h2 class="font-semibold md:text-xl lg:text-2xl mt-6 leading relaxed mb-8 ">Mudah, Aman , Terjangkau !</h2>
    </div>
    <div id="buttondropdown" class="mx-auto flex">
      <div id="dropdownKategori" class="relative">
        <div  onclick="toggleDropdown()"
            class="border-solid text-sm border-gray-400 border-[1px] px-5 py-2 rounded cursor-pointer  flex justify-between bg-white shadow-sm ">
              Plan mulai dari sekarang !  | Kategori Kegiatan
              <svg class="w-5 " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
              </svg>
        </div>
        <div id="dropdown" class="rounded border-[2px] border-white bg-white p-2 absolute top-[50px] w-[185px] right-6 shadow-md hidden">
          <div class="cursor-pointer hover:bg-gray-300 p-2">Transportasi</div>
          <div class="cursor-pointer hover:bg-gray-30 p-2">Gedung</div>
          <div class="cursor-pointer hover:bg-gray-300 p-2">Penginapan</div>
          <div class="cursor-pointer hover:bg-gray-300 p-2">Layanan</div>
          <div class="cursor-pointer hover:bg-gray-300 p-2">Asset</div>
        </div>

    </div>
    <div id="dropdownJadwal" class="relative">
      <div onclick="toggleDropdown2()"
       class="border-solid w-28 text-sm border-gray-400 border-[1px] px-5 py-2 rounded cursor-pointer  flex  bg-white shadow-sm ">
        Jadwal
        <svg class="w-5 " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
        </svg>
      </div>
      <div id="dropdownKal" class="rounded border-[2px] border-white bg-white p-2 absolute top-[50px] w-[185px]  shadow-md hidden">
              <div class="cursor-pointer hover:bg-gray-300 p-2">Kalender</div>
      </div>
    </div>
    <div class="relative">
      <div class="border-solid w-28 text-sm border-gray-400 border-[1px] px-5 py-2 rounded cursor-pointer  flex  bg-white shadow-sm " >
      <form action="">
      Search 
      </form>      
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
        <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
      </svg>
      </div>
    </div>
    </div>
  </div>
</div>

</section>
    <!-- Hero Section End -->
    

    <!-- <script src="../path/to/flowbite/dist/flowbite.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
</html>