@extends('layouts-home.master')
@section('scriptlink')
    <style>
        .bgImage {
            background-image: url("{{ asset('img/landingPageBackground.png') }}");
        }
    </style>
@endsection
@section('content')
    <!-- Hero Section Start -->
    <section id="home" class="pt-20 pb-64 h-2/5 relative  ">
        <div class="bgImage absolute inset-0   h-full  bg-cover  bg-no-repeat bg-white opacity-50 bg-center">
            <div class="overlay "></div>
        </div>
        <div class="container relative z-10 pb-56 flex flex-wrap mt-32">
            <div class="w-full text-center px-4 ">
                <h1 class="block font-bold  xl:text-[5rem] lg:text-4xl pt-10 pb-2 text-white">SEWA ASET </h1>
                <h2 class="font-semibold md:text-xl lg:text-2xl mt-6 leading relaxed mb-8 text-white">Mudah, Aman ,
                    Terjangkau !</h2>
                <div id="buttondropdown" class="mx-auto flex justify-center">
                    <div id="dropdownKategori" class="relative">
                        <div
                            class="border-solid text-sm border-gray-400 border-[1px] px-5 py-2 rounded cursor-pointer  flex justify-between bg-white shadow-sm ">
                            <a href="#kat">Booking dari sekarang !</a>
                        </div>
                    </div>
                    <div id="dropdownJadwal" class="relative">
                        <div onclick="toggleDropdown2()"
                            class="border-solid w-28 text-sm border-gray-400 border-[1px] px-5 py-2 rounded cursor-pointer  flex  bg-white shadow-sm items-center"
                            title="Lihat jadwal">
                            Jadwal
                            <svg class=" pl-2 w-5 " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                            </svg>
                        </div>
                        <div id="dropdownKal"
                            class="rounded border-[2px] border-white bg-white p-2 absolute top-[50px] w-[180px]  shadow-md hidden">
                            <div class="cursor-pointer hover:bg-gray-300 p-1 rounded text-sm text-left">
                                <a href="/transportasi/kalender">
                                    <p>Kalender Transportasi</p>
                                </a>
                            </div>
                            <div class="cursor-pointer hover:bg-gray-300 p-1 rounded text-sm text-left">
                                <a href="/gedung/kalender" class="text-left">Kalender Gedung</a>
                            </div>
                            <div class="cursor-pointer hover:bg-gray-300 p-1 rounded text-sm text-left">
                                <a href="/layanan/kalender">Kalender Layanan</a>
                            </div>
                            <div class="cursor-pointer hover:bg-gray-300 p-1 rounded text-sm text-left">
                                <a href="/asrama/kalender">Kalender Asrama</a>
                            </div>
                            <div class="cursor-pointer hover:bg-gray-300 p-1 rounded text-sm text-left">
                                <a href="/alatbarang/kalender">Kalender Alat Barang</a>
                            </div>
                        </div>
                        <script>
                            function toggleDropdown2() {
                                let dropdownKal = document.querySelector('#dropdownJadwal #dropdownKal');
                                dropdownKal.classList.toggle("hidden");
                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->
    <div id="kat" class=" relative bg-white rounded-lg flex  flex-wrap xl:w-3/5 mx-auto xl:shadow-lg  -mt-20">
        <div
            class="xl:w-1/5 md:w-1/3 w-1/2 shadow-lg xl:shadow-none  h-40 hover:bg-gray-300 rounded-lg p-4 cursor-pointer flex justify-center items-center ">
            <a href="{{ route('transportasi.index') }}">Transportasi
                <img class="mt-6 hover:filter hover:invert h-16 w-16  mx-auto"
                    src="{{ asset('img\kategori\transportasi.png') }}" alt="transportasi">
            </a>
        </div>
        <div
            class="xl:w-1/5  md:w-1/3 w-1/2 shadow-lg xl:shadow-none h-40 hover:bg-gray-300 rounded-lg p-4 cursor-pointer  flex justify-center items-center">
            <a href="{{ route('gedung.index') }}">Gedung
                <img src="{{ asset('img/kategori/gedung.png') }}" alt=""
                    class="mt-6 hover:filter hover:invert h-16 w-16  mx-auto">
            </a>
        </div>
        <div
            class="xl:w-1/5 w-1/2  md:w-1/3 shadow-lg xl:shadow-none h-40 hover:bg-gray-300 rounded-lg p-4 cursor-pointer flex justify-center items-center">
            <a href="{{ route('layanan.index') }}">Layanan
                <img src="{{ 'img/kategori/layanan.png' }}" alt=""
                    class=" mt-6 hover:filter hover:invert h-16 w-16  mx-auto">
            </a>
        </div>
        <div
            class="xl:w-1/5 w-1/2  md:w-1/3  shadow-lg xl:shadow-none h-40   hover:bg-gray-300 rounded-lg p-4 cursor-pointer flex justify-center items-center">
            <a href="{{ route('asrama.index') }}"><span class="mb-8">Asrama</span>
                <img src="{{ asset('img/kategori/hotel.png') }}" alt=""
                    class=" mt-6 hover:filter hover:invert h-16 w-16 mx-auto">
            </a>
        </div>
        <div
            class="xl:w-1/5 w-1/2  md:w-1/3 shadow-lg xl:shadow-none  h-40 hover:bg-gray-300 rounded-lg p-4 cursor-pointer sm:mx-auto mx-auto xs:mx-auto flex justify-center items-center">
            <a href="{{ route('alat-barang.index') }}">Alat Barang
                <img src="{{ asset('img/kategori/asset.png') }}" alt=""
                    class=" mt-6 hover:filter hover:invert h-22 w-20 mx-auto">
            </a>
        </div>
    </div>
    <!-- kategori section -->
    <section id="kategori" class="pt-36 pb-36 bg-white ">
        <div class="container  ">
            <div class="w-full ">
                <div class="max-w-xl mx-auto text-center mb-16">
                    <h4 class="font-semibold text-lg text-primary mb-2">Kategori</h4>
                    <h2 class="font-bold text-black text-3xl mb-4 sm:text-2xl lg:text-xl">Home > Kategori</h2>
                </div>
            </div>
            <div class="container w-full xl:w-10/12">
                <div class="flex flex-wrap justify-center items-center mx-auto xl:space-x-2 space-y-2 ">
                    <div class="xl:w-1/6 bg-white border-2 border-gray-100 shadow-md h-80 p-2 items-center text-center">
                        <img class="mt-6 hover:filter hover:invert h-16 w-16  mx-auto"
                            src="{{ asset('img\kategori\transportasi.png') }}" alt="transportasi">
                        <h5 class="my-2 text-2xl font-semibold tracking-tight text-gray-900 ">Transportasi</h5>
                        <p class="mb-3 font-normal text-gray-500 ">Aset pada kategori transportasi kami memiliki sebanyak 8
                            buah transportasi.</p>
                        <a href="/transportasi" class="inline-flex font-medium items-center text-primary hover:underline">
                            Sewa sekarang
                            <svg class="w-3 h-3 ms-2.5 rtl:rotate-[270deg]" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.889l7.778-7.778" />
                            </svg>
                        </a>
                    </div>
                    <div class="xl:w-1/6 bg-white border-2 border-gray-100 shadow-md h-80 p-2 items-center text-center">
                        <img src="{{ asset('img/kategori/gedung.png') }}" alt=""
                            class="mt-6 hover:filter hover:invert h-16 w-16  mx-auto">
                        <h5 class="my-2 text-2xl font-semibold tracking-tight text-gray-900 ">Gedung</h5>
                        </a>
                        <p class="mb-3 font-normal text-gray-500 ">Aset pada kategori transportasi kami memiliki sebanyak 8
                            buah transportasi.</p>
                        <a href="/gedung" class="inline-flex font-medium items-center text-primary hover:underline">
                            Sewa sekarang
                            <svg class="w-3 h-3 ms-2.5 rtl:rotate-[270deg]" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.889l7.778-7.778" />
                            </svg>
                        </a>
                    </div>
                    <div class="xl:w-1/6 bg-white border-2 border-gray-100 shadow-md h-80 p-2 items-center text-center">
                        <img src="{{ 'img/kategori/layanan.png' }}" alt=""
                            class=" mt-6 hover:filter hover:invert h-16 w-16  mx-auto">
                        <h5 class="my-2 text-2xl font-semibold tracking-tight text-gray-900 ">Layanan</h5>
                        </a>
                        <p class="mb-3 font-normal text-gray-500 ">Aset pada kategori transportasi kami memiliki sebanyak 8
                            buah transportasi.</p>
                        <a href="/layanan" class="inline-flex font-medium items-center text-primary hover:underline">
                            Sewa sekarang
                            <svg class="w-3 h-3 ms-2.5 rtl:rotate-[270deg]" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.889l7.778-7.778" />
                            </svg>
                        </a>
                    </div>
                    <div class="xl:w-1/6 bg-white border-2 border-gray-100 shadow-md h-80 p-2 items-center text-center">
                        <img src="{{ asset('img/kategori/hotel.png') }}" alt=""
                            class=" mt-6 hover:filter hover:invert h-16 w-16 mx-auto">
                        <h5 class="my-2 text-2xl font-semibold tracking-tight text-gray-900 ">Asrama</h5>
                        </a>
                        <p class="mb-3 font-normal text-gray-500 ">Aset pada kategori transportasi kami memiliki sebanyak 8
                            buah transportasi.</p>
                        <a href="/asrama" class="inline-flex font-medium items-center text-primary hover:underline">
                            Sewa sekarang
                            <svg class="w-3 h-3 ms-2.5 rtl:rotate-[270deg]" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.889l7.778-7.778" />
                            </svg>
                        </a>
                    </div>
                    <div class="xl:w-1/6 bg-white border-2 border-gray-100 shadow-md h-80 p-2 items-center text-center">
                        <img src="{{ asset('img/kategori/asset.png') }}" alt=""
                            class=" mt-6 hover:filter hover:invert h-16 w-16 mx-auto">
                        <h5 class="my-2 text-2xl font-semibold tracking-tight text-gray-900 ">Alat Barang</h5>
                        </a>
                        <p class="mb-3 font-normal text-gray-500 ">Aset pada kategori transportasi kami memiliki sebanyak 8
                            buah transportasi.</p>
                        <a href="/alatbarang" class="inline-flex font-medium items-center text-primary hover:underline">
                            Sewa sekarang
                            <svg class="w-3 h-3 ms-2.5 rtl:rotate-[270deg]" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.889l7.778-7.778" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- kategori section End -->
    <!-- Promo Section start -->

    <livewire:promo-landing-page />

    <!-- Promo Section End -->

    <!-- Section Syarat dan Ketentuan Start -->
    <section id="syarat" class="pt-36 pb-28 bg-white">
        <div class="container">
            <div cl ass="w-full px-4">
                <div class="mx-auto text-center mb-12 ">
                    <h4 class="font-semibold text-black text-3xl mb-2">PERTANYAAN UMUM SEWA ASET</h4>
                </div>
            </div>
            <div class="w-full px-12  xl:w-10/12  mx-auto">

                <div id="accordion-color" data-accordion="collapse"
                    data-active-classes="bg-blue-100 dark:bg-gray-800 text-blue-600 dark:text-white">
                    <div class="pb-4 pt-4">
                        <h2 id="accordion-color-heading-1">
                            <button type="button"
                                class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-grecianblue focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-800 dark:border-gray-700 dark:text-gray-400 hover:bg-blue-100 dark:hover:bg-gray-800 gap-3"
                                data-accordion-target="#accordion-color-body-1" aria-expanded="true"
                                aria-controls="accordion-color-body-1">
                                <span class="flex gap-2 ">
                                    <img class="max-w-none max-h-none " width="23" height="23"
                                        src="https://img.icons8.com/ios/50/help--v2.png" alt="help--v2" />
                                    Tarif dan Biaya
                                </span>
                                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M9 5 5 1 1 5" />
                                </svg>
                            </button>
                        </h2>
                        <div id="accordion-color-body-1" class="hidden" aria-labelledby="accordion-color-heading-1">
                            <div class="p-5 border border-t-0 border-grecianblue  dark:bg-gray-900">
                                <p class="mb-2 text-gray-500 dark:text-gray-400">Pembayaran tarif persewaaan sesuai dengan
                                    website dan tidak ada biaya tambahan lainnya.</p>
                            </div>
                        </div>
                    </div>
                    <div class="pb-4 pt-4">
                        <h2 id="accordion-color-heading-5">
                            <button type="button"
                                class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-grecianblue  focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-800  dark:text-gray-400 hover:bg-blue-100 dark:hover:bg-gray-800 gap-3"
                                data-accordion-target="#accordion-color-body-2" aria-expanded="false"
                                aria-controls="accordion-color-body-2">
                                <div class="flex items-center gap-2">
                                    <img width="23" height="23" class="p-0"
                                        src="https://img.icons8.com/ios/50/help--v2.png" alt="help--v2" />
                                    <span>Bagaimana jika terdapat kerusakan atau keterlambatan pengembalian?</span>
                                </div>
                                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M9 5 5 1 1 5" />
                                </svg>
                            </button>
                        </h2>
                        <div id="accordion-color-body-2" class="hidden" aria-labelledby="accordion-color-heading-5">
                            <div class="p-5 border border-t-0 border-grecianblue ">
                                <p class="mb-2 text-gray-500 dark:text-gray-400">Denda maksimal 30%.</p>
                            </div>
                        </div>
                    </div>
                    <div class="pb-4 pt-4">
                        <h2 id="accordion-color-heading-2">
                            <button type="button"
                                class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-grecianblue  focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-800  dark:text-gray-400 hover:bg-blue-100 dark:hover:bg-gray-800 gap-3"
                                data-accordion-target="#accordion-color-body-2" aria-expanded="false"
                                aria-controls="accordion-color-body-2">
                                <div class="flex items-center gap-2">
                                    <img width="23" height="23" class="p-0"
                                        src="https://img.icons8.com/ios/50/help--v2.png" alt="help--v2" />
                                    <span>Bagaimana saya melakukan sewa transportasi dari lokasi yang berbeda?</span>
                                </div>
                                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M9 5 5 1 1 5" />
                                </svg>
                            </button>
                        </h2>
                        <div id="accordion-color-body-2" class="hidden" aria-labelledby="accordion-color-heading-2">
                            <div class="p-5 border border-t-0 border-grecianblue ">
                                <p class="mb-2 text-gray-500 dark:text-gray-400">Gratis penjemputan.</p>
                            </div>
                        </div>
                    </div>
                    <div class="pb-4 pt-4">
                        <h2 id="accordion-color-heading-3">
                            <button type="button"
                                class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-grecianblue focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-800  dark:text-gray-400 hover:bg-blue-100 dark:hover:bg-gray-800 gap-3"
                                data-accordion-target="#accordion-color-body-3" aria-expanded="false"
                                aria-controls="accordion-color-body-3">
                                <div class="flex items-center gap-2 ">
                                    <img width="23" height="23" src="https://img.icons8.com/ios/50/help--v2.png"
                                        alt="help--v2" />
                                    <span>Ketentuan Pembayaran </span>
                                </div>
                                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M9 5 5 1 1 5" />
                                </svg>
                            </button>
                        </h2>
                        <div id="accordion-color-body-3" class="hidden" aria-labelledby="accordion-color-heading-3">
                            <div class="p-5 border border-t-0 border-gray-200 ">
                                <p class="mb-2 text-gray-500 dark:text-gray-400">Tarif yang telah telah dibayarkan, tidak
                                    dapat dikembalikan.</p>
                                <ul class="ps-5 text-gray-500 list-disc dark:text-gray-400">
                                    <li><a href="https://flowbite.com/pro/"
                                            class="text-blue-600 dark:text-blue-500 hover:underline">Pembatalan dari
                                            penyewa</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Section Syarat dan Ketentuan End -->
    <section id="plus" class="pt-20 pb-28 bg-white">
        <div class="container">
            <div class=" w-full px-4">
                <div class="mx-auto text-right xl:mr-20 mb-20">
                    <h4 class="font-bold text-xl  uppercase text-primary ">Mengapa harus sewa di sewaaset poltkebang
                        surabaya?</h4>
                </div>
                <div class="flex flex-wrap px-6">
                    <div class="w-full  place-items-center h-full  md:w-1/2 lg:w-1/2 sm:justify-center ">
                        <!-- <div class=" bg-white w-96 h-48 rounded-xl "></div> -->
                        <div class="flex flex-row mx-auto xl:w-1/2">
                            <div class="flex-col">
                                <div class="bg-sea roundedlr space-y-2 ">
                                    <img src="{{ asset('img/tar.png') }}" alt="Foto Taruna Taruni"
                                        class="object-cover  ">
                                </div>
                                <div class="bg-primary roundedrl space-x-2 ">
                                    <img src="{{ asset('img/tar.png') }}" alt="Foto Taruna Taruni"
                                        class="object-cover    ">
                                </div>
                            </div>
                            <div class="flex-col ">
                                <div class="bg-primary roundedrl space-y-2 ">
                                    <img src="{{ asset('img/tar.png') }}" alt="Foto Taruna Taruni"
                                        class="object-cover ">
                                </div>
                                <div class="bg-sea roundedlr ">
                                    <img src="{{ asset('img/tar.png') }}" alt="Foto Taruna Taruni"
                                        class="object-cover  ">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full px-4 mb-10 md:w-1/2 lg:w-1/2">
                        <div class="flex items-center pb-4 pt-2">
                            <img src="{{ asset('img/kategori/layanan.png') }}" alt="Waktu" class="h-10 w-10">
                            <div class="ml-3">
                                <p class=" font-bold  ">Semua keperluan dalam acara bisa sewa satu tempat</p>
                                <p class="text-justify ">Dengan melakukan pemesanan gedung maka anda tidak usah bingung
                                    untuk menyewa tempat penyewaan kursi, kamera , dll.</p>
                            </div>
                        </div>
                        <div class="flex items-center pb-4 pt-2">
                            <img src="{{ asset('img/landingpage/payment.png') }}" alt="Waktu" class="h-10 w-10">
                            <div class="ml-3">
                                <p class=" font-bold  ">Cara bayar mudah dengan berbagai metode pembayaran </p>
                                <p class="text-justify ">Dengan melakukan pemesanan gedung maka anda tidak usah bingung
                                    untuk menyewa tempat penyewaan kursi, kamera , dll.</p>
                            </div>
                        </div>
                        <div class="flex items-center pb-4 pt-2">
                            <img src="{{ asset('img/landingpage/pemesanan.png') }}" alt="Waktu" class="h-10 w-10">
                            <div class="ml-3">
                                <p class=" font-bold  ">Pemesanan bisa dibicarakan secara langsung </p>
                                <p class="text-justify ">Dengan melakukan pemesanan gedung maka anda tidak usah bingung
                                    untuk menyewa tempat penyewaan kursi, kamera , dll.</p>
                            </div>
                        </div>
                        <div class="flex items-center pb-4 pt-2">
                            <img src="{{ asset('img/landingpage/pelayanan.png') }}" alt="Waktu" class="h-10 w-10">
                            <div class="ml-3">
                                <p class=" font-bold  ">Pelayanan yang unggul</p>
                                <p class="text-justify ">Dengan melakukan pemesanan gedung maka anda tidak usah bingung
                                    untuk menyewa tempat penyewaan kursi, kamera , dll.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- back to top -->
    <div class=" ">
        <a href="#home" class="">
            <i class=" btnbtt btn-active fixed bottom-6 right-6 text-5xl cursor pointer text-primary hover:bg-gray-100 z-20 hidden bg-softblue rounded-full w-12 h-12 "
                title="Kembali ke atas">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-7 h-7 mt-2 ml-2">
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
                class="mx-auto mt-1 ">
                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="60" height="60"
                    viewBox="0 0 48 48">
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

@section('script')
    <script src="{{ asset('js/feature/transition-nav.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
@endsection
