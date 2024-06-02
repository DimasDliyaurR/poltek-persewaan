<x-inner-layout>

    <div class="flex flex-col md:flex-row justify-between gap-5 mb-5">
        <!-- SEARCH START-->
        <div class="flex flex-col content-center items-center md:flex-row gap-5 mb-5 w-full">

            <!-- SEARCH START-->
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
                    <form wire:submit="searchTrigger">
                        <input type="search" wire:model="searchInput" id="default-search"
                            class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-200 dark:placeholder-white dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Search disini.." />
                        <button
                            class="text-white absolute end-2.5 bottom-2.5 bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-blue-800">Search</button>
                    </form>
                </div>
            </div>

            <div wire:loading
                class="left-[59%] top-[12.5rem] h-1/2 w-auto rounded-lg dark:bg-gray-800 dark:border-gray-700">
                <div role="status">
                    <svg aria-hidden="true" class="w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600"
                        viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                            fill="currentColor" />
                        <path
                            d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                            fill="currentFill" />
                    </svg>
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
            <!-- SEARCH END-->
        </div>
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
                        <span class="sr-only">No</span>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Pemesan
                        <button x-on:click="$wire.set('order', 'profiles.nama_lengkap')">
                            @if ($orderAction == 0 or $order != '' and $order != 'profiles.nama_lengkap')
                                <svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                </svg>
                            @endif

                            @if ($order == 'profiles.nama_lengkap')
                                {{-- DESCENDING ICON --}}
                                @if ($orderAction == 2)
                                    <svg class="ml-1" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 16 16">
                                        <path fill="currentColor" fill-rule="evenodd"
                                            d="M2.22 13.28a.75.75 0 0 0 1.06 0l2-2a.75.75 0 1 0-1.06-1.06l-.72.72V3.25a.75.75 0 0 0-1.5 0v7.69l-.72-.72a.75.75 0 1 0-1.06 1.06zM7.75 12a.75.75 0 0 0 0 1.5h7.5a.75.75 0 0 0 0-1.5zm0-3.25a.75.75 0 0 1 0-1.5h5.5a.75.75 0 0 1 0 1.5zm0-4.75a.75.75 0 0 1 0-1.5h2.5a.75.75 0 0 1 0 1.5z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    {{-- ASCENDING ICON --}}
                                @elseif($orderAction == 1)
                                    <svg class="ml-1" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 16 16">
                                        <path fill="currentColor" fill-rule="evenodd"
                                            d="M2.22 2.72a.75.75 0 0 1 1.06 0l2 2a.75.75 0 0 1-1.06 1.06l-.72-.72v7.69a.75.75 0 0 1-1.5 0V5.06l-.72.72A.75.75 0 0 1 .22 4.72zM7 12.75c0 .414.336.75.75.75h7.5a.75.75 0 0 0 0-1.5h-7.5a.75.75 0 0 0-.75.75m.75-4a.75.75 0 0 1 0-1.5h5.5a.75.75 0 0 1 0 1.5zm0-4.75a.75.75 0 0 1 0-1.5h2.5a.75.75 0 0 1 0 1.5z"
                                            clip-rule="evenodd" />
                                    </svg>
                                @endif
                            @endif

                        </button>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Tanggal Sewa
                            <button x-on:click="$wire.set('order', 'transaksi_alat_barangs.created_at')">
                                @if ($orderAction == 0 or $order != '' and $order != 'transaksi_alat_barangs.created_at')
                                    <svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                    </svg>
                                @endif

                                @if ($order == 'transaksi_alat_barangs.created_at')
                                    {{-- DESCENDING ICON --}}
                                    @if ($orderAction == 2)
                                        <svg class="ml-1" xmlns="http://www.w3.org/2000/svg" width="1em"
                                            height="1em" viewBox="0 0 16 16">
                                            <path fill="currentColor" fill-rule="evenodd"
                                                d="M2.22 13.28a.75.75 0 0 0 1.06 0l2-2a.75.75 0 1 0-1.06-1.06l-.72.72V3.25a.75.75 0 0 0-1.5 0v7.69l-.72-.72a.75.75 0 1 0-1.06 1.06zM7.75 12a.75.75 0 0 0 0 1.5h7.5a.75.75 0 0 0 0-1.5zm0-3.25a.75.75 0 0 1 0-1.5h5.5a.75.75 0 0 1 0 1.5zm0-4.75a.75.75 0 0 1 0-1.5h2.5a.75.75 0 0 1 0 1.5z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        {{-- ASCENDING ICON --}}
                                    @elseif($orderAction == 1)
                                        <svg class="ml-1" xmlns="http://www.w3.org/2000/svg" width="1em"
                                            height="1em" viewBox="0 0 16 16">
                                            <path fill="currentColor" fill-rule="evenodd"
                                                d="M2.22 2.72a.75.75 0 0 1 1.06 0l2 2a.75.75 0 0 1-1.06 1.06l-.72-.72v7.69a.75.75 0 0 1-1.5 0V5.06l-.72.72A.75.75 0 0 1 .22 4.72zM7 12.75c0 .414.336.75.75.75h7.5a.75.75 0 0 0 0-1.5h-7.5a.75.75 0 0 0-.75.75m.75-4a.75.75 0 0 1 0-1.5h5.5a.75.75 0 0 1 0 1.5zm0-4.75a.75.75 0 0 1 0-1.5h2.5a.75.75 0 0 1 0 1.5z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    @endif
                                @endif

                            </button>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Tanggal Pesanan
                            <button x-on:click="$wire.set('order', 'tab_tanggal_pesanan')">
                                @if ($orderAction == 0 or $order != '' and $order != 'tab_tanggal_pesanan')
                                    <svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                    </svg>
                                @endif

                                @if ($order == 'tab_tanggal_pesanan')
                                    {{-- DESCENDING ICON --}}
                                    @if ($orderAction == 2)
                                        <svg class="ml-1" xmlns="http://www.w3.org/2000/svg" width="1em"
                                            height="1em" viewBox="0 0 16 16">
                                            <path fill="currentColor" fill-rule="evenodd"
                                                d="M2.22 13.28a.75.75 0 0 0 1.06 0l2-2a.75.75 0 1 0-1.06-1.06l-.72.72V3.25a.75.75 0 0 0-1.5 0v7.69l-.72-.72a.75.75 0 1 0-1.06 1.06zM7.75 12a.75.75 0 0 0 0 1.5h7.5a.75.75 0 0 0 0-1.5zm0-3.25a.75.75 0 0 1 0-1.5h5.5a.75.75 0 0 1 0 1.5zm0-4.75a.75.75 0 0 1 0-1.5h2.5a.75.75 0 0 1 0 1.5z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        {{-- ASCENDING ICON --}}
                                    @elseif($orderAction == 1)
                                        <svg class="ml-1" xmlns="http://www.w3.org/2000/svg" width="1em"
                                            height="1em" viewBox="0 0 16 16">
                                            <path fill="currentColor" fill-rule="evenodd"
                                                d="M2.22 2.72a.75.75 0 0 1 1.06 0l2 2a.75.75 0 0 1-1.06 1.06l-.72-.72v7.69a.75.75 0 0 1-1.5 0V5.06l-.72.72A.75.75 0 0 1 .22 4.72zM7 12.75c0 .414.336.75.75.75h7.5a.75.75 0 0 0 0-1.5h-7.5a.75.75 0 0 0-.75.75m.75-4a.75.75 0 0 1 0-1.5h5.5a.75.75 0 0 1 0 1.5zm0-4.75a.75.75 0 0 1 0-1.5h2.5a.75.75 0 0 1 0 1.5z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    @endif
                                @endif

                            </button>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Tanggal Kembali
                            <button x-on:click="$wire.set('order', 'tab_tanggal_kembali')">
                                @if ($orderAction == 0 or $order != '' and $order != 'tab_tanggal_kembali')
                                    <svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                    </svg>
                                @endif

                                @if ($order == 'tab_tanggal_kembali')
                                    {{-- DESCENDING ICON --}}
                                    @if ($orderAction == 2)
                                        <svg class="ml-1" xmlns="http://www.w3.org/2000/svg" width="1em"
                                            height="1em" viewBox="0 0 16 16">
                                            <path fill="currentColor" fill-rule="evenodd"
                                                d="M2.22 13.28a.75.75 0 0 0 1.06 0l2-2a.75.75 0 1 0-1.06-1.06l-.72.72V3.25a.75.75 0 0 0-1.5 0v7.69l-.72-.72a.75.75 0 1 0-1.06 1.06zM7.75 12a.75.75 0 0 0 0 1.5h7.5a.75.75 0 0 0 0-1.5zm0-3.25a.75.75 0 0 1 0-1.5h5.5a.75.75 0 0 1 0 1.5zm0-4.75a.75.75 0 0 1 0-1.5h2.5a.75.75 0 0 1 0 1.5z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        {{-- ASCENDING ICON --}}
                                    @elseif($orderAction == 1)
                                        <svg class="ml-1" xmlns="http://www.w3.org/2000/svg" width="1em"
                                            height="1em" viewBox="0 0 16 16">
                                            <path fill="currentColor" fill-rule="evenodd"
                                                d="M2.22 2.72a.75.75 0 0 1 1.06 0l2 2a.75.75 0 0 1-1.06 1.06l-.72-.72v7.69a.75.75 0 0 1-1.5 0V5.06l-.72.72A.75.75 0 0 1 .22 4.72zM7 12.75c0 .414.336.75.75.75h7.5a.75.75 0 0 0 0-1.5h-7.5a.75.75 0 0 0-.75.75m.75-4a.75.75 0 0 1 0-1.5h5.5a.75.75 0 0 1 0 1.5zm0-4.75a.75.75 0 0 1 0-1.5h2.5a.75.75 0 0 1 0 1.5z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    @endif
                                @endif

                            </button>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Sub Total
                            <button x-on:click="$wire.set('order', 'tab_sub_total')">
                                @if ($orderAction == 0 or $order != '' and $order != 'tab_sub_total')
                                    <svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                    </svg>
                                @endif

                                @if ($order == 'tab_sub_total')
                                    {{-- DESCENDING ICON --}}
                                    @if ($orderAction == 2)
                                        <svg class="ml-1" xmlns="http://www.w3.org/2000/svg" width="1em"
                                            height="1em" viewBox="0 0 16 16">
                                            <path fill="currentColor" fill-rule="evenodd"
                                                d="M2.22 13.28a.75.75 0 0 0 1.06 0l2-2a.75.75 0 1 0-1.06-1.06l-.72.72V3.25a.75.75 0 0 0-1.5 0v7.69l-.72-.72a.75.75 0 1 0-1.06 1.06zM7.75 12a.75.75 0 0 0 0 1.5h7.5a.75.75 0 0 0 0-1.5zm0-3.25a.75.75 0 0 1 0-1.5h5.5a.75.75 0 0 1 0 1.5zm0-4.75a.75.75 0 0 1 0-1.5h2.5a.75.75 0 0 1 0 1.5z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        {{-- ASCENDING ICON --}}
                                    @elseif($orderAction == 1)
                                        <svg class="ml-1" xmlns="http://www.w3.org/2000/svg" width="1em"
                                            height="1em" viewBox="0 0 16 16">
                                            <path fill="currentColor" fill-rule="evenodd"
                                                d="M2.22 2.72a.75.75 0 0 1 1.06 0l2 2a.75.75 0 0 1-1.06 1.06l-.72-.72v7.69a.75.75 0 0 1-1.5 0V5.06l-.72.72A.75.75 0 0 1 .22 4.72zM7 12.75c0 .414.336.75.75.75h7.5a.75.75 0 0 0 0-1.5h-7.5a.75.75 0 0 0-.75.75m.75-4a.75.75 0 0 1 0-1.5h5.5a.75.75 0 0 1 0 1.5zm0-4.75a.75.75 0 0 1 0-1.5h2.5a.75.75 0 0 1 0 1.5z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    @endif
                                @endif

                            </button>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Lihat Detail</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse($transaksiAlatBarang as $row)
                    <tr id="parent" onclick="toggleTable(this)" class="cursor-pointer"
                        class="bg-white border-b dark:bg-gray-700 dark:border-gray-700 dark:hover:bg-gray-400">
                        <td>
                            <span class="sr-only">{{ $loop->iteration }}</span>
                            <svg id="dropdown-up" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                viewBox="0 0 24 24">
                                <path fill="none" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2" d="m10 17l5-5m0 0l-5-5" />
                            </svg>
                            <svg id="dropdown-down" class="hidden" xmlns="http://www.w3.org/2000/svg" width="1em"
                                height="1em" viewBox="0 0 24 24">
                                <path fill="none" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="1.5" d="m7 10l5 5l5-5" />
                            </svg>
                        </td>
                        <td class="px-6 py-4 dark:text-white">
                            {{ $row->nama_lengkap }}
                        </td>
                        <td class="px-6 py-4 dark:text-white">
                            {{ \Carbon\Carbon::parse(date('Y-m-d', strtotime($row->created_at)))->isoFormat('D MMMM Y') }}
                        </td>
                        <td class="px-6 py-4 dark:text-white">
                            {{ \Carbon\Carbon::parse(date('Y-m-d', strtotime($row->tab_tanggal_pesanan)))->isoFormat('D MMMM Y') }}
                        </td>
                        <td class="px-6 py-4 dark:text-white">
                            {{ \Carbon\Carbon::parse(date('Y-m-d', strtotime($row->tab_tanggal_kembali)))->isoFormat('D MMMM Y') }}
                        </td>
                        <td class="px-6 py-4 dark:text-white">
                            Rp. {{ number_format($row->tab_sub_total, 0, ',', '.') }}
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="{{ route('laporan.alat-barang.show', $row->id) }}"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Lihat
                                Detail</a>
                        </td>
                    </tr>
                    <tr class="hidden transition-all duration-300">
                        <td colspan="8" class="px-[4.5rem] py-3 border-b-2 border-gray-200 bg-gray-50">
                            <div>
                                <ul class="flex gap-x-32">
                                    @foreach ($row->alatBarangs as $alatBarang)
                                        <li>{{ $alatBarang->ab_nama }}</li>
                                        <li>Rp.
                                            {{ number_format($alatBarang->ab_tarif, 0, ',', '.') }}
                                        </li>
                                        <li>Metode Pembayaran
                                            ({{ $alatBarang->paymentMethod->is_dp ? 'DP' : 'LUNAS' }})
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="px-6 py-4 text-center">
                            Data Tidak Ada
                        </td>
                    </tr>
                @endforelse
                <tr class="border-t-2">
                    <td colspan="4" class="px-6 py-4 text-left">
                        Sub Total (Belum Bayar)
                    </td>
                    <td colspan="4" class="px-6 py-4 text-left">
                        Rp. {{ number_format($totalTransaksiBelumBayar, 0, ',', '.') }}
                    </td>
                </tr>
                <tr class="border-t-2">
                    <td colspan="4" class="px-6 py-4 text-left">
                        Sub Total (Sudah Bayar)
                    </td>
                    <td colspan="4" class="px-6 py-4 text-left">
                        Rp. {{ number_format($totalTransaksiSudahBayar, 0, ',', '.') }}
                    </td>
                </tr>
            </tbody>
        </table>

        {{ $transaksiAlatBarang->links() }}
    </div>

</x-inner-layout>
