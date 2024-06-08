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
    <!-- Hero Section Start -->
    <section id="home" class="pt-20 pb-48 h-2/5 relative  ">
        <div class="bgImage absolute inset-0   h-full  bg-cover  bg-no-repeat bg-white opacity-50 bg-center">
        </div>
    </section>
    <!-- Hero Section End -->
    <x-navigasi-kategori />

    <section id="kategori" class="pt-16 pb-16 bg-white ">
        <div class="container">
            <div class="w-full">
                <div class="max-w-xl mx-auto text-center mb-16">
                    <h4 class="font-semibold text-lg text-primary mb-2">Kategori</h4>
                    <h2 class="font-bold text-black text-3xl mb-8 sm:text-2xl lg:text-xl"> <a href="/"
                            class="hover:text-primary" title="Kembali ke halaman awal">Home </a>> Kategori >
                        {{ $title }}</h2>
                </div>

                <div class="pt-10 pb-20 relative md:max-auto">
                    <form action="/transportasi" class="w-56 absolute right-4">
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
            <div class="flex flex-wrap">
                @foreach ($transportasi as $item)
                    <div class="w-full px-4 lg:w-1/2 md:w-1/3 sm:w-1/2 xl:w-1/3 mb-3">
                        <div class="bg-white  rounded-xl shadow-lg overflow-hidden ">
                            <div class="py-8 px-6">
                                <div id="default-carousel" class="relative w-full" data-carousel="slide">
                                    <!-- Carousel wrapper -->
                                    <!-- <div class="relative h-56 overflow-hidden rounded-lg md:h-96"> -->
                                    <div class="relative h-56 overflow-hidden rounded-md ">
                                        <!-- Item 1 -->
                                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                            <img src="{{ Storage::url($item->mk_foto) }}"
                                                class="absolute block  w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 shadow-lg rounded-md"
                                                alt="...">
                                        </div>
                                    </div>
                                    <h3>
                                        <a href="{{ route('transportasi.detail', $item->mk_slug) }}"
                                            class="block mb-3 mt-3 font-semibold text-xl text-black hover:text-primary truncate">{{ $item->mk_merk }}
                                        </a>
                                    </h3>
                                    <div class="flex mb-2">
                                        <svg class="w-6 h-6 text-primary" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd"
                                                d="M9 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4H7Zm8-1a1 1 0 0 1 1-1h1v-1a1 1 0 1 1 2 0v1h1a1 1 0 1 1 0 2h-1v1a1 1 0 1 1-2 0v-1h-1a1 1 0 0 1-1-1Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <p class="text-sm font-semibold ml-1">{{ $item->kendaraans_count }}</p>
                                        <p class="text-xs text-gray-500 ml-1">Kapasitas</sup>
                                    </div>
                                </div>
                                <p class=" text-sm text-gray-500 mb-1 float-right"> unit / Hari</p>
                                <a href="{{ route('transportasi.detail', $item->mk_slug) }}"
                                    class="flex items-center justify-center h-8 w-full bg-primary rounded-lg hover:opacity-50 text-sm text-white">Sewa</a>

                            </div>
                        </div>

                    </div>
                @endforeach

            </div>
        </div>
        <!-- <p class="font-bold uppercase pb-20">cari dengan kata kunci lain </p> -->

        </div>

    </section>
    <!-- back to top -->
    <div class=" ">
        <a href="#home" class="">
            <i class=" btnbtt btn-active fixed bottom-6 right-6 text-5xl cursor pointer text-primary hover:bg-gray-100 z-20 hidden bg-softblue rounded-full w-12 h-12 "
                title="Kembali ke atas">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-7 h-7 mt-2 ml-2.5 ">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 18.75 7.5-7.5 7.5 7.5" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 7.5-7.5 7.5 7.5" />
                </svg>
            </i>
        </a>
    </div>
    <!-- end back to top -->
    <!-- call -->
    <div class="relative">
        <div class=" cursor-pointer w-12 h-12  rounded-full   flex fixed  right-20 bottom-8 bocursor-pointer hover:w-30 hover:h-10 hover:Hubungi Kami !"
            title="Chat sekarang ! ">
            <a aria-label="Chat on WhatsApp"
                href="https://wa.me/6282332829821/?text=Halo, Admin Saya Ingin bertanya terkait sewa aset poltekbang surabaya"
                class="mx-auto  ">
                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="60" height="60" viewBox="0 0 48 48">
                    <path fill="#fff"
                        d="M4.868,43.303l2.694-9.835C5.9,30.59,5.026,27.324,5.027,23.979C5.032,13.514,13.548,5,24.014,5c5.079,0.002,9.845,1.979,13.43,5.566c3.584,3.588,5.558,8.356,5.556,13.428c-0.004,10.465-8.522,18.98-18.986,18.98c-0.001,0,0,0,0,0h-0.008c-3.177-0.001-6.3-0.798-9.073-2.311L4.868,43.303z">
                    </path>
                    <path fill="#fff"
                        d="M4.868,43.803c-0.132,0-0.26-0.052-0.355-0.148c-0.125-0.127-0.174-0.312-0.127-0.483l2.639-9.636c-1.636-2.906-2.499-6.206-2.497-9.556C4.532,13.238,13.273,4.5,24.014,4.5c5.21,0.002,10.105,2.031,13.784,5.713c3.679,3.683,5.704,8.577,5.702,13.781c-0.004,10.741-8.746,19.48-19.486,19.48c-3.189-0.001-6.344-0.788-9.144-2.277l-9.875,2.589C4.953,43.798,4.911,43.803,4.868,43.803z">
                    </path>
                    <path fill="#cfd8dc"
                        d="M24.014,5c5.079,0.002,9.845,1.979,13.43,5.566c3.584,3.588,5.558,8.356,5.556,13.428c-0.004,10.465-8.522,18.98-18.986,18.98h-0.008c-3.177-0.001-6.3-0.798-9.073-2.311L4.868,43.303l2.694-9.835C5.9,30.59,5.026,27.324,5.027,23.979C5.032,13.514,13.548,5,24.014,5 M24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974 M24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974 M24.014,4C24.014,4,24.014,4,24.014,4C12.998,4,4.032,12.962,4.027,23.979c-0.001,3.367,0.849,6.685,2.461,9.622l-2.585,9.439c-0.094,0.345,0.002,0.713,0.254,0.967c0.19,0.192,0.447,0.297,0.711,0.297c0.085,0,0.17-0.011,0.254-0.033l9.687-2.54c2.828,1.468,5.998,2.243,9.197,2.244c11.024,0,19.99-8.963,19.995-19.98c0.002-5.339-2.075-10.359-5.848-14.135C34.378,6.083,29.357,4.002,24.014,4L24.014,4z">
                    </path>
                    <path fill="#40c351"
                        d="M35.176,12.832c-2.98-2.982-6.941-4.625-11.157-4.626c-8.704,0-15.783,7.076-15.787,15.774c-0.001,2.981,0.833,5.883,2.413,8.396l0.376,0.597l-1.595,5.821l5.973-1.566l0.577,0.342c2.422,1.438,5.2,2.198,8.032,2.199h0.006c8.698,0,15.777-7.077,15.78-15.776C39.795,19.778,38.156,15.814,35.176,12.832z">
                    </path>
                    <path fill="#fff" fill-rule="evenodd"
                        d="M19.268,16.045c-0.355-0.79-0.729-0.806-1.068-0.82c-0.277-0.012-0.593-0.011-0.909-0.011c-0.316,0-0.83,0.119-1.265,0.594c-0.435,0.475-1.661,1.622-1.661,3.956c0,2.334,1.7,4.59,1.937,4.906c0.237,0.316,3.282,5.259,8.104,7.161c4.007,1.58,4.823,1.266,5.693,1.187c0.87-0.079,2.807-1.147,3.202-2.255c0.395-1.108,0.395-2.057,0.277-2.255c-0.119-0.198-0.435-0.316-0.909-0.554s-2.807-1.385-3.242-1.543c-0.435-0.158-0.751-0.237-1.068,0.238c-0.316,0.474-1.225,1.543-1.502,1.859c-0.277,0.317-0.554,0.357-1.028,0.119c-0.474-0.238-2.002-0.738-3.815-2.354c-1.41-1.257-2.362-2.81-2.639-3.285c-0.277-0.474-0.03-0.731,0.208-0.968c0.213-0.213,0.474-0.554,0.712-0.831c0.237-0.277,0.316-0.475,0.474-0.791c0.158-0.317,0.079-0.594-0.04-0.831C20.612,19.329,19.69,16.983,19.268,16.045z"
                        clip-rule="evenodd"></path>
                </svg>
            </a>
        </div>
    </div>
    <!-- end call -->
@endsection
