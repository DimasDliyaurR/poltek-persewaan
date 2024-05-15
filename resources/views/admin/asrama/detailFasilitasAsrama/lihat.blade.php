@extends('layouts-admin.main')

@section('content')
    <x-title-component>
        Form Update {{ $title }}
    </x-title-component>

    <x-inner-layout>
        @session('successForm')
            <x-alert-success>
                {{ $value }}
            </x-alert-success>
        @endsession

        <form action="{{ asset('admin/detailFasilitasAsrama/create/fasilitas/' . $asrama->id) }}" method="post">
            @csrf

            <div class="mb-5">
                <label for="fasilitas_asrama_id"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fasilitas Asrama</label>
                <select name="fasilitas_asrama_id"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue file:text-violet-700 hover:file:bg-blue-400 @error('mekr_kendaraan_id') border-red-500 @enderror">
                    <option selected disabled hidden>--Pilih Fasilitas Disini--</option>
                    @forelse($fasilitasAsramas as $row)
                        <option value="{{ $row->id }}">
                            {{ $row->fa_nama }} <box-icon name="{{ $row->fa_icon }}"></box-icon>
                        </option>
                    @empty
                        <option selected disabled>Tidak ada Pilihan</option>
                    @endforelse
                </select>
                @error('fasilitas_asrama_id')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
                @if ($fasilitasAsramas->count() == 0)
                    <p class="text-sm ml-4">Fasilitas belum ada silahkan tambahkan di <a
                            href="{{ asset('admin/fasilitasAsramas') }}" class="text-blue-400 hover:underline">Tambah
                            Fasilitas Asrama</a></p>
                @endif
            </div>

            <div class="mb-5">
                <label for="dfa_status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Fasilitas
                </label>
                <div class="flex items-center mb-4">
                    <input id="dfa_status-1" type="radio" value="include" name="dfa_status"
                        {{ old('dfa_status') == 'include' ? 'checked' : '' }}
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="dfa_status-1"
                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Include</label>
                </div>
                <div class="flex items-center">
                    <input id="dfa_status-2" type="radio" value="pilihan" name="dfa_status"
                        {{ old('dfa_status') == 'pilihan' ? 'checked' : '' }}
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="dfa_status-2"
                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Pilihan</label>
                </div>
                @error('dfa_status')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <button class="p-2 w-80 bg-gray-900 rounded-md text-white text-sm">Submit</button>
        </form>
    </x-inner-layout>

    <x-title-component>
        List Fasilitas Asrama <span class="font-normal lowercase">{{ $asrama->ta_nama }}</span>
    </x-title-component>

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
                        Nama Asrama
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Icon
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Lihat Detail</span>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse($detailFasilitasAsrama as $row)
                    <tr class="bg-white border-b dark:bg-gray-700 dark:border-gray-700 dark:hover:bg-gray-400">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $row->fasilitasAsrama->fa_nama }}
                        </th>
                        <td class="px-6 py-4 dark:text-white">
                            <box-icon name="{{ $row->fasilitasAsrama->fa_icon }}"></box-icon>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="{{ asset('admin/fasilitasAsrama/show/' . $row->id) }}"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <x-delete-button action="admin/detailFasilitasAsrama/delete/{{ $row->id }}"
                                id="{{ $row->id }}" nama="{{ $row->fasilitasAsrama->fa_nama }}"></x-delete-button>
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
