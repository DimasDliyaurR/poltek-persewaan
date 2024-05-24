@extends('layouts-home.navbar.comp')
@section('scriptlink')
    <style>
        .bgImage {

            animation: bgChange 20s linear infinite;
            background-image: url("{{ asset('img/gerbang.jpg') }}");
        }

        @keyframes bgChange {
            0% {
                background-image: url("{{ asset('../../img/landingpage/gerbang.jpg') }}");
            }

            20% {
                background-image: url("{{ asset('../../img/landingpage/bad_2.jpg') }}");
            }

            25% {
                background-image: url("{{ asset('../../img/landingpage/bus_kiri.jpg') }}");
            }

            45% {
                background-image: url("{{ asset('../../img/landingpage/lab.jpg') }}");
            }

            50% {
                background-image: url("{{ asset('../../img/landingpage/marchingband.jpg') }}");
            }

            70% {
                background-image: url("{{ asset('../../img/landingpage/marchingband.jpg') }}");
            }

            75% {
                background-image: url("{{ asset('../../img/landingpage/lab.jpg') }}");
            }

            95% {
                background-image: url("{{ asset('../../img/landingpage/marchingband.jpg') }}");
            }
        }
    </style>
@endsection
@section('content')
    <div class="pt-40 pb-16 bg-slate-100 px-20 ">

        <div class="container">
            <div class="w-full">
                <div class="max-w-xl mx-auto text-center mb-16">
                    <h4 class="font-semibold text-lg text-primary mb-2">Kategori</h4>
                    <h2 class="font-bold text-black text-3xl mb-8 sm:text-2xl lg:text-xl"> <a href="/"
                            class="hover:text-primary" title="Kembali ke halaman awal">Home </a>> Kategori >
                        {{ $title }}</h2>
                </div>

                <div class="pt-10 pb-20  relative md:max-auto">
                    <form action="/asrama" class="w-56 absolute right-4">
                        <label for="default-search"
                            class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white ">Search</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                            </div>
                            <input type="text" id="default-search" name="search" value="{{ request('search') }}"
                                class="block w-full p-4 ps-10 text-sm text-gray-900 border border-plaster rounded-lg focus:ring-primary focus:border-plaster dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500"
                                placeholder="Cari ..." />
                            <button type="submit"
                                class="text-white absolute end-2.5 bottom-2.5 bg-primary hover:bg-plaster focus:ring-4 focus:outline-none focus:ring-plaster font-medium rounded-lg text-sm px-4 py-2 dark:bg-plaster dark:hover:bg-primary dark:focus:ring-gray-800">Cari</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="flex flex-row flex-wrap">
                @forelse ($tipeAsrama as $item)
                    <div class="w-full px-4 lg:w-1/2 xl:w-1/3 mb-5">
                        <div class="bg-white  rounded-xl shadow-lg overflow-hidden ">
                            <div class="py-8 px-6">
                                <div id="default-carousel" class="relative w-full" data-carousel="slide">
                                    <!-- Carousel wrapper -->
                                    <!-- <div class="relative h-56 overflow-hidden rounded-lg md:h-96"> -->
                                    <div class="relative h-56 overflow-hidden rounded-md ">
                                        <!-- Item 1 -->
                                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                            <img src="{{ Storage::url($item->ta_foto) }}"
                                                class="absolute block  w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 shadow-lg rounded-md"
                                                alt="gambar 1">
                                        </div>
                                    </div>
                                </div>
                                <h3>
                                    <a href=""
                                        class="block mb-3 mt-3 font-semibold text-xl text-black hover:text-primary truncate">{{ $item->ta_nama }}</a>
                                </h3>
                                <div class="flex mb-2">
                                    <svg class="w-6 h-6 text-primary" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd"
                                            d="M9 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4H7Zm8-1a1 1 0 0 1 1-1h1v-1a1 1 0 1 1 2 0v1h1a1 1 0 1 1 0 2h-1v1a1 1 0 1 1-2 0v-1h-1a1 1 0 0 1-1-1Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <p class="text-sm font-semibold ml-1">
                                        {{ $item->ta_kapasitas }}</p>
                                    <sup class="text-xs text-gray-500"> Orang / kamar </sup>
                                </div>
                                <!-- <div class="flex mb-2">
                                                                                                                                                                                <img src="{{ 'img/penginapan/bensin.png' }}" alt="bbm" class="w-5 h-5">
                                                                                                                                                                                <p class="text-sm font-semibold ml-2">Bensin</p>
                                                                                                                                                                                <sup class="text-xs text-gray-500"> Fuel </sup>
                                                                                                                                                                            </div> -->
                                <p class="text-xs text-gray-500 mb-1  flex justify-between">*check out 12.00 a.m <span
                                        class=" text-black font-bold text-base">Rp
                                        {{ number_format($item->ta_tarif, 0, ',', '.') }}</span></p>
                                <p class=" text-sm text-gray-500 mb-1 float-right "> Satuan sewa orang/kamar</p>
                                <a href="{{ route('asrama.detail', $item->ta_slug) }}"
                                    class="block text-center text-white mt-7 h-8 w-full bg-primary rounded-lg hover:opacity-50"
                                    {{ $item->asramas_count != 0 ? $item->asramas_count : 'disabled' }}>Sewa</a>
                            </div>
                        </div>
                    </div>
                @empty
            </div>
            <p class="font-bold uppercase pb-20">cari dengan kata kunci lain </p>
            @endforelse
            {{ $tipeAsrama->links() }}
        </div>
    @endsection
