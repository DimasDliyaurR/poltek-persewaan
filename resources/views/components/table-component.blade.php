<div>
    <table class="w-full text-sm text-left rtl:text-right text-gray-800 dark:text-gray-400 border-solid">
        <thead class="text-md text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-white">
            @if (count($data) < 0)
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nama Merek
                    </th>

                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Plat Nomor
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Nama Seri
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Status
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Lihat Detail</span>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
            @else
                <tr>
                    @for ($i = 0; $i < count($data); $i++)
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                {{ $data[$i] }}
                            </div>
                        </th>
                    @endfor
                </tr>
            @endif
        </thead>
        <tbody>
            <tr class="bg-white border-b dark:bg-gray-700 dark:border-gray-700 dark:hover:bg-gray-400">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $row->merkKendaraan->mk_merk }}
                </th>
                <td class="px-6 py-4 dark:text-white">
                    {{ $row->merkKendaraan->mk_seri }}
                </td>
                <td class="px-6 py-4 dark:text-white">
                    {{ $row->k_plat }}
                </td>
                <td class="px-6 py-4 dark:text-white">
                    {{ $row->k_status }}
                </td>
                <td class="px-6 py-4 text-right">
                    <a href="{{ asset('admin/kendaraan/show/' . $row->id) }}"
                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                </td>
                <td class="px-6 py-4 text-right">
                    <x-delete-button action="admin/kendaraan/delete/{{ $row->id }}" id="{{ $row->id }}"
                        nama="{{ $row->k_plat }}"></x-delete-button>
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
    </div>
