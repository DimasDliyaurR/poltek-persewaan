@extends('transaksi.main')
@section('content')
    <div class="w-screen h-screen flex flex-row justify-center items-center">
        <div class="container">
            <form class="p-2 mx-auto" action="{{ route('gedung.pesan') }}" method="POST">
                @csrf
                <div class="grid md:grid-cols-2 md:gap-6">

                    {{-- Tanggal Sewa --}}
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="datetime-local" name="tg_tanggal_sewa" id="tg_tanggal_sewa"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " value="{{ old('tg_tanggal_sewa') ?? now() }}" />
                        <label for="tg_tanggal_sewa"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Tanggal
                            Sewa</label>
                        @error('tg_tanggal_sewa')
                            {{ $message }}
                        @enderror
                    </div>

                    <div class="relative z-0 w-full mb-5 group">
                        <input type="datetime-local" name="tg_tanggal_kembali" id="tg_tanggal_kembali"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " value="{{ old('tg_tanggal_kembali') }}" />
                        <label for="tg_tanggal_kembali"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Tanggal
                            Kembali</label>
                        @error('tg_tanggal_kembali')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" name="tg_tujuan" id="tg_tujuan"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " value="{{ old('tg_tujuan') }}" />
                    <label for="tg_tujuan"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Tujuan</label>
                    @error('tg_tujuan')
                        {{ $message }}
                    @enderror
                </div>

                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" name="promo" id="promo"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " value="{{ old('promo') }}" />
                    <label for="promo"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Promo</label>
                    @error('promo')
                        {{ $message }}
                    @enderror
                </div>

                {{-- Button --}}
                <div class="flex md:flex-row flex-col-reverse justify-between md:items-center">
                    <p class="text-sm">List Item yang akan dibeli</p>
                    <button id="add-item"
                        class="text-white bg-primary hover:bg-orange-500 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                        type="button">
                        Tambah Item
                    </button>
                </div>

                {{-- Card Container --}}
                <div id="input-slug" class="h-1 inline-block">
                    <input type="text" name="slug[]" value="{{ $item->gl_slug }}" id="slug">
                </div>
                <ul id="card" class="list-disc">
                </ul>

                <button type="submit"
                    class="text-white bg-primary hover:bg-orange focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                <div class="text-center">
            </form>
        </div>
    @section('script')
    @endsection
