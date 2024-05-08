@extends('layouts-home.navbar.nav-transaksi')
@section('scriptlink')
<style>
    .logoImage{
        background-image: url("{{asset('img/logoInvoice.png')}}");
        background-position: center;
    }
</style>
@endsection
@section('content')

<div class="bg-plaster h-screen">
    <div class="container px-24 mx-auto">
        <div id="invoice" class=" bg-white bg-no-repeat logoImage w-full xl:w-1/2 md:w-1/2 lg:w-1/2 m-auto h-screen xl:p-10 p-5 py-12 ">
            <div class="relative mb-10 ">
                <button onclick="window.print()" class=" absolute right-0">
                    <svg class="w-7 h-7 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linejoin="round" stroke-width="2" d="M16.444 18H19a1 1 0 0 0 1-1v-5a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h2.556M17 11V5a1 1 0 0 0-1-1H8a1 1 0 0 0-1 1v6h10ZM7 15h10v4a1 1 0 0 1-1 1H8a1 1 0 0 1-1-1v-4Z"/>
                    </svg>
                    </a>
                </button>
            </div>
            <br>
            <div class=" flex justify-between mt-2">
                <div class="flex">
                    <img src="{{ asset('img/LogoPoltekbang.png') }}" class="h-11 w-15 " alt="Logo ">  
                    <p class="font-bold xl:text-xl text-sm">SEWA ASET  <br>
                    <span class="text-lg">POLITEKNIK PENERBANGAN SURABAYA</span>
                    </p>
                </div>
                <div>
                    <h4 class="font-bold uppercase tracking-wide text-primary text-xl">INVOICE</h4>
                    <p>26 April 2024</p>
                </div>
            </div>
            <div class="pb-5 pt-10  flex justify-between">
                <div>
                <p class="font-bold">No. Invoice : 1A</p>
                </div>
                <div>
                <p class=" mb-2 ">To : </p>
                <p class=" font-bold">Mrs. Ning</p>
                </div>
            </div>
            <div class="flex pb-8 " >
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
                        <p class="text-gray-500  ">Rabu, 4 Maret 2024 12:00 WIB</p>
                    </div>
                </div>
            </div>
            <div class="relative overflow-x-auto mb-8">
                <table class="table-fixed w-full  text-left rtl:text-right text-gray-500 ">
                    <thead class=" text-gray-700 uppercase bg-gray-50 ">
                        <tr>
                            <th scope="col" class="px-1 py-3">Nama Barang</th>
                            <th scope="col" class="px-6 py-3">QTY</th>
                            <th scope="col" class="px-6 py-3">Satuan</th>
                            <th scope="col" class="px-4 py-3">Harga</th>
                            <th scope="col" class="absolute right-0 py-3">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white border-b ">
                            <td class="px-1 py-4">Papan Coding</td>
                            <td class="px-6 py-4">1</td>
                            <td class="px-6 py-4">/ hari</td>
                            <td class="px-4 py-4">Rp 50.000</td>
                            <td class="absolute right-0 py-4">Rp 50.000</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-1"></td>
                            <td class="px-6 py-1"></td>
                            <td class="px-6 py-1"></td>
                            <td class="px-4 py-1">Sub Total </td>
                            <td class="absolute right-0 py-1">Rp 50.000</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-1"></td>
                            <td class="px-6 py-1"></td>
                            <td class="px-6 py-1"></td>
                            <td class="px-4 py-1">Diskon </td>
                            <td class="absolute right-0  py-1">Rp 50.000</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- <hr> -->
            <div class="">
                <div class="flex justify-between mb-2 mt-2">
                    <h4 class="font-semibold xl:text-base text-[14px]">ID Pesanan</h4>
                    <p class="">ABC001</p>
                </div>
                <div class="flex justify-between mb-2">
                    <h4 class="font-semibold xl:text-base text-[14px]">Tanggal Pemesanan</h4>
                    <p class="xl:text-base text-[14px]">Jumat, 1 Maret 2024 09:00 WIB</p>
                </div>
                <div class="flex justify-between mb-2">
                        <h4 class="font-semibold ">Metode Pembayaran</h4>
                        <p>Transfer</p>
                </div>
                <div class="flex justify-between mb-2">
                        <h4 class="font-semibold">Status Pembayaran</h4>
                        <p>Lunas</p>
                </div>
                <div class="flex justify-between mb-2">
                        <h4 class="font-semibold">Total Harga</h4>
                        <p>Rp 50.000</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
