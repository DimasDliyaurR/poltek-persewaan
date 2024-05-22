<section id="home" class="pt-20 pb-64 h-2/5 relative  ">
    <!-- <div class="absolute inset-0 bg-white opacity-10 "> -->
    <div class="bgImage absolute inset-0   h-full  bg-cover  bg-no-repeat bg-white opacity-50 bg-center">
        <div class="overlay "></div>
    </div>
    <div class="container relative z-10 pb-56 flex flex-wrap mt-32">
        <div class="w-full text-center px-4 ">
            <h1 class="block font-bold  xl:text-5xl lg:text-4xl pt-10 pb-2">SEWA ASET </h1>
            <h2 class="font-semibold md:text-xl lg:text-2xl mt-6 leading relaxed mb-8 ">Mudah, Aman , Terjangkau !</h2>
            <div id="buttondropdown" class="mx-auto flex justify-center">
                <div id="dropdownKategori" class="relative">
                    <div
                        class="border-solid text-sm border-gray-400 border-[1px] px-5 py-2 rounded cursor-pointer  flex justify-between bg-white shadow-sm ">
                        <a href="#kat">Booking dari sekarang !</a>
                    </div>
                </div>
                <div id="dropdownJadwal" class="relative">
                    <div onclick="toggleDropdown2()"
                        class="border-solid w-28 text-sm border-gray-400 border-[1px] px-5 py-2 rounded cursor-pointer  flex  bg-white shadow-sm items-center"
                        title="Lihat jadwal">
                        Jadwal
                        <svg class=" pl-2 w-5 " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                        </svg>
                    </div>
                    <div id="dropdownKal"
                        class="rounded border-[2px] border-white bg-white p-2 absolute top-[50px] w-[180px]  shadow-md hidden">
                        <div class="cursor-pointer hover:bg-gray-300 p-1 rounded text-sm text-left">
                            <a href="/transportasi/kalender">
                                <p>Kalender Transportasi</p>
                            </a>
                        </div>
                        <div class="cursor-pointer hover:bg-gray-300 p-1 rounded text-sm text-left">
                            <a href="/gedung/kalender" class="text-left">Kalender Gedung</a>
                        </div>
                        <div class="cursor-pointer hover:bg-gray-300 p-1 rounded text-sm text-left">
                            <a href="/layanan/kalender">Kalender Layanan</a>
                        </div>
                        <div class="cursor-pointer hover:bg-gray-300 p-1 rounded text-sm text-left">
                            <a href="/asrama/kalender">Kalender Asrama</a>
                        </div>
                        <div class="cursor-pointer hover:bg-gray-300 p-1 rounded text-sm text-left">
                            <a href="/alatbarang/kalender">Kalender Alat Barang</a>
                        </div>
                    </div>
                    <script>
                        function toggleDropdown2() {
                            let dropdownKal = document.querySelector('#dropdownJadwal #dropdownKal');
                            dropdownKal.classList.toggle("hidden");
                        }
                    </script>
                </div>
            </div>
        </div>
        <!-- new  -->
        <!-- <div class="w-full  self-center px-10  xl:w-1/2 lg:w-1/2 ">
              <h1 class="text-base text-grecianblue font-semibold  md:text-xl lg:text-2xl">Ayoo <span class="text-black block font-bold text-slate-900 xl:text-8xl lg:text-5xl pb-2">SEWA ASET </span></h1>
              <h2 class="flex justify-center xl:justify-start font-semibold md:text-xl lg:text-2xl  xl:text-4xl mt-6 leading relaxed mb-8   ">Mudah, Aman , Terjangkau !</h2>
              <div id="buttondropdown" class="mx-auto flex">
                <div id="dropdownKategori" class="relative">
                  <div class="border-solid text-sm border-gray-400 border-[1px] px-5 py-2 rounded cursor-pointer  flex justify-between bg-white shadow-sm ">
                        <a href="#kat">Booking dari sekarang !</a>
                  </div>
                </div>
                <div id="dropdownJadwal" class="relative">
                  <div onclick="toggleDropdown2()" class="border-solid w-28 text-sm border-gray-400 border-[1px] px-5 py-2 rounded cursor-pointer  flex  bg-white shadow-sm items-center" title="Lihat jadwal">
                    Jadwal
                    <svg class=" pl-2 w-5 " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                    </svg>
                  </div>
                  <div id="dropdownKal" class="rounded border-[2px] border-white bg-white p-2 absolute top-[50px] w-[185px]  shadow-md hidden">
                    <div class="cursor-pointer hover:bg-gray-300 p-1 rounded text-sm">
                      <a href="/transportasi/kalender"><p>Kalender Transportasi</a>
                    </div>
                    <div class="cursor-pointer hover:bg-gray-300 p-1 rounded text-sm">
                      <a href="/gedung/kalender"><p>Kalender Gedung</p></a>
                    </div>
                    <div class="cursor-pointer hover:bg-gray-300 p-1 rounded text-sm">
                      <a href="/layanan/kalender"><p>Kalender Layanan</p></a>
                    </div>
                    <div class="cursor-pointer hover:bg-gray-300 p-1 rounded text-sm">
                      <a href="/asrama/kalender"><p>Kalender Asrama</p></a>
                    </div>
                    <div class="cursor-pointer hover:bg-gray-300 p-1 rounded text-sm">
                      <a href="/alatbarang/kalender"><p>Kalender Alat Barang</p></a>
                    </div>
                  </div>
                  <script>
                      function toggleDropdown2() {
                          let dropdownKal = document.querySelector('#dropdownJadwal #dropdownKal');
                          dropdownKal.classList.toggle("hidden");
                      }
                  </script>
                </div>
              </div>
            </div> -->
        <!-- <div class="container w-full xl:w-1/2 mt-3 self-end ">
              <img src="{{ asset('img/landingpage/lp.png') }}" alt="Logo Poltekbang" class="w-3xl h-full mx-auto" />
            </div> -->
    </div>
</section>
