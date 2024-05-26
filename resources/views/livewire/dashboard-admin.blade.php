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
                                flow
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
                                {{ $item['id'] }}
                            </td>
                            <td class="px-6 py-4 dark:text-white">
                                {{ $item['kategori'] }}
                            </td>
                            <td class="px-6 py-4 dark:text-white">
                                {{ $item['status'] }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <nav aria-label="Page navigation example" class="mt-2">
                <ul class="flex items-center justify-center -space-x-px h-8 text-sm">
                    <li class="order-1">
                        <button wire:click="previousStep"
                            class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
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
                        @if ($next == 1) order-1
                        @else 
                        
                        @if (count($transaksi) < $batas)
                        order-5 @endif
                    @endif">
                        <button aria-current="page"
                            class="z-10 flex items-center justify-center px-3 h-8 leading-tight text-blue-600 border border-blue-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">{{ $next }}</button>
                    </li>
                    <li class="order-4">
                        <button
                            class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">{{ count($transaksi) < $batas ? $next - 1 : $next + 1 }}</button>
                    </li>
                    <li class="order-5">
                        <button wire:click="nextStep"
                            class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
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

    <div class="flex">
        <x-layout-detail-transaksi class="w-2/3 m-5">

            <div class="w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
                <div class="flex justify-between mb-5">
                    <div>
                        <h5 class="leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2">Rp.
                            {{ number_format($sum, 0, ',', '.') }}</h5>
                        <p class="text-base font-normal text-gray-500 dark:text-gray-400">Total Transaksi</p>
                    </div>
                    <div
                        class="flex items-center px-2.5 py-0.5 text-base font-semibold text-green-500 dark:text-green-500 text-center">
                        23%
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
        <x-layout-detail-transaksi class="w-1/3 h-[15rem] m-5">
            <div class="flex flex-col gap-2">
                <div class="flex flex-col items-center p-2 border-b-2 border-gray-200">
                    <span class="text-2xl font-bold">Rp. {{ number_format($sum, 0, ',', '.') }}</span>
                    <span class="text-sm">Total Transaksi</span>
                </div>
                <div class="flex flex-col items-center p-2">
                    <span class="text-4xl font-bold">{{ count($transaksi_semua) }}</span>
                    <span class="text-sm">Transaksi Belum Lunas</span>
                </div>
            </div>
        </x-layout-detail-transaksi>
    </div>
</div>

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        fetch("http://localhost:8000/api/transaksi")
            .then(res => res.json())
            .then((data) => {
                let dataArray = [{
                        name: "Developer Edition",
                        data: [1500, 1418, 1456, 1526, 0, 1256],
                        color: "#1A56DB",
                    },
                    {
                        name: "Designer Edition",
                        data: [643, 413, 765, 412, 1423, 1731],
                        color: "#7E3BF2",
                    },
                ]

                console.log(dataArray, data.date);
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
                if (document.getElementById("grid-chart") && typeof ApexCharts !== 'undefined') {
                    const chart = new ApexCharts(document.getElementById("grid-chart"), options);
                    chart.render();
                }
            })
    </script>
@endsection
