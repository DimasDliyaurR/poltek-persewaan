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
                            Foto Promo
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Judul Promo
                                <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                    </svg></a>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Kategori
                                <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                    </svg>
                                </a>
                            </div>
                        </th>

                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Isi
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
                    @forelse($promos as $row)
                        <tr class="bg-white border-b dark:bg-gray-700 dark:border-gray-700 dark:hover:bg-gray-400">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <img src="{{ Storage::url($row->p_foto) }}" alt="Foto Kendaraan"
                                    class="h-72 max-w-xl rounded-lg shadow-xl dark:shadow-gray-800">
                            </th>
                            <td class="px-6 py-4 dark:text-white">
                                {{ $row->p_judul }}
                            </td>
                            <td class="px-6 py-4 dark:text-white">
                                {{ $row->p_kategori }}
                            </td>
                            <td class="px-6 py-4 dark:text-white">
                                {{ $row->p_tipe == 'fixed' ? 'Rp. ' : '' }}{{ $row->p_isi }}
                                {{ $row->p_tipe == 'percent' ? '%' : '' }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="{{ asset('admin/promo/store/' . $row->id) }}"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Lihat
                                    Detail</a>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="{{ asset('admin/promo/show/' . $row->id) }}"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <x-delete-button action="admin/promo/delete/{{ $row->id }}" id="{{ $row->id }}"
                                    nama="{{ $row->p_judul }}"></x-delete-button>
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

            {{ $promos->links() }}
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

        <form action="{{ asset('admin/promos/create') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-5">
                <label for="p_foto" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Foto Thubmnail
                    Promo</label>
                <input name="p_foto"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue file:text-violet-700 hover:file:bg-blue-400 @error('p_foto') border-red-500 @enderror"
                    id="multiple_files" type="file">
                @error('p_foto')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-5">
                <label for="p_judul" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                    Promo</label>
                <input name="p_judul"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-4 @error('p_judul') border-red-500 @enderror"
                    value="{{ old('p_judul') }}" type="text">

                @error('p_judul')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-5">
                <label for="p_kode" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode
                    Promo</label>
                <input name="p_kode"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-4 @error('p_kode') border-red-500 @enderror"
                    value="{{ old('p_kode') }}" type="text">

                @error('p_kode')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-5">
                <label for="p_isi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Isi
                    Promo</label>
                <input name="p_isi"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-4 @error('p_isi') border-red-500 @enderror"
                    value="{{ old('p_isi') }}" type="text">

                @error('p_isi')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-5">
                <label for="p_tipe" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipe
                    Promo</label>
                <select name="p_tipe"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-4 @error('p_tipe') border-red-500 @enderror">
                    <option disabled selected>-- Pilih Tipe --</option>
                    <option value="fixed" {{ old('p_tipe') == 'fixed' ? 'selected' : '' }}>Harga Nominal</option>
                    <option value="percent" {{ old('p_tipe') == 'percent' ? 'selected' : '' }}>Persen</option>
                </select>
                @error('p_tipe')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class=" py-4">
                <p>Apakah Promo berlaku untuk umum ?</p>
                <br>

                <div class="flex items-center mb-4">
                    <input {{ old('p_is_umum') == 1 ? 'checked' : '' }} id="p_is_umum" type="radio" value="1"
                        name="p_is_umum"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="p_is_umum" class="ms-2 text-sm font-medium  dark:text-gray-500">Iya</label>
                </div>
                <div class="flex items-center">
                    <input {{ old('p_is_umum') == 0 ? 'checked' : '' }} id="p_is_umum-1" type="radio" value="0"
                        name="p_is_umum"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="p_is_umum-1" class="ms-2 text-sm font-medium  dark:text-gray-500">Tidak</label>
                </div>

                @error('p_is_umum')
                    <span class="text-red-600 text-sm ml-6">{{ $message }}</span>
                @enderror
            </div>

            <div class=" py-4">
                <p>Apakah Promo langsung di aktifkan ?</p>
                <br>

                <div class="flex items-center mb-4">
                    <input {{ old('p_is_aktif') == 1 ? 'checked' : '' }} id="p_is_aktif" type="radio" value="1"
                        name="p_is_aktif"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="p_is_aktif" class="ms-2 text-sm font-medium  dark:text-gray-500">Iya</label>
                </div>
                <div class="flex items-center">
                    <input {{ old('p_is_aktif') == 0 ? 'checked' : '' }} id="p_is_aktif-1" type="radio" value="0"
                        name="p_is_aktif"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="p_is_aktif-1" class="ms-2 text-sm font-medium  dark:text-gray-500">Tidak</label>
                </div>

                @error('p_is_aktif')
                    <span class="text-red-600 text-sm ml-6">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-5">
                <label for="p_deskripsi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi
                    Promo</label>
                <input name="p_deskripsi"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-4 @error('p_deskripsi') border-red-500 @enderror"
                    value="{{ old('p_deskripsi') }}" type="text">

                @error('p_deskripsi')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-5">
                <label for="p_jumlah" id="p_jumlah"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah
                    Promo</label>
                <input name="p_jumlah"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-4 @error('p_jumlah') border-red-500 @enderror"
                    value="{{ old('p_jumlah') ?? 0 }}" type="text">

                @error('p_jumlah')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-5 w-full">
                <p class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Periode Promo</p>
                <div class="flex sm:flex-row flex-col">
                    <div>
                        <input name="p_mulai" id="p_mulai"
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-4 @error('p_mulai') border-red-500 @enderror"
                            value="{{ old('p_mulai') }}" type="date" onchange="setTime()">
                        @error('p_mulai')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Logo Right Arrow --}}
                    <div class="inset-y-0 start-0 flex items-center p-3 pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                            <g fill="none">
                                <path fill="currentColor" d="M4 11.25a.75.75 0 0 0 0 1.5zm0 1.5h16v-1.5H4z"
                                    opacity="0.5" />
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="1.5" d="m14 6l6 6l-6 6" />
                            </g>
                        </svg>
                    </div>

                    <div>
                        <input name="p_kadaluarsa" id="p_kadaluarsa"
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-4 @error('p_kadaluarsa') border-red-500 @enderror"
                            value="{{ old('p_kadaluarsa') }}" type="date" onchange="setTime()">
                        @error('p_kadaluarsa')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <p id="datetime-result" class="ml-2 text-sm"></p>
            </div>

            <div class="mb-5">
                <label for="p_tipe" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori
                    Promo</label>
                <select name="p_kategori"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-4 @error('p_kategori') border-red-500 @enderror">
                    <option disabled selected>-- Pilih Kategori --</option>
                    <option value="asramas" {{ old('p_kategori') == 'asramas' ? 'selected' : '' }}>Asrama</option>
                    <option value="layanans" {{ old('p_kategori') == 'layanans' ? 'selected' : '' }}>Layanan</option>
                    <option value="gedung_laps" {{ old('p_kategori') == 'gedung_laps' ? 'selected' : '' }}>Gedung
                        Lapangan
                    </option>
                    <option value="kendaraans" {{ old('p_kategori') == 'kendaraans' ? 'selected' : '' }}>Kendaraan
                    </option>
                    <option value="alat_barangs" {{ old('p_kategori') == 'alat_barangs' ? 'selected' : '' }}>Barang
                    </option>
                </select>
                @error('p_kategori')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <button id="submit" class="p-2 w-80 bg-gray-900 rounded-md text-white text-sm">Submit</button>
        </form>

    </x-inner-layout>
    <!-- FORM END -->
@endsection

@section('script')
    <script src="{{ asset('js/feature/promoForm.js') }}"></script>
@endsection
