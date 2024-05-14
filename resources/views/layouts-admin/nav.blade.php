<nav class="bg-white dark:bg-gray-900 dark:border-gray-700 border-b-2 border-solid">
    <div class="flex flex-wrap items-center justify-between mx-auto p-4">

        <div class="flex flex-row items-center gap-5 cursor-pointer"
            onclick="window.location.href = '{{ asset('admin/') }}'">
            <img class="h-[50px] w-[70px]" src="{{ asset('/img/LogoPoltekbang.png') }}" alt="Logo">
            <div class="uppercase font-bold text-center text-lg">
                SewaAset
            </div>
        </div>
        <div class="flex">
            <div>
                <img class="rounded-full w-10 h-10" src="{{ asset('img/photo-profile.png') }}" alt="image description"
                    data-dropdown-toggle="dropdown-profile">
                <!-- Dropdown menu -->
                <div id="dropdown-profile"
                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                        <li>
                            <a href="#"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
                        </li>
                        <li>
                            <a class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>


        </div>
    </div>
</nav>
