@extends('layouts-home.navbar.nav-transaksi')
@section('header')
<header class="bg-transparent absolute top-0 left-0 w-full flex items-center z-10">
  <div class="container">
    <div class="flex items-center justify-between relative">
      <div class=" flex items-center px-4">
        <img src="{{ asset('img/LogoPoltekbang.png') }}" class="h-11 w-15" alt="Logo ">
        <div class="ml-1">
          <a href="/index #home" class="font-bold text-lg text-black">
              SEWA ASET<br>
              <span class="font-bold text-lg text-black">POLITEKNIK PENERBANGAN SURABAYA</span>
          </a>
        </div>
      </div>
      <div class=" flex items-center px-4">
      <button id="hamburger" name="hamburger" type="button"class="block absolute right-4 lg:hidden">
        <span class="hamburger-line transition duration-300 origin-top-left"></span>
        <span class="hamburger-line"></span>
        <span class="hamburger-line origin-bottom-left"></span>
      </button>
      <nav id="nav-menu" class="hidden absolute py-5 bg-transparent shadow-lg rounded-lg max-w-[250px] w-full right-4 top-full lg:block lg:static lg:max-w-full lg:shadow-none lg:rounded-none  ">
        <ul class="block lg:flex">
          <li class="group text-base font-normal text-black py-2 mx-8 flex hover:text-primary active:text-primary">
            <span class="w-6 h-6"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path fill="black" d="M12 22q-2.075 0-3.9-.788t-3.175-2.137q-1.35-1.35-2.137-3.175T2 12q0-2.075.788-3.9t2.137-3.175q1.35-1.35 3.175-2.137T12 2q2.075 0 3.9.788t3.175 2.137q1.35 1.35 2.138 3.175T22 12q0 2.075-.788 3.9t-2.137 3.175q-1.35 1.35-3.175 2.138T12 22m0-2q3.35 0 5.675-2.325T20 12q0-3.35-2.325-5.675T12 4Q8.65 4 6.325 6.325T4 12q0 3.35 2.325 5.675T12 20m-.5-3h2V7h-4v2h2z" />
            </svg></span>Pemesanan</a>
          </li>
          <li class="group text-base text-black py-2 mx-8 flex group-hover:text-primary active:bg-primary">
            <span class="w-6 h-6"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path fill="black" d="M12 22q-2.075 0-3.9-.788t-3.175-2.137q-1.35-1.35-2.137-3.175T2 12q0-2.075.788-3.9t2.137-3.175q1.35-1.35 3.175-2.137T12 2q2.075 0 3.9.788t3.175 2.137q1.35 1.35 2.138 3.175T22 12q0 2.075-.788 3.9t-2.137 3.175q-1.35 1.35-3.175 2.138T12 22m0-2q3.35 0 5.675-2.325T20 12q0-3.35-2.325-5.675T12 4Q8.65 4 6.325 6.325T4 12q0 3.35 2.325 5.675T12 20m-3-3h6v-2h-4v-2h2q.825 0 1.413-.587T15 11V9q0-.825-.587-1.412T13 7H9v2h4v2h-2q-.825 0-1.412.588T9 13z" />
          </svg></span>Pembayaran
          </li>
          <li class="group text-base text-black py-2 mx-8 flex group-hover:text-primary">
            <span class="w-6 h-6"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path fill="black" d="M12 22q-2.075 0-3.9-.788t-3.175-2.137q-1.35-1.35-2.137-3.175T2 12q0-2.075.788-3.9t2.137-3.175q1.35-1.35 3.175-2.137T12 2q2.075 0 3.9.788t3.175 2.137q1.35 1.35 2.138 3.175T22 12q0 2.075-.788 3.9t-2.137 3.175q-1.35 1.35-3.175 2.138T12 22m0-2q3.35 0 5.675-2.325T20 12q0-3.35-2.325-5.675T12 4Q8.65 4 6.325 6.325T4 12q0 3.35 2.325 5.675T12 20m-3-3h4q.825 0 1.413-.587T15 15v-1.5q0-.65-.425-1.075T13.5 12q.65 0 1.075-.425T15 10.5V9q0-.825-.587-1.412T13 7H9v2h4v2h-2v2h2v2H9z" />
            </svg></span>Pesanan Berhasil
          </a>
          </li>
        </ul>
      </nav>
      </div>
    </div>
  </div>
</header>
@endsection
@section('content')

<div class="bg-plaster h-screen">
    <div class="container px-24 py-24 mx-auto">
        <div class="flex justify-between items-center font-bold xl:ml-36 md:ml-36 lg:ml-36  mb-2">
            <h4 class="xl:ml-6 md:ml-6 lg:ml-6 ">Congratulations!</h4>
            <div class="bg-primary text-white w-24 p-2 rounded-l-xl xl:mr-10">INVOICE !</div>
        </div>
        <div id="invoice" class=" shadow-lg bg-white w-full xl:w-1/2 md:w-1/2 lg:w-1/2 m-auto h-full xl:p-10 p-5 py-12 ">
            <div class="relative flex ">
                
                    <!-- <button class=" absolute right-0 "> -->
                        <!-- <button onclick="window.print()" > -->
                        <a href="/print" title="Download Invoice" target="_blank" class=" absolute right-0 ">
                        <svg class="w-7 h-7 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linejoin="round" stroke-width="2" d="M16.444 18H19a1 1 0 0 0 1-1v-5a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h2.556M17 11V5a1 1 0 0 0-1-1H8a1 1 0 0 0-1 1v6h10ZM7 15h10v4a1 1 0 0 1-1 1H8a1 1 0 0 1-1-1v-4Z"/>
                        </svg>
                        <!-- Cetak Invoice -->
                    </a>
                    <!-- </button> -->
                
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
            <!-- <div class=" flex justify-between mt-2">
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
            </div> -->
            <!-- <div class="py-5 relative">
                <p class="absolute right-0 mb-2 ">To : </p><br>
                <p class="absolute right-0 font-bold">Mrs. Ning</p>
                <p class="font-bold">No. Invoice : 1A</p>
            </div> -->
            <!-- <div class="flex  mb-2 mt-2 py-10" >
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
                        <p class="text-gray-500 xl:text-base text-xs ">Rabu, 4 Maret 2024 12:00 WIB</p>
                    </div>
                </div>
            </div> -->
            <!-- <div class="relative overflow-x-auto ">
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
            </div> -->
            
            <hr>
            <!-- <div class="">
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
            </div> -->
        </div>
    </div>
</div>
@endsection
@section('script')
<script>

</script>
@endsection