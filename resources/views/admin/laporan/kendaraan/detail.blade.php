@extends('layouts-admin.main')

@section('content')
    <div class="flex w-full gap-5">
        <x-inner-layout class="w-1/2">
            <x-title-component>
                Transaksi Transportasi
            </x-title-component>

            <div class="flex flex-col">
                <div class="flex flex-col mb-4">
                    <span class="mb-3">Code Unique</span>
                    <span class="p-4 rounded-lg bg-gray-100">{{ $transaksiKendaraan->code_unique }}</span>
                </div>

                <div class="flex flex-col mb-4">
                    <span class="mb-3">Tanggal Sewa</span>
                    <span
                        class="p-4 rounded-lg bg-gray-100">{{ \Carbon\Carbon::parse($transaksiKendaraan->tk_tanggal_sewa)->isoFormat('d MMMM Y') }}</span>
                </div>

                <div class="flex flex-col mb-4">
                    <span class="mb-3">Tanggal Pelaksanaan</span>
                    <span
                        class="p-4 rounded-lg bg-gray-100">{{ \Carbon\Carbon::parse($transaksiKendaraan->tk_pelaksanaan)->isoFormat('d MMMM Y') }}</span>
                </div>

                <div class="flex flex-col mb-4">
                    <span class="mb-3">Tanggal Kembali</span>
                    <span
                        class="p-4 rounded-lg bg-gray-100">{{ \Carbon\Carbon::parse($transaksiKendaraan->tk_tanggal_kembali)->isoFormat('d MMMM Y') }}</span>
                </div>

                <div class="flex flex-col mb-4">
                    <span class="mb-3">Sub Total</span>
                    <span class="p-4 rounded-lg bg-gray-100">Rp.
                        {{ number_format($transaksiKendaraan->tk_sub_total, 0, ',', '.') }}</span>
                </div>

                <div class="flex flex-col mb-4">
                    <span class="mb-3">Snap Token Midtrans</span>
                    <span class="p-4 rounded-lg bg-gray-100">{{ $transaksiKendaraan->tk_snap_token }}</span>
                </div>

                <div class="flex flex-col mb-4">
                    <span class="mb-3">Status</span>
                    <span class="p-4 rounded-lg bg-gray-100">{{ $transaksiKendaraan->status }}</span>
                </div>
            </div>
        </x-inner-layout>

        <x-inner-layout class="w-1/2">
            <x-title-component>
                Detail Pengguna
            </x-title-component>

            <div class="flex flex-col mb-4">
                <span class="mb-3">Username</span>
                <span class="p-4 rounded-lg bg-gray-100">{{ $transaksiKendaraan->users->username }}</span>
            </div>

            <div class="flex flex-col mb-4">
                <span class="mb-3">Email</span>
                <span class="p-4 rounded-lg bg-gray-100">{{ $transaksiKendaraan->users->email }}</span>
            </div>

            <div class="flex flex-col mb-4">
                <span class="mb-3">Role</span>
                <span class="p-4 rounded-lg bg-gray-100">{{ $transaksiKendaraan->users->level }}</span>
            </div>

            <div class="flex flex-col mb-4">
                <span class="mb-3">No Handphone</span>
                <span class="p-4 rounded-lg bg-gray-100">{{ $transaksiKendaraan->users->profile->no_telp }}</span>
            </div>

            <div class="flex flex-col mb-4">
                <span class="mb-3">Alamat</span>
                <span class="p-4 rounded-lg bg-gray-100">{{ $transaksiKendaraan->users->profile->alamat }}</span>
            </div>
        </x-inner-layout>
    </div>

    <x-inner-layout>
        <x-title-component>
            Detail Item
        </x-title-component>
        <ul class="w-auto space-y-1 list-disc list-inside dark:text-gray-400 text-sm">
            @forelse ($transaksiKendaraan->kendaraans as $row)
                <li>
                    <a class="text-blue-500 hover:underline"
                        href="{{ route('merkKendaraan.show', $row->merkKendaraan->id) }}">{{ $row->merkKendaraan->mk_merk }}</a>
                </li>
            @empty
                <p class="text-sm text-center">Fasilitas Tidak ada. Silahkan tambahkan ke <a
                        href="{{ asset('admin/detailFasilitasAsrama/' . $tipeAsrama->id) }}"
                        class="text-blue-400 hover:underline">Tambah
                        Fasilitas Asrama</a></p>
            @endforelse
        </ul>
    </x-inner-layout>
@endsection
