<aside id="dashboard-user"
    class="max-[640px]:fixed h-auto left-0 z-40 w-[22rem] max-[640px]:h-screen transition-transform -translate-x-full sm:translate-x-0"
    aria-label="Sidebar">
    <div class="h-full w-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800 rounded-lg">
        <div class="flex flex-row items-center gap-5 cursor-pointer mb-10"
            onclick="window.location.href = '{{ asset('/') }}'">
            <img class="h-[30px] w-[45px]" src="{{ asset('/img/LogoPoltekbang.png') }}" alt="Logo">
            <div class="uppercase font-bold text-center text-lg">
                SewaAset
            </div>
        </div>
        <hr class="mb-5">

        <ul class="space-y-2 font-medium">
            <li>
                <a href="/dashboard" class="group flex items-center p-2 text-gray-900 rounded-lg hover:bg-purple-100">
                    <svg class="w-5 h-5 text-gray-500 transition duration-75  group-hover:text-black"
                        xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M10 20v-6h4v6h5v-8h3L12 3L2 12h3v8z" />
                    </svg>
                    <span class="ms-3 text-lg">Home</span>
                </a>
            </li>
            <li>
                <a href="/riwayat" class="group flex items-center p-2 text-gray-900 rounded-lg hover:bg-purple-100 ">
                    <svg class="w-5 h-5 text-gray-500 transition duration-75  group-hover:text-black "
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 12a2.25 2.25 0 0 0-2.25-2.25H15a3 3 0 1 1-6 0H5.25A2.25 2.25 0 0 0 3 12m18 0v6a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 18v-6m18 0V9M3 12V9m18 0a2.25 2.25 0 0 0-2.25-2.25H5.25A2.25 2.25 0 0 0 3 9m18 0V6a2.25 2.25 0 0 0-2.25-2.25H5.25A2.25 2.25 0 0 0 3 6v3" />
                    </svg>
                    <span class="flex-1 ms-3 text-lg">Riwayat Pesanan</span>
                </a>
            </li>
            <li>
                <a href="/voucher" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 ">
                    <svg class="w-5 h-5 text-gray-500 transition duration-75  group-hover:text-gray-900 "
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Z" />
                    </svg>
                    <span class="flex-1 ms-3 text-lg">Riwayat Voucher</span>

                </a>
            </li>
            <li>
                <a href="/invoice" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 ">
                    <svg class="w-5 h-5 text-gray-500 transition duration-75  group-hover:text-gray-900 "
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                        <path
                            d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                    </svg>
                    <span class="flex-1 ms-3 text-lg">Invoice</span>
                </a>
            </li>
        </ul>
    </div>
</aside>

<button data-drawer-target="dashboard-user" data-drawer-toggle="dashboard-user" aria-controls="dashboard-user"
    type="button"
    class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600 dark:bg-gray-800">
    <span class="sr-only">Open sidebar</span>
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path clip-rule="evenodd" fill-rule="evenodd"
            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
        </path>
    </svg>
</button>
