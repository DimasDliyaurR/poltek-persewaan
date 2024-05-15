@extends('layouts-user.main')
@section('content')

<div class="flex  flex-col   w-full p-7">
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
    <div class="mb-7">
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
                    <td class="px-6 py-4 underline"><a href="/detail_invoice" class="cursor-pointer">invoice.pdf</a></td>
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
 

@endsection