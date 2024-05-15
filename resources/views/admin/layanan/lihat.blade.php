@extends('layouts-admin.main')

@section('content')
    <div class="uppercase text-lg font-bold m-4 dark:text-white h-full">
        Table {{ $title }}
    </div>
    <!-- TABLE START -->
    <x-inner-layout>

        <div class="flex flex-col md:flex-row justify-between gap-5 mb-5">
            <!-- SEARCH START-->
            <form class="w-full md:w-1/2 lg:w-1/2">
                @csrf
                <label for="default-search"
                    class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="search" id="default-search"
                        class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-200 dark:placeholder-white dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Search disini..." required />
                    <button type="submit"
                        class="text-white absolute end-2.5 bottom-2.5 bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-blue-800">Search</button>
                </div>
            </form>
            <!-- SEARCH END-->
        </div>


        <div class="relative overflow-x-auto sm:rounded-lg">
            @session('successTable')
                <x-alert-success>
                    {{ $value }}
                </x-alert-success>
            @endsession
            @session('errorTable')
                <x-alert-error>
                    {{ $value }}
                </x-alert-error>
            @endsession
            <table class="w-full text-sm text-left rtl:text-right text-gray-800 dark:text-gray-400 border-solid">
                <thead class="text-md text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-white">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Foto
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Nama
                                <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                    </svg></a>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Tarif Harga
                                <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                    </svg>
                                </a>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only">Lihat Detail</span>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($layanans as $row)
                        <tr class="bg-white border-b dark:bg-gray-700 dark:border-gray-700 dark:hover:bg-gray-400">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <img src="{{ Storage::url($row->l_foto) }}" alt="Foto Kendaraan"
                                    class="h-72 max-w-xl rounded-lg shadow-xl dark:shadow-gray-800">
                            </th>
                            <td class="px-6 py-4 dark:text-white">
                                {{ $row->l_nama }}
                            </td>
                            <td class="px-6 py-4 dark:text-white">
                                Rp.{{ number_format($row->l_tarif, 0, ',', '.') }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="{{ asset('admin/layanan/store/' . $row->id) }}"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Lihat
                                    Detail</a>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="{{ asset('admin/layanan/show/' . $row->id) }}"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <x-delete-button action="admin/layanan/delete/{{ $row->id }}" id="{{ $row->id }}"
                                    nama="{{ $row->l_nama }}"></x-delete-button>
                            </td>
                            <td class="px-6 py-4 text-right">

                                <x-button-dropdown-option-table targe="dropdown-{{ $row->id }}" />

                                <!-- Dropdown menu -->
                                <x-dropdown-option-table id="dropdown-{{ $row->id }}">
                                    @if ($row->l_personil)
                                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                            aria-labelledby="dropdownDefaultButton">
                                            <li>
                                                <a href="{{ asset('admin/timLayanans/' . $row->id) }}"
                                                    class="block px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Tambah
                                                    Tim</a>
                                            </li>
                                        </ul>
                                    @endif
                                    <x-list-dropdown-option-table
                                        href="{{ asset('admin/videoLayanans/' . $row->id) }}">Tambah
                                        Video</x-list-dropdown-option-table>
                                    <x-list-dropdown-option-table
                                        href="{{ asset('admin/detailFotoLayanans/' . $row->id) }}">Tambah
                                        Foto</x-list-dropdown-option-table>
                                </x-dropdown-option-table>

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

            {{ $layanans->links() }}
        </div>

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

        <form action="{{ asset('admin/layanans/create') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-5">
                <label for="l_foto" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Foto
                    Layanan</label>
                <input name="l_foto"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue file:text-violet-700 hover:file:bg-blue-400 @error('l_foto') border-red-500 @enderror"
                    id="multiple_files" type="file">
                @error('l_foto')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-5">
                <label for="l_nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                    Layanan</label>
                <input name="l_nama"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-4 @error('l_nama') border-red-500 @enderror"
                    value="{{ old('l_nama') }}" type="text">

                @error('l_nama')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-5">
                <label for="l_tarif" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tarif
                    Harga</label>
                <input name="l_tarif"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-4 @error('l_tarif') border-red-500 @enderror"
                    value="{{ old('l_tarif') }}" type="text">

                @error('l_tarif')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-5">
                <label for="l_satuan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Satuan</label>
                <select name="l_satuan"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-4 @error('l_satuan') border-red-500 @enderror">
                    <option disabled selected>-- Pilih Satuan --</option>
                    <option value="jam" {{ old('l_satuan') == 'jam' ? 'selected' : '' }}>jam</option>
                    <option value="minggu" {{ old('l_satuan') == 'minggu' ? 'selected' : '' }}>minggu</option>
                    <option value="bulan" {{ old('l_satuan') == 'bulan' ? 'selected' : '' }}>bulan</option>
                    <option value="kegiatan" {{ old('l_satuan') == 'kegiatan' ? 'selected' : '' }}>kegiatan</option>
                </select>
                @error('l_satuan')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <x-radio-button-form title="Apakah barang ini akan menggunakan metode uang muka ?" name="is_dp" />

            <x-field-form name="tarif_dp" class="hidden"
                title="Isi Tarif Dp untuk suatu saat jika barang ini memakai metode uang maka !" />

            <div class="mb-5">
                <label for="l_deskripsi"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
                <div id="container">
                    <textarea id="editor" class="@error('l_deskripsi') border-red-500 @enderror" name="l_deskripsi">{{ old('l_deskripsi') }}</textarea>
                </div>
                @error('l_deskripsi')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class=" py-4">
                <div class="flex items-center">
                    <input id="link-checkbox" type="checkbox" name="l_personil"
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
    <!-- FORM END -->
@endsection

@section('script')
    <script src="{{ asset('js/feature/dp-field-toggle.js') }}"></script>
@endsection
