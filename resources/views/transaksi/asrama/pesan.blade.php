@extends('transaksi.main')
@section('content')
    <div class="w-screen h-screen flex flex-row justify-center items-center">
        <div class="container">
            <form class="p-2 mx-auto" action="{{ route('asrama.pesan') }}" method="POST">
                @csrf
                <div class="grid md:grid-cols-2 md:gap-6">

                    {{-- Tanggal Sewa --}}
                    <div class="relative z-0 w-full mb-5 group">
                        <input datepicker datepicker-title="Check in" datepicker-format="yyyy-mm-dd" type="text"
                            name="ta_check_in" id="ta_check_in"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " value="{{ old('ta_check_in') }}" />
                        <label for="ta_check_in"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Chcek
                            In</label>
                        @error('ta_check_in')
                            {{ $message }}
                        @enderror
                    </div>

                    <div class="relative z-0 w-full mb-5 group">
                        <input type="text" datepicker datepicker-title="Check out" name="ta_check_out" id="ta_check_out"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " value="{{ old('ta_check_out') }}" />
                        <label for="ta_check_out"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Check
                            Out</label>
                        @error('ta_check_out')
                            {{ $message }}
                        @enderror
                    </div>
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


                <div id="input-fasilitas" class="hidden">

                </div>
                {{-- Button --}}
                <div class="flex md:flex-row flex-col-reverse justify-between md:items-center">
                    <p class="text-sm">Ads On Fasilitas Asrama</p>
                    <button id="add-item"
                        class="text-white bg-primary hover:bg-orange-500 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                        type="button">
                        Tambah Item
                    </button>
                </div>

                {{-- Card Container --}}
                <div id="input-slug" class="hidden h-1 inline-block">
                    <input type="text" name="slug[]" value="{{ $item->a_slug }}" id="slug">
                </div>
                <ul id="card" class="list-disc">
                </ul>

                <div class="mb-3">
                    @foreach ($fasilitasAsrama as $item)
                        <div class="flex items-center mb-4">
                            <input id="fasilitas" type="checkbox" value="{{ $item->fa_nama }}"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="fasilitas"
                                class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $item->fa_nama }}</label>
                        </div>
                    @endforeach
                </div>


                <button type="submit"
                    class="text-white bg-primary hover:bg-orange focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                <div class="text-center">
            </form>
        </div>
    @section('script')
        <script src="{{ asset('js\feature\checkbox-fasilitas.js') }}"></script>
    @endsection
