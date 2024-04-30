@extends('layouts-user.main')
@section('content')
<div class=" flex xl:flex-row flex-col xl:space-x-2">
  <div class="xl:w-2/3 mx-auto">
    <div class="flex flex-wrap items-center justify-center p-4 shadow-md mb-3 bg-white">
      <p class="w-1/5 cursor-pointer text-center hover:bg-primary">Semua</p>
      <p class="w-1/5 cursor-pointer text-center hover:bg-primary">Belum Bayar</p>
      <p class="w-1/5 cursor-pointer text-center hover:bg-primary">Diproses</p>
      <p class="w-1/5 cursor-pointer text-center hover:bg-primary">Selesai</p>
      <p class="w-1/5 cursor-pointer text-center hover:bg-primary">Dibatalkan</p>
    </div>
    <div class="w-full h-64 rounded-lg p-4 border-2 shadow-lg">
      <div class="flex justify-between mb-2"> 
        <h4>Transportasi</h4>
        <h4 class="uppercase">Selesai</h4>
      </div>
      <hr class="">
      <div class="flex my-4 ">
          <img src="{{ asset('img/transportasi/bus.JPG') }} " class="w-48" alt="detail" >
          <div class="ml-4">
              <h4 class="font-semibold">Bus</h4>
              <p class="text-base">Dengan sopir</p>
          </div>
      </div>
      <div class="relative">
        <p class="absolute right-0 -mt-2">Total Harga: <span class="font-bold text-primary text-xl">Rp 10.000.000</span></p><br>
        <button class=" absolute right-0 bg-primary p-2 text-white text-xs font-bold rounded-lg "><a href="">Sewa Lagi</a> </button>
      </div>
    </div>
  </div>
  <div class=" xl:w-1/3 md:w-1/3 lg:w-1/3  w-full bg-white border-2  border-gray-200 rounded-lg shadow h-screen">
    <div class="flex justify-end px-4 pt-4">
        <button id="dropdownButton" data-dropdown-toggle="dropdown" class="inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5" type="button">
            <span class="sr-only">Open dropdown</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>
            </svg>
        </button>
        <!-- Dropdown menu -->
        <div id="dropdown" class="z-10 hidden text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
            <ul class="py-2" aria-labelledby="dropdownButton">
            <li>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Edit</a>
            </li>
            <li>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Export Data</a>
            </li>
            <li>
                <a href="#" class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete</a>
            </li>
            </ul>
        </div>
    </div>
    <div class="flex flex-col items-center pb-10">
      <h5 class="mb-1 text-xl font-bold text-gray-900 dark:text-white">My Profile</h5>
        <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="{{ asset('img/centang.png')}}" alt="Bonnie image"/>
        <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">Bonnie Green</h5>
        <span class="text-sm text-gray-500 dark:text-gray-400">Visual Designer</span>
        <div class="flex mt-4 md:mt-6">
            <a href="#" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 ">Lihat Profile</a>
            <a href="#" class="py-2 px-4 ms-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 ">Edit Profile</a>
        </div>
    </div>
    <hr class="w-3/4 mx-auto pt-4">
    <div class="xl:px-14 py-4 ">
      <h5 class="font-bold text-gray-500 py-2">Riwayat Transaksi Terbaru</h5>
      <p class="text-base text-gray-300 py-2">31 Juni 2023</p>
      <h5 class="font-bold text-gray-500 py-2">Riwayat Transaksi Berhasil</h5>
      <p class="text-base text-gray-300 py-2">0</p>
      <h5 class="font-bold text-gray-500 py-2">Riwayat Transaksi Dibatalkan</h5>
      <p class="text-base text-gray-300 py-2">0</p>
    </div>
  </div>
</div>
@endsection