@extends('layouts-admin.main')

@section('content')
    <x-title-component>
        {{ $title }}
    </x-title-component>

    <x-inner-layout>
        @session('successTable')
            <x-alert-success>
                {{ $value }}
            </x-alert-success>
        @endsession
        @session('errorTable')
            <x-alert-success>
                {{ $value }}
            </x-alert-success>
        @endsession
        <table class="w-full text-sm text-left rtl:text-right text-gray-800 dark:text-gray-400 border-solid">
            <thead class="text-md text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-white">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Penyewa
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Tipe Asrama
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Tanggal sewa
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Check In
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Check Out
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Lihat Detail</span>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Reschedule</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse($transaksi as $row)
                    <tr class="bg-white border-b dark:bg-gray-700 dark:border-gray-700 dark:hover:bg-gray-400">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $row->user->profile->nama_lengkap }}
                        </th>
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $row->asramas[0]->tipeAsrama->ta_nama }}
                        </td>
                        <td class="px-6 py-4 dark:text-white">
                            {{ \Carbon\Carbon::parse($row->tanggal_transaksi)->isoFormat('D MMMM Y') }}
                        </td>
                        <td class="px-6 py-4 dark:text-white">
                            {{ \Carbon\Carbon::parse($row->ta_check_in)->isoFormat('D MMMM Y') }}
                        </td>
                        <td class="px-6 py-4 dark:text-white">
                            {{ \Carbon\Carbon::parse($row->ta_check_out)->isoFormat('D MMMM Y') }}
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="{{ route('daftar-penyewa.detail', $row->id) }}"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Detail</a>
                        </td>
                        <td class="px-6 py-4 text-right">
                            @if ($row->asramas[0]->a_status == 'tidak tersedia')
                                <a href="{{ route('daftar-penyewa.penyewa', $row->asramas[0]->id) }}"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Rechedule</a>
                            @endif
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

        {{ $transaksi->links() }}
    </x-inner-layout>
@endsection
