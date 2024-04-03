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

        <form action="{{ asset('admin/asrama/update/' . $asrama->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-5">
                <label for="a_foto" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Foto
                    Asrama</label>
                <input name="a_foto"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue file:text-violet-700 hover:file:bg-blue-400 @error('a_foto') border-red-500 @enderror"
                    id="multiple_files" type="file">
                @error('a_foto')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror

                <img src="{{ Storage::url($asrama->a_foto) }}" alt="Foto Kendaraan"
                    class="h-72 max-w-xl rounded-lg shadow-xl dark:shadow-gray-800 my-5">
            </div>

            <div class="mb-5">
                <label for="a_nama_ruangan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                    Ruangan Asrama</label>
                <input name="a_nama_ruangan"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-4 @error('a_nama_ruangan') border-red-500 @enderror"
                    type="text" value="{{ $asrama->a_nama_ruangan }}">

                @error('a_nama_ruangan')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-5">
                <label for="a_tarif" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga
                    Tarif (N)</label>
                <input name="a_tarif"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-4 @error('a_tarif') border-red-500 @enderror"
                    type="text" value="{{ $asrama->a_tarif }}">

                @error('a_tarif')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <button class="p-2 w-80 bg-gray-900 rounded-md text-white text-sm">Submit</button>
        </form>
    </x-inner-layout>
@endsection
