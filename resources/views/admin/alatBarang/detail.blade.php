@extends('layouts-admin.main')

@section('content')
    <x-inner-layout>

        <x-title-component>
            {{ $title }}
        </x-title-component>

        <img src="{{ Storage::url($AlatBarang->a_foto) }}" alt="Foto Kendaraan" class="h-auto max-w-lg mx-auto">

        <hr class="h-px my-4 border-gray-400 border-1">

        <x-title-component>
            Detail {{ $title }}
        </x-title-component>

        <hr class="h-px my-4 border-gray-400 border-1">

        <div class="flex flex-col">
            <div class="flex flex-col mb-4">
                <span class="font-semibold mb-3">Nama Alat Barang</span>
                <span class="p-4 rounded-lg bg-gray-100">{{ $AlatBarang->a_nama }}</span>
            </div>

            <div class="flex flex-col mb-4">
                <span class="font-semibold mb-3">Satuan</span>
                <span class="p-4 rounded-lg bg-gray-100">{{ $AlatBarang->a_satuan }}</span>
            </div>

            <div class="flex flex-col mb-4">
                <span class="font-semibold mb-3">Harga Tarif</span>
                <span class="p-4 rounded-lg bg-gray-100">Rp.
                    {{ number_format($AlatBarang->a_tarif, 0, ',', '.') }}</span>
            </div>
        </div>
    </x-inner-layout>

    <x-title-component>
        Deskripsi {{ $title }}
    </x-title-component>

    <x-inner-layout>
        {!! $AlatBarang->a_keterangan !!}
    </x-inner-layout>

    <x-title-component>
        List {{ $title }}
    </x-title-component>

    <x-inner-layout>
        <div class="flex flex-row flex-wrap">
            @foreach ($detailFotoAlatBarang as $row)
                <div class="p-4">
                    <img src="{{ Storage::url($row->fab_foto) }}" alt="Foto Kendaraan" class="h-auto max-w-lg mx-auto">
                </div>
            @endforeach
        </div>
    </x-inner-layout>
@endsection
