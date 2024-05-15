@extends('layouts-admin.main')

@section('content')
    <x-inner-layout>

        <x-title-component>
            Foto {{ $title }}
        </x-title-component>

        <img src="{{ Storage::url($tipeAsrama->ta_foto) }}" alt="Foto Kendaraan" class="h-auto max-w-lg mx-auto rounded-lg">
    </x-inner-layout>

    <x-title-component>
        Detail {{ $title }}
    </x-title-component>

    <x-inner-layout>
        <div class="flex flex-col text-sm">
            <div class="flex flex-col mb-4">
                <span class="font-semibold mb-3">Nama</span>
                <span class="p-4 rounded-lg bg-gray-100">{{ $tipeAsrama->ta_nama }}</span>
            </div>

            <div class="flex flex-col mb-4">
                <span class="font-semibold mb-3">Harga Tarif</span>
                <span class="p-4 rounded-lg bg-gray-100">Rp.
                    {{ number_format($tipeAsrama->ta_tarif, 0, ',', '.') }}</span>
            </div>

            <div class="flex flex-col mb-4">
                <span class="font-semibold mb-3">Kapasitas</span>
                <span class="p-4 rounded-lg bg-gray-100">{{ $tipeAsrama->ta_kapasitas }}</span>
            </div>
        </div>
    </x-inner-layout>

    <x-title-component>
        List Ruangan {{ $tipeAsrama->ta_nama }}
    </x-title-component>

    <x-inner-layout>

        <ul class="w-auto space-y-1 list-disc list-inside dark:text-gray-400 text-sm">
            @forelse ($tipeAsrama->asramas as $row)
                <li>{{ $row->a_nama_ruangan }}</li>
            @empty
                <p class="text-sm text-center">Ruangan Tidak ada. Silahkan tambahkan ke <a
                        href="{{ asset('admin/asramas') }}" class="text-blue-400 hover:underline">Tambah
                        Ruangan Asrama</a></p>
            @endforelse
        </ul>

    </x-inner-layout>

    <x-title-component>
        List Fasilitas {{ $tipeAsrama->ta_nama }}
    </x-title-component>
    <p class="text-sm ml-2">Jika ingin menambahkan fasilitas pada tipe ruangan <span
            class="font-bold">{{ $tipeAsrama->ta_nama }}</span>
        silahkan tambahkan ke <a href="{{ asset('admin/detailFasilitasAsrama/' . $tipeAsrama->id) }}"
            class="text-blue-400 hover:underline">Tambah {{ $tipeAsrama->ta_nama }}
            Fasilitas Asrama</a></p>

    <x-inner-layout>

        <ul class="w-auto space-y-1 list-disc list-inside dark:text-gray-400 text-sm">
            @forelse ($detailFasilitas as $row)
                <li class="flex flex-row gap-2">
                    <box-icon name="{{ $row->fasilitasAsrama->fa_icon }}"></box-icon>
                    {{ $row->fasilitasAsrama->fa_nama }}
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
