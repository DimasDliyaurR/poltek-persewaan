@extends('layouts-admin.main')

@section('content')
    <x-back :link="route('alatBarang.index')" />

    <x-title-component>
        Form Update {{ $title }}
    </x-title-component>

    <x-inner-layout>
        @session('successForm')
            <x-alert-success>
                {{ $value }}
            </x-alert-success>
        @endsession

        <form action="{{ asset('admin/detailFotoAlatBarang/create/' . $alatBarang->id) }}" method="post"
            enctype="multipart/form-data">
            @csrf
            <div class="mb-5">
                <label for="fab_foto" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Foto
                    Alat Barang</label>
                <input name="fab_foto"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue file:text-violet-700 hover:file:bg-blue-400 @error('fab_foto') border-red-500 @enderror"
                    id="multiple_files" type="file">
                @error('fab_foto')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <button class="p-2 w-80 bg-gray-900 rounded-md text-white text-sm">Submit</button>

        </form>
    </x-inner-layout>

    <x-title-component>
        Detail Foto {{ $alatBarang->a_nama }}
    </x-title-component>

    <x-inner-layout>
        @session('successTable')
            <x-alert-success>
                {{ $value }}
            </x-alert-success>
        @endsession

        {{ $detailFotoAlatBarang->links() }}

        <table class="w-full text-sm text-left rtl:text-right text-gray-800 dark:text-gray-400 border-solid">
            <thead class="text-md text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-white">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Foto
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">hapus</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse($detailFotoAlatBarang as $row)
                    <tr class="bg-white border-b dark:bg-gray-700 dark:border-gray-700 dark:hover:bg-gray-400">
                        <td class="px-6 py-4 dark:text-white">
                            <img src="{{ Storage::url($row->fab_foto) }}" alt="Foto Alat Barang"
                                class="h-72 max-w-xl rounded-lg shadow-xl dark:shadow-gray-800 my-5">

                        </td>
                        </th>
                        <td class="px-6 py-4 text-right">
                            <x-delete-button action="admin/detailFotoAlatBarang/delete/{{ $row->id }}"
                                id="{{ $row->id }}" nama="{{ $row->a_nama_ruangan }}"></x-delete-button>
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
