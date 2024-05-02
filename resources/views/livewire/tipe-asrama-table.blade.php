<div>
    <div class="flex flex-col content-center items-center md:flex-row gap-5 mb-5">

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
                        placeholder="Search Nama Ruangan , Tarif harga disini.." />
                    <button
                        class="text-white absolute end-2.5 bottom-2.5 bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-blue-800">Search</button>
                </form>
            </div>
        </div>

        {{-- Restore Start --}}
        <a href="{{ asset('admin/tipeAsramas?trashed=1') }}"
            class="text-white bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-xl text-sm p-2 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
            <svg xmlns="http://www.w3.org/2000/svg" class="text-4xl" width="1em" height="1em" viewBox="0 0 24 24">
                <path fill="currentColor"
                    d="M13 3a9 9 0 0 0-9 9H1l3.89 3.89l.07.14L9 12H6c0-3.87 3.13-7 7-7s7 3.13 7 7s-3.13 7-7 7c-1.93 0-3.68-.79-4.94-2.06l-1.42 1.42A8.954 8.954 0 0 0 13 21a9 9 0 0 0 0-18m-1 5v5l4.28 2.54l.72-1.21l-3.5-2.08V8z" />
            </svg>
        </a>
        {{-- Restore End --}}

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


    <div class="relative overflow-x-auto sm:rounded-lg">
        @session('successTable')
            <x-alert-success>
                {{ $value }}
            </x-alert-success>
        @endsession
        <table class="w-full text-sm text-left rtl:text-right text-gray-800 dark:text-gray-400 border-solid">
            <thead class="text-md text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-white">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Nama Ruangan
                            <button x-on:click="$wire.set('order', 'ta_nama')">
                                @if ($orderAction == 0 or $order != '' and $order != 'ta_nama')
                                    <svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                    </svg>
                                @endif



                                @if ($order == 'ta_nama')
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
                            Tarif Harga
                            <button x-on:click="$wire.set('order', 'ta_tarif')">
                                @if ($orderAction == 0 or $order != '' and $order != 'ta_tarif')
                                    <svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                    </svg>
                                @endif

                                @if ($order == 'ta_tarif')
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
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Foto Ruangan
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Lihat Detail</span>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Tambah Properti</span>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Edit</span>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">hapus</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse($tipeAsramas as $row)
                    <tr class="bg-white border-b dark:bg-gray-700 dark:border-gray-700 dark:hover:bg-gray-400">

                        <td class="px-6 py-4 dark:text-white">
                            {{ $row->ta_nama }}
                        </td>
                        </th>
                        <td class="px-6 py-4 dark:text-white">
                            Rp. {{ number_format($row->ta_tarif, 0, ',', '.') }}
                        </td>
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <img src="{{ Storage::url($row->ta_foto) }}" alt="Foto Asrama"
                                class="h-72 max-w-xl rounded-lg shadow-xl dark:shadow-gray-800">
                        </th>
                        <td class="px-6 py-4 text-right">
                            <a href="{{ asset('admin/tipeAsrama/store/' . $row->id) }}"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Lihat Detail</a>
                        </td>

                        <td class="px-6 py-4 text-right">
                            <a href="{{ asset('admin/tipeAsrama/show/' . $row->id) }}"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <x-delete-button action="admin/tipeAsrama/delete/{{ $row->id }}"
                                id="{{ $row->id }}" nama="{{ $row->ta_nama }}"></x-delete-button>
                        </td>
                        <td>
                            <x-button-dropdown-option-table target="dropdown-{{ $row->id }}" />

                            <!-- Dropdown menu -->
                            <x-dropdown-option-table id="dropdown-{{ $row->id }}"
                                class="z-10 hidden bg-white divide-y divide-gray-100 border-gray-400 border-2 rounded-lg w-auto text-left">
                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                    aria-labelledby="dropdownDefaultButton">
                                    <li>
                                        <a href="{{ route('detailFotoTipeAsrama.index', $row->id) }}"
                                            class="block px-4  hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Tambah
                                            Foto</a>
                                    </li>
                                    <li>
                                        <a href="{{ asset('admin/detailFasilitasAsrama/' . $row->id) }}"
                                            class="block px-4  hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Tambah
                                            Fasilitas</a>
                                    </li>
                                </ul>
                            </x-dropdown-option-table>
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

        {{ $tipeAsramas->links() }}
    </div>
</div>
