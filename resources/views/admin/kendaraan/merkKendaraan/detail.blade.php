@extends('layouts-admin.main')

@section('content')
    <x-inner-layout>
        <x-title-component>
            Foto Merk Kendaraan
        </x-title-component>

        <img src="{{ Storage::url($merkKendaraan->mk_foto) }}" alt="Foto Kendaraan" class="h-auto max-w-lg mx-auto">

        <hr class="h-px my-4 border-gray-400 border-1">

        <x-title-component>
            Detail Merk Kendaraan
        </x-title-component>

        <hr class="h-px my-4 border-gray-400 border-1">

        <div class="flex flex-col">
            <div class="flex flex-col mb-4">
                <span class="font-semibold mb-3">Nama Merek</span>
                <span class="p-4 rounded-lg bg-gray-100">{{ $merkKendaraan->mk_merk }}</span>
            </div>

            <div class="flex flex-col mb-4">
                <span class="font-semibold mb-3">Nama Seri</span>
                <span class="p-4 rounded-lg bg-gray-100">{{ $merkKendaraan->mk_seri }}</span>
            </div>

            <div class="flex flex-col mb-4">
                <span class="font-semibold mb-3">Harga Tarif</span>
                <span class="p-4 rounded-lg bg-gray-100">Rp.
                    {{ number_format($merkKendaraan->mk_tarif, 0, ',', '.') }}</span>
            </div>

            <div class="flex flex-col mb-4">
                <span class="font-semibold mb-3">Kapasitas</span>
                <span class="p-4 rounded-lg bg-gray-100">{{ $merkKendaraan->mk_kapasitas }}</span>
            </div>

            <div class="flex flex-col mb-4">
                <span class="font-semibold mb-3">Bahan Bakar</span>
                <span class="p-4 rounded-lg bg-gray-100">{{ $merkKendaraan->mk_bahan_bakar }}</span>
            </div>
        </div>
    </x-inner-layout>
@endsection
