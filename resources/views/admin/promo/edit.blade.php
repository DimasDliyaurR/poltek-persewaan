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

        {{-- @php
            dd($promo->p_tipe_stok == 'unlimited');
        @endphp --}}

        <form action="{{ asset('admin/promo/update/' . $promo->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
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
                    value="{{ $promo->p_judul }}" type="text">

                @error('p_judul')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-5">
                <label for="p_kode" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode
                    Promo</label>
                <input name="p_kode"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-4 @error('p_kode') border-red-500 @enderror"
                    value="{{ $promo->p_kode }}" type="text">

                @error('p_kode')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-5">
                <label for="p_isi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Isi
                    Promo</label>
                <input name="p_isi"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-4 @error('p_isi') border-red-500 @enderror"
                    value="{{ $promo->p_isi }}" type="text">
                <span class="text-red-600 text-sm" id="ME-isi"></span>

                @error('p_isi')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-5">
                <label for="p_tipe" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipe
                    Promo</label>
                <select name="p_tipe" id="p_tipe"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-4 @error('p_tipe') border-red-500 @enderror">
                    <option disabled selected>-- Pilih Tipe --</option>
                    <option value="fixed" {{ $promo->p_tipe == 'fixed' ? 'selected' : '' }}>Harga Nominal</option>
                    <option value="percent" {{ $promo->p_tipe == 'percent' ? 'selected' : '' }}>Persen</option>
                </select>
                @error('p_tipe')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class=" py-4">
                <p>Apakah Promo berlaku untuk umum ?</p>
                <br>

                <div class="flex items-center mb-4">
                    <input {{ $promo->p_is_umum == 1 ? 'checked' : '' }} id="p_is_umum" type="radio" value="1"
                        name="p_is_umum"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="p_is_umum" class="ms-2 text-sm font-medium  dark:text-gray-500">Iya</label>
                </div>
                <div class="flex items-center">
                    <input {{ $promo->p_is_umum == 0 ? 'checked' : '' }} id="p_is_umum-1" type="radio" value="0"
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
                    <input {{ $promo->p_is_aktif == 1 ? 'checked' : '' }} id="p_is_aktif" type="radio" value="1"
                        name="p_is_aktif"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="p_is_aktif" class="ms-2 text-sm font-medium  dark:text-gray-500">Iya</label>
                </div>
                <div class="flex items-center">
                    <input {{ $promo->p_is_aktif == 0 ? 'checked' : '' }} id="p_is_aktif-1" type="radio" value="0"
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
                    value="{{ $promo->p_deskripsi }}" type="text">

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
                    value="{{ $promo->p_jumlah }}" type="text">

                @error('p_jumlah')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-5 w-full">
                <p class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Periode Promo</p>
                <div class="flex flex-row">
                    <div>
                        <input name="p_mulai" id="p_mulai"
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-4 @error('p_mulai') border-red-500 @enderror"
                            value="{{ $promo->p_mulai }}" type="date" onchange="setTime()">
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
                            value="{{ $promo->p_kadaluarsa }}" type="date" onchange="setTime()">
                        @error('p_kadaluarsa')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <p id="datetime-result" class="ml-2 text-sm"></p>
            </div>

            <div class="mb-5">
                <label for="p_tipe_stok" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Perilaku
                    Stok</label>
                <select name="p_tipe_stok"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-4 @error('p_kategori') border-red-500 @enderror">
                    <option value="unlimited" {{ $promo->p_tipe_stok == 'unlimited' ? 'selected' : '' }}>Tidak Terbatas
                    </option>

                    <option value="limit" {{ $promo->p_tipe_stok === 'limit' ? 'selected' : '' }}>Terbatas</option>
                </select>
                @error('p_tipe_stok')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-5">
                <label for="p_tipe" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori
                    Promo</label>
                <select name="p_kategori" id="p_tipe"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-4 @error('p_kategori') border-red-500 @enderror">
                    <option disabled selected>-- Pilih Kategori --</option>
                    <option value="asramas" {{ $promo->p_kategori == 'asramas' ? 'selected' : '' }}>Asrama</option>
                    <option value="layanans" {{ $promo->p_kategori == 'layanans' ? 'selected' : '' }}>Layanan</option>
                    <option value="gedung_laps" {{ $promo->p_kategori == 'gedung_laps' ? 'selected' : '' }}>Gedung
                        Lapangan
                    </option>
                    <option value="kendaraans" {{ $promo->p_kategori == 'kendaraans' ? 'selected' : '' }}>Kendaraan
                    </option>
                    <option value="alat_barangs" {{ $promo->p_kategori == 'alat_barangs' ? 'selected' : '' }}>Barang
                    </option>
                </select>
                @error('p_kategori')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <button id="submit" class="p-2 w-80 bg-gray-900 rounded-md text-white text-sm">Submit</button>
        </form>
        </form>
    </x-inner-layout>
@endsection

@section('script')
    <script src="{{ asset('js/validasi/promoForm.js') }}"></script>
@endsection
