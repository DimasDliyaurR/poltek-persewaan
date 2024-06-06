@extends('layouts-user.main')
@section('content')
    <div class="flex sm:flex-row flex-col w-full h-screen sm: gap-3">

        <div class="flex flex-col sm:w-1/2 w-full gap-5">
            {{-- Card Username --}}
            <div class="flex justify-between p-3 h-60 bg-gray-100 w-full rounded-md">
                <div>
                    {{-- username --}}
                    <p class="p-4 font-bold text-4xl">Hai, {{ auth()->user()->profile->nama_lengkap }}</p>


                    <div class="p-4 text-sm text-black">
                        Selamat datang di sistem informasi SEWA ASET Politeknik Teknik Penerbangan
                    </div>

                    <a href="{{ asset('profile') }}"
                        class="block p-2 ml-4 w-36 bg-black text-center hover:bg-gray-700 text-white text-md font-bold rounded-md">
                        Lihat Biodata
                    </a>
                </div>
            </div>
            {{-- Card Username --}}
            <p class="text-xl text-black font-bold">Pengeluaran</p>

            <div class="w-full">

                <div class="w-full h-72 bg-gray-100 rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
                    <div id="grid-chart"></div>
                    <div
                        class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between">

                    </div>
                </div>

            </div>


        </div>

        <div class="sm:w-1/2 w-full sm:ml-6 sm:h-screen h-auto bg-gray-100 rounded-lg">
            <div class="flex flex-col gap-5 sm: mt-5">

                {{-- Card Pengeluaran --}}
                <div class="flex bg-white p-5 mx-5 shadow-lg shadow-gray-300 rounded-lg">
                    {{-- Logo --}}
                    <div class="p-4 bg-green-300 rounded-lg">
                        <svg class="text-[3rem]" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                            viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M11.25 7.847c-.936.256-1.5.975-1.5 1.653s.564 1.397 1.5 1.652zm1.5 5.001v3.304c.936-.255 1.5-.974 1.5-1.652c0-.678-.564-1.397-1.5-1.652" />
                            <path fill="currentColor" fill-rule="evenodd"
                                d="M22 12c0 5.523-4.477 10-10 10S2 17.523 2 12S6.477 2 12 2s10 4.477 10 10M12 5.25a.75.75 0 0 1 .75.75v.317c1.63.292 3 1.517 3 3.183a.75.75 0 0 1-1.5 0c0-.678-.564-1.397-1.5-1.653v3.47c1.63.292 3 1.517 3 3.183s-1.37 2.891-3 3.183V18a.75.75 0 0 1-1.5 0v-.317c-1.63-.292-3-1.517-3-3.183a.75.75 0 0 1 1.5 0c0 .678.564 1.397 1.5 1.652v-3.469c-1.63-.292-3-1.517-3-3.183s1.37-2.891 3-3.183V6a.75.75 0 0 1 .75-.75"
                                clip-rule="evenodd" />
                        </svg>
                    </div>

                    {{-- Containt --}}
                    <div class="flex m-4 flex-col">
                        <span class="font-semibold uppercase">Pengeluaran</span>
                        <span class="text-xl font-bold">Rp. {{ number_format($pengeluaran, 0, ',', '.') }}</span>
                    </div>
                </div>
                {{-- Card Pengeluaran --}}

                {{-- Card Jumlah Transaksi Berhasil --}}
                <div class="flex bg-white p-5 mx-5 shadow-lg shadow-gray-300 rounded-lg">
                    {{-- Logo --}}
                    <div class="p-4 bg-orange-300 rounded-lg">
                        <svg class="text-[3rem]" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                            viewBox="0 0 48 48">
                            <defs>
                                <mask id="ipSTransactionOrder0">
                                    <g fill="none" stroke-linejoin="round" stroke-width="4">
                                        <rect width="30" height="36" x="9" y="8" fill="#fff" stroke="#fff"
                                            rx="2" />
                                        <path stroke="#fff" stroke-linecap="round" d="M18 4v6m12-6v6" />
                                        <path stroke="#000" stroke-linecap="round" d="M16 19h16m-16 8h12m-12 8h8" />
                                    </g>
                                </mask>
                            </defs>
                            <path fill="currentColor" d="M0 0h48v48H0z" mask="url(#ipSTransactionOrder0)" />
                        </svg>
                    </div>

                    {{-- Containt --}}
                    <div class="flex m-4 flex-col">
                        <span class="font-semibold uppercase">Jumlah Transaksi Berhasil</span>
                        <span class="text-2xl font-bold">{{ $terbayar }}</span>
                    </div>
                </div>
                {{-- Card Jumlah Transaksi Berhasil --}}

                {{-- Card Jumlah Transaksi Belum Bayar --}}
                <div class="flex bg-white p-5 mx-5 shadow-lg shadow-gray-300 rounded-lg">
                    {{-- Logo --}}
                    <div class="p-4 bg-purple-300 rounded-lg">
                        <svg class="text-[3rem]" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                            viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M14.5 3a2.5 2.5 0 1 0 0 5a2.5 2.5 0 0 0 0-5M10 5.5a4.5 4.5 0 0 1 6.5-4.032a4.5 4.5 0 1 1 0 8.064A4.5 4.5 0 0 1 10 5.5m8.25 2.488q.123.012.25.012a2.5 2.5 0 1 0-.25-4.988A4.5 4.5 0 0 1 19 5.5a4.5 4.5 0 0 1-.75 2.488M8.435 13.25a1.25 1.25 0 0 0-.885.364l-2.05 2.05V19.5h5.627l5.803-1.45l3.532-1.508a.555.555 0 0 0-.416-1.022l-.02.005L13.614 17H10v-2h3.125a.875.875 0 1 0 0-1.75zm7.552 1.152l3.552-.817a2.56 2.56 0 0 1 3.211 2.47a2.56 2.56 0 0 1-1.414 2.287l-.027.014l-3.74 1.595l-6.196 1.549H0v-7.25h4.086l2.052-2.052a3.25 3.25 0 0 1 2.3-.948h.002h-.002h4.687a2.875 2.875 0 0 1 2.862 3.152M3.5 16.25H2v3.25h1.5z" />
                        </svg>
                    </div>

                    {{-- Containt --}}
                    <div class="flex m-4 flex-col">
                        <span class="font-semibold uppercase">Jumlah Transaksi Belum Bayar</span>
                        <span class="text-2xl font-bold">{{ $tidak_terbayar }}</span>
                    </div>
                </div>
                {{-- Card Jumlah Transaksi Belum Bayar --}}

                {{-- Card Transaksi Terbaru --}}
                <p class="text-md mx-5 font-bold uppercase">Transaksi Terbaru</p>
                <div class="flex flex-col gap-5 bg-white p-5 mx-5 h-[32rem] shadow-lg shadow-gray-300 rounded-lg">
                    <div class="relative overflow-x-auto">
                        <table
                            class="w-full text-sm text-left rtl:text-right text-gray-800 dark:text-gray-400 border-solid">
                            <thead class="text-md text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-white">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center">
                                            Kategori
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center">
                                            Tarif Harga
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center">
                                            Status
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($semuaTransaksi as $item)
                                    <tr
                                        class="bg-white border-b dark:bg-gray-700 dark:border-gray-700 dark:hover:bg-gray-400">
                                        <td class="px-6 py-4 dark:text-white">
                                            {{ $item['kategori'] }}
                                        </td>
                                        <td class="px-6 py-4 dark:text-white">
                                            Rp. {{ number_format($item['nominal'], 0, ',', '.') }}
                                        </td>
                                        <td class="px-6 py-4 dark:text-white">
                                            {{ $item['status'] }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{-- Card Transaksi Terbaru --}}

            </div>
        </div>

    </div>
@endsection

@section('head')
    {{-- <style>
        div {
            border: 1px;
            border-style: solid;
        }
    </style> --}}
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <script>
        const options = {
            rid: {
                show: true,
                strokeDashArray: 4,
                padding: {
                    left: 2,
                    right: 2,
                    top: -26
                },
            },
            series: @json($chart['date']),
            chart: {
                height: "100%",
                maxWidth: "100%",
                type: "area",
                fontFamily: "Inter, sans-serif",
                dropShadow: {
                    enabled: false,
                },
                toolbar: {
                    show: false,
                },
            },
            tooltip: {
                enabled: true,
                x: {
                    show: false,
                },
            },
            legend: {
                show: true
            },
            fill: {
                type: "gradient",
                gradient: {
                    opacityFrom: 0.55,
                    opacityTo: 0,
                    shade: "#1C64F2",
                    gradientToColors: ["#1C64F2"],
                },
            },
            dataLabels: {
                enabled: false,
            },
            stroke: {
                width: 6,
            },
            xaxis: {
                categories: @json($chart['categories']),
                labels: {
                    show: false,
                },
                axisBorder: {
                    show: false,
                },
                axisTicks: {
                    show: false,
                },
            },
            yaxis: {
                show: false,
                labels: {
                    formatter: function(value) {
                        return 'Rp' + value;
                    }
                }
            },
        }
        if (document.getElementById("grid-chart") && typeof ApexCharts !== 'undefined') {
            var chart = new ApexCharts(document.getElementById("grid-chart"), options);
            chart.render();
        }
    </script>
@endsection
