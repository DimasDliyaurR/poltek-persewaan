@extends('layouts-user.main')
@section('content')

<div class="flex xl:flex-row flex-col space-x-2">

        <div class=" xl:w-2/3 w-full h-full rounded-lg p-4 border-2 shadow-lg">
            <div class="flex justify-between mb-2"> 
                <h4>Kategori Voucher</h4>
                <h4 class="">Berhasil digunakan</h4>
            </div>
            <hr class="">
            <div class="flex my-4 ">
                <img src="{{ asset('img/transportasi/bus.JPG') }} " class="w-48" alt="detail" >
                <div class="ml-4">
                    <h4 class="font-semibold">Voucher Idul Fitri</h4>
                    <p class="text-base">Diskon 50%</p>
                </div>
            </div>
            <div class="relative">
                <p class="absolute right-0 ">Digunakan pada : <span class="font-bold text-primary ">12 April 2024</span></p><br>
            </div>
        </div>

    <div class="xl:w-1/3 border border-gray-200 p-2 ">
    <div class="  flex flex-col items-center pb-10">
      <h5 class="mb-1 text-xl font-bold text-gray-900 dark:text-white">My Profile</h5>
        <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="{{ asset('img/user.png')}}" alt=" image"/>
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