@extends('layouts-admin.main')

@section('content')
    <div class="uppercase text-lg font-bold m-4 dark:text-white h-full">
        Table {{ $title }}
    </div>
    <!-- TABLE START -->
    <p class="text-sm ml-4">Jika Tipe Asrama berwarna merah maka tipe asrama tidak ditemukan atau sudah dihapus. Klik <a
            href="{{ asset('admin/tipeAsramas?trashed=1') }}" class="text-blue-400 hover:underline">restore</a> pada laman
        Tipe Asrama lalu restore
        nama tipe asrama yang ingin dipilih.</p>
    <x-inner-layout>

        <livewire:asrama-table>

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

        <form action="{{ asset('admin/asramas/create') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="mb-5">
                <label for="tipe_asrama_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipe
                    Asrama</label>
                <select name="tipe_asrama_id"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue file:text-violet-700 hover:file:bg-blue-400 @error('tipe_asrama_id') border-red-500 @enderror">
                    <option selected disabled hidden>-- Pilih Tipe Asrama --</option>
                    @forelse($tipeAsramas as $row)
                        <option value="{{ $row->id }}" {{ old('tipe_asrama_id') == $row->id ? 'selected' : ' ' }}>
                            {{ $row->ta_nama }}</option>
                    @empty
                        <option selected disabled>Tidak ada Pilihan</option>
                    @endforelse
                </select>
                @error('tipe_asrama_id')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-5">
                <label for="a_nama_ruangan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                    Ruangan Asrama</label>
                <input name="a_nama_ruangan"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-4 @error('a_nama_ruangan') border-red-500 @enderror"
                    value="{{ old('a_nama_ruangan') }}" type="text">

                @error('a_nama_ruangan')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <button class="p-2 w-80 bg-gray-900 rounded-md text-white text-sm">Submit</button>
        </form>

    </x-inner-layout>
    <!-- FORM END -->
@endsection
