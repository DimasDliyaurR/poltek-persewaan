<header class="bg-transparent absolute top-0 left-0 w-full flex items-center z-10">
    <div class="container ">
        <div class="flex items-center justify-between relative">
            <div class=" flex items-center xl:px-8 py-2">
                <a href="{{ asset('/') }}"><img src="{{ asset('img/LogoPoltekbang.png') }}" class="h-11 w-15"
                        alt="Logo">
                </a>
                <div id="judul-nav" class="ml-1 textlack">
                    <a href="{{ asset('/') }}" class="font-bold xl:text-lg md:text-lg">
                        SEWA ASET
                        <p class="font-bold xl:text-lg md:text-lg text-xs">POLITEKNIK PENERBANGAN
                            SURABAYA</p>
                    </a>
                </div>
            </div>
            <div class="flex items-center justify-center px-8">
                <button id="hamburger" name="hamburger" type="button" class="block absolute right-4 lg:hidden">
                    <span class="hamburger-line transition duration-300 origin-top-left"></span>
                    <span class="hamburger-line"></span>
                    <span class="hamburger-line origin-bottom-left"></span>
                </button>

                <nav id="nav-menu"
                    class="hidden absolute py-5 bg-transparent shadow-lg rounded-lg max-w-[250px] w-full right-4 top-full lg:block lg:static lg:max-w-full lg:shadow-none lg:rounded-none">
                    <ul class="block lg:flex text-black">
                        <li class="group"></li>
                        <a href="#home"
                            class="text-base font-normal py-2 mx-6 flex group-hover:text-primary">Beranda</a>
                        <li class="group">
                            <a href="#kategori" class="text-base py-2 mx-6 flex group-hover:text-primary">Kategori</a>
                        </li>
                        <li class="group">
                            <a href="#promo" class="text-base py-2 mx-6 flex group-hover:text-primary">Promo</a>
                        </li>
                        <li class="group">
                            <a href="#syarat" class="text-base py-2 mx-6 flex group-hover:text-primary">Syarat</a>
                        </li>
                        @auth
                            <li class="group">
                                <a href="{{ auth()->user()->level == 'customer' ? route('dashboard.user.index') : route('admin.index') }}"
                                    class="text-base py-2 mx-6 flex group-hover:text-primary">Dashboard</a>
                            </li>
                            <li class="group">
                                <a class="block px-4 py-2 hover:bg-gray00 dark:hover:bg-gray-600 dark:hover:text-black"
                                    href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                    @csrf
                                </form>
                            </li>
                        @else
                            <li class="group">
                                <a href="{{ route('login') }}"
                                    class="text-base py-2 mx-6 flex group-hover:text-primary">Login</a>
                            </li>
                        @endauth
                    </ul>
                </nav>

            </div>

        </div>
    </div>
</header>
