@extends('layouts-home.navbar.nav-old')
@section('content')
<div class="  bg-plaster">
  <div class="w-full  pb-36 pt-36  flex flex-wrap justify-center  xl:mx-auto">
    <div class=" container grid grid-cols-1 sm:grid-cols-2  lg:grid-cols-3 xl:gap-36 gap-6 md:gap-10 ">
      <div class="bg-white col-span-2  shadow-md p-4 w-full h-screen xl:ml-36  mx-auto rounded-md ">
        <div class="relative">
          
            <img src="{{ ('img/layanan/marching band.jpg') }}" alt="" width="" class="rounded-sm shadow-md overflow-hidden w-2/3 mb-4" />
            <h4 class="absolute top-0 xl:right-56 md:right-16 right-0 mr-4 -mt-1 font-semibold ">Fasilitas</h4>
            <!-- <ul>
              <li>45 kapasitas</li>
              <li>Bagasi luas</li>
            </ul> -->
                <div class="flex gap-2">
                <img src="{{ ('img/layanan/marching band.jpg') }}" alt="" width="" class=" overflow-hidden w-20 mb-4" />
                <img src="{{ ('img/layanan/marching band.jpg') }}" alt="" width="" class=" overflow-hidden w-20 mb-4" />
                <p class="text-xs">Lihat semua foto</p>
                </div>
        </div>
      </div>
      <!-- ... -->
      <div class=" grid md:grid-rows-2 md:grid-flow-col  xl:gap-3 gap-8 xl:w-56 p-4   md:gap-52 w-full  ">
        <div class="bg-white h-36 w-56 relative -mt-4 p-3  rounded-md">
        <h4 class="font-semibold mb-2">Detail Mobil</h4>
          <ul class="text-gray-500 text-sm ">
            <li class="mt-2 mb-2">2020</li>
            <li class="mt-2 mb-2">Oli</li>
            <li class="mt-2 mb-2">Pertalite</li>
          </ul>
        </div>
        <div class=" top-12 bg-white h-40 w-56 bottom-0 -mt-44 gap-4 p-3 rounded-md xl:mr-20">
          <h4 class="font-semibold mb-2">Harga</h4>
          <p class="text-primary font-bold">Rp 2.500.000</p>
          <p class="text-xs text-gray-400"> * belum termasuk voucher</p>
          <button class=" mt-4 h-6 w-full bg-primary rounded-lg hover:opacity-50"><a href="/pesan" class=" text-sm   text-white    " >Pesan</a></button>
          
        </div>
      </div>
    </div>
  </div>
  </div>

@endsection