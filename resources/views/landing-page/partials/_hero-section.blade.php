<section class="home relative mt-0 pt-20 bg-cover bg-center bg-no-repeat pb-12 sm:bg-none" id="home" style="background-image: url('/images/Bg-Hero.png');">
    <div class="container mx-auto flex flex-wrap lg:flex-nowrap justify-center lg:justify-between items-center relative z-10 pb-24 px-8">
        <!-- Left Content -->
        <div class="content-left w-full lg:w-1/2 px-5 py-5 flex flex-col justify-center items-center text-center lg:text-left lg:items-start lg:justify-start">
            <h1 class="heading text-4xl lg:text-[4.1rem] font-bold text-[#2D2D2D] lg:text-white mt-10 lg:mt-40 leading-tight">
                Kelola <span class="text-[#009379]">Tanaman</span> Anda Lebih Mudah dengan <span class="text-[#009379]">SIM PANTAU TANAMAN</span>
            </h1>
            <p class="subHeading text-lg lg:text-[1.313rem] font-light text-[#2D2D2D] lg:text-white mt-6 lg:mt-16 mb-8 lg:mb-12 leading-relaxed">
                Aplikasi <span class="font-medium text-[#009379]">Sistem Inventarisasi Tanaman</span> membantu Anda memantau status tanaman, mencatat lokasi, dan mengelola jadwal perawatan serta panen secara efektif.
            </p>
            <div class="box-wrapper flex flex-wrap gap-5 justify-center lg:justify-start">
                @if (Route::has('login'))
                    <div class="box flex items-center gap-4">
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
                <div class="box items-center gap-4 sm:flex hidden">
                    <a href="#about" class="btn-about flex items-center text-[#009379] font-semibold bg-[#F8F9FF] px-6 py-3 rounded-lg border-2 border-[#009379] transition duration-300 hover:bg-[#009379] hover:text-[#F8F9FF]">
                        <i class="fas fa-info-circle mr-2"></i> Tentang SIM PANTAU TANAMAN
                    </a>
                </div>
            </div>
        </div>

        <!-- Right Content -->
        <div class="content-right w-full lg:w-1/2 flex justify-center lg:justify-end mt-10 lg:mt-0">
            <div class="img-wrapper max-w-xs sm:max-w-sm md:max-w-md lg:max-w-lg relative lg:left-0 top-16">
                <img src="{{ asset('/images/Hero-tanaman-IMG.png') }}" alt="Gambar Tanaman" class="hidden sm:block w-full h-auto">
            </div>
        </div>

    </div>

    @include('landing-page.components._statistic-card')

</section>
