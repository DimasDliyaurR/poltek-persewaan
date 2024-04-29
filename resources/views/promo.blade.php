@extends('layouts-home.navbar.nav-old')
@section('content')
<div class="xl:p-36 pt-20">

  <div class="flex flex-wrap  xl:px-32 mx-auto px-2 pb-2 kategori-promo   space-x-2  text-[14px] ">
    <div class="bg-gray-100  h-10 w-28 flex items-center justify-center rounded-md mb-2 cursor-pointer hover:focus:ring-primary hover:border-primary hover:border-2  "><a href="">Semua</a>  </div>
    <div class="bg-gray-100  h-10 w-28 flex items-center justify-center rounded-md mb-2 cursor-pointer hover:focus:ring-primary hover:border-primary hover:border-2  "><a href="">Transportasi</a>  </div>
    <div class="bg-gray-100 w-28 h-10 flex items-center justify-center rounded-md mb-2 cursor-pointer  hover:focus:ring-primary hover:border-primary hover:border-2  "> <a href="">Gedung Lap</a></div>
    <div class="bg-gray-100 w-28 h-10 flex items-center justify-center rounded-md mb-2 cursor-pointer  hover:focus:ring-primary hover:border-primary hover:border-2  "> <a href="">Asrama</a></div>
    <div class="bg-gray-100 w-28 h-10 flex items-center justify-center rounded-md mb-2 cursor-pointer  hover:focus:ring-primary hover:border-primary hover:border-2  "> <a href="">Layanan</a></div>
    <div class="bg-gray-100 w-28 h-10  flex items-center justify-center  rounded-md mb-2 cursor-pointer  hover:focus:ring-primary hover:border-primary hover:border-2 "> <a href="">Alat Barang</a></div>
  </div>
  <!-- start berhasil -->
  <section >
    <div class="flex w-10/12 px-16 xl:px-32 ">
    <h4 class="font-bold my-4">Nama Kategori</h4>
    </div>
    <div class="flex">
      <div class="w-1/12 flex items-center">
        <div class="w-full text-right">
          <button onclick="prev()" class="p-3 rounded-full bg-white border border-gray-100 shadow-lg">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
          </svg>
          </button>
        </div>
      </div>
      <!-- <div id="sliderContainer" class="w-10/12 overflow-hidden ">
        <ul id="slider" class="flex w-full border border-gray-200  duration-700 ">
          <li class="p-5">
            <div class="border rounded-lg p-5 h-full">
              <img src="{{ asset('img/layanan/marching band.jpg') }}" alt="picture 1"  class=" rounded-3xl object-cover h-50 w-full "/>
              <h2 class="mt-2 text-2xl font-bold text-gray-700">promo Idul Fitri</h2>
              <p class="mt-2 text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum, laboriosam.
              </p>
              <button class="mt-4 px-6 py-3 rounded-md bg-green-700 text-white font-bold">Read More</button>
            </div>
          </li>
          <li class="p-5">
            <div class="border rounded-lg p-5 h-full">
              <img src="{{ asset('img/lab.jpg') }}" alt="picture 1"  class=" rounded-3xl object-cover h-50 w-full "/>
              <h2 class="mt-2 text-2xl font-bold text-gray-700">promo Idul Fitri</h2>
              <p class="mt-2 text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum, laboriosam.
              </p>
              <button class="mt-4 px-6 py-3 rounded-md bg-green-700 text-white font-bold">Read More</button>
            </div>
          </li>
          <li class="p-5">
            <div class="border rounded-lg p-5 h-full">
              <img src="{{ asset('img/gerbang.jpg') }}" alt="picture 1"  class=" rounded-3xl object-cover h-50 w-full "/>
              <h2 class="mt-2 text-2xl font-bold text-gray-700">promo Idul Fitri</h2>
              <p class="mt-2 text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum, laboriosam.
              </p>
              <button class="mt-4 px-6 py-3 rounded-md bg-green-700 text-white font-bold">Read More</button>
            </div>
          </li>
          <li class="p-5">
            <div class="border rounded-lg p-5 h-full">
              <img src="{{ asset('img/tar.png') }}" alt="picture 1"  class=" rounded-3xl object-cover h-50 w-full "/>
              <h2 class="mt-2 text-2xl font-bold text-gray-700">promo Idul Fitri</h2>
              <p class="mt-2 text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum, laboriosam.
              </p>
              <button class="mt-4 px-6 py-3 rounded-md bg-green-700 text-white font-bold">Read More</button>
            </div>
          </li>
          <li class="p-5">
            <div class="border rounded-lg p-5 h-full">
              <img src="{{ asset('img/layanan/marching band.jpg') }}" alt="picture 1"  class=" rounded-3xl object-cover h-50 w-full "/>
              <h2 class="mt-2 text-2xl font-bold text-gray-700">promo Idul Fitri</h2>
              <p class="mt-2 text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum, laboriosam.
              </p>
              <button class="mt-4 px-6 py-3 rounded-md bg-green-700 text-white font-bold">Read More</button>
            </div>
          </li>
          <li class="p-5">
            <div class="border rounded-lg p-5 h-full">
              <img src="{{ asset('img/lab.jpg') }}" alt="picture 1"  class=" rounded-3xl object-cover h-50 w-full "/>
              <h2 class="mt-2 text-2xl font-bold text-gray-700">promo Idul Fitri</h2>
              <p class="mt-2 text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum, laboriosam.
              </p>
              <button class="mt-4 px-6 py-3 rounded-md bg-green-700 text-white font-bold">Read More</button>
            </div>
          </li>
        </ul>
      </div> -->
      <div id="sliderContainer"  class="w-10/12 overflow-hidden">
        <ul id="slider" class="flex w-full space-x-2 mb-6 duration-700">
        <li>
          <div class="hover:scale-105 transition  ease-in-out delay-150  ">
            <div class="flex flex-row"><a href="#" class="block max-w-sm p-4  bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 ">
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
        </li>
        <li>
          <div class="hover:scale-105 transition  ease-in-out delay-150  ">
            <div class="flex flex-row"><a href="#" class="block max-w-sm p-4  bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 ">
              <div class="flex space-x-2">
                <div class="basis-1/2">
                  <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Promo Idul Adha</h5>
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
        </li>
        <li>
          <div class="hover:scale-105 transition  ease-in-out delay-150  ">
            <div class="flex flex-row"><a href="#" class="block max-w-sm p-4  bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 ">
              <div class="flex space-x-2">
                <div class="basis-1/2">
                  <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Promo Ketupat</h5>
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
        </li>
        <li> 
          <div class="  hover:scale-105 transition  ease-in-out delay-150  ">
              <div class="flex flex-row"><a href="#" class="block max-w-sm p-4  bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 ">
                <div class="flex space-x-2">
                  <div class="basis-1/2">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Promo Nataru</h5>
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
        </li>
        </ul>
      </div>
        <div class="w-1/12 flex items-center ">
        <div class="w-full">
          <button onclick="next()" class="p-3 rounded-full bg-white border border-gray-100 shadow-lg">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
          </svg>
          </button>
        </div>
      </div>
    </div>
  </section>
      <!-- end -->

  <!-- <section id="Gedung">
    <h4 class="font-bold my-4"> Kategori Gedung Lap</h4>
  <div class="flex">
    <div class="w-2/12 flex items-center">
      <div class="w-full text-right">
        <button onclick="prev()" class="p-3 rounded-full bg-white border border-gray-100 shadow-lg">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
        </svg>
        </button>
      </div>
    </div>
    <div id="sliderContainer" class="w-10/12 overflow-hidden ">
    <ul id="slider" class="flex w-full  duration-700 ">
      <li class="p-5">
            <div class="border rounded-lg p-5 h-full">
              <img src="{{ asset('img/layanan/marching band.jpg') }}" alt="picture 1"  class=" rounded-3xl object-cover h-50 w-full "/>
              <h2 class="mt-2 text-2xl font-bold text-gray-700">promo Idul Fitri</h2>
              <p class="mt-2 text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum, laboriosam.
              </p>
              <button class="mt-4 px-6 py-3 rounded-md bg-green-700 text-white font-bold">Read More</button>
            </div>
      </li>
      <li class="p-5">
            <div class="border rounded-lg p-5 h-full">
              <img src="{{ asset('img/layanan/marching band.jpg') }}" alt="picture 1"  class=" rounded-3xl object-cover h-50 w-full "/>
              <h2 class="mt-2 text-2xl font-bold text-gray-700">promo Idul Fitri</h2>
              <p class="mt-2 text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum, laboriosam.
              </p>
              <button class="mt-4 px-6 py-3 rounded-md bg-green-700 text-white font-bold">Read More</button>
            </div>
      </li>
      <li class="p-5">
            <div class="border rounded-lg p-5 h-full">
              <img src="{{ asset('img/layanan/marching band.jpg') }}" alt="picture 1"  class=" rounded-3xl object-cover h-50 w-full "/>
              <h2 class="mt-2 text-2xl font-bold text-gray-700">promo Idul Fitri</h2>
              <p class="mt-2 text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum, laboriosam.
              </p>
              <button class="mt-4 px-6 py-3 rounded-md bg-green-700 text-white font-bold">Read More</button>
            </div>
      </li>
      <li class="p-5">
            <div class="border rounded-lg p-5 h-full">
              <img src="{{ asset('img/layanan/marching band.jpg') }}" alt="picture 1"  class=" rounded-3xl object-cover h-50 w-full "/>
              <h2 class="mt-2 text-2xl font-bold text-gray-700">promo Idul Fitri</h2>
              <p class="mt-2 text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum, laboriosam.
              </p>
              <button class="mt-4 px-6 py-3 rounded-md bg-green-700 text-white font-bold">Read More</button>
            </div>
      </li>
    </ul>
    </div>
      <div class="w-2/12 flex items-center ">
        <div class="w-full">
          <button onclick="next()" class="p-3 rounded-full bg-white border border-gray-100 shadow-lg">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
          </svg>
          </button>
        </div>
      </div>
  </div>
  </section> -->
  <div class="w-full px-4  justify-center xl:w-10/12 xl:mx-auto">
      <!-- Kategori 3 dari DB -->
      <div class=" container  my-4 ">
        <h4 class="font-bold my-4">Nama Kategori</h4>
        <div class="flex space-x-2 mb-6">
          <div class="  w-full  sm:w-1/2 lg:w-1/2 xl:w-1/3 hover:scale-105 transition  ease-in-out delay-150  ">
            <div class="flex flex-row"><a href="#" class="block max-w-sm p-4  bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 ">
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
          <div class=" w-full  sm:w-1/2 lg:w-1/2 xl:w-1/3 hover:scale-105 transition  ease-in-out delay-150  ">
            <div class="flex flex-row"><a href="#" class="block max-w-sm p-4  bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 ">
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
          <div class=" w-full  sm:w-1/2 lg:w-1/2 xl:w-1/3 hover:scale-105 transition  ease-in-out delay-150  ">
            <div class="flex flex-row">
              <a href="#" class="block max-w-sm p-4  bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 ">
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
        </div>
      </div>
      <!-- end 3 -->
      
      <!-- kaegori 1 baris dari DB -->
      @foreach($promo as $p)
      <div class="my-4"> 
        <h4 class="font-bold">Nama Kategori</h4>
        <div class="mb-6 p-4 py-4 bg-softblue w-1/2 rounded-lg relative  promo">
          <div class="flex mt-2 mb-3">
            <img src="{{ asset('img/landingpage/sale.png') }}" alt="logo sale" class="h-20 w-15 mb-4 sm:mb-0 sm:mr-3 ">
              <div class="ml-3  ">
                <h3 class="font-semibold text-xl text-black ">{{ $p->p_judul }} </h3>
                  <p class= "absolute  right-8 xl:top-8 bg-plaster rounded-lg h-6 w-60 text-center mt-3 tracking-wider bottom-4  ">  2024SEWA </p>
                  <p class="font-medium text-base text-gray-500">{{$p->p_isi}}</p>
              </div>
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