@extends('layouts-admin.main')

@section('content')
    <div class="uppercase text-lg font-bold m-4 dark:text-white h-full">
        Table {{ $title }}
    </div>
    <!-- TABLE START -->
    <x-inner-layout>

        <div class="flex flex-col md:flex-row justify-between gap-5 mb-5">
            <!-- SEARCH START-->
            <form class="w-full md:w-1/2 lg:w-1/2">
                @csrf
                <label for="default-search"
                    class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="search" id="default-search"
                        class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-200 dark:placeholder-white dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Search disini..." required />
                    <button type="submit"
                        class="text-white absolute end-2.5 bottom-2.5 bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-blue-800">Search</button>
                </div>
            </form>
            <!-- SEARCH END-->
        </div>


        <div class="flex gap-3">
            <button id="export" onclick="ExportToExcel('tabel-laporan','xlsx')"
                class="p-2 mb-2 bg-black text-white rounded-md text-sm">Export
                Excel</button>
            <form>
                <input type="text" class="hidden" name="pdf" value="1">
                <button class="p-2 mb-2 bg-black text-white rounded-md text-sm">PDF</button>
            </form>
        </div>
        <div class="relative overflow-x-auto sm:rounded-lg">
            @session('successTable')
                <x-alert-success>
                    {{ $value }}
                </x-alert-success>
            @endsession
            <table id="tabel-laporan"
                class="w-full text-sm text-left rtl:text-right text-gray-800 dark:text-gray-400 border-solid">
                <thead class="text-md text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-white">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Pemesan
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Nama Layanan
                                <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                    </svg></a>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Satuan
                                <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                    </svg>
                                </a>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Tarif Harga
                                <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                    </svg>
                                </a>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Tanggal Sewa
                                <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                    </svg>
                                </a>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Tanggal Pelaksanaan
                                <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                    </svg>
                                </a>
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($transaksiLayanan as $row)
                        <tr class="bg-white border-b dark:bg-gray-700 dark:border-gray-700 dark:hover:bg-gray-400">
                            <td class="px-6 py-4 dark:text-white">
                                {{ $row->user->profile->nama_lengkap }}
                            </td>
                            <td class="px-6 py-4 dark:text-white">
                                {{ $row->layanans[0]->l_nama }}
                            </td>
                            <td class="px-6 py-4 dark:text-white">
                                {{ $row->layanans[0]->l_satuan }}
                            </td>
                            <td class="px-6 py-4 dark:text-white">
                                Rp. {{ number_format($row->layanans[0]->l_tarif, 0, ',', '.') }}
                            </td>
                            <td class="px-6 py-4 dark:text-white">
                                {{ $row->tl_tanggal_sewa }}
                            </td>
                            <td class="px-6 py-4 dark:text-white">
                                {{ date('d-m-Y', strtotime($row->tl_tanggal_pelaksanaan)) }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="px-6 py-4 text-center">
                                Data Tidak Ada
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            {{ $transaksiLayanan->links() }}
        </div>

    </x-inner-layout>
@endsection


@section('head')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.css" />
@endsection

@section('script')
    <script src="{{ asset('js/feature/dp-field-toggle.js') }}"></script>
    <script>
        function ExportToExcel(id, type, fn, dl) {
            var elt = document.getElementById(id);
            var wb = XLSX.utils.table_to_book(elt, {
                sheet: "sheet1"
            });
            return dl ?
                XLSX.write(wb, {
                    bookType: type,
                    bookSST: true,
                    type: 'base64'
                }) :


                XLSX.writeFile(wb, fn || ('LAPORAN_TRANSKASI_LAYANAN_' + Date.now() + '.' + (type ||
                    'xlsx')));
        }
    </script>
@endsection