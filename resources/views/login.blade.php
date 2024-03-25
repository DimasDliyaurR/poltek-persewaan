@extends('layouts-home.navbar.nav')
@section('content')

    <div class=" grid place-items-center h-screen justify-center bg-gray-200"> 
        <!-- <div id="modal-wrapper" class="">
            <div class="flex items-center justify-center min-h-screen bg-primary bg-opacity-75 transition-all ">
                <div>
                    <h3>LOGIN</h3>
                </div>
            </div>
        </div> -->
        <div class="w-96 p-6 shadow-lg bg-white rounded-md">
        <h1 class="text-center text-3xl mb-3 block">Login</h1>
        
        <hr class="mt-4 mb-4 border-t-1 border-primary">
        Selamat Datang di Sewa Aset
        <br>
        <div class="mt-3 ">
            <label for="username" class=""></label>
            <input type="text" class="border w-full text-sm  mb-1 focus:outline-none focus:ring-0 focus:border-grat-600 rounded-md " id="username" name="username" placeholder="username">
        </div>
        <div class="mt-3">
            <label for="password"></label>
            <input type="password" id="password" name="password" placeholder="password" class="border w-full text-sm  mb-2 focus:outline-none focus:ring-0 focus:border-grat-600 rounded-md">

        </div>
        <button class="w-full mt-5 p-1 bg-primary text-white rounded-md hover:bg-transparent hover:text-primary hover:font-semibol hover:border-2  hover:border-primary">Login</button>
        <p class="text-xs mt-12 mb-6 text-center">Dengan login ke akun, berarti Anda telah menyetujui <span class="text-primary">Syarat dan Ketentuan </span>serta <span class="text-primary">Pernyataan Privasi </span>kami.</p>
        <hr class=" mb-4border-t-1 border-primary">
        <p class="text-xs text-center  pt-5"> <i class="fa-regular fa-copyright"></i>Belum memiliki akun? <a href="/signup"><span class="text-primary">Daftar</span></a></p>    
    </div>
        
    </div>
@endsection