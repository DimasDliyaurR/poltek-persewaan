@extends('layouts-admin.main')

@section('content')
    <x-back :link="route('gedungLap.index')" />

    <x-title-component>
        Form Tambah {{ $title }} Dari <span class="font-normal">{{ $gedungLaps->gl_nama }}</span>
    </x-title-component>

    <x-inner-layout>
        @session('successForm')
            <x-alert-success>
                {{ $value }}
            </x-alert-success>
        @endsession

        <form action="{{ route('detailJadwalGedung.create', $gedungLaps->id) }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="mb-5">
                <label for="jadwal_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fasilitas
                    Asrama</label>
                <select name="jadwal_id"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue file:text-violet-700 hover:file:bg-blue-400 @error('mekr_kendaraan_id') border-red-500 @enderror">
                    <option selected disabled hidden>--Pilih Jadwal Disini--</option>
                    @forelse($jadwalGedungLaps as $row)
                        <option value="{{ $row->id }}">
                            {{ date('h:i:s', strtotime($row->jg_mulai)) }} - {{ date('h:i:s', strtotime($row->jg_akhir)) }}
                        </option>
                    @empty
                        <option selected disabled>Tidak ada Pilihan</option>
                    @endforelse
                </select>
                @error('jadwal_id')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
                @if ($jadwalGedungLaps->count() == 0)
                    <p class="text-sm ml-4">Jadwal belum ada silahkan tambahkan di <a
                            href="{{ route('JadwalGedungLap.index') }}" class="text-blue-400 hover:underline">Tambah
                            Jadwal Gedung</a></p>
                @endif
            </div>

            <button class="p-2 w-80 bg-gray-900 rounded-md text-white text-sm">Submit</button>
        </form>
    </x-inner-layout>

    <div class="pt-4">
        <x-title-component>
            List Detail Jadwal Dari <span class="font-normal">{{ $gedungLaps->ta_nama }}</span>
        </x-title-component>
    </div>

    <x-inner-layout>
        @session('successTable')
            <x-alert-success>
                {{ $value }}
            </x-alert-success>
        @endsession
        <table class="w-full text-sm text-left rtl:text-right text-gray-800 dark:text-gray-400 border-solid">
            <thead class="text-md text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-white">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Jam Awal
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Jam Akhir
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse($gedungLaps->jadwal as $row)
                    <tr class="bg-white border-b dark:bg-gray-700 dark:border-gray-700 dark:hover:bg-gray-400">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $row->jg_mulai }}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $row->jg_akhir }}
                        </th>
                        <td class="px-6 py-4 text-right">
                            <x-delete-button action="admin/detailJadwalGedung/delete/{{ $row->pivot->id }}"
                                id="{{ $row->pivot->id }}" nama=""></x-delete-button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="px-6 py-4 text-center">
                            Data Tidak Ada
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </x-inner-layout>
@endsection
