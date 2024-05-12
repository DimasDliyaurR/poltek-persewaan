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

        <form action="{{ asset('admin/layanan/update/' . $layanan->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-5">
                <label for="l_foto" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Foto
                    Kendaraan</label>
                <input name="l_foto"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue file:text-violet-700 hover:file:bg-blue-400 @error('l_foto') border-red-500 @enderror"
                    id="multiple_files" type="file">
                @error('l_foto')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror

                <img src="{{ Storage::url($layanan->l_foto) }}" alt="Foto Kendaraan"
                    class="h-72 max-w-xl rounded-lg shadow-xl dark:shadow-gray-800 my-5">
            </div>

            <div class="mb-5">
                <label for="l_nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                    Layanan</label>
                <input name="l_nama"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-4 @error('l_nama') border-red-500 @enderror"
                    value="{{ $layanan->l_nama }}" type="text">

                @error('l_nama')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-5">
                <label for="l_tarif" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tarif
                    Harga</label>
                <input name="l_tarif"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-4 @error('l_tarif') border-red-500 @enderror"
                    value="{{ $layanan->l_tarif }}" type="text">

                @error('l_tarif')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-5">
                <label for="l_satuan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Satuan</label>
                <select name="l_satuan"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-4 @error('l_satuan') border-red-500 @enderror">
                    <option disabled selected>-- Pilih Satuan --</option>
                    <option value="jam" {{ $layanan->l_satuan == 'jam' ? 'selected' : '' }}>jam</option>
                    <option value="minggu" {{ $layanan->l_satuan == 'minggu' ? 'selected' : '' }}>minggu</option>
                    <option value="bulan" {{ $layanan->l_satuan == 'bulan' ? 'selected' : '' }}>bulan</option>
                </select>
                @error('l_satuan')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <x-radio-button-form title="Apakah barang ini akan menggunakan metode uang muka ?" name="is_dp"
                :update="true" :nameData="$layanan->paymentMethod->is_dp == 1 ? true : false" />

            <x-field-form name="tarif_dp" :nameData="$layanan->paymentMethod->tarif_dp ?? ''" :update="true"
                title="Isi Tarif Dp untuk suatu saat jika barang ini memakai metode uang maka !" />

            <div class="mb-5">
                <label for="l_deskripsi"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
                <div id="container">
                    <textarea id="editor" class="@error('l_deskripsi') border-red-500 @enderror" name="l_deskripsi">{{ $layanan->l_deskripsi }}</textarea>
                </div>
                @error('l_deskripsi')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class=" py-4">
                <div class="flex items-center">
                    <input id="link-checkbox" type="checkbox" name="l_personil" {{ $layanan->l_personil ? 'checked' : '' }}
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="l_personil" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Apakah
                        layanan ini mempunyai personil ?</label>
                    <br>
                </div>
                @error('l_personil')
                    <span class="text-red-600 text-sm ml-6">{{ $message }}</span>
                @enderror
            </div>

            <button class="p-2 w-80 bg-gray-900 rounded-md text-white text-sm">Submit</button>
        </form>
    </x-inner-layout>
@endsection

@section('script')
    <script src="{{ asset('js/feature/dp-field-toggle-edit.js') }}"></script>
@endsection
