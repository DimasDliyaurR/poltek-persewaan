@extends('layouts-home.navbar.comp')
@section('content')
<div class="pt-40 pb-16 bg-slate-100 px-20 ">
    <div class="container">
            <div class="w-full">
                <div class="max-w-xl mx-auto text-center mb-16">
                    <h4 class="font-semibold text-lg text-primary mb-2">Kategori</h4>
                    <h2 class="font-bold text-black text-3xl mb-4 sm:text-2xl lg:text-xl"> <a href="/index">Home</a>  Kategori</h2>
                </div>
            </div>
        <div class="flex flex-wrap">
            <div class="w-full px-4 lg:w-1/2 xl:w-1/3">
                <div class="bg-white  rounded-xl shadow-lg overflow-hidden ">
                    <img class="shadow-lg" src="{{ ('img/transportasi/bus.JPG')}}" alt="">
                    <div class="py-8 px-6">
                        <h3>
                        <a href=" /detailbus" class="block mb-3 font-semibold text-xl text-black hover:text-primary truncate">Bus</a>
                        </h3>
                        <p class="font-medium text-sm text-gray-500 mb-6">Harga termasuk Driver</p>
                        <button class="w-52"><a href="#" class=" text-medium font-semibold  text-white bg-primary   rounded-lg hover:opacity-30 " >Sewa</a></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection