@extends('layouts-admin.main')

@section('content')
    <div class="uppercase text-lg font-bold m-4 dark:text-white h-full">
        Table {{ $title }}
    </div>
    <!-- TABLE START -->
    <x-inner-layout>

        <livewire:tipe-asrama-table>

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

        <form action="{{ asset('admin/tipeAsramas/create') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="mb-5">
                <label for="ta_foto" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Foto
                    Tipe Asrama</label>
                <input name="ta_foto"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue file:text-violet-700 hover:file:bg-blue-400 @error('ta_foto') border-red-500 @enderror"
                    id="multiple_files" type="file">
                @error('ta_foto')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-5">
                <label for="ta_nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                    Tipe Asrama</label>
                <input name="ta_nama"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-4 @error('ta_nama') border-red-500 @enderror"
                    value="{{ old('ta_nama') }}" type="text">

                @error('ta_nama')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-5">
                <label for="ta_tarif" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga
                    Tarif (N)</label>
                <input name="ta_tarif"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-4 @error('ta_tarif') border-red-500 @enderror"
                    value="{{ old('ta_tarif') }}" type="text">

                @error('ta_tarif')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-5">
                <label for="ta_kapasitas"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kapasitas</label>
                <input name="ta_kapasitas"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-4 @error('ta_kapasitas') border-red-500 @enderror"
                    value="{{ old('ta_kapasitas') }}" type="text">

                @error('ta_kapasitas')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <x-radio-button-form title="Apakah barang ini akan menggunakan metode uang muka ?" name="is_dp" />

            <x-field-form name="tarif_dp" class="hidden"
                title="Isi Tarif Dp untuk suatu saat jika barang ini memakai metode uang maka !" />

            <div class="mb-5">
                <label for="ta_deskripsi"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
                <div id="container">
                    <textarea id="editor" class="@error('ta_deskripsi') border-red-500 @enderror" name="ta_deskripsi">{{ old('ta_deskripsi') }}</textarea>
                </div>
                @error('ta_deskripsi')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <button class="p-2 w-80 bg-gray-900 rounded-md text-white text-sm">Submit</button>
        </form>

    </x-inner-layout>
    <!-- FORM END -->
@endsection

@section('script')
    <script src="{{ asset('js/feature/dp-field-toggle.js') }}"></script>
@endsection
