@extends('layouts-home.navbar.nav-transaksi')
@section('content')

<div class="  bg-plaster">
  <div class="w-full  pb-36 pt-36  flex flex-wrap justify-center  xl:mx-auto">
    <div class=" container grid grid-cols-1  sm:grid-cols-2  lg:grid-cols-3 xl:gap-36 gap-6 md:gap-10 ">
      <div class="bg-white col-span-2  shadow-md p-4 w-full h-screen xl:ml-36  mx-auto rounded-md ">
        <div class="relative">
            <img src="{{ ('img/layanan/marching band.jpg') }}" alt="" width="" class="rounded-sm shadow-md overflow-hidden w-2/3 mb-4" />
            <h4 class="absolute top-0 xl:right-56 md:right-16 right-0 mr-4 -mt-1 font-semibold ">Fasilitas</h4>
                <div class="flex gap-2">
                    <img src="{{ ('img/layanan/marching band.jpg') }}" alt="" width="" class=" overflow-hidden w-20 mb-4" />
                    <img src="{{ ('img/layanan/marching band.jpg') }}" alt="" width="" class=" overflow-hidden w-20 mb-4" />
                    <p class="text-xs">Lihat semua foto</p>
                </div>
        </div>
      </div>
      <!-- ... -->

    </div>
  </div>
  </div>

@endsection