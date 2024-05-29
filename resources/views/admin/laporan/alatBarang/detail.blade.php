@extends('layouts-admin.main')

@section('content')
    <div class="flex w-full gap-5">
        <x-inner-layout class="w-1/2">
            <x-title-component>
                Transaksi Alat Barang
            </x-title-component>

            <div class="flex flex-col">
                <div class="flex flex-col mb-4">
                    <span class="mb-3">Code Unique</span>
                    <span class="p-4 rounded-lg bg-gray-100">{{ $transaksiAlatBarang->code_unique }}</span>
                </div>

                <div class="flex flex-col mb-4">
                    <span class="mb-3">Tanggal Sewa</span>
                    <span
                        class="p-4 rounded-lg bg-gray-100">{{ \Carbon\Carbon::parse($transaksiAlatBarang->created_at)->isoFormat('D MMMM Y') }}</span>
                </div>

                <div class="flex flex-col mb-4">
                    <span class="mb-3">Tanggal Pesanan</span>
                    <span
                        class="p-4 rounded-lg bg-gray-100">{{ \Carbon\Carbon::parse($transaksiAlatBarang->tab_tanggal_pesanan)->isoFormat('D MMMM Y') }}</span>
                </div>

                <div class="flex flex-col mb-4">
                    <span class="mb-3">Tanggal Kembali</span>
                    <span
                        class="p-4 rounded-lg bg-gray-100">{{ \Carbon\Carbon::parse(date('Y-m-d', strtotime($transaksiAlatBarang->tab_tanggal_kembali)))->isoFormat('D MMMM Y') }}</span>
                </div>

                <div class="flex flex-col mb-4">
                    <span class="mb-3">Sub Total</span>
                    <span class="p-4 rounded-lg bg-gray-100">Rp.
                        {{ number_format($transaksiAlatBarang->tab_sub_total, 0, ',', '.') }}</span>
                </div>

                <div class="flex flex-col mb-4">
                    <span class="mb-3">Snap Token Midtrans</span>
                    <span class="p-4 rounded-lg bg-gray-100">{{ $transaksiAlatBarang->tab_snap_token }}</span>
                </div>

                <div class="flex flex-col mb-4">
                    <span class="mb-3">Status</span>
                    <span class="p-4 rounded-lg bg-gray-100">{{ $transaksiAlatBarang->status }}</span>
                </div>
            </div>
        </x-inner-layout>

        <x-inner-layout class="w-1/2">
            <x-title-component>
                Detail Pengguna
            </x-title-component>

            <div class="flex flex-col mb-4">
                <span class="mb-3">Username</span>
                <span class="p-4 rounded-lg bg-gray-100">{{ $transaksiAlatBarang->user->username }}</span>
            </div>

            <div class="flex flex-col mb-4">
                <span class="mb-3">Email</span>
                <span class="p-4 rounded-lg bg-gray-100">{{ $transaksiAlatBarang->user->email }}</span>
            </div>

            <div class="flex flex-col mb-4">
                <span class="mb-3">Role</span>
                <span class="p-4 rounded-lg bg-gray-100">{{ $transaksiAlatBarang->user->level }}</span>
            </div>

            <div class="flex flex-col mb-4">
                <span class="mb-3">No Handphone</span>
                <span class="p-4 rounded-lg bg-gray-100">{{ $transaksiAlatBarang->user->profile->no_telp }}</span>
            </div>

            <div class="flex flex-col mb-4">
                <span class="mb-3">Alamat</span>
                <span class="p-4 rounded-lg bg-gray-100">{{ $transaksiAlatBarang->user->profile->alamat }}</span>
            </div>
        </x-inner-layout>
    </div>

    <x-inner-layout>
        <x-title-component>
            Detail Item
        </x-title-component>
        <ul class="w-auto space-y-1 list-disc list-inside dark:text-gray-400 text-sm">
            @forelse ($transaksiAlatBarang->alatBarangs as $row)
                <li>
                    <a class="text-blue-500 hover:underline"
                        href="{{ route('asrama.store', $row->id) }}">{{ $row->ab_nama }}</a>
                </li>
            @empty
                <p class="text-sm text-center">Tidak ada item</p>
            @endforelse
        </ul>
    </x-inner-layout>
@endsection
