@extends('layouts-admin.main')

@section('content')
    <x-back :link="route('gedungLap.index')" />

    <x-title-component>
        Form Update {{ $title }}
    </x-title-component>

    <x-inner-layout>
        @session('successForm')
            <x-alert-success>
                {{ $value }}
            </x-alert-success>
        @endsession

        <form action="{{ asset('admin/gedungLap/update/' . $gedungLap->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-5">
                <label for="gl_foto" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Foto
                    Kendaraan</label>
                <input name="gl_foto"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue file:text-violet-700 hover:file:bg-blue-400 @error('gl_foto') border-red-500 @enderror"
                    id="multiple_files" type="file">
                @error('gl_foto')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror

                <img src="{{ Storage::url($gedungLap->gl_foto) }}" alt="Foto Kendaraan"
                    class="h-72 max-w-xl rounded-lg shadow-xl dark:shadow-gray-800 my-5">
            </div>

            <div class="mb-5">
                <label for="gl_nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Gedung &
                    Lapangan</label>
                <input name="gl_nama"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-4 @error('gl_nama') border-red-500 @enderror"
                    value="{{ $gedungLap->gl_nama }}" type="text">

                @error('gl_nama')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-5">
                <label for="gl_tarif" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga
                    Tarif</label>
                <input name="gl_tarif"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-4 @error('gl_tarif') border-red-500 @enderror"
                    value="{{ $gedungLap->gl_tarif }}" type="text">

                @error('gl_tarif')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-5 hidden">
                <label for="gl_satuan_gedung"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Satuan</label>
                <input name="gl_satuan_gedung"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-4 @error('gl_satuan_gedung') border-red-500 @enderror"
                    value="{{ $gedungLap->gl_satuan_gedung }}" type="text">
            </div>

            <div class="mb-5">
                <label for="gl_satuan_gedung"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Satuan</label>

                <div class="flex items-center mb-4">
                    <input id="jam" type="checkbox" value=""
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="jam" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Jam</label>
                </div>

                <div class="flex items-center mb-4">
                    <input id="hari" type="checkbox" value=""
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="hari" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Hari</label>
                </div>

                <div class="flex items-center mb-4">
                    <input id="bulan" type="checkbox" value=""
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="bulan" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Bulan</label>
                </div>
                @error('gl_satuan_gedung')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-5">
                <label for="gl_kapasitas_gedung"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kapasitas</label>
                <input name="gl_kapasitas_gedung"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-4 @error('gl_kapasitas_gedung') border-red-500 @enderror"
                    value="{{ $gedungLap->gl_kapasitas_gedung }}" type="text">
                @error('gl_kapasitas_gedung')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror

                <p class="text-sm">Bisa dikosongkan</p>
            </div>

            <div class="mb-5">
                <label for="gl_ukuran_gedung"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ukuran</label>
                <input name="gl_ukuran_gedung"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-4 @error('gl_ukuran_gedung') border-red-500 @enderror"
                    value="{{ $gedungLap->gl_ukuran_gedung }}" type="text">
                @error('gl_ukuran_gedung')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror

                <p class="text-sm">Bisa dikosongkan</p>
            </div>

            <x-radio-button-form title="Apakah barang ini akan menggunakan metode uang muka ?" name="is_dp"
                :update="true" :nameData="$gedungLap->paymentMethod->is_dp == 1 ? true : false" />

            <x-field-form name="tarif_dp" title="Isi Tarif Dp untuk suatu saat jika barang ini memakai metode uang maka !"
                :update="true" :nameData="$gedungLap->paymentMethod->tarif_dp ?? ''" />

            <div class="mb-5">
                <label for="gl_keterangan"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
                <div id="container">
                    <textarea id="editor" class="@error('gl_keterangan') border-red-500 @enderror" name="gl_keterangan">{{ $gedungLap->gl_keterangan }}</textarea>
                </div>
                @error('gl_keterangan')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <button class="p-2 w-80 bg-gray-900 rounded-md text-white text-sm">Submit</button>
        </form>
    </x-inner-layout>
@endsection

@section('script')
    <script src="{{ asset('js/feature/dp-field-toggle-edit.js') }}"></script>
    <script src="{{ asset('js/feature/add-satuan.js') }}"></script>
@endsection
