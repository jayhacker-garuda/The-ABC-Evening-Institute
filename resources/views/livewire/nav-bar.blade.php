<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <header class="fixed z-50 w-full bg-white shadow-lg">
        <div class="max-w-screen-xl p-4 mx-auto">
            <div class="flex items-center justify-between space-x-4 lg:space-x-10">
                <div class="flex lg:w-0 lg:flex-1">
                    <span class="w-20 h-10 p-2 text-center bg-gray-200 border-b-2 border-blue-400 rounded-lg shadow-md">
                        ABC
                    </span>
                </div>

                <nav class="hidden space-x-8 text-sm font-medium md:flex">
                    <a href="javascript:void(0)" class="p-6 duration-300 rounded-md hover:bg-pink-400 focus:bg-pink-400">
                        <strong class="p-2 uppercase transition-colors duration-300 rounded-md hover:bg-blue-400 focus:bg-blue-400">{{ Auth::user()->user_type }}</strong> | {{ Auth::user()->name }}
                    </a>
                </nav>
                <a href="javascript:void(0)" wire:click='logoutUser' class="p-2 text-sm font-black uppercase transition-colors duration-200 bg-red-400 rounded-md hover:bg-red-600">
                    Logout
                </a>

                <div class="lg:hidden">
                    <button class="p-2 text-gray-600 bg-gray-100 rounded-lg" type="button">
                        <span class="sr-only">Open menu</span>
                        <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor"
                            viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4 6h16M4 12h16M4 18h16" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </header>

</div>
