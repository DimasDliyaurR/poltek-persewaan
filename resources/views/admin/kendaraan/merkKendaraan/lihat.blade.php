@extends('layouts-admin.main')

@section('content')
    <div class="uppercase text-lg font-bold m-4 dark:text-white h-full">
        Table {{ $title }}
    </div>


    <!-- TABLE START -->
    <x-inner-layout>
        <livewire:merk-kendaraan-table>
    </x-inner-layout>
    <!-- TABLE END -->

    <!-- FORM START -->
    <div class="uppercase text-lg font-bold m-4">
        Form {{ $title }}
    </div>

    <x-inner-layout>

        @session('successForm')
            <x-alert-success>
                {{ $value }}
            </x-alert-success>
        @endsession

        <form action="{{ asset('admin/merkKendaraans/create') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-5">
                <label for="mk_foto" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Foto
                    Kendaraan</label>
                <input name="mk_foto"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue file:text-violet-700 hover:file:bg-blue-400 @error('mk_foto') border-red-500 @enderror"
                    id="multiple_files" type="file">
                @error('mk_foto')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-5">
                <label for="mk_merk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                    Merek</label>
                <input name="mk_merk"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-4 @error('mk_merk') border-red-500 @enderror"
                    value="{{ old('mk_merk') }}" type="text">

                @error('mk_merk')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-5">
                <label for="mk_seri" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                    Seri</label>
                <input name="mk_seri"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-4 @error('mk_seri') border-red-500 @enderror"
                    value="{{ old('mk_seri') }}" type="text">

                @error('mk_seri')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-5">
                <label for="mk_tarif" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga</label>
                <input name="mk_tarif"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-4 @error('mk_tarif') border-red-500 @enderror"
                    value="{{ old('mk_tarif') }}" type="text">
                @error('mk_tarif')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-5">
                <label for="mk_kapasitas"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kapasitas</label>
                <input name="mk_kapasitas"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-4 @error('mk_kapasitas') border-red-500 @enderror"
                    value="{{ old('mk_kapasitas') }}" type="text">
                @error('mk_kapasitas')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-5">
                <label for="mk_bahan_bakar" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bahan
                    Bakar</label>
                <input name="mk_bahan_bakar"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-4 @error('mk_bahan_bakar') border-red-500 @enderror"
                    value="{{ old('mk_bahan_bakar') }}" type="text">
                @error('mk_bahan_bakar')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <x-radio-button-form title="Apakah barang ini akan menggunakan metode uang muka ?" name="is_dp" />

            <x-field-form name="tarif_dp" title="Tarif Dp" />

            <div class="mb-5">
                <label for="mk_deskripsi"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
                <div id="container">
                    <textarea id="editor" class="@error('mk_deskripsi') border-red-500 @enderror" name="mk_deskripsi">{{ old('mk_deskripsi') }}</textarea>
                </div>
                @error('mk_deskripsi')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <button class="p-2 w-80 bg-gray-900 rounded-md text-white text-sm">Submit</button>
        </form>

    </x-inner-layout>
    <!-- FORM END -->
@endsection
