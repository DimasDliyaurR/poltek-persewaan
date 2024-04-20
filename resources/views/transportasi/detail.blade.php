@extends('layouts-home.navbar.nav-old')
@section('content')
<div class=" bg-plaster ">
    <div class=" container py-24 mx-auto">
        <div class="justify-start items-center mb-2 mt-2">
            <h2 class="text-base"> <a class="hover:text-primary hover:font-bold" href="/index#kategori">Kategori > </a> {{$title}}</h2>
            <h4 class="font-bold text-lg"> Nama Items</h4>
        </div>
        
        <div class="flex flex-row flex-1 space-x-2 ">
            <div class="basis-1/2 bg-white w-full h-screen  rounded-md ">
                <div class="relative">
                    <div id="container" class="relative hidden">
                        <span onclick="this.parentElement.style.display='none'" class=" absolute mt-10 mr-15 bg-white cursor-pointer">&times;</span>
                        <img id="expandedImg" class="xl:w-8/12 w-6/12 lg:w-7/12">
                        <div class="imgText"></div>
                    </div>
                    <div class=" flex  gap-2  p-2">
                        <img src="{{ asset('img/layanan/marching band.jpg') }}" alt="Nature" class="rounded-sm  cursor-pointer shadow-md overflow-hidden w-36  mb-4"  onclick="myFunction(this);">
                        <img src="{{ asset('img/layanan/marching band.jpg') }}" alt="Snow" class="rounded-sm  cursor-pointer shadow-md overflow-hidden w-36 mb-4"  onclick="myFunction(this);">
                        <img src="{{ asset('img/lab.jpg') }}" alt="Mountains" class="rounded-sm  cursor-pointer shadow-md overflow-hidden w-36 mb-4"  onclick="myFunction(this);">
                        <img src="{{ asset('img/layanan/marching band.jpg') }}" alt="Lights" class="rounded-sm  cursor-pointer shadow-md overflow-hidden w-36 mb-4"  onclick="myFunction(this);">
                    </div>
                </div>    
            </div>
            <div class="flex-col space-y-2 ">
                <div class="w-56 bg-white p-3 rounded-md">
                    <h4 class="font-semibold mb-2">Detail Mobil</h4>
                    <ul class="text-gray-500 text-sm ">
                        <li class="mt-2 mb-2">2020</li>
                        <li class="mt-2 mb-2">Oli</li>
                        <li class="mt-2 mb-2">Pertalite</li>
                    </ul>
                </div>
                <div class="basis-1/4 bg-white p-3 rounded-md">
                    <h4 class="font-semibold mb-2">Harga</h4>
                    <p class="text-primary font-bold">Rp 2.500.000</p>
                    <p class="text-xs text-gray-400"> * belum termasuk voucher</p>
                    <button class=" mt-4 h-6 w-full bg-primary rounded-lg hover:opacity-50"><a href="/transportasi/pesan" class=" text-sm   text-white" >Pesan</a></button>
          

                </div>
            </div>
        </div>

    </div>
</div>

    <script>
        function myFunction(imgs) {
            var expandImg = document.getElementById("expandedImg");
            var imgText = document.getElementById("imgtext");
            expandImg.src = imgs.src;
            imgText.innerHTML = imgs.alt;
            expandImg.parentElement.style.display = "block";
        }
    </script>
@endsection