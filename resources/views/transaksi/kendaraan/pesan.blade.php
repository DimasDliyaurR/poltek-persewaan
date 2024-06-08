@extends('transaksi.main')
@section('content')
    <div class="w-screen h-screen flex flex-row justify-center items-center">
        <div class="container">
            <form class="p-2 mx-auto" action="" method="POST">
                @csrf
                <div class="grid md:grid-cols-2 md:gap-6">

                    {{-- Tanggal Sewa --}}
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="datetime-local" name="tk_tanggal_sewa" id="tk_tanggal_sewa"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " value="{{ old('tk_tanggal_sewa') ?? now() }}" />
                        <label for="tk_tanggal_sewa"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Tanggal
                            Sewa</label>
                        @error('tk_tanggal_sewa')
                            {{ $message }}
                        @enderror
                    </div>

                    <div class="relative z-0 w-full mb-5 group">
                        <input type="datetime-local" name="tk_tanggal_kembali" id="tk_tanggal_kembali"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " value="{{ old('tk_tanggal_kembali') }}" />
                        <label for="tk_tanggal_kembali"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Tanggal
                            Kembali</label>
                        @error('tk_tanggal_kembali')
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

                {{-- Button --}}
                <div class="flex md:flex-row flex-col-reverse justify-between md:items-center">
                    <p class="text-sm">List Item yang akan dibeli</p>
                    <button id="add-item"
                        class="text-white bg-primary hover:bg-orange-500 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                        type="button" data-drawer-target="drawer-bottom-example" data-drawer-show="drawer-bottom-example"
                        data-model-togel="drawer-bottom-example" data-drawer-placement="bottom"
                        aria-controls="drawer-bottom-example" data-drawer-backdrop="false">
                        Tambah Item
                    </button>
                </div>

                {{-- Card Container --}}
                <div id="input-slug" class="h-1 inline-block">
                    <input type="text" name="slug[]" value="" id="slug">
                </div>
                <ul id="card" class="list-disc">
                    {{-- Card Start --}}
                    {{-- @foreach ($items as $item)
                        <input type="text" name="slug[]" value="{{ $item->mk_slug }}" hidden>
                        <div class=''>
                            <ul class='list-disc'>
                                <li>
                                    <img src="{{ Storage::url($item->mk_foto) }}" width="250" alt=""
                                        class="object-cover md:rounded-l-lg rounded-t-lg">
                                    Rp.{{ number_format($item->mk_tarif, 0, ',', '.') }}
                                    {{ $item->mk_merk }}
                                </li>
                            </ul>
                        </div>
                    @endforeach --}}
                    {{-- <div class="flex flex-col border-t p-2"> --}}

                    {{-- Image Card --}}
                    {{-- Card End --}}
                    {{-- </div> --}}

                </ul>

                <button type="submit"
                    class="text-white bg-primary hover:bg-orange focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                <div class="text-center">
            </form>
        </div>
        @foreach ($merkKendaraan as $item)
            <!-- Main modal -->
            <div id="box-{{ $item->id }}" tabindex="-1" aria-hidden="true"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-2xl max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                {{ $item->mk_merk }}
                            </h3>
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="box-{{ $item->id }}">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-4 md:p-5 space-y-4">
                            <p class="text-lg font-bold text-right">Rp.
                                {{ number_format($item->mk_tarif, 0, ',', '.') }}</p>

                            <div class="flex flex-row gap-5">

                                <div class="flex flex-row gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 15 15">
                                        <path fill="currentColor"
                                            d="M14 6v5.5a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 0 11.5 8H10V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V9h1.5a.5.5 0 0 1 .5.5v2a1.5 1.5 0 0 0 3 0V5a1 1 0 0 0-1-1V2.49a.5.5 0 0 0-.5-.49a.51.51 0 0 0-.5.55V5a1 1 0 1 0 1-1zm-5 .5a.5.5 0 0 1-.5.5h-5a.5.5 0 0 1-.5-.5v-3a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 .5.5z" />
                                    </svg>
                                    {{ $item->mk_bahan_bakar }}
                                </div>

                                <div class="flex flex-row gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 256 256">
                                        <path fill="currentColor"
                                            d="M248 128a8 8 0 0 1-8 8h-16.67A48.08 48.08 0 0 1 176 176h-40v24h24a32 32 0 0 1 32 32a8 8 0 0 1-16 0a16 16 0 0 0-16-16h-24v16a8 8 0 0 1-16 0v-16H96a16 16 0 0 0-16 16a8 8 0 0 1-16 0a32 32 0 0 1 32-32h24v-24H80a48.08 48.08 0 0 1-47.33-40H16a8 8 0 0 1 0-16h24a8 8 0 0 1 8 8a32 32 0 0 0 32 32h96a32 32 0 0 0 32-32a8 8 0 0 1 8-8h24a8 8 0 0 1 8 8M80 144h96a16 16 0 0 0 15.84-18.26l-13.72-96A16.08 16.08 0 0 0 162.28 16H93.72a16.08 16.08 0 0 0-15.84 13.74l-13.72 96A16 16 0 0 0 80 144" />
                                    </svg>
                                    {{ $item->mk_kapasitas }}
                                </div>

                            </div>

                            <div class="flex flex-row gap-1">
                                Unit yang tersedia :
                                {{ $item->kendaraans_count }}
                            </div>

                            <p>
                                {!! $item->mk_deskripsi !!}
                            </p>
                        </div>
                        <!-- Modal footer -->
                        <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                            <button data-modal-hide="box-{{ $item->id }}" type="button"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I
                                accept</button>
                            <button data-modal-hide="box-{{ $item->id }}" type="button"
                                class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Decline</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- drawer component -->
    <div id="drawer-bottom-example"
        class="fixed bottom-0 left-0 right-0 z-40 w-full p-4 overflow-y-auto transition-transform bg-blue-100 dark:bg-gray-800 transform-none"
        tabindex="-1" aria-labelledby="drawer-bottom-label">
        <h5 id="drawer-bottom-label"
            class="inline-flex items-center mb-4 text-base font-semibold text-gray-500 dark:text-gray-400">
            <svg class="w-4 h-4 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>All Items
        </h5>
        <button type="button" data-drawer-hide="drawer-bottom-example" aria-controls="drawer-bottom-example"
            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 end-2.5 inline-flex items-center justify-center dark:hover:bg-gray-600 dark:hover:text-white">
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
            <span class="sr-only">Close menu</span>
        </button>
        {{-- Containt Drawer --}}


        <div class="flex md:flex-row md:flex-wrap flex-col gap-4 p-5 overflow-y-scroll w-screen h-96">

            @forelse ($merkKendaraan as $item)
                <div class="flex flex-row">
                    <img class="h-40 max-w-full rounded-l-md object-cover w-40" src="{{ Storage::url($item->mk_foto) }}"
                        alt="">
                    <div class="flex flex-col h-40 bg-white shadow-sm shadow-gray-300 p-4 justify-between">
                        <p class="font-bold text-xl">{{ $item->mk_merk }}</p>
                        <p class="text-md">Rp {{ number_format($item->mk_tarif, 0, ',', '.') }}</p>

                        <div class="flex flex-row gap-1">


                            <button id="add"
                                class="text-white bg-primary w-20 hover:bg-orange-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm text-center"
                                type="button">
                                <input class="sr-only" value="{{ $item->mk_slug }}">
                                Add
                            </button>

                            {{-- Button Detail --}}
                            <button data-modal-target="box-{{ $item->id }}"
                                data-modal-toggle="box-{{ $item->id }}"
                                class="text-white bg-primary w-20 hover:bg-orange-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm text-center"
                                type="button">
                                Detail
                            </button>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center w-full">Kosong</p>
            @endforelse
        @endsection
        @section('script')
            <script>
                $(document).ready(() => {
                    $("#add-item").click((e) => {
                        e.preventDefault();

                        $("#drawer-bottom-example").removeClass("hidden");
                    });
                });
            </script>
            <script src="{{ asset('js/feature/list-kendaraan.js') }}"></script>
        @endsection
