<div class="comp">
    {{ $slot }}
</div>

<div class="flex flex-wrap">
    <div class="w-full px-4 lg:w-1/2 xl:w-1/3">
        <div class="bg-white  rounded-xl shadow-lg overflow-hidden ">
            <div class="py-8 px-6">
                <div id="default-carousel" class="relative w-full" data-carousel="slide">
                    <!-- Carousel wrapper -->
                    <!-- <div class="relative h-56 overflow-hidden rounded-lg md:h-96"> -->
                    <div class="relative h-56 overflow-hidden rounded-md ">
                        <!-- Item 1 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                           {{ $img1 }}
                        </div>
                        <!-- Item 2 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            {{ $img2 }}    
                        <!-- <img src="{{ ('img/transportasi/bus_depan.JPG')}}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 shadow-lg rounded-md" alt="..."> -->
                        </div>
                        <!-- Item 3 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            {{ $img3 }}    
                        <!-- <img src="{{ ('img/transportasi/bus_kiri.JPG')}}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 shadow-lg rounded-md" alt="..."> -->
                        </div>
                        <!-- Item 4 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        {{ $img4 }}    
                        <!-- <img src="{{ ('img/transportasi/bus_kanan.JPG')}}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 shadow-lg rounded-md" alt="..."> -->
                        </div>
                    </div>
                    <!-- Slider indicators -->
                    <div class="absolute z-30 flex -translate-x-1/2  left-1/2 space-x-3 rtl:space-x-reverse -mt-7">
                        <button type="button" class="w-2 h-2 rounded-full " aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                        <button type="button" class="w-2 h-2 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                        <button type="button" class="w-2 h-2 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
                        <button type="button" class="w-2 h-2 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
            
                    </div>
                    <!-- Slider controls -->
                    <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                        <span class="inline-flex items-center justify-center w-6 h-6 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                            </svg>
                            <span class="sr-only">Previous</span>
                        </span>
                    </button>
                    <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                        <span class="inline-flex items-center justify-center w-6 h-6 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                            </svg>
                            <span class="sr-only">Next</span>
                        </span>
                    </button>
                </div>
                <h3>
                <a href=" /detailbus" class="block mb-3 mt-3 font-semibold text-xl text-black hover:text-primary truncate">Exclusive Bus
                </a>
                </h3>
                <div class="flex mb-2"> 
                    <svg class="w-6 h-6 text-primary" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M9 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4H7Zm8-1a1 1 0 0 1 1-1h1v-1a1 1 0 1 1 2 0v1h1a1 1 0 1 1 0 2h-1v1a1 1 0 1 1-2 0v-1h-1a1 1 0 0 1-1-1Z" clip-rule="evenodd"/>
                    </svg>
                    <p class="text-sm font-semibold ml-1">45</p>
                    <sup class="text-xs text-gray-500"> Kapasitas </sup>
                </div>
                <div class="flex mb-2">
                    <img src="{{ ('img/transportasi/bensin.png') }}" alt="bbm" class="w-5 h-5">
                    <p class="text-sm font-semibold ml-2">Bensin</p>
                    <sup class="text-xs text-gray-500"> Fuel </sup>
                </div>
                <p class="text-sm text-gray-500 mb-1  flex justify-between">status : Available <span class=" text-black font-bold text-base">Rp 2.500.000</span></p>
                <p class=" text-sm text-gray-500 mb-1 float-right "> unit / Hari</p>
                <button class=" h-8 w-full bg-primary rounded-lg hover:opacity-50"><a href="#" class=" text-sm   text-white    " >Sewa</a></button>
            </div>
        </div>
    </div>
</div>