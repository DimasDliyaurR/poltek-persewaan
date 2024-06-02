<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Transaksi Layanan</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>

<body>
    <!-- TABLE START -->
    <x-inner-layout class="flex flex-col justify-center items-center">
        <h5 align="center" class="uppercase text-lg font-bold m-4 dark:text-white h-full">
            Tranasksi Layanan
        </h5>

        <div class="w-auto relative overflow-x-auto sm:rounded-lg">
            <table border="2"
                class="w-full text-sm text-left rtl:text-right text-gray-800 dark:text-gray-400 border-solid">
                <thead class="text-md text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-white">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Pemesan
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Nama Layanan
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Satuan
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
                                Tanggal Pelaksanaan
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
                            <td colspan="8" align="center" class="px-6 py-4 text-center">
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
