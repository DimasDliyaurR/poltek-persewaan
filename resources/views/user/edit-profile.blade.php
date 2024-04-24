@extends('layouts-user.main')
@section('content')


<div class="flex  mx-auto xl:flex-row md:flex-row lg:flex-row  flex-col justify-center  xl:space-x-2 p-3 ">
    <div class=" w-full h-full border-2 rounded-md">
        <div class="container  p-6 rounded-md ">
        <h4 class="font-semibold mb-4 ">Edit Profile</h4>
        <form action="" >
            @csrf
            <div class="mb-2 ">
                <img src="{{('img/icon-dash.png')}}" alt="Profile" class="w-40 h-20 ">
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
                <button type="submit" class="mt-5 h-7 xl:w-1/6 w-1/2 bg-primary rounded-lg hover:opacity-50  text-sm   text-white">
                    Simpan Perubahan
                </button>
                <button type="submit" class="mt-5 h-7 xl:w-1/6 w-1/2 bg-primary rounded-lg hover:opacity-50  text-sm   text-white">
                    Batalkan Perubahan
                </button>
            </div>
            
        </form>
    </div>
</div>


@endsection