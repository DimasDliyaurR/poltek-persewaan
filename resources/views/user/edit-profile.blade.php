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
            <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="{{ asset('img/centang.png')}}" alt="Bonnie image"/>
            <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">Alya</h5>
            <span class="text-sm text-gray-500 dark:text-gray-400">Visual Designer</span>
            <div class="flex mt-4 md:mt-6">
                <a href="#" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 ">Lihat Profile</a>
                <a href="#" class="py-2 px-4 ms-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 ">Edit Profile</a>
            </div>
        </div>
        <hr class="w-3/4 mx-auto pt-4">
        <div class="xl:px-14 py-4 ">
            <h5 class="font-bold text-gray-500 py-2">Riwayat Transaksi Terbaru</h5>
            <p class="text-base text-gray-300 py-2">31 Juni 2023</p>
            <h5 class="font-bold text-gray-500 py-2">Riwayat Transaksi Berhasil</h5>
            <p class="text-base text-gray-300 py-2">0</p>
            <h5 class="font-bold text-gray-500 py-2">Riwayat Transaksi Dibatalkan</h5>
            <p class="text-base text-gray-300 py-2">0</p>
        </div>
    </div>
</div>

<!-- back to top -->
<div class=" ">
    <a href="#home" class=""> 
      <i class=" btnbtt btn-active fixed bottom-6 right-6 text-5xl cursor pointer text-primary hover:bg-gray-100 z-20 hidden bg-softblue rounded-full w-12 h-12 " title="Kembali ke atas">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 mt-2 ml-2.5 ">
      <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 18.75 7.5-7.5 7.5 7.5" />
      <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 7.5-7.5 7.5 7.5" />
      </svg>
      </i>
    </a>
  </div>
<!-- end back to top -->
    <!-- call -->
    <div class="relative">
      <div class=" cursor-pointer w-12 h-12  rounded-full   flex fixed  right-20 bottom-8 bocursor-pointer hover:w-30 hover:h-10 hover:Hubungi Kami !" title="Chat sekarang ! "> 
      <a aria-label="Chat on WhatsApp" href="https://wa.me/6282332829821/?text=Halo, Admin Saya Ingin bertanya terkait sewa aset poltekbang surabaya" class="mx-auto  ">
          <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="60" height="60" viewBox="0 0 48 48">
          <path fill="#fff" d="M4.868,43.303l2.694-9.835C5.9,30.59,5.026,27.324,5.027,23.979C5.032,13.514,13.548,5,24.014,5c5.079,0.002,9.845,1.979,13.43,5.566c3.584,3.588,5.558,8.356,5.556,13.428c-0.004,10.465-8.522,18.98-18.986,18.98c-0.001,0,0,0,0,0h-0.008c-3.177-0.001-6.3-0.798-9.073-2.311L4.868,43.303z"></path>
          <path fill="#fff" d="M4.868,43.803c-0.132,0-0.26-0.052-0.355-0.148c-0.125-0.127-0.174-0.312-0.127-0.483l2.639-9.636c-1.636-2.906-2.499-6.206-2.497-9.556C4.532,13.238,13.273,4.5,24.014,4.5c5.21,0.002,10.105,2.031,13.784,5.713c3.679,3.683,5.704,8.577,5.702,13.781c-0.004,10.741-8.746,19.48-19.486,19.48c-3.189-0.001-6.344-0.788-9.144-2.277l-9.875,2.589C4.953,43.798,4.911,43.803,4.868,43.803z"></path>
          <path fill="#cfd8dc" d="M24.014,5c5.079,0.002,9.845,1.979,13.43,5.566c3.584,3.588,5.558,8.356,5.556,13.428c-0.004,10.465-8.522,18.98-18.986,18.98h-0.008c-3.177-0.001-6.3-0.798-9.073-2.311L4.868,43.303l2.694-9.835C5.9,30.59,5.026,27.324,5.027,23.979C5.032,13.514,13.548,5,24.014,5 M24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974 M24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974 M24.014,4C24.014,4,24.014,4,24.014,4C12.998,4,4.032,12.962,4.027,23.979c-0.001,3.367,0.849,6.685,2.461,9.622l-2.585,9.439c-0.094,0.345,0.002,0.713,0.254,0.967c0.19,0.192,0.447,0.297,0.711,0.297c0.085,0,0.17-0.011,0.254-0.033l9.687-2.54c2.828,1.468,5.998,2.243,9.197,2.244c11.024,0,19.99-8.963,19.995-19.98c0.002-5.339-2.075-10.359-5.848-14.135C34.378,6.083,29.357,4.002,24.014,4L24.014,4z"></path>
          <path fill="#40c351" d="M35.176,12.832c-2.98-2.982-6.941-4.625-11.157-4.626c-8.704,0-15.783,7.076-15.787,15.774c-0.001,2.981,0.833,5.883,2.413,8.396l0.376,0.597l-1.595,5.821l5.973-1.566l0.577,0.342c2.422,1.438,5.2,2.198,8.032,2.199h0.006c8.698,0,15.777-7.077,15.78-15.776C39.795,19.778,38.156,15.814,35.176,12.832z"></path>
          <path fill="#fff" fill-rule="evenodd" d="M19.268,16.045c-0.355-0.79-0.729-0.806-1.068-0.82c-0.277-0.012-0.593-0.011-0.909-0.011c-0.316,0-0.83,0.119-1.265,0.594c-0.435,0.475-1.661,1.622-1.661,3.956c0,2.334,1.7,4.59,1.937,4.906c0.237,0.316,3.282,5.259,8.104,7.161c4.007,1.58,4.823,1.266,5.693,1.187c0.87-0.079,2.807-1.147,3.202-2.255c0.395-1.108,0.395-2.057,0.277-2.255c-0.119-0.198-0.435-0.316-0.909-0.554s-2.807-1.385-3.242-1.543c-0.435-0.158-0.751-0.237-1.068,0.238c-0.316,0.474-1.225,1.543-1.502,1.859c-0.277,0.317-0.554,0.357-1.028,0.119c-0.474-0.238-2.002-0.738-3.815-2.354c-1.41-1.257-2.362-2.81-2.639-3.285c-0.277-0.474-0.03-0.731,0.208-0.968c0.213-0.213,0.474-0.554,0.712-0.831c0.237-0.277,0.316-0.475,0.474-0.791c0.158-0.317,0.079-0.594-0.04-0.831C20.612,19.329,19.69,16.983,19.268,16.045z" clip-rule="evenodd"></path>
          </svg>
      </a>
      </div>
    </div>
    <!-- end call -->
@endsection