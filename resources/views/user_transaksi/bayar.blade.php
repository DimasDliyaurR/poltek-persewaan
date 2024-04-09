@extends('layouts-home.navbar.nav-transaksi')
@section('content')

<div class="bg-plaster">
  <div class="container mx-auto px-4 py-24">
    <div class="flex justify-start items-center font-bold ml-36 mb-2">
      <h4 class="ml-6">Pembayaran</h4>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:gap-32 gap-6 md:gap-10">
      <div class="grid col-span-2 md:grid-rows-2 md:grid-flow-col xl:gap-1 gap-2 p-4 md:gap-52 w-full">
        <div class="bg-white relative shadow-md p-4 w-full h-20 xl:ml-36 mx-auto rounded-md ">
            <div class="flex justify-between">
                <div>
                    <h4 class=" mb-2">Batas Pembayaran</h4>
                    <p class="text-gray-500 text-sm ">Sisa waktu pembayaran</p>
                </div>
                <div class="border border-gray-200 shadow w-40 h-10 mt-1 ">
                    <p class="text-sm text-primary text-center p-2">23 jam 50 menit</p>
                </div>
            </div>
        </div>
        <div class="bg-white -mt-64  shadow-md p-4 w-full h-80 xl:ml-36 mx-auto rounded-md">
            <form action="">
                <div class="mb-2">
                    <label for="kode">Kode Pembayaran</label><br>
                    <input type="text" class="w-full shadow-md border border-gray-100"><br>
                </div>
                <div class="mb-2">
                    <label for="kode" class="mb-1">Upload Bukti Pembayaran</label><br>
                    <input type="file" class="w-full border border-gray-100 shadow-md"><br>
                </div>
                <button class=" mt-1 bg-primary text-white text-sm p-1 hover:opacity-30 shadow-md  hover:text-black rounded-sm"><a href="">Kirim</a></button>
            </form>
            <div class="mt-4 mb-3">
                <h4>Status Pembayaran</h4>
                <p class="text-gray-400 text-sm">Menunggu pembayaran</p>
            </div>
        </div>
      </div>
      <div class="grid col-span-1 xl:gap-3 xl:w-1/3 p-4 md:gap-52 w-full">
        <div class="bg-white h-39 w-72 relative">
          <h4 class="font-semibold p-3">NO PESANAN</h4>
          <h4 class="font-semibold p-3 text-gray-400 ">001</h4>
          <h4 class=" p-3">TOTAL PEMBAYARAN</h4>
          <h4 class=" p-3 text-gray-400  ">Rp 2.500.000</h4>
          <h4 class="font-semibold p-3">RINCIAN PESANAN</h4>
          <h4 class="font-semibold p-3 text-gray-400 ">Excecutive Bus</h4>
          <h4 class=" p-3">Tanggal & Waktu Mulai</h4>
          <h4 class=" p-3 text-gray-400  ">Sel, 5 Mar 2024 18.00 WIB</h4>
          <h4 class=" p-3">Tanggal & Waktu Selesai</h4>
          <h4 class=" p-3 text-gray-400  ">Rab, 6 Mar 2024 18.00 WIB</h4>
          <h4 class="font-semibold p-3">DATA PEMESAN</h4>
          <h4 class="font-semibold p-3 text-gray-400 ">vio</h4>
          <h4 class="font-semibold p-3 text-gray-400 ">08XXXXXXXX</h4>
          <h4 class="font-semibold p-3 text-gray-400 ">vio99@gmail.com</h4>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
