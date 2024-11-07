<header class="navigation bg-tertiary">
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
</header>