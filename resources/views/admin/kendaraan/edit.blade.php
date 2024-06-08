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

        <form action="{{ asset('admin/kendaraan/update/' . $kendaraan->id) }}" method="post">
            @csrf
            @method('PUT')

            <div class="mb-5">
                <label for="merk_kendaraan_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Merk
                    Kendaraan</label>
                <select name="merk_kendaraan_id"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue file:text-violet-700 hover:file:bg-blue-400 @error('mekr_kendaraan_id') border-red-500 @enderror">
                    @forelse($merkKendaraans as $row)
                        <option value="{{ $row->id }}"
                            {{ $kendaraan->merk_kendaraan_id == $row->id ? 'selected' : ' ' }}>
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
                    value="{{ $kendaraan->k_plat }}" type="text">
                @error('k_plat')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
                <div class="mb-5">
                    <label for="k_urutan_prioritas"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Urutan</label>
                    <input name="k_urutan_prioritas"
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-4 @error('k_urutan_prioritas') border-red-500 @enderror"
                        value="{{ $kendaraan->k_urutan_prioritas }}" type="text">
                    @error('k_urutan_prioritas')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <button class="p-2 w-80 bg-gray-900 rounded-md text-white text-sm">Submit</button>
        </form>
    </x-inner-layout>
@endsection
