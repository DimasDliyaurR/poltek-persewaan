@extends('layouts-admin.main')

@section('content')
    <x-back :link="route('layanan.index')" />

    <x-inner-layout>

        <x-title-component>
            Foto Layanan
        </x-title-component>

        <img src="{{ Storage::url($layanan->l_foto) }}" alt="Foto Kendaraan" class="h-auto max-w-lg mx-auto">

        <hr class="h-px my-4 border-gray-400 border-1">

        <x-title-component>
            Detail Layanan
        </x-title-component>

        <hr class="h-px my-4 border-gray-400 border-1">

        <div class="flex flex-col">
            <div class="flex flex-col mb-4">
                <span class="font-semibold mb-3">Nama Layanan</span>
                <span class="p-4 rounded-lg bg-gray-100">{{ $layanan->l_nama }}</span>
            </div>

            <div class="flex flex-col mb-4">
                <span class="font-semibold mb-3">Satuan</span>
                <span class="p-4 rounded-lg bg-gray-100">{{ $layanan->l_satuan }}</span>
            </div>

            <div class="flex flex-col mb-4">
                <span class="font-semibold mb-3">Harga Tarif</span>
                <span class="p-4 rounded-lg bg-gray-100">Rp.
                    {{ number_format($layanan->l_tarif, 0, ',', '.') }}</span>
            </div>

            <div class="flex flex-col mb-4">
                <span class="font-semibold mb-3">Personil</span>
                <span class="p-4 rounded-lg bg-gray-100">{{ $layanan->l_personil ? 'Memakai' : 'Tidak Memakai' }}</span>
            </div>

        </div>
    </x-inner-layout>

    <x-title-component>
        Deskripsi
    </x-title-component>

    <x-inner-layout>
        {!! $layanan->l_deskripsi !!}
    </x-inner-layout>
@endsection
