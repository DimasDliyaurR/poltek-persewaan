@extends('layouts-user.main')
@section('content')
    <div class="flex  flex-col   w-full p-7">
        <div id="kat" class=" relative  rounded-lg flex xl:flex-row    w-full  xl:shadow-lg mb-10 space-x-2 ">
            <div
                class="xl:w-1/5 md:w-1/3 w-1/2 shadow-lg xl:shadow-none bg-gray-300 hover:bg-gray-500 hover:text-white rounded-lg p-4 cursor-pointer  justify-center items-center ">
                <a href="">Transportasi</a><br>
                <p class="font-bold">{{ $transportasi }} <span>Invoice</span></p>
            </div>
            <div
                class="xl:w-1/5  md:w-1/3 w-1/2 shadow-lg xl:shadow-none bg-gray-300 hover:bg-gray-500 hover:text-white rounded-lg p-4 cursor-pointer   justify-center items-center">
                <a href="/gedung">Gedung</a><br>
                <p class="font-bold">{{ $gedung_lap }} <span>Invoice</span></p>
            </div>
            <div
                class="xl:w-1/5 w-1/2  md:w-1/3 shadow-lg xl:shadow-none bg-gray-300 hover:bg-gray-500 hover:text-white rounded-lg p-4 cursor-pointer  justify-center items-center">
                <a href="/layanan">Layanan</a>
                <br>
                <p class="font-bold">{{ $layanan }} <span>Invoice</span></p>
            </div>
            <div
                class="xl:w-1/5 w-1/2  md:w-1/3  shadow-lg xl:shadow-none bg-gray-300 hover:bg-gray-500 hover:text-white rounded-lg p-4 cursor-pointer  justify-center items-center">
                <a href="/asrama">Asrama</a><br>
                <p class="font-bold">{{ $asrama }} <span>Invoice</span></p>
            </div>
            <div
                class="xl:w-1/5 w-1/2  md:w-1/3 shadow-lg xl:shadow-none  h-40 bg-gray-300 hover:bg-gray-500 hover:text-white rounded-lg p-4 cursor-pointer sm:mx-auto mx-auto xs:mx-auto  justify-center items-center">
                <a href="/alatbarang">Alat Barang</a><br>
                <p class="font-bold">{{ $alat_barang }} <span>Invoice</span></p>

            </div>
        </div>
        <div class="mb-7">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
                <thead class=" text-gray-700 uppercase bg-gray-50 ">
                    <tr>
                        <th scope="col" class="px-6 py-3">No</th>
                        <th scope="col" class="px-6 py-3">Kategori</th>
                        <th scope="col" class="px-6 py-3">Tanggal Pembayaran</th>
                        <th scope="col" class="px-6 py-3">Lihat Invoice</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($semuaTransaksi as $item)
                        <tr class="bg-white border-b ">
                            <td class="px-6  py-4">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4">{{ $item['kategori'] }}</td>
                            <td class="px-6 py-4">
                                {{ \Carbon\Carbon::parse($item['tanggal_pembayaran'])->isoFormat('D MMMM Y') }}</td>
                            <td>
                                @switch($item["kategori"])
                                    @case('Asrama')
                                        <a href="{{ route('invoice.asrama', $item['code_unique']) }}"
                                            class="px-6 py-4 underline">lihat invoice</a>
                                    @break

                                    @case('Layanan')
                                        <a href="{{ route('invoice.layanan', $item['code_unique']) }}"
                                            class="px-6 py-4 underline">lihat invoice</a>
                                    @break

                                    @case('Alat Barang')
                                        <a href="{{ route('invoice.alatBarang', $item['code_unique']) }}"
                                            class="px-6 py-4 underline">lihat invoice</a>
                                    @break

                                    @case('GedungLap')
                                        <a href="{{ route('invoice.gedungLap', $item['code_unique']) }}"
                                            class="px-6 py-4 underline">lihat invoice</a>
                                    @break

                                    @case('Transportasi')
                                        <a href="{{ route('invoice.transportasi', $item['code_unique']) }}"
                                            class="px-6 py-4 underline">invoice.pdf</a>
                                    @break

                                    @default
                                @endswitch
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endsection
