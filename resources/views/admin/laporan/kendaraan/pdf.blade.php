<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Transaksi Kendaraan</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>

<body>
    <!-- TABLE START -->
    <x-inner-layout class="flex flex-col justify-center items-center">
        <h5 align="center" class="uppercase text-lg font-bold m-4 dark:text-white h-full">
            Tranasksi Kendaraan
        </h5>

        <div class="w-auto relative overflow-x-auto sm:rounded-lg">
            <table class="text-sm text-left rtl:text-right text-gray-800 dark:text-gray-400 border-solid"
                border="2">
                <thead class="text-md text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-white">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Pemesan
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Nama Kendaraan
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Seri Kendaraan
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
                                Tanggal Kembali
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($transaksiKendaraan as $row)
                        <tr class="bg-white border-b dark:bg-gray-700 dark:border-gray-700 dark:hover:bg-gray-400">
                            <td class="px-6 py-4 dark:text-white">
                                {{ $row->users->profile->nama_lengkap }}
                            </td>
                            <td class="px-6 py-4 dark:text-white">
                                {{ $row->kendaraans[0]->merkKendaraan->mk_merk }}
                            </td>
                            <td class="px-6 py-4 dark:text-white">
                                {{ $row->kendaraans[0]->merkKendaraan->mk_seri }}
                            </td>
                            <td class="px-6 py-4 dark:text-white">
                                Rp. {{ number_format($row->kendaraans[0]->merkKendaraan->mk_tarif, 0, ',', '.') }}
                            </td>
                            <td class="px-6 py-4 dark:text-white">
                                {{ \Carbon\Carbon::parse(date('Y-m-d', $row->tk_tanggal_sewa))->isoFormat('d MMMM Y') }}
                            </td>
                            <td class="px-6 py-4 dark:text-white">
                                {{ \Carbon\Carbon::parse($row->tk_tanggal_kembali)->isoFormat('d MMMM Y') }}
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

    </x-inner-layout>

    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>

</html>
