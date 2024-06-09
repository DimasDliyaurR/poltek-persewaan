<div id="kat" class=" relative bg-white rounded-lg flex  flex-wrap xl:w-3/5 mx-auto xl:shadow-lg  -mt-20">
    <div
        class="xl:w-1/5 w-1/2  md:w-1/3 shadow-lg xl:shadow-none h-40 rounded-lg p-4 cursor-pointer active flex justify-center items-center">
        <a href="{{ route('transportasi.index') }}" class=" m-auto ">Transportasi
            <img class="mt-6 hover:filter hover:invert h-16 w-16  mx-auto"
                src="{{ asset('img\kategori\transportasi.png') }}" alt="transportasi">
        </a>
    </div>
    <div
        class=" xl:w-1/5 w-1/2  md:w-1/3 shadow-lg xl:shadow-none  h-40 hover:bg-gray-300 hover:text-white rounded-lg p-4 flex justify-center items-center">
        <a href="{{ route('gedung.index') }}">Gedung
            <img src="{{ asset('img/kategori/gedung.png') }}" alt=""
                class="mt-6 hover:filter hover:invert h-16 w-16  mx-auto">
        </a>
    </div>
    <div
        class="xl:w-1/5 w-1/2  md:w-1/3 shadow-lg xl:shadow-none h-40 hover:bg-gray-300 hover:text-white rounded-lg p-4 flex justify-center items-center ">
        <a href="{{ route('layanan.index') }}">Layanan
            <img src="{{ 'img/kategori/layanan.png' }}" alt=""
                class=" mt-6 hover:filter hover:invert h-16 w-16 mx-auto">
        </a>
    </div>
    <div
        class="xl:w-1/5 w-1/2  md:w-1/3 shadow-lg xl:shadow-none h-40 hover:bg-gray-300 hover:text-white rounded-lg p-4 flex justify-center items-center">
        <a href="{{ route('asrama.index') }}"><span class="mb-8">Asrama</span>
            <img src="{{ asset('img/kategori/hotel.png') }}" alt=""
                class=" mt-6 hover:filter hover:invert h-16 w-16 mx-auto">
        </a>
    </div>
    <div
        class="xl:w-1/5 w-1/2  md:w-1/3 shadow-lg xl:shadow-none h-40 hover:bg-gray-300 hover:text-white rounded-lg p-4 flex justify-center items-center">
        <a href="{{ route('alat-barang.index') }}">Alat Barang
            <img src="{{ asset('img/kategori/asset.png') }}" alt="" class="mt-4 h-20 w-20 mx-auto">
        </a>
    </div>
</div>
