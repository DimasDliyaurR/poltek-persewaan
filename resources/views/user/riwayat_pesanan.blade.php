@extends('layouts-user.main')
@section('content')
    <div class="xl:space-x-2 w-full flex flex-col gap-5 justify-center items-center">
        {{-- Transaksi  Terbayar --}}
        <div class="flex flex-col gap-5 w-full bg-gray-100 p-4">
            <p class="m-4 uppercase text-xl font-bold">Transaksi Terbayar</p>

            @forelse ($terbayar as $item)
                <div class="flex justify-between bg-white shadow-gray-400 p-5 rounded-lg">
                    <span>{{ $item['kategori'] }}</span>
                    <span>Rp. {{ number_format($item['nominal'], 0, ',', '.') }}</span>
                    <span>{{ \Carbon\Carbon::parse($item['created_at'])->isoFormat('D MMMM Y') }}</span>
                    @switch($item["kategori"])
                        @case('Asrama')
                            <a href="{{ route('invoice.asrama', $item['code_unique']) }}"
                                class="p-2 bg-primary text-white rounded-lg">Lihat invoice</a>
                        @break

                        @case('Layanan')
                            <a href="{{ route('invoice.layanan', $item['code_unique']) }}"
                                class="p-2 bg-primary text-white rounded-lg">Lihat invoice</a>
                        @break

                        @case('Alat Barang')
                            <a href="{{ route('invoice.alatBarang', $item['code_unique']) }}"
                                class="p-2 bg-primary text-white rounded-lg">Lihat invoice</a>
                        @break

                        @case('GedungLap')
                            <a href="{{ route('invoice.gedungLap', $item['code_unique']) }}"
                                class="p-2 bg-primary text-white rounded-lg">Lihat invoice</a>
                        @break

                        @case('Transportasi')
                            <a href="{{ route('invoice.transportasi', $item['code_unique']) }}"
                                class="p-2 bg-primary text-white rounded-lg">Lihat invoice</a>
                        @break

                        @default
                    @endswitch
                </div>
                @empty

                    <div class="flex justify-center items-center bg-white shadow-gray-400 p-5 rounded-lg">
                        Riwayat Tidak ada , Segera lakukan transaksi
                    </div>
                @endforelse

            </div>
            {{-- Transaksi  Terbayar --}}

            {{-- Transaksi  Belum Bayar --}}
            <div class="flex flex-col gap-5 w-full bg-gray-100 p-4">
                <p class="m-4 uppercase text-xl font-bold">Transaksi Belum Bayar</p>

                @forelse ($tidakTerbayar as $item)
                    <div class="flex justify-between bg-white shadow-gray-400 p-5 rounded-lg">
                        <span>{{ $item['kategori'] }}</span>
                        <span>{{ \number_format($item['nominal'], 0, ',', '.') }}</span>
                        <span>{{ \Carbon\Carbon::parse($item['created_at'])->isoFormat('D MMMM Y') }}</span>
                        @switch($item["kategori"])
                            @case('Asrama')
                                <a href="{{ route('asrama.pembayaran', $item['code_unique']) }}"
                                    class="p-2 bg-sea text-white rounded-lg">Lihat Pembayaran</a>
                            @break

                            @case('Layanan')
                                <a href="{{ route('layanan.pembayaran', $item['code_unique']) }}"
                                    class="p-2 bg-sea text-white rounded-lg">Lihat Pembayaran</a>
                            @break

                            @case('Alat Barang')
                                <a href="{{ route('alat-barang.pembayaran', $item['code_unique']) }}"
                                    class="p-2 bg-sea text-white rounded-lg">Lihat Pembayaran</a>
                            @break

                            @case('GedungLap')
                                <a href="{{ route('gedung.pembayaran', $item['code_unique']) }}"
                                    class="p-2 bg-sea text-white rounded-lg">Lihat Pembayaran</a>
                            @break

                            @case('Transportasi')
                                <a href="{{ route('transportasi.pembayaran', $item['code_unique']) }}"
                                    class="p-2 bg-sea text-white rounded-lg">Lihat Pembayaran</a>
                            @break
                        @endswitch
                    </div>
                    @empty
                        <div class="flex justify-center items-center bg-white shadow-gray-400 p-5 rounded-lg">
                            Riwayat Tidak ada , Segera lakukan transaksi
                        </div>
                    @endforelse
                </div>
                {{-- Transaksi  Belum Bayar --}}

                {{-- Transaksi  Kadaluarsa --}}
                <div class="flex flex-col gap-5 w-full bg-gray-100 p-4">
                    <p class="m-4 uppercase text-xl font-bold">Transaksi Kadaluarsa</p>
                    @forelse ($kadaluarsa as $item)
                        <div class="flex justify-between bg-white shadow-gray-400 p-5 rounded-lg">
                            <span>{{ $item['kategori'] }}</span>
                            <span>Rp. {{ number_format($item['nominal'], 0, ',', '.') }}</span>
                            <span>{{ \Carbon\Carbon::parse($item['created_at'])->isoFormat('D MMMM Y') }}</span>
                            <button class="p-2 bg-red-600 text-white rounded-lg">Kadaluarsa</button>
                        </div>
                    @empty

                        <div class="flex justify-center items-center bg-white shadow-gray-400 p-5 rounded-lg">
                            Riwayat Tidak ada , Segera lakukan transaksi
                        </div>
                    @endforelse
                </div>
                {{-- Transaksi  Kadaluarsa --}}

            </div>
        @endsection
