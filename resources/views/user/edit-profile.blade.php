@extends('layouts-user.main')
@section('content')

<div class="flex  xl:flex-row md:flex-row lg:flex-row  flex-col  xl:space-x-2 p-3 ">
    <div class=" xl:w-2/3 w-full h-full border-2 rounded-md bg-white">
        <div class="container  p-6 rounded-md ">
            <h4 class="font-semibold mb-4 ">Edit Profile</h4>
            <form action="" >
                @csrf
                <div class="mb-2 ">
                    <img src="{{('img/icon-dash.png')}}" alt="Profile" class="w-40 h-40 ">
                    <label for="foto_ktp" class=" block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upload Foto KTP</label>
                    <input type="file" id="foto_ktp" name="foto_ktp" class="block w-full text-sm text-slate-500
                    file:mr-4 file:py-2 file:px-4
                    file:rounded-full file:border-0
                    file:text-sm file:font-semibold
                    file:bg-primary file:text-primary
                    hover:file:bg-primary">
                </div>
                <div class=" mb-2 space-y-2">
                    <label for="nama" class=" block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                    <input id="nama" name="nama" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class=" mb-2 ">
                    <label for="alamat" class=" block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                    <input id="alamat" name="alamat" placeholder="2023VOUCHER" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="mb-2">
                    <label for="jenis_kelamin" class=" block mb-2 text-sm font-medium text-gray-900 dark:text-white" >Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="jenis_kelamin" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="transfer">Laki-laki</option>
                        <option value="transfer">Perempuan</option>
                    </select>
                </div>
                <div class="flex flex-col xl:flex-row lg:flex-row xl:space-x-2 md:space-x-2 sm:space-x-2 mb-2">
                    <div class="mb-2 space-y-2 xl:w-1/2">
                        <label for="password" class=" block mb-2 text-sm font-medium text-gray-900 dark:text-white">No Telephone</label>
                        <input id="password"  type="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    <div class="mb-2 space-y-2 xl:w-1/2">
                        <label for="password" class=" block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input id="password"  type="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                </div>
                <div class="flex flex-col xl:flex-row lg:flex-row xl:space-x-2 md:space-x-2 sm:space-x-2 mb-2">
                    <div class="mb-2 space-y-2 xl:w-1/2">
                        <label for="password" class=" block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                        <input id="password"  type="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    <div class="mb-2 space-y-2 xl:w-1/2">
                        <label for="password" class=" block mb-2 text-sm font-medium text-gray-900 dark:text-white">Konfirmasi Password</label>
                        <input id="password"  type="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                </div>
                <div class="flex space-x-2">
                    <button type="submit" class="mt-5 h-7 xl:w-1/4 w-1/2 bg-primary rounded-lg hover:opacity-50  text-sm   text-white">
                        Simpan Perubahan
                    </button>
                    <button type="submit" class="mt-5 h-7 xl:w-1/4 w-1/2 bg-primary rounded-lg hover:opacity-50  text-sm   text-white">
                        Batalkan Perubahan
                    </button>
                </div>
                
            </form>
        </div>
    </div>
    <div class=" xl:w-1/3 md:w-1/3 lg:w-1/3  w-full bg-white border-2  border-gray-200 rounded-lg shadow h-full">
        <div class="flex justify-end px-4 pt-4">
            <button id="dropdownButton" data-dropdown-toggle="dropdown" class="inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5" type="button">
                <span class="sr-only">Open dropdown</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                    <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>
                </svg>
            </button>
            <!-- Dropdown menu -->
            <div id="dropdown" class="z-10 hidden text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                <ul class="py-2" aria-labelledby="dropdownButton">
                <li>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Edit</a>
                </li>
                <li>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Export Data</a>
                </li>
                <li>
                    <a href="#" class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete</a>
                </li>
                </ul>
            </div>
        </div>
        <div class="flex flex-col items-center pb-10">
        <h5 class="mb-1 text-xl font-bold text-gray-900 dark:text-white">My Profile</h5>
            <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="{{ asset('img/centang.png')}}" alt="Bonnie image"/>
            <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">Bonnie Green</h5>
            <span class="text-sm text-gray-500 dark:text-gray-400">Visual Designer</span>
            <div class="flex mt-4 md:mt-6">
                <a href="#" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 ">Lihat Profile</a>
                <a href="#" class="py-2 px-4 ms-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 ">Edit Profile</a>
            </div>
        </div>
        <hr class="w-3/4 mx-auto pt-4">
        <div class="xl:px-14 py-4">
        <h5 class="font-bold text-gray-500">Riwayat Transaksi Terbaru</h5>
        <p class="text-base text-gray-300">31 Juni 2023</p>
        <h5 class="font-bold text-gray-500">Riwayat Transaksi Berhasil</h5>
        <p class="text-base text-gray-300">0</p>
        <h5 class="font-bold text-gray-500">Riwayat Transaksi Dibatalkan</h5>
        <p class="text-base text-gray-300">0</p>
        </div>
    </div>
</div>


@endsection