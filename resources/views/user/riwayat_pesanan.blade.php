@extends('layouts-user.main')
@section('content')

<div class="flex flex-wrap items-center justify-center p-4 shadow-md mb-3 bg-white">
  <p class="w-1/5 cursor-pointer text-center hover:bg-primary">Semua</p>
  <p class="w-1/5 cursor-pointer text-center hover:bg-primary">Belum Bayar</p>
  <p class="w-1/5 cursor-pointer text-center hover:bg-primary">Diproses</p>
  <p class="w-1/5 cursor-pointer text-center hover:bg-primary">Selesai</p>
  <p class="w-1/5 cursor-pointer text-center hover:bg-primary">Dibatalkan</p>
</div>
<div class="w-full h-96 rounded-lg p-4 bg-white">
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
          <p>x 1</p>
      </div>
  </div>
  <div class="relative">
    <p class="absolute right-0">Total Harga: <span class="font-bold text-primary">Rp 10.000.000</span></p>
    <button class=" absolute right-0 bg-primary p-2 text-white text-xs font-bold rounded-lg"><a href="">Sewa Lagi</a> </button>
  </div>
</div>
@endsection