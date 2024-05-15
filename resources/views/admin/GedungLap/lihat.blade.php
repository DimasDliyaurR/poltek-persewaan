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
                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only">Hapus</span>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only">Option</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($gedungLaps as $row)
                        <tr class="bg-white border-b dark:bg-gray-700 dark:border-gray-700 dark:hover:bg-gray-400">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <img src="{{ Storage::url($row->gl_foto) }}" alt="Foto Kendaraan"
                                    class="h-72 max-w-xl rounded-lg shadow-xl dark:shadow-gray-800">
                            </th>
                            <td class="px-6 py-4 dark:text-white">
                                {{ $row->gl_nama }}
                            </td>
                            <td class="px-6 py-4 dark:text-white">
                                Rp. {{ number_format($row->gl_tarif, 0, ',', '.') }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="{{ asset('admin/gedungLap/store/' . $row->id) }}"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Lihat
                                    Detail</a>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="{{ asset('admin/gedungLap/show/' . $row->id) }}"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <x-delete-button action="admin/gedungLap/delete/{{ $row->id }}"
                                    id="{{ $row->id }}" nama="{{ $row->gl_nama }}"></x-delete-button>
                            </td>
                            <td>
                                <x-button-dropdown-option-table targe="dropdown-{{ $row->id }}" />

                                <!-- Dropdown menu -->
                                <x-dropdown-option-table id="dropdown-{{ $row->id }}">
                                    <x-list-dropdown-option-table
                                        href="{{ route('detailFotoGedungLap.index', $row->id) }}">Tambah
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

            {{ $gedungLaps->links() }}
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

        <form action="{{ asset('admin/gedungLaps/create') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-5">
                <label for="gl_foto" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Foto Gedung &
                    Lapangan</label>
                <input name="gl_foto"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue file:text-violet-700 hover:file:bg-blue-400 @error('gl_foto') border-red-500 @enderror"
                    id="multiple_files" type="file">
                @error('gl_foto')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-5">
                <label for="gl_nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Gedung &
                    Lapangan</label>
                <input name="gl_nama"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-4 @error('gl_nama') border-red-500 @enderror"
                    value="{{ old('gl_nama') }}" type="text">

                @error('gl_nama')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-5">
                <label for="gl_tarif" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga
                    Tarif</label>
                <input name="gl_tarif"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-4 @error('gl_tarif') border-red-500 @enderror"
                    value="{{ old('gl_tarif') }}" type="text">

                @error('gl_tarif')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-5">
                <label for="gl_satuan_gedung"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Satuan</label>
                <input name="gl_satuan_gedung"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-4 @error('gl_satuan_gedung') border-red-500 @enderror"
                    value="{{ old('gl_satuan_gedung') }}" type="text">
                @error('gl_satuan_gedung')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-5">
                <label for="gl_kapasitas_gedung"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kapasitas</label>
                <input name="gl_kapasitas_gedung"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-4 @error('gl_kapasitas_gedung') border-red-500 @enderror"
                    value="{{ old('gl_kapasitas_gedung') }}" type="text">
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
                    value="{{ old('gl_ukuran_gedung') }}" type="text">
                @error('gl_ukuran_gedung')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror

                <p class="text-sm">Bisa dikosongkan</p>
            </div>

            <x-radio-button-form title="Apakah barang ini akan menggunakan metode uang muka ?" name="is_dp" />

            <x-field-form name="tarif_dp" class="hidden"
                title="Isi Tarif Dp untuk suatu saat jika barang ini memakai metode uang maka !" />

            <div class="mb-5">
                <label for="gl_keterangan"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
                <div id="container">
                    <textarea id="editor" class="@error('gl_keterangan') border-red-500 @enderror" name="gl_keterangan">{{ old('gl_keterangan') }}</textarea>
                </div>
                @error('gl_keterangan')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
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
