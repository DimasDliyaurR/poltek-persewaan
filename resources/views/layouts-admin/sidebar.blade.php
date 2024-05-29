<aside id="sidebar-multi-level-sidebar"
    class="max-[640px]:fixed h-auto left-0 z-40 w-72 max-[640px]:h-screen transition-transform -translate-x-full sm:translate-x-0"
    aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
        <ul class="space-y-2 font-medium">
            <li>
                <a href="{{ route('admin.index') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M10 20v-6h4v6h5v-8h3L12 3L2 12h3v8z" />
                    </svg>
                    <span class="ms-3">Dashboard</span>
                </a>
            </li>
            <li>
                {{-- Laporan --}}
                <button type="button"
                    class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                    aria-controls="dropdown-example-laporan" data-collapse-toggle="dropdown-example-laporan">

                    <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                        <path
                            d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                        <path
                            d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                    </svg>
                    <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Laporan</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </button>
                <ul id="dropdown-example-laporan" class="{{ $action == 'laporan' ? '' : 'hidden' }} py-2 space-y-2">
                    <li>
                        <a href="{{ route('laporan.index') }}"
                            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Pemasukkan</a>
                    </li>
                    <li>
                        <a href="{{ route('laporan.kendaraan') }}"
                            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Transaksi
                            Kendaraan</a>
                    </li>
                    <li>
                        <a href="{{ route('laporan.asrama') }}"
                            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Transaksi
                            Asrama</a>
                    </li>
                    <li>
                        <a href="{{ route('laporan.alat-barang') }}"
                            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Transaksi
                            Alat Barang</a>
                    </li>
                    <li>
                        <a href="{{ route('laporan.gedung-lap') }}"
                            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Transaksi
                            Gedung & Lapangan</a>
                    </li>
                    <li>
                        <a href="{{ route('laporan.layanan') }}"
                            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Transaksi
                            Layanan</a>
                    </li>
                </ul>
            </li>
            {{-- Promo --}}
            @if (auth()->user()->level == 'admin')
                <li>
                    <a href="{{ asset('admin/promos') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                            xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M12.79 21L3 11.21v2c0 .53.21 1.04.59 1.41l7.79 7.79c.78.78 2.05.78 2.83 0l6.21-6.21c.78-.78.78-2.05 0-2.83z" />
                            <path fill="currentColor"
                                d="M11.38 17.41c.39.39.9.59 1.41.59c.51 0 1.02-.2 1.41-.59l6.21-6.21c.78-.78.78-2.05 0-2.83L12.62.58C12.25.21 11.74 0 11.21 0H5C3.9 0 3 .9 3 2v6.21c0 .53.21 1.04.59 1.41zM5 2h6.21L19 9.79L12.79 16L5 8.21z" />
                            <circle cx="7.25" cy="4.25" r="1.25" fill="currentColor" />
                        </svg>
                        <span class="ms-3">Promo</span>
                    </a>
                </li>

                <li>
                    {{-- Kendaraan --}}
                    <button type="button"
                        class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                        aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">

                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                            xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 15 15">
                            <path fill="currentColor"
                                d="M13.84 6.852L12.6 5.7l-1.1-2.2a1.05 1.05 0 0 0-.9-.5H4.4a1.05 1.05 0 0 0-.9.5L2.4 5.7L1.16 6.852a.5.5 0 0 0-.16.367V11.5a.5.5 0 0 0 .5.5h2c.2 0 .5-.2.5-.4V11h7v.5c0 .2.2.5.4.5h2.1a.5.5 0 0 0 .5-.5V7.219a.5.5 0 0 0-.16-.367M4.5 4h6l1 2h-8ZM5 8.6c0 .2-.3.4-.5.4H2.4c-.2 0-.4-.3-.4-.5V7.4c.1-.3.3-.5.6-.4l2 .4c.2 0 .4.3.4.5Zm8-.1c0 .2-.2.5-.4.5h-2.1c-.2 0-.5-.2-.5-.4v-.7c0-.2.2-.5.4-.5l2-.4c.3-.1.5.1.6.4Z" />
                        </svg>
                        <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Kendaraan</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <ul id="dropdown-example" class="{{ $action == 'kendaraan' ? '' : 'hidden' }} py-2 space-y-2">
                        <li>
                            <a href="{{ asset('admin/merkKendaraans') }}"
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Merek
                                Kendaraan</a>
                        </li>
                        <li>
                            <a href="{{ asset('admin/kendaraans') }}"
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Unit
                                Kendaraan</a>
                        </li>
                    </ul>
                </li>
                {{-- Asrama --}}
                <li>
                    <button type="button"
                        class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                        aria-controls="dropdown-example-asrama" data-collapse-toggle="dropdown-example-asrama">

                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                            xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                            <g fill="none" fill-rule="evenodd">
                                <path
                                    d="M24 0v24H0V0zM12.594 23.258l-.012.002l-.071.035l-.02.004l-.014-.004l-.071-.036c-.01-.003-.019 0-.024.006l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427c-.002-.01-.009-.017-.016-.018m.264-.113l-.014.002l-.184.093l-.01.01l-.003.011l.018.43l.005.012l.008.008l.201.092c.012.004.023 0 .029-.008l.004-.014l-.034-.614c-.003-.012-.01-.02-.02-.022m-.715.002a.023.023 0 0 0-.027.006l-.006.014l-.034.614c0 .012.007.02.017.024l.015-.002l.201-.093l.01-.008l.003-.011l.018-.43l-.003-.012l-.01-.01z" />
                                <path fill="currentColor"
                                    d="M17 3a2 2 0 0 1 2 2v1h1a1 1 0 1 1 0 2v11a1 1 0 1 1 0 2h-6.5v-4.5a1.5 1.5 0 0 0-3 0V21H4a1 1 0 1 1 0-2V8a1 1 0 0 1 0-2h1V5a2 2 0 0 1 2-2zM8 13a1 1 0 0 0-1 1v1a1 1 0 1 0 2 0v-1a1 1 0 0 0-1-1m8 0a1 1 0 0 0-.993.883L15 14v1a1 1 0 0 0 1.993.117L17 15v-1a1 1 0 0 0-1-1M8 9a1 1 0 0 0-.993.883L7 10v1a1 1 0 0 0 1.993.117L9 11v-1a1 1 0 0 0-1-1m4 0a1 1 0 0 0-.993.883L11 10v1a1 1 0 0 0 1.993.117L13 11v-1a1 1 0 0 0-1-1m4 0a1 1 0 0 0-1 1v1a1 1 0 1 0 2 0v-1a1 1 0 0 0-1-1m1-4H7v1h10z" />
                            </g>
                        </svg>
                        <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Asrama</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <ul id="dropdown-example-asrama"
                        class="{{ $action == 'asrama' ? '' : 'hidden' }} py-2 space-y-2">
                        <li>
                            <a href="{{ asset('admin/asramas') }}"
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Ruang
                                Asrama</a>
                        </li>
                        <li>
                            <a href="{{ asset('admin/tipeAsramas') }}"
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Tipe
                                Asrama</a>
                        </li>
                        <li>
                            <a href="{{ asset('admin/fasilitasAsramas') }}"
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Fasilitas
                                Asrama</a>
                        </li>
                    </ul>
                </li>

                {{-- Alat Barang --}}
                <li>
                    <button type="button"
                        class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                        aria-controls="dropdown-example-alat-barang"
                        data-collapse-toggle="dropdown-example-alat-barang">

                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                            xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M5.12 5h13.75l-.94-1h-12zm15.42.23c.29.34.46.77.46 1.27V19a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V6.5c0-.5.17-.93.46-1.27l1.38-1.68C5.12 3.21 5.53 3 6 3h12c.47 0 .88.21 1.15.55zM6 18h6v-3H6z" />
                        </svg>
                        <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Alat Barang</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <ul id="dropdown-example-alat-barang"
                        class="{{ $action == 'alat barang' ? '' : 'hidden' }} py-2 space-y-2">
                        <li>
                            <a href="{{ asset('admin/alatBarangs') }}"
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Alat
                                Barang</a>
                        </li>
                        <li>
                            <a href="{{ asset('admin/satuanAlatBarangs') }}"
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Satuan</a>
                        </li>
                    </ul>
                </li>

                {{-- Gedung & Lapangan --}}
                <li>
                    <button type="button"
                        class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                        aria-controls="dropdown-example-gedung-lapangan"
                        data-collapse-toggle="dropdown-example-gedung-lapangan">

                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                            xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 20 20">
                            <path fill="currentColor"
                                d="M6 10V8h8v2zm6 4v-1h2v1zm6-9.5a1.5 1.5 0 0 1-1 1.415V16.5a.5.5 0 0 1-.5.5H10v-4.5a.5.5 0 0 0-.5-.5h-4a.5.5 0 0 0-.5.5V17H3.5a.5.5 0 0 1-.5-.5V5.915A1.5 1.5 0 0 1 3.5 3h13A1.5 1.5 0 0 1 18 4.5m-15 0a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 0-1h-13a.5.5 0 0 0-.5.5M5.5 7a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5zm6 5a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5zM6 17h3v-4H6z" />
                        </svg>
                        <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap mr-5">Gedung &
                            Lapangan</span>
                        <svg class="w-3 h-3 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <ul id="dropdown-example-gedung-lapangan"
                        class="{{ $action == 'gedunglap' ? '' : 'hidden' }} py-2 space-y-2">
                        <li>
                            <a href="{{ asset('admin/gedungLaps') }}"
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Gedung</a>
                        </li>
                    </ul>
                </li>

                {{-- Layanan --}}
                <li>
                    <button type="button"
                        class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                        aria-controls="dropdown-example-layanan" data-collapse-toggle="dropdown-example-layanan">

                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                            xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16">
                            <path fill="currentColor"
                                d="M11 5a3 3 0 1 1-6 0a3 3 0 0 1 6 0m-9 8c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4m9.886-3.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382zM14 12.5a1.5 1.5 0 1 0-3 0a1.5 1.5 0 0 0 3 0" />
                        </svg>
                        <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap mr-5">Layanan</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <ul id="dropdown-example-layanan"
                        class="{{ $action == 'layanan' ? '' : 'hidden' }} py-2 space-y-2">
                        <li>
                            <a href="{{ asset('admin/layanans') }}"
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Layanan</a>
                        </li>
                    </ul>
                </li>
            @endif


            {{-- Transaksi --}}
            <li>
                <button type="button"
                    class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                    aria-controls="dropdown-example-transaksi" data-collapse-toggle="dropdown-example-transaksi">

                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                        xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M20 2H10a3 3 0 0 0-3 3v7a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3V5a3 3 0 0 0-3-3m1 10a1 1 0 0 1-1 1H10a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1Zm-3.5-4a1.49 1.49 0 0 0-1 .39a1.5 1.5 0 1 0 0 2.22a1.5 1.5 0 1 0 1-2.61M16 17a1 1 0 0 0-1 1v1a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1v-4h1a1 1 0 0 0 0-2H3v-1a1 1 0 0 1 1-1a1 1 0 0 0 0-2a3 3 0 0 0-3 3v7a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3v-1a1 1 0 0 0-1-1M6 18h1a1 1 0 0 0 0-2H6a1 1 0 0 0 0 2" />
                    </svg>
                    <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap mr-5">Transaksi</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </button>
                <ul id="dropdown-example-transaksi"
                    class="{{ $action == 'transaksi' ? '' : 'hidden' }} py-2 space-y-2">
                    <li>
                        <a href="{{ asset('admin/transaksi-kendaraans') }}"
                            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Transaksi
                            Kendaraan</a>
                    </li>
                    <li>
                        <a href="{{ asset('admin/transaksi-asramas') }}"
                            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Transaksi
                            Asrama</a>
                    </li>
                    <li>
                        <a href="{{ asset('admin/transaksi-alatBarangs') }}"
                            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Transaksi
                            Alat Barang</a>
                    </li>
                    <li>
                        <a href="{{ asset('admin/transaksi-gedungLaps') }}"
                            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Transaksi
                            Gedung & Lapangan</a>
                    </li>
                    <li>
                        <a href="{{ asset('admin/transaksi-layanans') }}"
                            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Transaksi
                            Layanan</a>
                    </li>
                </ul>
            </li>
            @if (auth()->user()->level == 'admin')
                {{-- User --}}
                <li>
                    <button type="button"
                        class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                        aria-controls="dropdown-example-transaksi" data-collapse-toggle="dropdown-example-user">

                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 256 256">
                            <path fill="currentColor"
                                d="M234.38 210a123.36 123.36 0 0 0-60.78-53.23a76 76 0 1 0-91.2 0A123.36 123.36 0 0 0 21.62 210a12 12 0 1 0 20.77 12c18.12-31.32 50.12-50 85.61-50s67.49 18.69 85.61 50a12 12 0 0 0 20.77-12M76 96a52 52 0 1 1 52 52a52.06 52.06 0 0 1-52-52" />
                        </svg>
                        <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap mr-5">User Control</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <ul id="dropdown-example-user" class="{{ $action == 'user' ? '' : 'hidden' }} py-2 space-y-2">
                        <li>
                            <a href="{{ route('user.index') }}"
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">User</a>
                        </li>
                        <li>
                            <a href="{{ asset('admin/transaksi-layanans') }}"
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Logging
                                Activity</a>
                        </li>
                        <li>
                            <a href="{{ asset('admin/transaksi-layanans') }}"
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Workflow
                                User</a>
                        </li>
                    </ul>
                </li>
            @endif
        </ul>
    </div>
</aside>

<button data-drawer-target="sidebar-multi-level-sidebar" data-drawer-toggle="sidebar-multi-level-sidebar"
    aria-controls="sidebar-multi-level-sidebar" type="button"
    class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600 dark:bg-gray-800">
    <span class="sr-only">Open sidebar</span>
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
        xmlns="http://www.w3.org/2000/svg">
        <path clip-rule="evenodd" fill-rule="evenodd"
            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
        </path>
    </svg>
</button>
