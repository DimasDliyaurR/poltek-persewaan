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
                    placeholder="Search disini..." />
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
                            Nama Alat Barang
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Tarif Harga
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Tanggal Sewa
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Tanggal Pesanan
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Tanggal Kembali
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse($transaksiGedungLap as $row)
                    <tr class="bg-white border-b dark:bg-gray-700 dark:border-gray-700 dark:hover:bg-gray-400">
                        <td class="px-6 py-4 dark:text-white">
                            {{ $row->user->profile->nama_lengkap }}
                        </td>
                        <td class="px-6 py-4 dark:text-white">
                            {{ $row->gedungLap[0]->gl_nama }}
                        </td>
                        <td class="px-6 py-4 dark:text-white">
                            Rp. {{ number_format($row->gedungLap[0]->gl_tarif, 0, ',', '.') }}
                        </td>
                        <td class="px-6 py-4 dark:text-white">
                            {{ $row->tg_tanggal_sewa }}
                        </td>
                        <td class="px-6 py-4 dark:text-white">
                            {{ date('d-m-Y', strtotime($row->tg_tanggal_pesanan)) }}
                        </td>
                        <td class="px-6 py-4 dark:text-white">
                            {{ date('d-m-Y', strtotime($row->tg_tanggal_kembali)) }}
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

        {{ $transaksiGedungLap->links() }}
    </div>

</x-inner-layout>