<section id="highlighted-cta" class="py-10 px-10">
    <div class="container mx-auto flex flex-col lg:flex-row items-center justify-between max-w-5xl bg-[#F2B8A0] rounded-2xl shadow-lg p-6">
        <!-- Left Content -->
        <div class="w-full lg:w-1/2 text-center lg:text-left">
            <h2 class="text-2xl sm:text-3xl font-bold text-[#333333] tracking-tight px-4 sm:px-10 lg:px-16 leading-snug">
                "<span class="text-[#009379]">Aku Ada</span> Lingkunganku <span class="text-[#009379]">Bahagia</span>."
            </h2>
            <p class="text-base sm:text-lg font-light mt-4 sm:mt-6 text-[#333333] px-4 sm:px-10 lg:px-16">
                Ayo Bergabung & Berkontribusi dengan tim PIPAS, Dan Menjadi Pelajar Yang Berani, Jujur & Disiplin.
            </p>
            @if (Route::has('login'))
                <div class="mt-6 sm:mt-8 px-4 sm:px-10 lg:px-16">
                    @auth
                        <a href="{{ Auth::user()->role->name == 'admin' ? route('admin/dashboard') : (Auth::user()->role->name == 'master' ? route('master/dashboard') : route('dashboard')) }}" class="inline-block bg-[#009379] text-white font-semibold py-3 px-6 sm:px-8 rounded-lg transition hover:bg-opacity-90">
                            <i class="fas fa-sign-in-alt"></i> {{ Auth::user()->role->name == 'admin' ? __('Dashboard') : (Auth::user()->role->name == 'master' ? __('Dashboard') : __('Dashboard')) }}
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="inline-block bg-[#009379] text-white font-semibold py-3 px-6 sm:px-8 rounded-lg transition hover:bg-opacity-90">
                            <i class="fas fa-sign-in-alt mr-2"></i> Login Sekarang
                        </a>
                    @endauth
                </div>
            @endif
        </div>
        <!-- Right Content -->
        <div class="w-full lg:w-1/2 flex justify-center lg:justify-end mt-8 lg:mt-0">
            <div class="relative lg:max-w-lg max-w-xs lg:top-0 lg:left-8 left-3 top-6">
                <img src="{{ asset('/images/Mockup1.png') }}" alt="Dua orang siswa dengan latar belakang tanaman" class="w-[85%] sm:w-[90%] lg:w-[92%]">
            </div>
        </div>
    </div>
</section>
