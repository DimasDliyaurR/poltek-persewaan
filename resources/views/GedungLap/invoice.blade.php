@extends('layouts-home.navbar.nav-transaksi')
@section('content')
    <!-- if -->

    <!-- end if -->
    <div class="bg-plaster">
        <div class="container px-24 py-24 mx-auto">
            <div class="flex justify-between items-center font-bold xl:ml-36 md:ml-36 lg:ml-36  mb-2">
                <h4 class="xl:ml-6 md:ml-6 lg:ml-6 ">Congratulations!</h4>
                <div class="bg-primary text-white w-24 p-2 rounded-l-xl xl:mr-10">INVOICE !</div>
            </div>
            <div class="bg-white w-full xl:w-1/2 md:w-1/2 lg:w-1/2 m-auto h-full xl:p-10 p-5 py-12 ">
                <div class="relative ">
                    <button onclick="window.print()" class=" absolute right-0 ">
                        <svg class="w-7 h-7 text-gray-800 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linejoin="round" stroke-width="2"
                                d="M16.444 18H19a1 1 0 0 0 1-1v-5a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h2.556M17 11V5a1 1 0 0 0-1-1H8a1 1 0 0 0-1 1v6h10ZM7 15h10v4a1 1 0 0 1-1 1H8a1 1 0 0 1-1-1v-4Z" />
                        </svg>
                    </button>
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
                        <p class="font-bold xl:text-xl text-sm">SEWA ASET <br>
                            <span class="text-lg">POLITEKNIK PENERBANGAN SURABAYA</span>
                        </p>
                    </div>
                    <div>
                        <h4 class="font-bold uppercase tracking-wide text-primary text-xl">INVOICE</h4>
                        <p>{{ \Carbon\Carbon::now()->isoFormat('D MMMM Y') }}</p>
                    </div>
                </div>
                <div class="py-5 relative">
                    <p class="absolute right-0 mb-2 ">To : </p><br>
                    <p class="absolute right-0 font-bold">{{ $detailTransaksi[0]->user->profile->nama_lengkap }}</p>
                </div>
                <div class="flex  mb-2 mt-2 py-10">
                    <div class="basis-1/2">
                        <svg class="w-6 h-6 text-primary dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 10h16m-8-3V4M7 7V4m10 3V4M5 20h14a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Zm3-7h.01v.01H8V13Zm4 0h.01v.01H12V13Zm4 0h.01v.01H16V13Zm-8 4h.01v.01H8V17Zm4 0h.01v.01H12V17Zm4 0h.01v.01H16V17Z" />
                        </svg>
                        <div>
                            <h4>Tanggal Sewa</h4>
                            {{-- <p class="text-gray-500 ">Selasa, 3 Maret 2024 12:00 WIB</p> --}}
                            <p class="text-gray-500 xl:text-base text-xs ">
                                {{ \Carbon\Carbon::parse($detailTransaksi[0]->ta_check_in)->isoFormat('D MMMM Y') }}
                            </p>
                        </div>
                    </div>
                    <div class="basis-1/2">
                        <svg class="w-6 h-6 text-primary dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 10h16m-8-3V4M7 7V4m10 3V4M5 20h14a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Zm3-7h.01v.01H8V13Zm4 0h.01v.01H12V13Zm4 0h.01v.01H16V13Zm-8 4h.01v.01H8V17Zm4 0h.01v.01H12V17Zm4 0h.01v.01H16V17Z" />
                        </svg>
                        <div>
                            <h4>Tanggal Selesai</h4>
                            {{-- <p class="text-gray-500 xl:text-base text-xs ">Rabu, 4 Maret 2024 12:00 WIB</p> --}}
                            <p class="text-gray-500 xl:text-base text-xs ">
                                {{ \Carbon\Carbon::parse($detailTransaksi[0]->ta_check_out)->isoFormat('D MMMM Y') }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="relative overflow-x-auto ">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
                        <thead class=" text-gray-700 uppercase bg-gray-50 ">
                            <tr>
                                <th scope="col" class="px-1 py-3">Merk Kendaraan</th>
                                <th scope="col" class="px-6 py-3">Tanggal Sewa</th>
                                <th scope="col" class="px-6 py-3">Tanggal Kembali</th>
                                <th scope="col" class="px-6 py-3">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($detailTransaksi as $item)
                                @foreach ($item->gedungLap as $subItem)
                                    <tr class="bg-white border-b">
                                        <td class="px-1 py-4">{{ $subItem->gl_nama }}</td>
                                        <td class="px-6 py-4">
                                            {{ \Carbon\Carbon::parse(date('d M Y', strtotime($item->tg_tanggal_sewa)))->isoFormat('D MMM Y') }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ \Carbon\Carbon::parse(date('d M Y', strtotime($item->tg_tanggal_kembali)))->isoFormat('D MMM Y') }}
                                        </td>
                                        <td class="px-6 py-4">Rp
                                            {{ number_format(!$subItem->paymentMethod->is_dp ? $subItem->gl_tarif : $subItem->paymentMethod->tarif_dp, 0, ',', '.') }}

                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                            @if ($totalPromo)
                                <tr>
                                    <td colspan="3" class="px-6 py-1">Diskon </td>
                                    <td class="px-6 py-1">Rp {{ $totalPromo }}</td>
                                </tr>
                            @endif
                            <tr>
                                <td colspan="3" class="px-6 py-4">Sub Total </td>
                                <td class="px-6 py-4">Rp {{ number_format($total, 0, ',', '.') }}</td>
                            </tr>


                        </tbody>
                    </table>
                </div>

                <hr>
                <div class="">
                    <div class="flex justify-between mb-2 mt-2">
                        <h4 class="font-semibold xl:text-base text-[14px]">ID Pesanan</h4>
                        <p class="">{{ $detailTransaksi[0]->code_unique }}</p>
                    </div>
                    <div class="flex justify-between mb-2">
                        <h4 class="font-semibold xl:text-base text-[14px]">Tanggal Pemesanan</h4>
                        <p class="xl:text-base text-[14px]">
                            {{ \Carbon\Carbon::parse($detailTransaksi[0]->tg_tanggal_sewa)->isoFormat('D MMMM Y') }}</p>
                    </div>
                    <div class="flex justify-between mb-2">
                        <h4 class="font-semibold ">Metode Pembayaran</h4>
                        <p>{{ $detailTransaksi[0]->gedungLap[0]->paymentMethod->is_dp ? 'DP' : 'Lunas' }}</p>
                    </div>
                    <div class="flex justify-between mb-2">
                        <h4 class="font-semibold">Status Pembayaran</h4>
                        <p>{{ $detailTransaksi[0]->status }}</p>
                    </div>
                    <div class="flex justify-between mb-2">
                        <h4 class="font-semibold">Total Harga</h4>
                        <p>Rp {{ number_format($detailTransaksi[0]->tg_sub_total, 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
