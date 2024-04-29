<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}| PERSEWAAAN ASET</title>
    @yield('head')
    <link rel="icon" href="{{ asset('img/logo.png') }}" type="image/png" sizes="16x35">
    <link href="https://icons8.com/icon/E4FAF4hA9ugF/help">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')

</head>

<body>
    <header class="bg-transparent absolute top-0 left-0 w-full flex items-center z-10">
        <div class="container">
            <div class="flex items-center justify-between relative">
                <div class=" flex items-center px-4">
                    <img src="{{ asset('img/LogoPoltekbang.png') }}" class="h-11 w-15" alt="Logo ">
                    <div class="ml-1">
                        <a href="/index #home" class="font-bold text-lg text-black">
                            SEWA ASET<br>
                            <span class="font-bold text-lg text-black">POLITEKNIK PENERBANGAN SURABAYA</span>
                        </a>
                    </div>
                </div>
                <div class=" flex items-center px-4">
                    <button id="hamburger" name="hamburger" type="button"class="block absolute right-4 lg:hidden">
                        <span class="hamburger-line transition duration-300 origin-top-left"></span>
                        <span class="hamburger-line"></span>
                        <span class="hamburger-line origin-bottom-left"></span>
                    </button>
                    <nav id="nav-menu"
                        class="hidden absolute py-5 bg-transparent shadow-lg rounded-lg max-w-[250px] w-full right-4 top-full lg:block lg:static lg:max-w-full lg:shadow-none lg:rounded-none  ">
                        <ul class="block lg:flex">
                            <li
                                class="group text-base font-normal text-black py-2 mx-8 flex hover:text-primary active:text-primary">
                                <span class="w-6 h-6"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path fill="black"
                                            d="M12 22q-2.075 0-3.9-.788t-3.175-2.137q-1.35-1.35-2.137-3.175T2 12q0-2.075.788-3.9t2.137-3.175q1.35-1.35 3.175-2.137T12 2q2.075 0 3.9.788t3.175 2.137q1.35 1.35 2.138 3.175T22 12q0 2.075-.788 3.9t-2.137 3.175q-1.35 1.35-3.175 2.138T12 22m0-2q3.35 0 5.675-2.325T20 12q0-3.35-2.325-5.675T12 4Q8.65 4 6.325 6.325T4 12q0 3.35 2.325 5.675T12 20m-.5-3h2V7h-4v2h2z" />
                                    </svg></span>Pemesanan</a>
                            </li>
                            <li
                                class="group text-base text-black py-2 mx-8 flex group-hover:text-primary active:bg-primary">
                                <span class="w-6 h-6"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path fill="black"
                                            d="M12 22q-2.075 0-3.9-.788t-3.175-2.137q-1.35-1.35-2.137-3.175T2 12q0-2.075.788-3.9t2.137-3.175q1.35-1.35 3.175-2.137T12 2q2.075 0 3.9.788t3.175 2.137q1.35 1.35 2.138 3.175T22 12q0 2.075-.788 3.9t-2.137 3.175q-1.35 1.35-3.175 2.138T12 22m0-2q3.35 0 5.675-2.325T20 12q0-3.35-2.325-5.675T12 4Q8.65 4 6.325 6.325T4 12q0 3.35 2.325 5.675T12 20m-3-3h6v-2h-4v-2h2q.825 0 1.413-.587T15 11V9q0-.825-.587-1.412T13 7H9v2h4v2h-2q-.825 0-1.412.588T9 13z" />
                                    </svg></span>Pembayaran
                            </li>
                            <li class="group text-base text-black py-2 mx-8 flex group-hover:text-primary">
                                <span class="w-6 h-6"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path fill="black"
                                            d="M12 22q-2.075 0-3.9-.788t-3.175-2.137q-1.35-1.35-2.137-3.175T2 12q0-2.075.788-3.9t2.137-3.175q1.35-1.35 3.175-2.137T12 2q2.075 0 3.9.788t3.175 2.137q1.35 1.35 2.138 3.175T22 12q0 2.075-.788 3.9t-2.137 3.175q-1.35 1.35-3.175 2.138T12 22m0-2q3.35 0 5.675-2.325T20 12q0-3.35-2.325-5.675T12 4Q8.65 4 6.325 6.325T4 12q0 3.35 2.325 5.675T12 20m-3-3h4q.825 0 1.413-.587T15 15v-1.5q0-.65-.425-1.075T13.5 12q.65 0 1.075-.425T15 10.5V9q0-.825-.587-1.412T13 7H9v2h4v2h-2v2h2v2H9z" />
                                    </svg></span>Pesanan Berhasil
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    @yield('content')
    @vite('resources/js/app.js')
    <!-- <script src="../path/to/flowbite/dist/flowbite.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="../path/to/flowbite/dist/datepicker.js"></script>
    <!-- Script -->

    @yield('script')

</html>
