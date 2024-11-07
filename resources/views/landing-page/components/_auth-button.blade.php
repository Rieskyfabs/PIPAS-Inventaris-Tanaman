<!-- view/landing-page/components/AuthButtonsComponent.blade.php -->
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
