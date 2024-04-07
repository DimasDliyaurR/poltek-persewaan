@extends('layouts-admin.main')

@section('content')
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

        <form action="{{ asset('admin/satuanAlatBarang/update/' . $alatBarang->id) }}" method="post"
            enctype="multipart/form-data">
            @csrf
            @method('put')

            <div class="mb-5">
                <label for="sab_nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Satuan</label>
                <input name="sab_nama"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-4 @error('sab_nama') border-red-500 @enderror"
                    value="{{ $alatBarang->sab_nama }}" type="text">
                @error('sab_nama')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <button class="p-2 w-80 bg-gray-900 rounded-md text-white text-sm">Submit</button>
        </form>

    </x-inner-layout>
    <!-- FORM END -->
@endsection
