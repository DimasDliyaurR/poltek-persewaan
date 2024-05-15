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

        <form action="{{ asset('admin/alatBarang/update/' . $alatBarang->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-5">
                <label for="a_foto" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Foto
                    Alat Barang</label>
                <input name="a_foto"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue file:text-violet-700 hover:file:bg-blue-400 @error('a_foto') border-red-500 @enderror"
                    id="multiple_files" type="file">
                @error('a_foto')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror

                <img src="{{ Storage::url($alatBarang->a_foto) }}" alt="Foto Kendaraan"
                    class="h-72 max-w-xl rounded-lg shadow-xl dark:shadow-gray-800 my-5">
            </div>

            <div class="mb-5">
                <label for="a_nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                    Alat Barang</label>
                <input name="a_nama"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-4 @error('a_nama') border-red-500 @enderror"
                    value="{{ old('a_nama') ?? $alatBarang->a_nama }}" type="text">

                @error('a_nama')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-5">
                <label for="a_tarif" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tarif
                    Harga</label>
                <input name="a_tarif"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-4 @error('a_tarif') border-red-500 @enderror"
                    value="{{ old('a_tarif') ?? $alatBarang->a_tarif }}" type="text">
                @error('a_tarif')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-5">
                <label for="a_satuan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Satuan</label>
                <input name="a_satuan"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-4 @error('a_satuan') border-red-500 @enderror"
                    value="{{ old('a_satuan') ?? $alatBarang->a_satuan }}" type="text">
                @error('a_satuan')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-5">
                <label for="a_keterangan"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keterangan</label>
                <div id="container">
                    <textarea id="editor" class="@error('a_keterangan') border-red-500 @enderror" name="a_keterangan">{{ old('a_keterangan') ?? $alatBarang->a_keterangan }}</textarea>
                </div>
                @error('a_keterangan')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <button class="p-2 w-80 bg-gray-900 rounded-md text-white text-sm">Submit</button>
        </form>
    </x-inner-layout>
@endsection
