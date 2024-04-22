@extends('layouts-home.navbar.nav-transaksi')
@section('content')
<!-- if -->

<!-- end if -->
<div class="bg-plaster">
    <div class="container px-24 py-24 mx-auto">
        <div class="flex justify-between items-center font-bold ml-36 mb-2">
            <h4 class="ml-6">Congratulations!</h4>
            <div class="bg-primary text-white w-24 p-2 rounded-l-xl xl:mr-10">INVOICE !</div>
        </div>
        <div class="bg-white w-1/2 m-auto h-full p-5 py-12 ">
            <div class="relative">
                <a href="/printPdf" class=" absolute right-0 ">
                <svg class="w-7 h-7 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linejoin="round" stroke-width="2" d="M16.444 18H19a1 1 0 0 0 1-1v-5a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h2.556M17 11V5a1 1 0 0 0-1-1H8a1 1 0 0 0-1 1v6h10ZM7 15h10v4a1 1 0 0 1-1 1H8a1 1 0 0 1-1-1v-4Z"/>
                </svg>
                </a>
            </div>
            <br>
            <div class=" flex flex-col justify-center items-center pb-8 pt-6 ">
                <div>
                <img src="{{ asset('img/centang.png') }}" alt="centang" class="w-20 mb-3">
                </div>
                <div>
                <P class="font-bold text-md ">PEMBAYARAN BERHASIL</P>
                </div>
            </div>
            <div class=" flex justify-between mt-2">
                <div>
                    <h4>SEWA ASET</h4>
                </div>
                <div>
                    <h4 class="font-bold uppercase text-primary text-xl">INVOICE</h4>
                    <p>26 April 2024</p>
                </div>
            </div>
            <p>To : Mrs. Ning</p>
            <p>No. Invoice :</p>
            <div class="flex mb-6 mt-6">
                <img src="{{ asset('img/transportasi/bus.JPG') }} " class="w-48" alt="detail" >
                <div class="ml-4">
                    <h4 class="font-semibold">Bus</h4>
                    <p>Dengan sopir</p>
                </div>
            </div>
            <div class="flex  mb-2" >
                <div class="basis-1/2">
                    <svg class="w-6 h-6 text-primary dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 10h16m-8-3V4M7 7V4m10 3V4M5 20h14a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Zm3-7h.01v.01H8V13Zm4 0h.01v.01H12V13Zm4 0h.01v.01H16V13Zm-8 4h.01v.01H8V17Zm4 0h.01v.01H12V17Zm4 0h.01v.01H16V17Z"/>
                    </svg>
                    <div>
                        <h4>Tanggal Sewa</h4>
                        <p class="text-gray-500 ">Selasa, 3 Maret 2024 12:00 WIB</p>
                    </div>
                </div>
                <div class="basis-1/2">
                    <svg class="w-6 h-6 text-primary dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 10h16m-8-3V4M7 7V4m10 3V4M5 20h14a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Zm3-7h.01v.01H8V13Zm4 0h.01v.01H12V13Zm4 0h.01v.01H16V13Zm-8 4h.01v.01H8V17Zm4 0h.01v.01H12V17Zm4 0h.01v.01H16V17Z"/>
                    </svg>
                    <div>
                        <h4>Tanggal Selesai</h4>
                        <p class="text-gray-500 ">Rabu, 4 Maret 2024 12:00 WIB</p>
                    </div>
                </div>
            </div>
            <hr>
            <div class="">
                <div class="flex justify-between mb-2 mt-2">
                    <h4 class="font-semibold">ID Pesanan</h4>
                    <p>ABC001</p>
                </div>
                <div class="flex justify-between mb-2">
                    <h4 class="font-semibold">Tanggal Pemesanan</h4>
                    <p>Jumat, 1 Maret 2024 09:00 WIB</p>
                </div>
                <div class="flex justify-between mb-2">
                        <h4 class="font-semibold">Metode Pembayaran</h4>
                        <p>Transfer</p>
                </div>
                <div class="flex justify-between mb-2">
                        <h4 class="font-semibold">Total Harga</h4>
                        <p>Rp 2.500.000</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection