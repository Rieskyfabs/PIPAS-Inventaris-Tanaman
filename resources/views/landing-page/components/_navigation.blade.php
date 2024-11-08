<header class="bg-[#F8F9FF] fixed top-0 left-0 w-full shadow-md z-50">
    <nav class="container mx-auto flex justify-between items-center h-24 px-4 md:px-8">
        <a href="#" class="text-lg font-bold text-[#009379] flex items-center space-x-2">
            <i class="fa-solid fa-seedling"></i>
            <span>DAMASU</span>
        </a>
        
        <!-- Mobile Menu Toggle Button -->
        <button id="mobileMenuToggle" class="text-[#009379] focus:outline-none lg:hidden ml-auto">
            <i class="fas fa-bars text-2xl"></i>
        </button>
        
        <div class="hidden lg:flex gap-8">
            <ul class="flex items-center space-x-8">
                <li class="{{ request()->is('#') ? 'font-semibold text-[#009379]' : '' }}">
                    <a href="#" class="relative text-base font-semibold text-[#009379] hover:underline decoration-[#009379] decoration-2 transition duration-300">Home</a>
                </li>
                <li class="{{ request()->is('#about') ? 'font-semibold text-[#009379]' : '' }}">
                    <a href="#about" class="relative text-base font-semibold text-[#009379] hover:underline decoration-[#009379] decoration-2 transition duration-300">Tentang PIPAS</a>
                </li>
                <li class="{{ request()->is('#galeri') ? 'font-semibold text-[#009379]' : '' }}">
                    <a href="#galeri" class="relative text-base font-semibold text-[#009379] hover:underline decoration-[#009379] decoration-2 transition duration-300">Galeri</a>
                </li>
                <li class="{{ request()->is('#team') ? 'font-semibold text-[#009379]' : '' }}">
                    <a href="#team" class="relative text-base font-semibold text-[#009379] hover:underline decoration-[#009379] decoration-2 transition duration-300">Our Team</a>
                </li>
                <li class="{{ request()->is('#contact-form') ? 'font-semibold text-[#009379]' : '' }}">
                    <a href="#contact-form" class="relative text-base font-semibold text-[#009379] hover:underline decoration-[#009379] decoration-2 transition duration-300">Contact</a>
                </li>
            </ul>
        </div>
        
        @if (Route::has('login'))
            <div class="hidden lg:flex">
                @auth
                    <a href="{{ Auth::user()->role->name == 'admin' ? route('admin/dashboard') : (Auth::user()->role->name == 'master' ? route('master/dashboard') : route('dashboard')) }}" class="bg-[#E5F4F2] text-[#009379] font-semibold rounded-full px-6 py-2 transition duration-300 hover:bg-[#009379] hover:text-[#E5F4F2]">
                        <i class="fas fa-sign-in-alt"></i> {{ Auth::user()->role->name == 'admin' ? __('Admin Dashboard') : (Auth::user()->role->name == 'master' ? __('Master Dashboard') : __('Dashboard')) }}
                    </a>
                @else
                    <a href="{{ route('login') }}" class="bg-[#E5F4F2] text-[#009379] font-semibold rounded-full px-12 py-4 transition duration-300 hover:bg-[#009379] hover:text-[#E5F4F2]">
                        <i class="fas fa-sign-in-alt"></i> {{ __('Login') }}
                    </a>
                @endauth
            </div>
        @endif
    </nav>

    <!-- Mobile Menu -->
    <div id="mobileMenu" class="hidden lg:hidden px-4">
        <div class="flex flex-col items-center bg-[#F8F9FF] space-y-4 mt-4">
            <a href="#" class="text-base font-semibold text-[#009379] hover:text-[#007F6E] py-2">Home</a>
            <a href="#about" class="text-base font-semibold text-[#009379] hover:text-[#007F6E] py-2">Tentang PIPAS</a>
            <a href="#galeri" class="text-base font-semibold text-[#009379] hover:text-[#007F6E] py-2">Galeri</a>
            <a href="#team" class="text-base font-semibold text-[#009379] hover:text-[#007F6E] py-2">Our Team</a>
            <a href="#contact-form" class="text-base font-semibold text-[#009379] hover:text-[#007F6E] py-2">Contact</a>
            <hr>
            {{-- @if (Route::has('login'))
                @auth
                    <a href="{{ Auth::user()->role->name == 'admin' ? route('admin/dashboard') : (Auth::user()->role->name == 'master' ? route('master/dashboard') : route('dashboard')) }}" class="bg-[#E5F4F2] text-[#009379] font-semibold rounded-full px-6 py-2 transition duration-300 hover:bg-[#009379] hover:text-[#E5F4F2]">
                        <i class="fas fa-sign-in-alt"></i> {{ Auth::user()->role->name == 'admin' ? __('Admin Dashboard') : (Auth::user()->role->name == 'master' ? __('Master Dashboard') : __('Dashboard')) }}
                    </a>
                @else
                    <a href="{{ route('login') }}" class="bg-[#E5F4F2] text-[#009379] font-semibold rounded-full px-6 py-2 transition duration-300 hover:bg-[#009379] hover:text-[#E5F4F2]">
                        <i class="fas fa-sign-in-alt"></i> {{ __('Login') }}
                    </a>
                @endauth
            @endif --}}
        </div>
    </div>

    <!-- Script to toggle the mobile menu -->
    <script>
        document.getElementById('mobileMenuToggle').addEventListener('click', function () {
            document.getElementById('mobileMenu').classList.toggle('hidden');
        });
    </script>
</header>


{{-- <header class="navigation bg-tertiary">
  <nav class="navbar">
    <div class="container nav-wrapper">
      <a href="#" class="logo"><span><i class="fa-solid fa-seedling"></i> DAMASU</span></a>
      <div class="menu-wrapper">
        <ul class="menu">
            <li class="{{request()->is('#') ? 'active' : ''}} menu-item"><a href="#" class="menu-link">Home</a></li>
            <li class="{{request()->is('#about') ? 'active' : ''}} menu-item"><a href="#about" class="menu-link">Tentang PIPAS</a></li>
            <li class="{{request()->is('#galeri') ? 'active' : ''}} menu-item"><a href="#galeri" class="menu-link">Galeri</a></li>
            <li class="{{request()->is('#team') ? 'active' : ''}} menu-item"><a href="#team" class="menu-link">Our Team</a></li>
            <li class="{{request()->is('#contact-form') ? 'active' : ''}} menu-item"><a href="#contact-form" class="menu-link">Contact</a></li>
            <!-- <li class="menu-item"><a href="#contact-form" class="menu-link">Contact</a></li> -->
        </ul>
        @if (Route::has('login'))
            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                @auth
                    @if (Auth::user()->role->name == 'admin')
                        <a href="{{ route('admin/dashboard') }}" class="btn-login"><i class="fas fa-sign-in-alt"></i> {{__('Admin Dashboard')}}</a>
                    @elseif (Auth::user()->role->name == 'master')
                        <a href="{{ route('master/dashboard') }}" class="btn-login"><i class="fas fa-sign-in-alt"></i> {{__('Master Dashboard')}}</a>
                    @else
                        <a href="{{ route('dashboard') }}" class="btn-login"><i class="fas fa-sign-in-alt"></i> {{__('Dashboard')}}</a>
                    @endif
                @else
                    <a href="{{ route('login') }}" class="btn-login"><i class="fas fa-sign-in-alt"></i> {{__('Login')}}</a>
                @endauth
            </div>
        @endif
      </div>
    </div>
  </nav>
</header> --}}