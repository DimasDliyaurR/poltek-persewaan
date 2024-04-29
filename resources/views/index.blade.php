@extends('layouts-home.navbar.nav-old')
@section('content')
    <!-- Hero Section Start -->
    <section id="home" class="pt-36 pb-56 h-screen relative  ">
        <div class="absolute inset-0 bg-white opacity-10">
            <div class=" h-full  bg-cover " style="background-image: url('{{ asset('img/lab.jpg') }}');">
            </div>
        </div>
        <div class="container relative z-10">
            <div class="flex flex-wrap">
                <div class="w-full self-end px-4  ">
                    <div class="relative mt-10  pb-3 lg:mt-9 lg:right-0">
                        <img src="{{ asset('img/LogoPoltekbang.png') }}" alt="Logo Poltekbang"
                            class="max-w-full mx-auto w-80 h-65" />
                    </div>
                </div>
                <div class="w-full text-center px-4 ">
                    <h1 class="block font-bold text-slate-900 text-4xl lg:text-5xl pb-2">SEWA ASET </h1>
                    <h2 class="font-semibold md:text-xl lg:text-2xl mt-6 leading relaxed mb-8 ">Mudah, Aman , Terjangkau !
                    </h2>
                </div>
                <div id="buttondropdown" class="mx-auto flex">
                    <div id="dropdownKategori" class="relative">
                        <div onclick="toggleDropdown()"
                            class="border-solid text-sm border-gray-400 border-[1px] px-5 py-2 rounded cursor-pointer  flex justify-between bg-white shadow-sm ">
                            Plan mulai dari sekarang ! | Kategori Kegiatan
                            <svg class="w-5 " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                            </svg>
                        </div>
                        <div id="dropdown"
                            class="rounded border-[2px] border-white bg-white p-2 absolute top-[50px] w-[185px] right-6 shadow-md hidden">
                            <div class="cursor-pointer hover:bg-gray-300 p-2"><a href="/kendaraan">Kendaraan</a></div>
                            <div class="cursor-pointer hover:bg-gray-30 p-2"><a href="/gedung">Gedung</a></div>
                            <div class="cursor-pointer hover:bg-gray-300 p-2"><a href="/penginapan">Penginapan</a></div>
                            <div class="cursor-pointer hover:bg-gray-300 p-2"><a href="/layanan">Layanan</a></div>
                            <div class="cursor-pointer hover:bg-gray-300 p-2"><a href="/aset">Asset</a></div>
                        </div>
                        <script>
                            function toggleDropdown() {
                                let dropdown = document.querySelector("#dropdownKategori #dropdown");
                                dropdown.classList.toggle("hidden");
                            }
                        </script>
                    </div>
                    <div id="dropdownJadwal" class="relative">
                        <div onclick="toggleDropdown2()"
                            class="border-solid w-28 text-sm border-gray-400 border-[1px] px-5 py-2 rounded cursor-pointer  flex  bg-white shadow-sm items-center">
                            <a href="/kalender">Jadwal</a>
                            <!-- <svg class="w-5 " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                                    </svg> -->
                        </div>
                        <div id="dropdownKal"
                            class="rounded border-[2px] border-white bg-white p-2 absolute top-[50px] w-[185px]  shadow-md hidden">
                            <div class="cursor-pointer hover:bg-gray-300 p-2 rounded-lg">
                                <div class="flex bg-white rounded-md shadow-lg">
                                </div>
                            </div>
                        </div>
                        <script>
                            function toggleDropdown2() {
                                let dropdownKal = document.querySelector('#dropdownJadwal #dropdownKal');
                                dropdownKal.classList.toggle("hidden");
                            }
                        </script>
                    </div>
                    <!-- <div class="relative">
                                                  <div class="border-solid w-28 text-sm border-gray-400 border-[1px] px-5 py-2 rounded cursor-pointer  flex  bg-white shadow-sm " >
                                                  <form action="">
                                                  Search
                                                  </form>
                                                  
                                                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                                                  </svg>
                                                  </div>
                                                </div> -->
                </div>
            </div>
        </div>

        <div
            class=" container relative mb-40 mt-40 w-3/4 h-40 bg-white mx-auto rounded-lg shadow-lg text-center justify-center overflow-hidden md:max-w-2xl ">
            <div class="flex z-10">
                <div class="w-1/5 h-40 hover:bg-primary hover:text-white rounded-lg p-4 cursor-pointer">
                    <a href="/transportasi" class=" m-auto ">Transportasi
                        <div class="">
                            <img src="{{ asset('img/kategori/transportasi.png') }}" alt=""
                                class="hover:text-white hover:opacity-25 mt-6 h-16 w-16 mx-auto">

                        </div>
                    </a>
                </div>
                <div class="w-1/5 h-40 hover:bg-primary hover:text-white rounded-lg p-4">
                    <a href="/gedung">Gedung
                        <img src="{{ asset('img/kategori/gedung.png') }}" alt=""
                            class="mt-6 hover:filter hover:invert h-16 w-16  mx-auto">
                    </a>
                </div>
                <div class="w-1/5 h-40 hover:bg-primary hover:text-white rounded-lg p-4">
                    <a href="/layanan">Layanan
                        <img src="{{ 'img/kategori/layanan.png' }}" alt=""
                            class=" mt-6 hover:filter hover:invert h-16 w-16 mx-auto">
                    </a>
                </div>
                <div class="w-1/5 h-40 hover:bg-primary hover:text-white rounded-lg p-4">
                    <a href="/asrama"><span class="mb-8">Penginapan</span>
                        <img src="{{ asset('img/kategori/hotel.png') }}" alt=""
                            class=" mt-6 hover:filter hover:invert h-16 w-16 mx-auto">
                    </a>
                </div>
                <div class="w-1/5 h-40 hover:bg-primary hover:text-white rounded-lg p-4">
                    <a href="/aset">Asset</a>
                    <img src="{{ asset('img/kategori/asset.png') }}" alt=""
                        class=" mt-2 hover:filter hover:invert h-24 w-24 mx-auto">
                </div>
            </div>
        </div>

    </section>

    <!-- Hero Section End -->

    <!-- kategori section -->
    <section id="kategori" class="pt-56 pb-16 bg-slate-100 px-20 ">
        <div class="container  ">
            <div class="w-full ">
                <div class="max-w-xl mx-auto text-center mb-16">
                    <h4 class="font-semibold text-lg text-primary mb-2">Kategori</h4>
                    <h2 class="font-bold text-black text-3xl mb-4 sm:text-2xl lg:text-xl">Home > Kategori</h2>
                </div>
            </div>
            <div class="flex flex-wrap">
                <div class="w-full px-4 lg:w-1/2 xl:w-1/3 mb-3">
                    <div class="bg-white  rounded-xl shadow-lg overflow-hidden ">
                        <div class="py-8 px-6">
                            <div id="default-carousel" class="relative w-full" data-carousel="slide">
                                <!-- Carousel wrapper -->
                                <!-- <div class="relative h-56 overflow-hidden rounded-lg md:h-96"> -->
                                <div class="relative h-56 overflow-hidden rounded-md ">
                                    <!-- Item 1 -->
                                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                        <img src="{{ asset('img/transportasi/bus.JPG') }}"
                                            class="absolute block  w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 shadow-lg rounded-md"
                                            alt="...">
                                    </div>
                                    <!-- Item 2 -->
                                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                        <img src="{{ asset('img/transportasi/bus_depan.JPG') }}"
                                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 shadow-lg rounded-md"
                                            alt="...">
                                    </div>
                                    <!-- Item 3 -->
                                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                        <img src="{{ asset('img/transportasi/bus_kiri.JPG') }}"
                                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 shadow-lg rounded-md"
                                            alt="...">
                                    </div>
                                    <!-- Item 4 -->
                                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                        <img src="{{ asset('img/transportasi/bus_kanan.JPG') }}"
                                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 shadow-lg rounded-md"
                                            alt="...">
                                    </div>
                                </div>
                                <!-- Slider indicators -->
                                <div
                                    class="absolute z-30 flex -translate-x-1/2  left-1/2 space-x-3 rtl:space-x-reverse -mt-7">
                                    <button type="button" class="w-2 h-2 rounded-full " aria-current="true"
                                        aria-label="Slide 1" data-carousel-slide-to="0"></button>
                                    <button type="button" class="w-2 h-2 rounded-full" aria-current="false"
                                        aria-label="Slide 2" data-carousel-slide-to="1"></button>
                                    <button type="button" class="w-2 h-2 rounded-full" aria-current="false"
                                        aria-label="Slide 3" data-carousel-slide-to="2"></button>
                                    <button type="button" class="w-2 h-2 rounded-full" aria-current="false"
                                        aria-label="Slide 4" data-carousel-slide-to="3"></button>

                                </div>
                                <!-- Slider controls -->
                                <button type="button"
                                    class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                                    data-carousel-prev>
                                    <span
                                        class="inline-flex items-center justify-center w-6 h-6 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                        <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 6 10">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M5 1 1 5l4 4" />
                                        </svg>
                                        <span class="sr-only">Previous</span>
                                    </span>
                                </button>
                                <button type="button"
                                    class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                                    data-carousel-next>
                                    <span
                                        class="inline-flex items-center justify-center w-6 h-6 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                        <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 6 10">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 9 4-4-4-4" />
                                        </svg>
                                        <span class="sr-only">Next</span>
                                    </span>
                                </button>
                            </div>
                            <h3>
                                <a href=" /detailbus"
                                    class="block mb-3 mt-3 font-semibold text-xl text-black hover:text-primary truncate">Exclusive
                                    Bus
                                </a>
                            </h3>
                            <div class="flex mb-2">
                                <svg class="w-6 h-6 text-primary" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M9 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4H7Zm8-1a1 1 0 0 1 1-1h1v-1a1 1 0 1 1 2 0v1h1a1 1 0 1 1 0 2h-1v1a1 1 0 1 1-2 0v-1h-1a1 1 0 0 1-1-1Z"
                                        clip-rule="evenodd" />
                                </svg>
                                <p class="text-sm font-semibold ml-1">45</p>
                                <sup class="text-xs text-gray-500"> Kapasitas </sup>
                            </div>
                            <div class="flex mb-2">
                                <img src="{{ asset('img/transportasi/bensin.png') }}" alt="bbm" class="w-5 h-5">
                                <p class="text-sm font-semibold ml-2">Bensin</p>
                                <sup class="text-xs text-gray-500"> Fuel </sup>
                            </div>
                            <p class="text-sm text-gray-500 mb-1  flex justify-between">status : Available <span
                                    class=" text-black font-bold text-base">Rp 2.500.000</span></p>
                            <p class=" text-sm text-gray-500 mb-1 float-right "> unit / Hari</p>
                            <button class=" h-8 w-full bg-primary rounded-lg hover:opacity-50"><a href="#"
                                    class=" text-sm   text-white    ">Sewa</a></button>
                        </div>
                    </div>
                </div>
                <div class="w-full px-4 lg:w-1/2 xl:w-1/3 mb-5">
                    <div class="bg-white  rounded-xl shadow-lg overflow-hidden ">
                        <div class="py-8 px-6">
                            <div id="default-carousel" class="relative w-full" data-carousel="slide">
                                <!-- Carousel wrapper -->
                                <!-- <div class="relative h-56 overflow-hidden rounded-lg md:h-96"> -->
                                <div class="relative h-56 overflow-hidden rounded-md ">
                                    <!-- Item 1 -->
                                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                        <img src="{{ asset('img/penginapan/bad_2.jpg') }}"
                                            class="absolute block  w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 shadow-lg rounded-md"
                                            alt="...">
                                    </div>
                                    <!-- Item 2 -->
                                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                        <img src="{{ asset('img/penginapan/lemari_2.jpg') }}"
                                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 shadow-lg rounded-md"
                                            alt="...">
                                    </div>
                                    <!-- Item 3 -->
                                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                        <img src="{{ asset('img/penginapan/toilet.jpg') }}"
                                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 shadow-lg rounded-md"
                                            alt="...">
                                    </div>
                                    <!-- Item 4 -->
                                    <!-- <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                                                                <img src="{{ 'img/penginapan/truk_kanan.JPG' }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 shadow-lg rounded-md" alt="...">
                                                                            </div> -->
                                </div>
                                <!-- Slider indicators -->
                                <div
                                    class="absolute z-30 flex -translate-x-1/2  left-1/2 space-x-3 rtl:space-x-reverse -mt-7">
                                    <button type="button" class="w-2 h-2 rounded-full " aria-current="true"
                                        aria-label="Slide 1" data-carousel-slide-to="0"></button>
                                    <button type="button" class="w-2 h-2 rounded-full" aria-current="false"
                                        aria-label="Slide 2" data-carousel-slide-to="1"></button>
                                    <button type="button" class="w-2 h-2 rounded-full" aria-current="false"
                                        aria-label="Slide 3" data-carousel-slide-to="2"></button>
                                    <!-- <button type="button" class="w-2 h-2 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button> -->

                                </div>
                                <!-- Slider controls -->
                                <button type="button"
                                    class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                                    data-carousel-prev>
                                    <span
                                        class="inline-flex items-center justify-center w-6 h-6 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                        <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 6 10">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M5 1 1 5l4 4" />
                                        </svg>
                                        <span class="sr-only">Previous</span>
                                    </span>
                                </button>
                                <button type="button"
                                    class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                                    data-carousel-next>
                                    <span
                                        class="inline-flex items-center justify-center w-6 h-6 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                        <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 6 10">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 9 4-4-4-4" />
                                        </svg>
                                        <span class="sr-only">Next</span>
                                    </span>
                                </button>
                            </div>
                            <h3>
                                <a href=" /detailbus"
                                    class="block mb-3 mt-3 font-semibold text-xl text-black hover:text-primary truncate">Sewa
                                    Asrama (Umum)</a>
                            </h3>
                            <div class="flex mb-2">
                                <svg class="w-6 h-6 text-primary" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M9 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4H7Zm8-1a1 1 0 0 1 1-1h1v-1a1 1 0 1 1 2 0v1h1a1 1 0 1 1 0 2h-1v1a1 1 0 1 1-2 0v-1h-1a1 1 0 0 1-1-1Z"
                                        clip-rule="evenodd" />
                                </svg>
                                <p class="text-sm font-semibold ml-1">2</p>
                                <sup class="text-xs text-gray-500"> Orang / kamar </sup>
                            </div>
                            <div class="flex mb-2">
                                <img src="{{ asset('img/transportasi/bensin.png') }}" alt="bbm" class="w-5 h-5">
                                <p class="text-sm font-semibold ml-2">Wifi </p>
                                <sup class="text-xs text-gray-500"> Free </sup>
                            </div>
                            <p class="text-xs text-gray-500 mb-1  flex justify-between">*pembayaran tanpa DP <span
                                    class=" text-black font-bold text-base">Rp 125.000</span></p>
                            <p class=" text-sm text-gray-500 mb-1 float-right "> orang / Hari</p>
                            <button class=" h-8 w-full bg-primary rounded-lg hover:opacity-50"><a href="#"
                                    class=" text-sm   text-white    ">Sewa</a></button>
                        </div>
                    </div>
                </div>
                <div class="w-full px-4 lg:w-1/2 xl:w-1/3 mb-2">
                    <div class="bg-white  rounded-xl shadow-lg overflow-hidden ">
                        <div class="py-8 px-6">
                            <img src="{{ asset('img/layanan/marching band.jpg') }}" alt=""
                                class="shadow-lg rounded-md">
                            <h3>
                                <a href=" /detailbus"
                                    class="block mb-3 mt-3 font-semibold text-xl text-black hover:text-primary truncate">Bus</a>
                            </h3>
                            <p>Kapasitas</p>
                            <p class="font-medium text-sm text-gray-500 mb-1">Harga termasuk Driver</p>
                            <p><span class="icon-[material-symbols--person-add-rounded]" style="color: #FF7417;"></span>
                                <iconify-icon icon="material-symbols:person-add-rounded"
                                    style="color: #FF7417"></iconify-icon>
                            </p>
                            <p class="font-medium text-sm text-black mb-1  flex justify-between">Status : Available <span
                                    class="font-bold">Rp 500.000</span></p>
                            <p class=" text-sm text-gray-500 mb-1 float-right "> unit / Hari</p>
                            <button class=" h-8 w-full bg-primary rounded-lg hover:opacity-50"><a href="#"
                                    class=" text-sm   text-white    ">Sewa</a></button>
                        </div>
                    </div>
                </div>
                <div class="w-full px-4 lg:w-1/2 xl:w-1/3 mb-2">
                    <div class="bg-white  rounded-xl shadow-lg overflow-hidden ">
                        <div class="py-8 px-6">
                            <img class="shadow-lg rounded-md" src="{{ asset('img/transportasi/bus.JPG') }}"
                                alt="">
                            <h3>
                                <a href=" /detailbus"
                                    class="block mb-3 mt-3 font-semibold text-xl text-black hover:text-primary truncate">Bus</a>
                            </h3>
                            <p>Kapasitas</p>
                            <p class="font-medium text-sm text-gray-500 mb-1">Harga termasuk Driver</p>
                            <p><span class="icon-[material-symbols--person-add-rounded]" style="color: #FF7417;"></span>
                                <iconify-icon icon="material-symbols:person-add-rounded"
                                    style="color: #FF7417"></iconify-icon>
                            </p>
                            <p class="font-medium text-sm text-black mb-1  flex justify-between">Status : Available <span
                                    class="font-bold">Rp 500.000</span></p>
                            <p class=" text-sm text-gray-500 mb-1 float-right "> unit / Hari</p>
                            <button class=" h-8 w-full bg-primary rounded-lg hover:opacity-50"><a href="#"
                                    class=" text-sm   text-white    ">Sewa</a></button>
                        </div>
                    </div>
                </div>
                <div class="w-full px-4 lg:w-1/2 xl:w-1/3 mb-2">
                    <div class="bg-white  rounded-xl shadow-lg overflow-hidden ">
                        <div class="py-8 px-6">
                            <img class="shadow-lg rounded-md" src="{{ asset('img/transportasi/bus.JPG') }}"
                                alt="">
                            <h3>
                                <a href=" /detailbus"
                                    class="block mb-3 mt-3 font-semibold text-xl text-black hover:text-primary truncate">Bus</a>
                            </h3>
                            <p>Kapasitas</p>
                            <p class="font-medium text-sm text-gray-500 mb-1">Harga termasuk Driver</p>
                            <p><span class="icon-[material-symbols--person-add-rounded]" style="color: #FF7417;"></span>
                                <iconify-icon icon="material-symbols:person-add-rounded"
                                    style="color: #FF7417"></iconify-icon>
                            </p>
                            <p class="font-medium text-sm text-black mb-1  flex justify-between">Status : Available <span
                                    class="font-bold">Rp 500.000</span></p>
                            <p class=" text-sm text-gray-500 mb-1 float-right "> unit / Hari</p>
                            <button class=" h-8 w-full bg-primary rounded-lg hover:opacity-50"><a href="#"
                                    class=" text-sm   text-white    ">Sewa</a></button>
                        </div>
                    </div>
                </div>
                <div class="w-full px-4 lg:w-1/2 xl:w-1/3 mb-2">
                    <div class="bg-white  rounded-xl shadow-lg overflow-hidden ">
                        <div class="py-8 px-6">
                            <img class="shadow-lg rounded-md" src="{{ asset('img/transportasi/bus.JPG') }}"
                                alt="">
                            <h3>
                                <a href=" /detailbus"
                                    class="block mb-3 mt-3 font-semibold text-xl text-black hover:text-primary truncate">Bus</a>
                            </h3>
                            <p>Kapasitas</p>
                            <p class="font-medium text-sm text-gray-500 mb-1">Harga termasuk Driver</p>
                            <p><span class="icon-[material-symbols--person-add-rounded]" style="color: #FF7417;"></span>
                                <iconify-icon icon="material-symbols:person-add-rounded"
                                    style="color: #FF7417"></iconify-icon>
                            </p>
                            <p class="font-medium text-sm text-black mb-1  flex justify-between">Status : Available <span
                                    class="font-bold">Rp 500.000</span></p>
                            <p class=" text-sm text-gray-500 mb-1 float-right "> unit / Hari</p>
                            <button class=" h-8 w-full bg-primary rounded-lg hover:opacity-50"><a href="#"
                                    class=" text-sm   text-white    ">Sewa</a></button>
                        </div>
                    </div>
                </div>
            </div>

    </section>
    <!-- kategori section End -->
    <!-- Promo Section start -->
    <section id="promo" class="pt-36 pb-36 bg-plaster">
        <div class="container">
            <div class="w-full px-4 ">
                <div class="max-w-xl mx-auto text-center mb-12">
                    <h4 class="font-semibold text-2xl text-primary mb-2">PROMO</h4>
                </div>
            </div>
            <div id="buttonpromo" class=" relative  mb-4">
                <div onclick="toggleDropdownPromo()"
                    class="text-sm flex cursor-pointer rounded justify-between bg-white  mx-auto px-4 xl:ml-36  p-2 h-10 w-[185px] ">
                    Semua kategori
                    <svg class="w-5 " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                    </svg>
                </div>
                <div id="dropdownPromo"
                    class="rounded border-[2px] border-white bg-white p-2 relative top-1 left-36 w-[185px] shadow-md hidden">
                    <div class="cursor-pointer hover:bg-gray-50 p-2">Transportasi</div>
                    <div class="cursor-pointer hover:bg-gray-50 p-2">Gedung</div>
                    <div class="cursor-pointer hover:bg-gray-50 p-2">Penginapan</div>
                    <div class="cursor-pointer hover:bg-gray-50 p-2">Layanan</div>
                    <div class="cursor-pointer hover:bg-gray-50 p-2">Asset</div>
                </div>
                <script>
                    function toggleDropdownPromo() {
                        let dropdownPromo = document.querySelector("#buttonpromo #dropdownPromo");
                        dropdownPromo.classList.toggle("hidden");
                    }
                </script>
            </div>
            <div class="w-full px-4 flex flex-wrap justify-center xl:w-10/12 xl:mx-auto">
                @foreach ($promo as $p)
                    <div class="mb-6 p-4 py-4 bg-softblue w-full rounded-lg relative">
                        <div class="flex mt-2 mb-3">
                            <img src="{{ asset('img/landingpage/sale.png') }}" alt="logo sale"
                                class="h-20 w-15 mb-4 sm:mb-0 sm:mr-3 ">
                            <div class="ml-3  ">
                                <h3 class="font-semibold text-xl text-black ">{{ $p->p_judul }} </h3>
                                <p
                                    class= "absolute  right-8 xl:top-8 bg-plaster rounded-lg h-6 w-60 text-center mt-3 tracking-wider bottom-4  ">
                                    2024SEWA </p>
                                <p class="font-medium text-base text-gray-500">{{ $p->p_isi }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div
                    class=" container mb-6 p-4 py-4 bg-softblue w-full rounded-lg relative grid xl:grid-cols-2 grid-cols-1 xl:grid-rows-1 grid-rows-2 ">
                    <div class="flex">
                        <img src="{{ asset('img/landingpage/sale.png') }}" alt="logo sale"
                            class="h-20 w-15 mb-4 sm:mb-0 sm:mr-3 ">
                        <div>
                            <h3 class="font-semibold text-xl text-black ">Dapatkan Voucher Diskon hingga jutaan rupiah !
                            </h3>
                            <p class="font-medium text-base text-gray-500">Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Quod, quasi!</p>
                            <p
                                class="mt-5 inline-block bg-plaster h-6 w-60 text-center rounded-lg tracking-widest text-sm mb-4">
                                2024IED</p>
                        </div>
                    </div>
                    <div class="flex space-x-2 xl:ml-20">
                        <div>
                            <img src="{{ asset('img/layanan/marching band.jpg') }}" alt="picture 1"
                                class=" rounded-3xl w-80 " />
                        </div>
                        <div class="flex flex-col space-y-2">
                            <img src="{{ asset('img/transportasi/minibus.jpg') }}" alt="picture 2"
                                class="rounded-3xl shadow-md overflow-hidden  w-40   " />
                            <img src="{{ asset('img/layanan/marching band.jpg') }}" alt="picture 3"
                                class=" rounded-3xl shadow-md overflow-hidden w-40   " />
                        </div>
                    </div>
                </div>

                <button id="loadmore_promo"
                    class="font-semibold text-medium text-black mb-8 uppercase underline underline-offset-2">Lihat Lebih
                    Banyak</button>
                <button id="hidemore_promo"
                    class="font-semibold text-medium text-black mb-8 uppercase underline underline-offset-2 hidden">Sembunyikan</button>
            </div>
        </div>
    </section>
    <!-- Promo Section End -->
    <!-- Section Syarat dan Ketentuan Start -->
    <section id="syarat" class="pt-36 pb-28 bg-white xl:w-10/12 mx-auto">
        <div class="container">
            <div cl ass="w-full px-4">
                <div class="mx-auto text-center mb-12 ">
                    <h4 class="font-semibold text-lg text-primary mb-2">PERTANYAAN UMUM SEWA ASET</h4>
                    <!-- <h2 class="font-bold text-black text-3xl mb-4 sm:text-4xl lg:text-5xl">Ketentuan sewa</h2> -->
                    <!-- <p class="font-medium text-medium md:text-lg">Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus quas corrupti ducimus, explicabo possimus tenetur tempore repellat obcaecati aperiam voluptatibus.</p> -->
                </div>
            </div>
            <div class="w-full px-12">
                <div id="accordion-color" data-accordion="collapse"
                    data-active-classes="bg-blue-100 dark:bg-gray-800 text-blue-600 dark:text-white">
                    <div class="pb-4 pt-4">
                        <h2 id="accordion-color-heading-1">
                            <button type="button"
                                class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border  border-grecianblue  focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-800 dark:border-gray-700 dark:text-gray-400 hover:bg-blue-100 dark:hover:bg-gray-800 gap-3"
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
                            <div class="p-5 border border-t-0 border-grecianblue dark:border-gray-700 dark:bg-gray-900">
                                <p class="mb-2 text-gray-500 dark:text-gray-400">Tarif persewaan tidak ada tambahan lain.
                                    Biaya administrasi pelayanan di sewa aset poltekbang gratis.</p>
                                <p class="text-gray-500 dark:text-gray-400"> Keterlambatan dan kerusakan barang dikenakan
                                    denda sampai dengan <a href="/docs/getting-started/introduction/"
                                        class="text-blue-600 dark:text-blue-500 hover:underline">30%</a>.</p>
                            </div>
                        </div>
                    </div>
                    <div class="pb-4 pt-4">
                        <h2 id="accordion-color-heading-2">
                            <button type="button"
                                class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border  border-grecianblue focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-800 dark:border-gray-700 dark:text-gray-400 hover:bg-blue-100 dark:hover:bg-gray-800 gap-3"
                                data-accordion-target="#accordion-color-body-2" aria-expanded="false"
                                aria-controls="accordion-color-body-2">
                                <div class="flex items-center gap-2">
                                    <img width="23" height="23" class="p-0"
                                        src="https://img.icons8.com/ios/50/help--v2.png" alt="help--v2" />
                                    <span>Bagaimana saya melakukan sewa transportasi dari lokasi yang berbeda?</span>
                                </div>
                                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0 max-w-none max-h-none"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M9 5 5 1 1 5" />
                                </svg>
                            </button>
                        </h2>
                        <div id="accordion-color-body-2" class="hidden" aria-labelledby="accordion-color-heading-2">
                            <div class="p-5 border border-t-0 border-grecianblue dark:border-gray-700">
                                <p class="mb-2 text-gray-500 dark:text-gray-400">Sewa transportasi di kami, <span
                                        class="font-bold">gratis</span> antar jemput dengan sopir yang profesional.</p>
                            </div>
                        </div>
                    </div>
                    <div class="pb-4 pt-4">
                        <h2 id="accordion-color-heading-3">
                            <button type="button"
                                class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-grecianblue focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-800 dark:border-gray-700 dark:text-gray-400 hover:bg-blue-100 dark:hover:bg-gray-800 gap-3"
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
                            <div class="p-5 border border-t-0 border-grecianblue">
                                <p class="mb-2 text-gray-500 dark:text-gray-400">Seluruh aset wajib dilakukan pembayaran DP
                                    30%.</p>
                                <p class="mb-2 text-gray-500 dark:text-gray-400">Minimal DP 30% :</p>
                                <ul class="ps-5 text-gray-500 list-disc dark:text-gray-400">
                                    <li><a href="https://flowbite.com/pro/"
                                            class="text-blue-600 dark:text-blue-500 hover:underline">Kategori
                                            Transportasi</a></li>
                                    <li><a href="https://tailwindui.com/" rel="nofollow"
                                            class="text-blue-600 dark:text-blue-500 hover:underline">Kategori Gedung</a>
                                    </li>
                                    <li><a href="https://tailwindui.com/" rel="nofollow"
                                            class="text-blue-600 dark:text-blue-500 hover:underline">Kategori Layanan</a>
                                    </li>
                                    <li><a href="https://tailwindui.com/" rel="nofollow"
                                            class="text-blue-600 dark:text-blue-500 hover:underline">Kategori Asset</a>
                                    </li>
                                </ul>
                                <p class="mb-2 text-gray-500 dark:text-gray-400">Kecuali kategori penginapan, pembayaran
                                    dilakukan secara lunas 100%.</p>
                            </div>
                        </div>
                    </div>
                    <div class="pb-4 pt-4">
                        <h2 id="accordion-color-heading-4">
                            <button type="button"
                                class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-grecianblue focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-800 dark:border-gray-700 dark:text-gray-400 hover:bg-blue-100 dark:hover:bg-gray-800 gap-3"
                                data-accordion-target="#accordion-color-body-4" aria-expanded="false"
                                aria-controls="accordion-color-body-4">
                                <div class="flex items-center gap-2 ">
                                    <img width="23" height="23" class="p-0"
                                        src="https://img.icons8.com/ios/50/help--v2.png" alt="help--v2" />
                                    <span>Jangka Waktu Penyelesaian </span>
                                </div>
                                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M9 5 5 1 1 5" />
                                </svg>
                            </button>
                        </h2>
                        <div id="accordion-color-body-4" class="hidden" aria-labelledby="accordion-color-heading-4">
                            <div class="p-5 border border-t-0 border-grecianblue">
                                <p class="mb-2 text-gray-500 dark:text-gray-400">The main difference is that the core
                                    components from Flowbite are open source under the MIT license, whereas Tailwind UI is a
                                    paid product. Another difference is that Flowbite relies on smaller and standalone
                                    components, whereas Tailwind UI offers sections of pages.</p>
                                <p class="mb-2 text-gray-500 dark:text-gray-400">However, we actually recommend using both
                                    Flowbite, Flowbite Pro, and even Tailwind UI as there is no technical reason stopping
                                    you from using the best of two worlds.</p>
                                <p class="mb-2 text-gray-500 dark:text-gray-400">Learn more about these technologies:</p>
                                <ul class="ps-5 text-gray-500 list-disc dark:text-gray-400">
                                    <li><a href="https://flowbite.com/pro/"
                                            class="text-blue-600 dark:text-blue-500 hover:underline">Flowbite Pro</a></li>
                                    <li><a href="https://tailwindui.com/" rel="nofollow"
                                            class="text-blue-600 dark:text-blue-500 hover:underline">Tailwind UI</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="pb-4 pt-4">
                        <h2 id="accordion-color-heading-5">
                            <button type="button"
                                class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-grecianblue focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-800 dark:border-gray-700 dark:text-gray-400 hover:bg-blue-100 dark:hover:bg-gray-800 gap-3"
                                data-accordion-target="#accordion-color-body-5" aria-expanded="false"
                                aria-controls="accordion-color-body-5">
                                <div class="flex items-center gap-2 ">
                                    <img width="23" height="23" class="p-0"
                                        src="https://img.icons8.com/ios/50/help--v2.png" alt="help--v2" />
                                    <span>Persyaratan Peminjaman </span>
                                </div>
                                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M9 5 5 1 1 5" />
                                </svg>
                            </button>
                        </h2>
                        <div id="accordion-color-body-5" class="hidden" aria-labelledby="accordion-color-heading-4">
                            <div class="p-5 border border-t-0 border-grecianblue">
                                <p class="mb-2 text-gray-500 dark:text-gray-400">1. Memiliki akun / mendaftar terlebih
                                    dahulu di sistem SEWA ASET.</p>
                                <p class="mb-2 text-gray-500 dark:text-gray-400">2. Berkas yang harus disiapkan ketika
                                    mendaftar:</p>
                                <ul class="ps-5 text-gray-500 list-disc dark:text-gray-400">
                                    <li><a href="https://flowbite.com/pro/"
                                            class="text-blue-600 dark:text-blue-500 hover:underline">Foto KTP</a></li>
                                    <li><a href="https://tailwindui.com/" rel="nofollow"
                                            class="text-blue-600 dark:text-blue-500 hover:underline"></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Section Syarat dan Ketentuan End -->
    <section id="plus" class="pt-20 pb-16 bg-plaster">
        <div class="container">
            <div class=" w-full px-4">
                <div class="mx-auto text-right mr-20 mb-20">
                    <h4 class="font-bold text-xl  uppercase text-primary ">Mengapa harus sewa di sewaaset poltkebang
                        surabaya?</h4>
                </div>
                <div class="flex flex-wrap px-6">
                    <div class="w-full grid place-items-center h-full md:w-1/2 lg:w-1/2 sm:justify-center ">
                        <img src="{{ asset('img/tar.png') }}" alt="Foto Taruna Taruni" class="object-cover ">
                    </div>
                    <div class="w-full px-4 mb-10 md:w-1/2 lg:w-1/2">
                        <div class="flex items-center pb-4 pt-2">
                            <img src="{{ asset('img/landingpage/1.png') }}" alt="Waktu" class="h-10 w-10">
                            <div class="ml-3">
                                <p class=" font-bold  ">Semua keperluan dalam acara bisa sewa satu tempat</p>
                                <p class="text-justify ">Dengan melakukan pemesanan gedung maka anda tidak usah bingung
                                    untuk menyewa tempat penyewaan kursi, kamera , dll.</p>
                            </div>
                        </div>
                        <div class="flex items-center pb-4 pt-2">
                            <img src="{{ asset('img/landingpage/2.png') }}" alt="Waktu" class="h-10 w-10">
                            <div class="ml-3">
                                <p class=" font-bold  ">Cara bayar mudah dengan berbagai metode pembayaran </p>
                                <p class="text-justify ">Dengan melakukan pemesanan gedung maka anda tidak usah bingung
                                    untuk menyewa tempat penyewaan kursi, kamera , dll.</p>
                            </div>
                        </div>
                        <div class="flex items-center pb-4 pt-2">
                            <img src="{{ asset('img/landingpage/4.png') }}" alt="Waktu" class="h-10 w-10">
                            <div class="ml-3">
                                <p class=" font-bold  ">Pemesanan bisa dibicarakan secara langsung </p>
                                <p class="text-justify ">Dengan melakukan pemesanan gedung maka anda tidak usah bingung
                                    untuk menyewa tempat penyewaan kursi, kamera , dll.</p>
                            </div>
                        </div>
                        <div class="flex items-center pb-4 pt-2">
                            <img src="{{ asset('img/landingpage/3.png') }}" alt="Waktu" class="h-10 w-10">
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
    <!-- Informasi Kontak -->
    <section class="pb-16 pt-16">
        <div class="container">
            <div class="w-full px-4">
                <div class="mx-auto text-center mb-16">
                    <h4 class="font-semibold text-lg text-primary mb-2">Kontak</h4>
                    <h2 class="font-bold text-black text-3xl mb-4 sm:text-4xl lg:text-5xl">Informasi Kontak</h2>
                    <p class="font-medium text-medium md:text-lg">Jika terdapat pertanyaan, aduan, atau hal yang harus
                        dikonfirmasi terlebih dahulu. Anda bisa langsung menghubungi kontak berikut ini .</p>
                </div>
            </div>
            <div class=" mx-auto text-center p-7 justify-center items-center h-28 w-72 rounded-lg bg-gray-50">
                <p class="font-bold text-sm pb-2">WhatsApp</p>
                <div class="flex ml-5 hover:bg-primary hover:text-white">
                    <a aria-label="Chat on WhatsApp" href="https://wa.me/6289529811097/?text=Hello Saya Ingin bertanya">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20"
                            viewBox="0 0 50 50">
                            <path
                                d="M 25 2 C 12.309534 2 2 12.309534 2 25 C 2 29.079097 3.1186875 32.88588 4.984375 36.208984 L 2.0371094 46.730469 A 1.0001 1.0001 0 0 0 3.2402344 47.970703 L 14.210938 45.251953 C 17.434629 46.972929 21.092591 48 25 48 C 37.690466 48 48 37.690466 48 25 C 48 12.309534 37.690466 2 25 2 z M 25 4 C 36.609534 4 46 13.390466 46 25 C 46 36.609534 36.609534 46 25 46 C 21.278025 46 17.792121 45.029635 14.761719 43.333984 A 1.0001 1.0001 0 0 0 14.033203 43.236328 L 4.4257812 45.617188 L 7.0019531 36.425781 A 1.0001 1.0001 0 0 0 6.9023438 35.646484 C 5.0606869 32.523592 4 28.890107 4 25 C 4 13.390466 13.390466 4 25 4 z M 16.642578 13 C 16.001539 13 15.086045 13.23849 14.333984 14.048828 C 13.882268 14.535548 12 16.369511 12 19.59375 C 12 22.955271 14.331391 25.855848 14.613281 26.228516 L 14.615234 26.228516 L 14.615234 26.230469 C 14.588494 26.195329 14.973031 26.752191 15.486328 27.419922 C 15.999626 28.087653 16.717405 28.96464 17.619141 29.914062 C 19.422612 31.812909 21.958282 34.007419 25.105469 35.349609 C 26.554789 35.966779 27.698179 36.339417 28.564453 36.611328 C 30.169845 37.115426 31.632073 37.038799 32.730469 36.876953 C 33.55263 36.755876 34.456878 36.361114 35.351562 35.794922 C 36.246248 35.22873 37.12309 34.524722 37.509766 33.455078 C 37.786772 32.688244 37.927591 31.979598 37.978516 31.396484 C 38.003976 31.104927 38.007211 30.847602 37.988281 30.609375 C 37.969311 30.371148 37.989581 30.188664 37.767578 29.824219 C 37.302009 29.059804 36.774753 29.039853 36.224609 28.767578 C 35.918939 28.616297 35.048661 28.191329 34.175781 27.775391 C 33.303883 27.35992 32.54892 26.991953 32.083984 26.826172 C 31.790239 26.720488 31.431556 26.568352 30.914062 26.626953 C 30.396569 26.685553 29.88546 27.058933 29.587891 27.5 C 29.305837 27.918069 28.170387 29.258349 27.824219 29.652344 C 27.819619 29.649544 27.849659 29.663383 27.712891 29.595703 C 27.284761 29.383815 26.761157 29.203652 25.986328 28.794922 C 25.2115 28.386192 24.242255 27.782635 23.181641 26.847656 L 23.181641 26.845703 C 21.603029 25.455949 20.497272 23.711106 20.148438 23.125 C 20.171937 23.09704 20.145643 23.130901 20.195312 23.082031 L 20.197266 23.080078 C 20.553781 22.728924 20.869739 22.309521 21.136719 22.001953 C 21.515257 21.565866 21.68231 21.181437 21.863281 20.822266 C 22.223954 20.10644 22.02313 19.318742 21.814453 18.904297 L 21.814453 18.902344 C 21.828863 18.931014 21.701572 18.650157 21.564453 18.326172 C 21.426943 18.001263 21.251663 17.580039 21.064453 17.130859 C 20.690033 16.232501 20.272027 15.224912 20.023438 14.634766 L 20.023438 14.632812 C 19.730591 13.937684 19.334395 13.436908 18.816406 13.195312 C 18.298417 12.953717 17.840778 13.022402 17.822266 13.021484 L 17.820312 13.021484 C 17.450668 13.004432 17.045038 13 16.642578 13 z M 16.642578 15 C 17.028118 15 17.408214 15.004701 17.726562 15.019531 C 18.054056 15.035851 18.033687 15.037192 17.970703 15.007812 C 17.906713 14.977972 17.993533 14.968282 18.179688 15.410156 C 18.423098 15.98801 18.84317 16.999249 19.21875 17.900391 C 19.40654 18.350961 19.582292 18.773816 19.722656 19.105469 C 19.863021 19.437122 19.939077 19.622295 20.027344 19.798828 L 20.027344 19.800781 L 20.029297 19.802734 C 20.115837 19.973483 20.108185 19.864164 20.078125 19.923828 C 19.867096 20.342656 19.838461 20.445493 19.625 20.691406 C 19.29998 21.065838 18.968453 21.483404 18.792969 21.65625 C 18.639439 21.80707 18.36242 22.042032 18.189453 22.501953 C 18.016221 22.962578 18.097073 23.59457 18.375 24.066406 C 18.745032 24.6946 19.964406 26.679307 21.859375 28.347656 C 23.05276 29.399678 24.164563 30.095933 25.052734 30.564453 C 25.940906 31.032973 26.664301 31.306607 26.826172 31.386719 C 27.210549 31.576953 27.630655 31.72467 28.119141 31.666016 C 28.607627 31.607366 29.02878 31.310979 29.296875 31.007812 L 29.298828 31.005859 C 29.655629 30.601347 30.715848 29.390728 31.224609 28.644531 C 31.246169 28.652131 31.239109 28.646231 31.408203 28.707031 L 31.408203 28.708984 L 31.410156 28.708984 C 31.487356 28.736474 32.454286 29.169267 33.316406 29.580078 C 34.178526 29.990889 35.053561 30.417875 35.337891 30.558594 C 35.748225 30.761674 35.942113 30.893881 35.992188 30.894531 C 35.995572 30.982516 35.998992 31.07786 35.986328 31.222656 C 35.951258 31.624292 35.8439 32.180225 35.628906 32.775391 C 35.523582 33.066746 34.975018 33.667661 34.283203 34.105469 C 33.591388 34.543277 32.749338 34.852514 32.4375 34.898438 C 31.499896 35.036591 30.386672 35.087027 29.164062 34.703125 C 28.316336 34.437036 27.259305 34.092596 25.890625 33.509766 C 23.114812 32.325956 20.755591 30.311513 19.070312 28.537109 C 18.227674 27.649908 17.552562 26.824019 17.072266 26.199219 C 16.592866 25.575584 16.383528 25.251054 16.208984 25.021484 L 16.207031 25.019531 C 15.897202 24.609805 14 21.970851 14 19.59375 C 14 17.077989 15.168497 16.091436 15.800781 15.410156 C 16.132721 15.052495 16.495617 15 16.642578 15 z">
                            </path>
                        </svg>
                    </a>
                    <p>+62 896578110 (Dodo)</p>
                </div>
            </div>
        </div>
        <!-- End Contact -->
        <!-- back to top -->
        <a href="#home">
            <i class=" btnbtt btn-active  fixed bottom-10 right-10 text-5xl cursor pointer text-primary hover:text-primary z-20 hidden"
                title="Kembali ke atas"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 10.5 12 3m0 0 7.5 7.5M12 3v18" />
                </svg>
            </i>
        </a>
        <!-- end back to top -->
    </section>
@endsection
