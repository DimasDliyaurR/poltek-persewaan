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

        <form action="{{ asset('admin/fasilitasAsrama/update/' . $fasilitasAsrama->id) }}" method="post">
            @csrf
            @method('PUT')

            <div class="mb-5">
                <label for="fa_nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Asrama</label>
                <input name="fa_nama"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-4 @error('fa_nama') border-red-500 @enderror"
                    value="{{ $fasilitasAsrama->fa_nama }}" type="text">
                @error('fa_nama')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-5">
                <label for="fa_icon" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Icon</label>
                <input name="fa_icon"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-4 @error('fa_icon') border-red-500 @enderror"
                    value="{{ $fasilitasAsrama->fa_icon }}" type="text">
                @error('fa_icon')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
                <p class="text-sm">Gunakan Icon pada website <a class="underline text-blue-400"
                        href="https://boxicons.com/">Boxicons</a></p>
                <div class="py-2">
                    <box-icon name='{{ $fasilitasAsrama->fa_icon }}'></box-icon>
                </div>
            </div>

            <div class="mb-5">
                <label for="fa_tarif" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tarif
                    Harga</label>
                <input name="fa_tarif"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-4 @error('fa_tarif') border-red-500 @enderror"
                    value="{{ $fasilitasAsrama->fa_tarif }}" type="text">

                @error('fa_tarif')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <button class="p-2 w-80 bg-gray-900 rounded-md text-white text-sm">Submit</button>
        </form>
    </x-inner-layout>
@endsection
