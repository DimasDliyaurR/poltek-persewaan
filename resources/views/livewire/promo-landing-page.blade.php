<section id="promo" class="pt-36 pb-36 bg-plaster">
    <div class="container">
        <div class="w-full  px-4 ">
            <div class=" mx-auto text-center mb-12">
                <h2 class="font-bold text-black text-3xl mb-4 sm:text-4xl lg:text-5xl">PROMO</h2>
                <p class="font-medium text-base md:text-lg">Penawaran promo sangat beragam. Lakukan penyewaan sekarang
                    juga dan dapatkan promo menarik lainnya !</p>
            </div>
        </div>
        <div class=" container xl:w-10/12  ">
            <div class="flex flex-wrap xl:px-24 pb-2 kategori-promo  xl:space-x-2  mx-auto text-[14px] ">
                <div x-on:click="$wire.set('kategori','')"
                    class="bg-white w-1/4  h-8 xl:w-28 flex items-center justify-center rounded-md mb-2 space-kanan cursor-pointer {{ $kategori == '' ? 'focus:ring-primary border-primary border-2' : '' }} hover:focus:ring-primary hover:border-primary hover:border-2">
                    <p class="overflow-hidden">Semua</p>
                </div>
                <div x-on:click="$wire.set('kategori','kendaraans')"
                    class="bg-white  w-1/4  h-8 xl:w-28 flex items-center justify-center rounded-md mb-2 space-kanan  cursor-pointer {{ $kategori == 'kendaraans' ? 'focus:ring-primary border-primary border-2' : '' }} hover:focus:ring-primary hover:border-primary hover:border-2  ">
                    <p class="overflow-hidden">Transportasi</p>
                </div>
                <div x-on:click="$wire.set('kategori','gedung_laps')"
                    class="bg-white w-1/4  xl:w-28 h-8 flex items-center justify-center rounded-md mb-2 space-kanan  cursor-pointer {{ $kategori == 'gedung_laps' ? 'focus:ring-primary border-primary border-2' : '' }}  hover:focus:ring-primary hover:border-primary hover:border-2  ">
                    <p class="overflow-hidden">GedungLap</p>
                </div>
                <div x-on:click="$wire.set('kategori','asramas')"
                    class="bg-white w-1/4  xl:w-28 h-8 flex items-center justify-center rounded-md mb-2 space-kanan cursor-pointer {{ $kategori == 'asramas' ? 'focus:ring-primary border-primary border-2' : '' }} hover:focus:ring-primary hover:border-primary hover:border-2  ">
                    <p class="overflow-hidden">Asrama</p>
                </div>
                <div x-on:click="$wire.set('kategori','layanans')"
                    class="bg-white w-1/4  xl:w-28 h-8 flex items-center justify-center rounded-md mb-2 space-kanan cursor-pointer {{ $kategori == 'layanans' ? 'focus:ring-primary border-primary border-2' : '' }} hover:focus:ring-primary hover:border-primary hover:border-2  ">
                    <p class="overflow-hidden">Layanan</p>
                </div>
                <div x-on:click="$wire.set('kategori','alat_barangs')"
                    class="bg-white w-1/4  xl:w-28 h-8  flex items-center justify-center  rounded-md mb-2 space-kanan cursor-pointer {{ $kategori == 'alat_barangs' ? 'focus:ring-primary border-primary border-2' : '' }} hover:focus:ring-primary hover:border-primary hover:border-2 ">
                    <p class="overflow-hidden">Alat Barang</p>
                </div>
            </div>

            <div class="flex">
                <div class="w-1/12 flex items-center mr-5">
                    <div class="w-full text-right">
                        <button onclick="next()" class="p-3 rounded-full bg-white border border-gray-100 shadow-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div id="sliderContainer" class="w-11/12 overflow-hidden">
                    <ul id="slider" class="flex w-full gap-4 space-x-2 mb-6 duration-700">
                        @forelse ($promo as $item)
                            <li>
                                <div class="hover:scale-105 transition  ease-in-out delay-150  ">
                                    <div class="flex flex-row">
                                        <div
                                            class="block max-w-sm p-4 h-72 w-64 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 ">
                                            <div class="flex space-x-2">
                                                <div class="basis-1/2">
                                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">
                                                        {{ $item->p_judul }}</h5>
                                                    <div class="flex flex-col  items-center">
                                                        <h4 class="text-base mr-2">Hemat</h4>
                                                        <p
                                                            class="{{ $item->p_tipe == 'fixed' ? 'text-md' : 'text-4xl' }} font-bold">
                                                            {{ $item->p_tipe == 'percent' ? $item->p_isi . '%' : 'Rp. ' . $item->p_isi }}
                                                        </p>
                                                    </div>
                                                    <p
                                                        class="mt-5 inline-block bg-plaster h-6 w-full text-center rounded-md tracking-widest text-sm mb-4">
                                                        {{ $item->p_kode }}</p>
                                                </div>
                                                <div class="basis-1/2 relative">
                                                    <img src="{{ Storage::url($item->p_foto) }}" alt="picture 1"
                                                        class=" rounded-md w-full " />
                                                </div>
                                            </div>
                                            <p class="text-gray-400 text-sm ">*periode
                                                {{ \Carbon\Carbon::parse($item->p_mulai)->isoFormat('D MMMM') }} -
                                                {{ \Carbon\Carbon::parse($item->p_kadaluarsa)->isoFormat('D MMMM') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @empty
                            <li>
                                <div class="  hover:scale-105 transition  ease-in-out delay-150  ">
                                    <div class="flex flex-row h-72 w-64">

                                    </div>
                                </div>
                            </li>
                        @endforelse
                    </ul>
                </div>
                <div class="w-1/12 flex items-center ">
                    <div class="w-full">
                        <button onclick="prev()" class="p-3 rounded-full bg-white border border-gray-100 shadow-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
