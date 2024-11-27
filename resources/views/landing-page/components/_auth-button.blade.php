@if (Route::has('login'))
    <div class="fixed sm:top-0 sm:right-0 top-4 right-4 p-6 text-right">
        @auth
            @if (Auth::user()->role->name == 'admin')
                <a href="{{ route('admin/dashboard') }}" class="inline-flex items-center text-white bg-green-600 hover:bg-green-700 font-semibold px-6 py-3 rounded-lg shadow-md">
                    <i class="fas fa-sign-in-alt mr-2"></i> {{ __('Admin Dashboard') }}
                </a>
            @elseif (Auth::user()->role->name == 'master')
                <a href="{{ route('master/dashboard') }}" class="inline-flex items-center text-white bg-green-600 hover:bg-green-700 font-semibold px-6 py-3 rounded-lg shadow-md">
                    <i class="fas fa-sign-in-alt mr-2"></i> {{ __('Master Dashboard') }}
                </a>
            @else
                <a href="{{ route('dashboard') }}" class="inline-flex items-center text-white bg-green-600 hover:bg-green-700 font-semibold px-6 py-3 rounded-lg shadow-md">
                    <i class="fas fa-sign-in-alt mr-2"></i> {{ __('Dashboard') }}
                </a>
            @endif
        @else
            <a href="{{ route('login') }}" class="inline-flex items-center text-white bg-green-600 hover:bg-green-700 font-semibold px-6 py-3 rounded-lg shadow-md">
                <i class="fas fa-sign-in-alt mr-2"></i> {{ __('Login') }}
            </a>
        @endauth
    </div>
@endif
