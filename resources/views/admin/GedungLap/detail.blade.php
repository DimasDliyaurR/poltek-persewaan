@extends('layouts-admin.main')

@section('content')
    <x-back :link="route('gedungLap.index')" />

    <x-inner-layout>

        <x-title-component>
            Foto Gedung Lapangan
        </x-title-component>

        <img src="{{ Storage::url($gedungLap->gl_foto) }}" alt="Foto Kendaraan" class="h-auto max-w-lg mx-auto">

        <hr class="h-px my-4 border-gray-400 border-1">

        <x-title-component>
            Detail Gedung Lapangan
        </x-title-component>

        <hr class="h-px my-4 border-gray-400 border-1">

        <div class="flex flex-col">
            <div class="flex flex-col mb-4">
                <span class="font-semibold mb-3">Nama</span>
                <span class="p-4 rounded-lg bg-gray-100">{{ $gedungLap->gl_nama }}</span>
            </div>

            <div class="flex flex-col mb-4">
                <span class="font-semibold mb-3">Ukuran</span>
                <span class="p-4 rounded-lg bg-gray-100">{{ $gedungLap->gl_ukuran_gedung }}</span>
            </div>

            <div class="flex flex-col mb-4">
                <span class="font-semibold mb-3">Harga Tarif</span>
                <span class="p-4 rounded-lg bg-gray-100">Rp.
                    {{ number_format($gedungLap->gl_tarif, 0, ',', '.') }}</span>
            </div>

            <div class="flex flex-col mb-4">
                <span class="font-semibold mb-3">Kapasitas</span>
                <span class="p-4 rounded-lg bg-gray-100">{{ $gedungLap->gl_kapasitas_gedung }}</span>
            </div>

            <div class="flex flex-col mb-4">
                <span class="font-semibold mb-3">Satuan</span>
                <span
                    class="p-4 rounded-lg bg-gray-100">{{ str_replace(',', ' ', substr($gedungLap->gl_satuan_gedung, 1, strlen($gedungLap->gl_satuan_gedung))) }}</span>
            </div>
        </div>
    </x-inner-layout>

    <x-title-component>
        Keterangan
    </x-title-component>

    <x-inner-layout>
        {!! $gedungLap->gl_keterangan !!}
    </x-inner-layout>
@endsection
