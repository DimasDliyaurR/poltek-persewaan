@extends('layouts-home.navbar.nav-old')
@section('content')

<div class="bg-plaster py-24">
    <div class="container flex justify-center">
        <div class="justify-start items-center mb-2 mt-2">
            <h2 class="text-base"> <a class="hover:text-primary hover:font-bold" href="/index#kategori">Kategori > </a> {{$title}}</h2>
            <h4 class="font-bold text-lg"> Nama Items</h4>
        </div>
            <div class="relative">
                        <div id="container" class="relative hidden ">
                            <!-- Close the image -->
                            <span onclick="this.parentElement.style.display='none'" class=" absolute mt-10 mr-15 bg-white cursor-pointer">&times;</span>
                            <!-- Expanded image -->
                            <!-- <img id="expandedImg" style="width:100%"> -->
                            <img id="expandedImg" class="xl:w-8/12 w-6/12 lg:w-7/12">
                            <!-- Image text -->
                            <div id="imgtext"></div>
                        </div>
                        <div class=" flex  gap-2 ">
                            <img src="{{ asset('img/layanan/marching band.jpg') }}" alt="Nature" class="rounded-sm  cursor-pointer shadow-md overflow-hidden w-36  mb-4"  onclick="myFunction(this);">
                            <img src="{{ asset('img/layanan/marching band.jpg') }}" alt="Snow" class="rounded-sm  cursor-pointer shadow-md overflow-hidden w-36 mb-4"  onclick="myFunction(this);">
                            <img src="{{ asset('img/lab.jpg') }}" alt="Mountains" class="rounded-sm  cursor-pointer shadow-md overflow-hidden w-36 mb-4"  onclick="myFunction(this);">
                            <img src="{{ asset('img/layanan/marching band.jpg') }}" alt="Lights" class="rounded-sm  cursor-pointer shadow-md overflow-hidden w-36 mb-4"  onclick="myFunction(this);">
                        </div>
                    </div>    
    </div>
</div>
<script>
    // Tampilkan gambar pertama secara default
    var defaultImg = document.querySelector('.rounded-sm.cursor-pointer');
    var expandImg = document.getElementById("expandedImg");
    var imgText = document.getElementById("imgtext");
    expandImg.src = defaultImg.src;
    imgText.innerHTML = defaultImg.alt;
    expandImg.parentElement.style.display = "block";

    // Fungsi untuk mengganti gambar besar saat gambar kecil diklik
    function myFunction(imgs) {
        expandImg.src = imgs.src;
        imgText.innerHTML = imgs.alt;
    }
    function closeImage() {
        expandImg.parentElement.style.display = "none";
    }
</script>
@endsection