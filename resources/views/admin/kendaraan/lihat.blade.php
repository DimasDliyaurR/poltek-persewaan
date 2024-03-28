@extends('layouts-admin.main')

@section('content')
    <div class="uppercase text-lg font-bold m-4 dark:text-white h-full">
        Table {{ $title }}
    </div>
    <!-- TABLE START -->
    <x-inner-layout>

        <livewire:kendaraan-table>

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

        <form action="{{ asset('admin/kendaraans/create') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-5">
                <label for="merk_kendaraan_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Merk
                    Kendaraan</label>
                <select name="merk_kendaraan_id"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue file:text-violet-700 hover:file:bg-blue-400 @error('mekr_kendaraan_id') border-red-500 @enderror">
                    <option selected disabled hidden>-- Pilih Merk Kendaraan --</option>
                    @forelse($merkKendaraans as $row)
                        <option value="{{ $row->id }}" {{ old('merk_kendaraan_id') == $row->id ? 'selected' : ' ' }}>
                            {{ $row->mk_merk . ' || ' . $row->mk_seri }}</option>
                    @empty
                        <option selected disabled>Tidak ada Pilihan</option>
                    @endforelse
                </select>
                @error('merk_kendaraan_id')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-5">
                <label for="k_plat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Plat
                    Nomor</label>
                <input name="k_plat"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-4 @error('k_plat') border-red-500 @enderror"
                    value="{{ old('k_plat') }}" type="text">

                @error('k_plat')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <button class="p-2 w-80 bg-gray-900 rounded-md text-white text-sm">Submit</button>
        </form>

    </x-inner-layout>
    <!-- FORM END -->
@endsection
