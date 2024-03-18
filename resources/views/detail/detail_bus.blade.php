@extends('layouts-home.navbar.nav-old')
@section('content')
<div class="container">
<div class="w-full  pb-36 pt-36 px-4 flex flex-wrap justify-center xl:w-10/12 xl:mx-auto">
        
          <div class="mb-12 p-4 ">
            <h3 class="font-semibold text-xl text-black mt-5 mb-3">Bus </h3>
            <div class="rounded-md shadow-md overflow-hidden">
              <img src="{{ ('img/layanan/marching band.jpg') }}" alt="" width="w-full" />
            </div>
          </div>
          <div class="mb-12 p-4 md:w-1/2">
            <div class="rounded-md shadow-md overflow-hidden">
              <img src="{{ ('img/layanan/marching band.jpg') }}" alt="" width="w-full" />
            </div>
            <h3 class="font-semibold text-xl text-black mt-5 mb-3">Promo Pedangpora</h3>
            <p class="font-medium text-base text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod, quasi!</p>
          </div>
          <div class="mb-12 p-4 md:w-1/2">
            <div class="rounded-md shadow-md overflow-hidden">
            <img src="{{ ('img/layanan/marching band.jpg') }}" alt="" width="w-ful" />

            </div>
            <h3 class="font-semibold text-xl text-black mt-5 mb-3">Promo 2</h3>
            <p class="font-medium text-base text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod, quasi!</p>
          </div>
        </div>
</div>
 
    

@endsection