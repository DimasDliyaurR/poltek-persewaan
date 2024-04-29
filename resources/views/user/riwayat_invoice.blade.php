@extends('layouts-user.main')
@section('content')

<div class="flex flex-col  w-full p-7">
    <div id="kat" class=" relative  rounded-lg flex xl:flex-row    w-full  xl:shadow-lg mb-10 space-x-2 ">
      <div class="xl:w-1/5 md:w-1/3 w-1/2 shadow-lg xl:shadow-none bg-grecianblue  h-40 hover:bg-gray-300 rounded-lg p-4 cursor-pointer  justify-center items-center ">
        <a href="">Transportasi</a><br>
        <p class="font-bold">0 <span>Invoice</span></p>
      </div>
      <div class="xl:w-1/5  md:w-1/3 w-1/2 shadow-lg xl:shadow-none bg-sea h-40 hover:bg-gray-300 rounded-lg p-4 cursor-pointer   justify-center items-center">
        <a href="/gedung">Gedung</a><br>
        <p class="font-bold">0 <span>Invoice</span></p>
      </div>
      <div class="xl:w-1/5 w-1/2  md:w-1/3 shadow-lg xl:shadow-none h-40 bg-coral hover:bg-gray-300 rounded-lg p-4 cursor-pointer  justify-center items-center">
        <a href="/layanan">Layanan</a>
        <br>
        <p class="font-bold">0 <span>Invoice</span></p>
      </div>
        <div class="xl:w-1/5 w-1/2  md:w-1/3  shadow-lg xl:shadow-none h-40 bg-softblue  hover:bg-gray-300 rounded-lg p-4 cursor-pointer  justify-center items-center">
          <a href="/asrama" >Asrama</a><br>
        <p class="font-bold">0 <span>Invoice</span></p>
        </div>
        <div class="xl:w-1/5 w-1/2  md:w-1/3 shadow-lg xl:shadow-none  h-40 bg-gray-300 hover:bg-gray-300 rounded-lg p-4 cursor-pointer sm:mx-auto mx-auto xs:mx-auto  justify-center items-center">
          <a href="/alatbarang">Alat Barang</a><br>
        <p class="font-bold">0 <span>Invoice</span></p>

        </div>
    </div>
    <div>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
            <thead class=" text-gray-700 uppercase bg-gray-50 ">
                <tr>
                    <th scope="col" class="px-6 py-3">No</th>
                    <th scope="col" class="px-6 py-3">ID Pesanan</th>
                    <th scope="col" class="px-6 py-3">No Invoice</th>
                    <th scope="col" class="px-6 py-3">Tgl Invoice</th>
                    <th scope="col" class="px-6 py-3">Lihat Invoice</th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-white border-b ">
                    <td class="px-6  py-4">1</td>
                    <td class="px-6 py-4">12</td>
                    <td class="px-6 py-4">1A</td>
                    <td class="px-6 py-4">17-Apr-2024</td>
                    <td class="px-6 py-4 underline">invoice.pdf</td>
                </tr>
                <tr class="bg-white border-b ">
                    <td class="px-6  py-4">2</td>
                    <td class="px-6 py-4">15</td>
                    <td class="px-6 py-4">1BC</td>
                    <td class="px-6 py-4">17-Apr-2024</td>
                    <td class="px-6 py-4 underline">invoice.pdf</td>
                </tr>
                <tr class="bg-white border-b ">
                    <td class="px-6  py-4">3</td>
                    <td class="px-6 py-4">17</td>
                    <td class="px-6 py-4">12A</td>
                    <td class="px-6 py-4">17-Apr-2024</td>
                    <td class="px-6 py-4 underline">invoice.pdf</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="bg-white w-full  m-auto h-full xl:p-10 p-5 py-12 border-2 shadow ">
    <!-- <div class="bg-white w-full xl:w-1/2 md:w-1/2 lg:w-1/2 m-auto h-full xl:p-10 p-5 py-12 "> -->
            <div class="relative ">
                <a href="/printPdf" class=" absolute right-0 ">
                <svg class="w-7 h-7 text-gray-800 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
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
            <div class="py-5 relative">
                <p class="absolute right-0 mb-2 ">To : </p><br>
                <p class="absolute right-0 font-bold">Mrs. Ning</p>
                <p class="font-bold">No. Invoice : 1A</p>
            </div>
            <div class="flex  mb-2 mt-2 py-10" >
                <div class="basis-1/2">
                    <svg class="w-6 h-6 text-primary " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 10h16m-8-3V4M7 7V4m10 3V4M5 20h14a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Zm3-7h.01v.01H8V13Zm4 0h.01v.01H12V13Zm4 0h.01v.01H16V13Zm-8 4h.01v.01H8V17Zm4 0h.01v.01H12V17Zm4 0h.01v.01H16V17Z"/>
                    </svg>
                    <div>
                        <h4>Tanggal Sewa</h4>
                        <p class="text-gray-500 ">Selasa, 3 Maret 2024 12:00 WIB</p>
                    </div>
                </div>
                <div class="basis-1/2">
                    <svg class="w-6 h-6 text-primary " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 10h16m-8-3V4M7 7V4m10 3V4M5 20h14a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Zm3-7h.01v.01H8V13Zm4 0h.01v.01H12V13Zm4 0h.01v.01H16V13Zm-8 4h.01v.01H8V17Zm4 0h.01v.01H12V17Zm4 0h.01v.01H16V17Z"/>
                    </svg>
                    <div>
                        <h4>Tanggal Selesai</h4>
                        <p class="text-gray-500 xl:text-base text-xs ">Rabu, 4 Maret 2024 12:00 WIB</p>
                    </div>
                </div>
            </div>
            <div class="relative overflow-x-auto ">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
                    <thead class=" text-gray-700 uppercase bg-gray-50 ">
                        <tr>
                            <th scope="col" class="px-1 py-3">Nama Barang</th>
                            <th scope="col" class="px-6 py-3">QTY</th>
                            <th scope="col" class="px-6 py-3">Harga</th>
                            <th scope="col" class="px-6 py-3">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white border-b ">
                            <td class="px-1 py-4">Kamar tipe A</td>
                            <td class="px-6 py-4">1</td>
                            <td class="px-6 py-4">Rp 500.000</td>
                            <td class="px-6 py-4">Rp 500.000</td>
                        </tr>
                        <tr class="bg-white border-b ">
                            <td class="px-1 py-4">Kamar tipe A</td>
                            <td class="px-6 py-4">1</td>
                            <td class="px-6 py-4">Rp 500.000</td>
                            <td class="px-6 py-4">Rp 500.000</td>
                        </tr>
                        <tr class="bg-white border-b ">
                            <td class="px-1 py-4">Kamar tipe A</td>
                            <td class="px-6 py-4">1</td>
                            <td class="px-6 py-4">Rp 500.000</td>
                            <td class="px-6 py-4">Rp 500.000</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4"></td>
                            <td class="px-6 py-4"></td>
                            <td class="px-6 py-4">Sub Total </td>
                            <td class="px-6 py-4">Rp 500.000</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-1"></td>
                            <td class="px-6 py-1"></td>
                            <td class="px-6 py-1">Diskon </td>
                            <td class="px-6 py-1">Rp 500.000</td>
                        </tr>
                        
                        
                    </tbody>
                </table>
            </div>
            
            <hr>
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
                        <p>Rp 2.500.000</p>
                </div>
            </div>
        </div>
</div>

@endsection