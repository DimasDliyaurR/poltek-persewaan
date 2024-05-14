@extends('layouts-admin.main')

@section('content')
    <x-title-component>
        Laporan
    </x-title-component>

    <x-inner-layout>

        <div class="flex flex-row">
            <form method="get">
                <select name="kategori" onchange="this.form.submit()">
                    <option value="">All</option>
                    <option value="Asrama" {{ request('kategori') == 'Asrama' ? 'selected' : '' }}>Asrama</option>
                    <option value="GedungLap" {{ request('kategori') == 'GedungLap' ? 'selected' : '' }}>Gedung</option>
                    <option value="Layanan" {{ request('kategori') == 'Layanan' ? 'selected' : '' }}>Layanan</option>
                    <option value="Alat Barang" {{ request('kategori') == 'Alat Barang' ? 'selected' : '' }}>Alat Barang
                    </option>
                </select>
            </form>
        </div>
        <table class="w-full text-sm text-left rtl:text-right text-gray-800 dark:text-gray-400 border-solid">
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
                            Tanggal Sewa
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Nominal
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Lihat Detail</span>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($laporanKeuangan as $item)
                    <tr class="bg-white border-b dark:bg-gray-700 dark:border-gray-700 dark:hover:bg-gray-400">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $item['kategori'] }}
                        </th>
                        <td class="px-6 py-4 dark:text-white">
                            {{ $item['metode'] }}
                        </td>
                        <td class="px-6 py-4 dark:text-white">
                            {{ $item['tanggal_sewa'] }}
                        </td>
                        <td class="px-6 py-4 dark:text-white">
                            Rp. {{ number_format($item['nominal'], 0, ',', '.') }}
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href=" asset('admin/kendaraan/show/' . $row->id) "
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <x-delete-button action="admin/kendaraan/delete/ $row->id " id=" $row->id "
                                nama=" $row->k_plat "></x-delete-button>
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
    </x-inner-layout>
@endsection

@section('script')
    <script src="{{ asset('js/feature/dp-field-toggle.js') }}"></script>
    <script></script>
@endsection
