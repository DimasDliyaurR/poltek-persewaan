<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Transaksi Pemasukan</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>

<body>
    <!-- TABLE START -->
    <x-inner-layout class="flex flex-col justify-center items-center">
        <h5 align="center" class="uppercase text-lg font-bold m-4 dark:text-white h-full">
            Tranasksi Pemasukan
        </h5>

        <div class="w-auto relative overflow-x-auto sm:rounded-lg">
            <table border="2" id="tabel-laporan"
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

    </x-inner-layout>

    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>

</html>
