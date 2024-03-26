@extends('layouts-admin.main')

@section('content')
    <x-title-component>
        Form Tambah {{ $title }} Dari <span class="font-normal">{{ $layanan->l_nama }}</span>
    </x-title-component>

    <x-inner-layout>
        @session('successForm')
            <x-alert-success>
                {{ $value }}
            </x-alert-success>
        @endsession

        <form action="{{ asset('admin/timLayanans/create/' . $layanan->id) }}" method="post">
            @csrf

            <div class="mb-5">
                <label for="tl_nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Tim
                    Layanan</label>
                <input name="tl_nama"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-4 @error('tl_nama') border-red-500 @enderror"
                    value="{{ old('tl_nama') }}" type="text">

                @error('tl_nama')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <button class="p-2 w-80 bg-gray-900 rounded-md text-white text-sm">Submit</button>
        </form>
    </x-inner-layout>

    <x-title-component>
        List Tim Layanan Dari <span class="font-normal">{{ $layanan->l_nama }}</span>
    </x-title-component>

    <x-inner-layout>
        @session('successTable')
            <x-alert-success>
                {{ $value }}
            </x-alert-success>
        @endsession
        <p class="text-sm"><i>klik dan ketik nama Tim Layanan jika ingin mengubah , Kemudian tekan enter</i></p>
        <table class="w-full text-sm text-left rtl:text-right text-gray-800 dark:text-gray-400 border-solid">
            <thead class="text-md text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-white">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nama Tim
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse($timLayanans as $row)
                    <tr class="bg-white border-b dark:bg-gray-700 dark:border-gray-700 dark:hover:bg-gray-400">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <form action="{{ asset('admin/timLayanan/update/' . $row->id) }}" method="POST">
                                @csrf
                                @method('put')
                                <input type="text" name="tl_nama" class="border-0 text-sm" value="{{ $row->tl_nama }}">
                            </form>
                        </th>
                        <td class="px-6 py-4 text-right">
                            <x-delete-button action="admin/timLayanan/delete/{{ $row->id }}" id="{{ $row->id }}"
                                nama="{{ $row->tl_nama }}"></x-delete-button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="px-6 py-4 text-center">
                            Data Tidak Ada
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </x-inner-layout>
@endsection
