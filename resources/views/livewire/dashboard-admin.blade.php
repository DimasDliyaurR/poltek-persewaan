<div class="flex flex-col gap-5">
    <x-layout-detail-transaksi class="text-center">
        <x-title-component>
            Dashboard Utama Persewaan
        </x-title-component>
    </x-layout-detail-transaksi>

    <x-layout-detail-transaksi>
        <x-title-component>
            Workflow Transaksi User
        </x-title-component>

        <div class="relative overflow-x-auto sm:rounded-lg mt-4">
            <table id="tabel-laporan"
                class="w-full text-sm text-left rtl:text-right text-gray-800 dark:text-gray-400 border-solid">
                <thead class="text-md text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-white">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Username
                        </th>

                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Role
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                ID Transaksi
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Kategori
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Status
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Tanggal Pembayaran
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody id="tbody-pemasukkan">
                    @foreach ($transaksi as $item)
                        <tr class="bg-white border-b dark:bg-gray-700 dark:border-gray-700 dark:hover:bg-gray-400">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $item['username'] }}
                            </th>
                            <td class="px-6 py-4 dark:text-white">
                                {{ $item['role'] }}
                            </td>
                            <td class="px-6 py-4 dark:text-white">

                                @switch($item["kategori"])
                                    @case('Asrama')
                                        <a class="text-blue-500 hover:underline"
                                            href="{{ route('laporan.asrama.show', $item['id']) }}">{{ $item['code_unique'] }}</a>
                                    @break

                                    @case('Kendaraan')
                                        <a class="text-blue-500 hover:underline"
                                            href="{{ route('laporan.kendaraan.show', $item['id']) }}">{{ $item['code_unique'] }}</a>
                                    @break

                                    @case('GedungLap')
                                        <a class="text-blue-500 hover:underline"
                                            href="{{ route('laporan.gedung-lap.show', $item['id']) }}">{{ $item['code_unique'] }}</a>
                                    @break

                                    @case('Layanan')
                                        <a class="text-blue-500 hover:underline"
                                            href="{{ route('laporan.layanan.show', $item['id']) }}">{{ $item['code_unique'] }}</a>
                                    @break

                                    @case('Alat Barang')
                                        <a class="text-blue-500 hover:underline"
                                            href="{{ route('laporan.alat-barang.show', $item['id']) }}">{{ $item['code_unique'] }}</a>
                                    @break
                                @endswitch
                            </td>
                            <td class="px-6 py-4 dark:text-white">
                                {{ $item['kategori'] }}
                            </td>
                            <td class="px-6 py-4 dark:text-white">
                                {{ $item['status'] }}
                            </td>
                            <td class="px-6 py-4 dark:text-white">
                                {{ \Carbon\Carbon::parse($item['tanggal_pembayaran'])->isoFormat('D MMMM Y') }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <nav aria-label="Page navigation example" class="mt-2">
                <ul class="flex items-center justify-center -space-x-px h-8 text-sm">
                    <li class="order-1">
                        <button @if ($next != 1) wire:click="previousStep" @endif
                            class=" @if ($next == 1) cursor-not-allowed text-gray-200 @endif flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            <span class="sr-only">Previous</span>
                            <svg class="w-2.5 h-2.5 rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M5 1 1 5l4 4" />
                            </svg>
                        </button>
                    </li>
                    <li
                        class="
                        @if ($next == 1) order-1 @else @if (count($transaksi) < $batas)order-5 @else order-2 @endif @endif">
                        <button aria-current="page"
                            class="z-10 flex items-center justify-center px-3 h-8 leading-tight text-blue-600 border border-blue-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">{{ $next }}</button>
                    </li>
                    <li class="order-4">
                        <button
                            @if (count($transaksi) < $batas) wire:click="previousStep" @else wire:click="nextStep" @endif
                            class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">{{ count($transaksi) < $batas ? ($next - 1 == 0 ? '...' : $next - 1) : $next + $next + 1 }}</button>
                    </li>
                    <li class="order-5">
                        <button wire:click="nextStep"
                            class="@if (count($transaksi) < $batas) cursor-not-allowed text-gray-200 @endif flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            <span class="sr-only">Next</span>
                            <svg class="w-2.5 h-2.5 rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 9 4-4-4-4" />
                            </svg>
                        </button>
                    </li>
                </ul>
            </nav>
        </div>

    </x-layout-detail-transaksi>


    <div class="flex sm:flex-row flex-col w-full gap-5">
        <x-layout-detail-transaksi class="sm:w-2/3 w-full">
            <div class="flex items-center justify-center">
                {{-- Previouse Step --}}
                <div class="w-1/12 flex items-center mr-5">
                    <div class="w-full text-right">
                        <button class="p-3" id="previousStep">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="text-center font-bold text-black text-2xl uppercase">
                    Laporan Tahun <span id="year">{{ $year }}</span>
                </div>

                {{-- Next Step --}}
                <div class="w-1/12 flex items-center ">
                    <div class="w-full">
                        <button class="p-3" id="nextStep">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <div class="w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
                <div class="flex justify-between mb-5">
                    <div>
                        <h5 class="leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2">Rp.
                            {{ number_format($sum, 0, ',', '.') }}</h5>
                        <p class="text-base font-normal text-gray-500 dark:text-gray-400">Total Transaksi</p>
                    </div>
                </div>
                <div id="grid-chart"></div>
                <div
                    class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between mt-5">
                    <div class="flex justify-between items-center pt-5">
                    </div>
                </div>
            </div>

        </x-layout-detail-transaksi>
        <x-layout-detail-transaksi class="sm:w-1/3 w-full h-[16rem]">
            <div class="flex flex-col gap-2">
                <div class="flex flex-col items-center p-2 border-b-2 border-gray-200">
                    <span class="text-2xl font-bold">Rp. {{ number_format($sum, 0, ',', '.') }}</span>
                    <span class="text-sm">Total Transaksi</span>
                </div>
                <div class="flex flex-col items-center p-2 border-b-2 border-gray-200">
                    <span class="text-2xl font-bold">{{ count($transaksiSudahBayar) }}</span>
                    <span class="text-sm">Transaksi Terbayar</span>
                </div>
                <div class="flex flex-col items-center p-2">
                    <span class="text-4xl font-bold">{{ count($transaksiBelumBayar) }}</span>
                    <span class="text-sm">Transaksi Belum Lunas</span>
                </div>
            </div>
        </x-layout-detail-transaksi>
    </div>
</div>
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const date = new Date()
            var tahun = date.getFullYear()
            var tahunTitle = document.getElementById("year")

            let next = document.getElementById("nextStep")
            let previous = document.getElementById("previousStep")

            const options = {
                // set grid lines to improve the readability of the chart, learn more here: https://apexcharts.com/docs/grid/
                grid: {
                    show: true,
                    strokeDashArray: 4,
                    padding: {
                        left: 2,
                        right: 2,
                        top: -26
                    },
                },
                series: @json($transaksi_laporan['date']),
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
                    categories: @json($transaksi_laporan['categories']),
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

            const fetchDataUpdate = async (tahun) => {

                const response = await fetch("http://localhost:8000/api/transaksi/" + tahun)
                const data = await response.json()
                tahunTitle.innerHTML = tahun

                const options = {
                    grid: {
                        show: true,
                        strokeDashArray: 4,
                        padding: {
                            left: 2,
                            right: 2,
                            top: -26
                        },
                    },
                    series: data.date,
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
                        categories: data.categories,
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
                if (document.getElementById("grid-chart") && typeof ApexCharts !==
                    'undefined') {
                    chart.updateSeries(data.date)
                    // chart.updateOption(data.date)
                }
            }

            next.addEventListener("click", () => {
                tahun += 1;
                fetchDataUpdate(tahun)
            })

            previous.addEventListener("click", () => {
                tahun -= 1;
                fetchDataUpdate(tahun)
            })

        });
    </script>
@endsection
