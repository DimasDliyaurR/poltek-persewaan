@extends('layouts-user.main')
@section('content')

    <div class=" flex xl:flex-row flex-col xl:space-x-2">
        
        <!-- <div class="flex flex-col relative"> -->
            <div class=" flex flex-col xl:w-2/3 w-full  ">
                <div class="p-4 h-48 mb-2  rounded bg-primary relative">
                    <p class="text-2xl text-gray-400 dark:text-gray-500">
                        <h4 class="text-2xl font-bold "> Halo, ... User !</h4>
                        <h4>Selamat datang di sistem informasi SEWA ASET Politeknik Penerbangan Surabaya</h4>
                        <img src="{{('img/icon-dash.png')}}" alt="hallo icon" class=" flex absolute right-4 w-32 h-32">
                    </p>
                </div>
                <!-- <div class="flex mx-auto right-0 relative"> -->
                    <!-- <img src="{{('img/icon-dash.png')}}" alt="hallo icon" class=" absolute w-60 h-60"> -->
                <!-- </div> -->
                <div class="flex xl:flex-row space-x-2 mb-2 xl:mb-60">
                    <div class=" w-1/2 rounded bg-grecianblue h-36 p-4 ">
                        <p class="text-lg text-gray-400 ">
                            Riwayat Pemesanan
                        </p>
                        <h4 class="text-4xl text-white font-bold ">2</h4>
                    </div>
                    <div class=" w-1/2 p-4 rounded bg-sea h-36 ">
                        <p class="text-lg text-gray-400  ">
                            Pemesanan Berlangsung
                        </p>
                        <h4 class="text-4xl text-white font-bold ">2</h4>
                    </div>
                </div>
            </div>
        <!-- </div>   -->
        <div class=" xl:w-1/3 md:w-1/3 lg:w-1/3  w-full bg-white border-2  border-gray-200 rounded-lg shadow h-screen">
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
                    <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="/docs/images/people/profile-picture-3.jpg" alt="Bonnie image"/>
                    <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">Bonnie Green</h5>
                    <span class="text-sm text-gray-500 dark:text-gray-400">Visual Designer</span>
                    <div class="flex mt-4 md:mt-6">
                        <a href="#" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 ">Lihat Profile</a>
                        <a href="#" class="py-2 px-4 ms-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 ">Edit Profile</a>
                    </div>
                </div>
        </div>
    </div>
@endsection