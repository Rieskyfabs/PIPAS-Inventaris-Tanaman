<header class="bg-[#F8F9FF] fixed top-0 left-0 w-full shadow-md z-50">
    <nav class="container mx-auto flex justify-between items-center h-24 px-4 md:px-8">
        <a href="#" class="text-lg lg:text-2xl font-bold text-[#009379] flex items-center space-x-2">
            <img src="/images/wikrama-logo.png" alt="Wikrama Logo" class="w-8 h-8 sm:w-10 sm:h-10 lg:w-16 lg:h-16"> <!-- Ukuran ikon responsif -->
            <span class="text-lg sm:text-base lg:text-2xl">SIM Pantau Tanaman</span>
        </a>

        <!-- Mobile Menu Toggle Button -->
        <button id="mobileMenuToggle" class="text-[#009379] focus:outline-none lg:hidden ml-auto">
            <i class="fas fa-bars text-2xl"></i>
        </button>

        <div class="hidden lg:flex gap-8">
            <ul class="flex items-center space-x-8" id="navbar">
                <li>
                    <a href="#" class="nav-link relative text-base font-semibold text-[#009379] decoration-[#009379] decoration-2 transition duration-300">Home</a>
                </li>
                <li>
                    <a href="#about" class="nav-link relative text-base font-semibold text-[#009379] decoration-[#009379] decoration-2 transition duration-300">Tentang</a>
                </li>
                <li>
                    <a href="#galeri" class="nav-link relative text-base font-semibold text-[#009379] decoration-[#009379] decoration-2 transition duration-300">Galeri</a>
                </li>
                <li>
                    <a href="#team" class="nav-link relative text-base font-semibold text-[#009379] decoration-[#009379] decoration-2 transition duration-300">Our Team</a>
                </li>
                <li>
                    <a href="#contact-form" class="nav-link relative text-base font-semibold text-[#009379] decoration-[#009379] decoration-2 transition duration-300">Contact</a>
                </li>
            </ul>
        </div>
        @if (Route::has('login'))
            <div class="hidden lg:flex">
                @auth
                    <a href="{{ Auth::user()->role->name == 'admin' ? route('admin/dashboard') : (Auth::user()->role->name == 'master' ? route('master/dashboard') : route('dashboard')) }}" class="bg-[#E5F4F2] text-[#009379] font-semibold rounded-3xl px-12 py-4 transition duration-300 hover:bg-[#009379] hover:text-[#E5F4F2]">
                        <i class="fas fa-sign-in-alt"></i> {{ Auth::user()->role->name == 'admin' ? __('Dashboard') : (Auth::user()->role->name == 'master' ? __('Dashboard') : __('Dashboard')) }}
                    </a>
                @else
                    <a href="{{ route('login') }}" class="bg-[#E5F4F2] text-[#009379] font-semibold rounded-2xl px-12 py-4 transition duration-300 hover:bg-[#009379] hover:text-[#E5F4F2] text-center">
                        <i class="fas fa-sign-in-alt"></i> {{ __('Login') }}
                    </a>
                @endauth
            </div>
        @endif
    </nav>

    <!-- Mobile Menu -->
    <div id="mobileMenu" class="hidden lg:hidden px-4 transition-all duration-500 ease-in-out transform opacity-0">
        <div class="flex flex-col items-center bg-[#F8F9FF] space-y-4 mt-4">
            <a href="#" class="nav-link text-base font-semibold text-[#009379] hover:text-[#007F6E] py-2">Home</a>
            <a href="#about" class="nav-link text-base font-semibold text-[#009379] hover:text-[#007F6E] py-2">Tentang PIPAS</a>
            <a href="#galeri" class="nav-link text-base font-semibold text-[#009379] hover:text-[#007F6E] py-2">Galeri</a>
            <a href="#team" class="nav-link text-base font-semibold text-[#009379] hover:text-[#007F6E] py-2">Our Team</a>
            <a href="#contact-form" class="nav-link text-base font-semibold text-[#009379] hover:text-[#007F6E] py-2">Contact</a>
            <hr>
        </div>
    </div>

</header>
