@extends('layouts-home.navbar.nav-old')
@section('content')
<div class="p-36">

    <div class="flex flex-wrap  xl:px-32 mx-auto pb-2 kategori-promo   space-x-2  text-[14px] ">
    <div class="bg-gray-100  h-10 w-28 flex items-center justify-center rounded-md mb-2 cursor-pointer hover:focus:ring-primary hover:border-primary hover:border-2  "><a href="">Semua</a>  </div>
    <div class="bg-gray-100  h-10 w-28 flex items-center justify-center rounded-md mb-2 cursor-pointer hover:focus:ring-primary hover:border-primary hover:border-2  "><a href="">Transportasi</a>  </div>
    <div class="bg-gray-100 w-28 h-10 flex items-center justify-center rounded-md mb-2 cursor-pointer  hover:focus:ring-primary hover:border-primary hover:border-2  "> <a href="">Gedung Lap</a></div>
    <div class="bg-gray-100 w-28 h-10 flex items-center justify-center rounded-md mb-2 cursor-pointer  hover:focus:ring-primary hover:border-primary hover:border-2  "> <a href="">Asrama</a></div>
    <div class="bg-gray-100 w-28 h-10 flex items-center justify-center rounded-md mb-2 cursor-pointer  hover:focus:ring-primary hover:border-primary hover:border-2  "> <a href="">Layanan</a></div>
    <div class="bg-gray-100 w-28 h-10  flex items-center justify-center  rounded-md mb-2 cursor-pointer  hover:focus:ring-primary hover:border-primary hover:border-2 "> <a href="">Alat Barang</a></div>
    </div>

    <div class="w-full px-4  justify-center xl:w-10/12 xl:mx-auto">
      <!-- per kategori -->
      <div class="mb-6 p-4 py-4 bg-softblue w-full rounded-lg  promo shadow-md">
        <div class="mb-4 ">
        <h4 class="font-bold">Transportasi</h4>
        </div>
        
        <div class="flex flex-wrap m-auto space-x-1  mt-2 mb-3">
          <div class="w-full  sm:w-1/2 lg:w-1/2 xl:w-1/3 hover:scale-105 transition  ease-in-out delay-150  ">
            <div class="flex flex-row"><a href="#" class="block max-w-sm p-4  bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
              <div class="flex space-x-2">
                <div class="basis-1/2">
                  <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Promo Idul Fitri</h5>
                  <div class="flex  items-center">
                      <h4 class="text-base mr-2">Hemat</h4>
                      <span class="text-4xl font-bold">50%</span>
                  </div>
                  <p class="mt-5 inline-block bg-plaster h-6 w-full text-center rounded-md tracking-widest text-sm mb-4" > 2024IED</p>
                </div>
                <div class="basis-1/2 relative">
                  <div class="absolute right-0 top-2 text-center h-6 w-32 rounded-s-lg bg-primary">
                    <p class="text-sm text-white">Sewa sekarang!</p>
                  </div>
                  <img src="{{ asset('img/layanan/marching band.jpg') }}" alt="picture 1"  class=" rounded-md w-full "/>
                </div>
                
              </div>  
              <p class="text-gray-400 text-sm ">*periode 1 Januari - 1 Februari</p>
              </a>
            </div>
          </div>
          <div class="w-full  sm:w-1/2 lg:w-1/2 xl:w-1/3 hover:scale-105 transition  ease-in-out delay-150  ">
            <div class="flex flex-row"><a href="#" class="block max-w-sm p-4  bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
              <div class="flex space-x-2">
                <div class="basis-1/2">
                  <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Promo Idul Fitri</h5>
                  <div class="flex  items-center">
                      <h4 class="text-base mr-2">Hemat</h4>
                      <span class="text-4xl font-bold">50%</span>
                  </div>
                  <p class="mt-5 inline-block bg-plaster h-6 w-full text-center rounded-md tracking-widest text-sm mb-4" > 2024IED</p>
                </div>
                <div class="basis-1/2 relative">
                  <div class="absolute right-0 top-2 text-center h-6 w-32 rounded-s-lg bg-primary">
                    <p class="text-sm text-white">Sewa sekarang!</p>
                  </div>
                  <img src="{{ asset('img/layanan/marching band.jpg') }}" alt="picture 1"  class=" rounded-md w-full "/>
                </div>
              </div>  
              <p class="text-gray-400 text-sm ">*periode 1 Januari - 1 Februari</p>
              </a>
            </div>
          </div>
          <div class="w-full  sm:w-1/2 lg:w-1/2 xl:w-1/3 hover:scale-105 transition  ease-in-out delay-150  ">
            <div class="flex flex-row"><a href="#" class="block max-w-sm p-4  bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
              <div class="flex space-x-2">
                <div class="basis-1/2">
                  <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Promo Idul Fitri</h5>
                  <div class="flex  items-center">
                      <h4 class="text-base mr-2">Hemat</h4>
                      <span class="text-4xl font-bold">50%</span>
                  </div>
                </div>
                <div class="basis-1/2 relative">
                  <div class="absolute right-0 top-2 text-center h-6 w-32 rounded-s-lg bg-primary">
                    <p class="text-sm text-white">Sewa sekarang!</p>
                  </div>
                  <!-- <div class=" flex justify-center items-center absolute left-0 bottom-0 text-center h-20 w-20 rounded-full opacity-50 bg-primary">
                    <p class=" text-center text-sm text-white">Diskon 50 %</p>

                  </div> -->
                  <img src="{{ asset('img/layanan/marching band.jpg') }}" alt="picture 1"  class=" rounded-md w-full "/>
                </div>
                
              </div>  
              <p class="text-gray-400 text-sm ">*periode 1 Januari - 1 Februari</p>
              </a>
            </div>
          </div>
        </div>
      </div>
      <!-- end kategori -->
      @foreach($promo as $p)
      <div class="mb-6 p-4 py-4 bg-softblue w-full rounded-lg relative  promo">
        <div class="flex mt-2 mb-3">
          <img src="{{ asset('img/landingpage/sale.png') }}" alt="logo sale" class="h-20 w-15 mb-4 sm:mb-0 sm:mr-3 ">
            <div class="ml-3  ">
              <h3 class="font-semibold text-xl text-black ">{{ $p->p_judul }} </h3>
                <p class= "absolute  right-8 xl:top-8 bg-plaster rounded-lg h-6 w-60 text-center mt-3 tracking-wider bottom-4  ">  2024SEWA </p>
                <p class="font-medium text-base text-gray-500">{{$p->p_isi}}</p>
            </div>
        </div>
      </div>
      
      @endforeach
      
      <div class=" container mb-6 p-4 py-4 bg-softblue w-full rounded-lg relative grid xl:grid-cols-2 grid-cols-1 xl:grid-rows-1 grid-rows-2 ">
        <div class="flex">
          <img src="{{ asset('img/landingpage/sale.png') }}" alt="logo sale" class="h-20 w-15 mb-4 sm:mb-0 sm:mr-3 ">
            <div>
              <h3 class="font-semibold text-xl text-black ">Dapatkan Voucher Diskon hingga jutaan rupiah ! </h3>
              <p class="font-medium text-base text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod, quasi!</p>
              <p class="mt-5 inline-block bg-plaster h-6 w-60 text-center rounded-lg tracking-widest text-sm mb-4" > 2024IED</p>
            </div>
        </div>
        <div class="flex space-x-2 xl:ml-20">
          <div>
            <img src="{{ asset('img/layanan/marching band.jpg') }}" alt="picture 1"  class=" rounded-3xl w-80 "/>
          </div>
          <div class="flex flex-col space-y-2">
            <img src="{{ asset('img/transportasi/minibus.jpg') }}" alt="picture 2"  class="rounded-3xl shadow-md overflow-hidden  w-40   "/>
            <img src="{{ asset('img/layanan/marching band.jpg') }}" alt="picture 3"  class=" rounded-3xl shadow-md overflow-hidden w-40   "/>
          </div>
        </div>
      </div>
    </div>
    
</div>
{{ $promo->links() }}
</div>
@endsection