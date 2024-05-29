<div>

    <x-inner-layout>
        <div class="w-full flex flex-row justify-center items-center sm:text-left text-center">
            <div class="w-2/5 flex flex-row justify-end items-center mr-2 cursor-pointer rounded-md hover:bg-gray-100"
                wire:click="removeBulan">
                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="1.5" d="m15 5l-6 7l6 7" />
                </svg>
            </div>
            <span class="text-center font-normal mr-2 w-1/5">
                {{ $bulan }}</span>
            <div class="w-2/5 flex flex-row items-center ml-2 cursor-pointer rounded-md hover:bg-gray-100"
                wire:click="addBulan">
                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="1.5" d="m9 5l6 7l-6 7" />
                </svg>
            </div>
        </div>
    </x-inner-layout>

    <x-inner-layout>
        <x-title-component class="mb-4 flex flex-col sm:text-sm text-lg">

            Laporan Pemasukkan Bulan
        </x-title-component>
        <div class="flex flex-col sm:flex-row justify-between mb-5 sm:w-full">
            <form method="get">
                <select name="kategori"
                    class="block mb-5 ps-10 text-sm sm: w-full text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-200 dark:placeholder-white dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    onchange="this.form.submit()">
                    <option value="">All</option>
                    <option value="Asrama" {{ request('kategori') == 'Asrama' ? 'selected' : '' }}>Asrama</option>
                    <option value="GedungLap" {{ request('kategori') == 'GedungLap' ? 'selected' : '' }}>Gedung</option>
                    <option value="Layanan" {{ request('kategori') == 'Layanan' ? 'selected' : '' }}>Layanan</option>
                    <option value="Alat Barang" {{ request('kategori') == 'Alat Barang' ? 'selected' : '' }}>Alat Barang
                    </option>
                </select>
            </form>

            <div class="w-full md:w-1/2 lg:w-1/2">
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
                    <form>
                        <input type="search" id="search-pemasukkan" name="search" id="default-search"
                            class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-200 dark:placeholder-white dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Cari disini.." />
                    </form>
                </div>
            </div>
        </div>

        <div class="flex gap-3">
            <button id="export" onclick="ExportToExcel('tabel-laporan','xlsx')"
                class="p-2 mb-2 bg-black text-white rounded-md text-sm">Export
                Excel</button>
            <form>
                <input type="text" class="hidden" name="pdf" value="1">
                <input type="text" class="hidden" name="bulan" value="{{ $reqBulan }}">
                <button class="p-2 mb-2 bg-black text-white rounded-md text-sm">PDF</button>
            </form>
        </div>
        <div class="relative overflow-x-auto sm:rounded-lg">
            <table id="tabel-laporan"
                class="w-full text-sm text-left rtl:text-right text-gray-800 dark:text-gray-400 border-solid">
                <thead class="text-md text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-white">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Kategori
                        </th>

                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Metode Pembayaran
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Nama Customer
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Tanggal Sewa
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Nominal
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody id="tbody-pemasukkan">
                    @forelse ($laporanKeuangan as $item)
                        <tr class="bg-white border-b dark:bg-gray-700 dark:border-gray-700 dark:hover:bg-gray-400">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $item['kategori'] }}
                            </th>
                            <td class="px-6 py-4 dark:text-white">
                                {{ $item['metode'] }}
                            </td>
                            <td class="px-6 py-4 dark:text-white">
                                {{ $item['customer'] }}
                            </td>
                            <td class="px-6 py-4 dark:text-white">
                                {{ \Carbon\Carbon::parse($item['tanggal_sewa'])->isoFormat('D MMMM Y') }}
                            </td>
                            <td class="px-6 py-4 dark:text-white">
                                Rp. {{ number_format($item['nominal'], 0, ',', '.') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="px-6 py-4 text-center">
                                Data Tidak Ada
                            </td>
                        </tr>
                    @endforelse
                    @if ($sum > 0)
                        <tr>
                            <td colspan="3" class="px-6 py-4 text-center font-bold  uppercase">
                                Total
                            </td>
                            <td colspan="3" class="px-6 py-4 text-center font-bold ">
                                Rp. {{ number_format($sum, 0, ',', '.') }}
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>


    </x-inner-layout>
</div>
