@extends('layouts-user.main')
@section('content')

<div class="xl:w-2/3 ">

    <div class="w-full h-full rounded-lg p-4 border-2 shadow-lg">
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
</div>
@endsection