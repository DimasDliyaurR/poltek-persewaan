@extends('layouts-home.navbar.nav')
@section('content')
    <div class="grid place-items-center h-screen justify-center bg-gray-200 p-20">
        <div class="w-96 p-6 shadow-lg bg-white rounded-md">
            <h1 class="text-center pb-2 text-xl block">Daftar</h1>

            <hr class="mt-1 mb-4 border-t-1 border-primary">
            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                @csrf
                <div class="flex flex-row gap-3">
                    <div>
                        {{-- Email --}}
                        <div class="mt-1 mb-1 text-sm flex flex-col justify-between ">
                            <label for="email" class="">Email <span class="text-red-700">*</span></label>
                            <input type="text"
                                class="border w-full text-sm  focus:outline-none focus:ring-0 focus:border-gray-600 rounded-md "
                                id="email" name="email" placeholder="masukkan alamat email"
                                value="{{ old('email') }}" autocomplete="email">
                            @error('email')
                                <span class="text-red-500">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        {{-- Handphone --}}
                        <div class="mt-1 mb-1 text-sm ">
                            <label for="no_telp" class="">No. Handphone<span class="text-red-700">*</span></label>
                            <input type="text"
                                class="border w-full text-sm  mb-1 focus:outline-none focus:ring-0 focus:border-gray-600 rounded-md "
                                id="no_telp" name="no_telp" placeholder="masukkan nomor telephone"
                                value="{{ old('no_telp') }}">
                            @error('no_telp')
                                <span class="text-red-500">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        {{-- Foto KTP --}}
                        <div class="mt-1 text-sm">
                            <p class="-mb-4">Foto E-KTP</p><br>
                            <div class="relative w-full border border-gray-600 rounded-md"">
                                <label for="foto_ktp"
                                    class="inline-block  bg-primary left-0 text-white p-2 rounded-md cursor-pointer shadow-md transform active:scale-90 ">
                                    Upload File </label>
                                <input type="file"
                                    class="hidden border w-full text-sm  focus:outline-none focus:ring-0 focus:border-gray-600 rounded-md "
                                    id="foto_ktp" name="foto_ktp" placeholder="No file chosen">
                                @error('foto_ktp')
                                    <span class="text-red-500">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <span class="text-sm text-gray-500">Ratio maks 1800x1800</span>
                        </div>

                    </div>

                    <div>

                        {{-- Username --}}
                        <div class="mt-1 text-sm">
                            <label for="username" class="">Username <span class="text-red-700">*</span></label>
                            <input type="text"
                                class="border w-full text-sm  mb-1 focus:outline-none focus:ring-0 focus:border-gray-600 rounded-md "
                                id="username" name="username" placeholder="masukkan username"
                                value="{{ old('username') }}">
                            @error('username')
                                <span class="text-red-500">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        {{-- Nama Lengkap --}}
                        <div class="mt-1 text-sm">
                            <label for="nama_lengkap" class="">Nama Lengkap <span
                                    class="text-red-700">*</span></label>
                            <input type="text"
                                class="border w-full text-sm  focus:outline-none focus:ring-0 focus:border-gray-600 rounded-md "
                                id="nama_lengkap" name="nama_lengkap" placeholder="Masukkan nama lengkap"
                                value="{{ old('nama_lengkap') }}">
                            @error('nama_lengkap')
                                <span class="text-red-500">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        {{-- Alamat --}}
                        <div class="mt-1 text-sm">
                            <label for="alamat">Alamat <span class="text-red-700">*</span></label>
                            <input type="text" id="alamat" name="alamat" placeholder="Alamat"
                                value="{{ old('alamat') }}"
                                class="bg-none border w-full text-sm  mb-2 focus:outline-none focus:ring-0 focus:border-gray-600 rounded-md">
                            @error('alamat')
                                <span class="text-red-500">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>

                </div>
                {{-- Kata Sandi --}}
                <div class="mt-1 text-sm">
                    <label for="password">Kata sandi <span class="text-red-700">*</span></label>
                    <input type="password" id="password" name="password" placeholder="Password"
                        class="border w-full text-sm  focus:outline-none focus:ring-0 focus:border-gray-600 rounded-md"
                        autocomplete="new-password">
                </div>
                {{-- Kata Sandi Konfirmas --}}
                <div class="mt-1 text-sm">
                    <label for="password_confirmation">Konfirmasi kata sandi<span class="text-red-700">*</span> </label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                        placeholder="Konfirmasi Password"
                        class="border w-full text-sm  focus:outline-none focus:ring-0 focus:border-gray-600 rounded-md"
                        autocomplete="new-password">
                    @error('password')
                        <span class="text-red-500">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <button
                    class="w-full mt-5 p-1 bg-primary text-white rounded-md hover:bg-transparent hover:text-primary hover:font-semibol hover:border-2  hover:border-primary">Daftar</button>
                <p class="text-xs mt-12 mb-6 text-center">Dengan daftar akun, berarti Anda telah menyetujui <span
                        class="text-primary">Syarat dan Ketentuan </span>serta <span class="text-primary">Pernyataan Privasi
                    </span>kami.</p>
                <hr class=" mb-4border-t-1 border-primary">
                <p class="text-xs text-center  pt-5"> <i class="fa-regular fa-copyright"></i>copyright SEWAASET</p>
        </div>
        </form>

    </div>
@endsection
