<section class="about py-16 pt-20" id="about">
    <div class="container mx-auto flex flex-wrap justify-center px-8">
        <div class="content-left w-full lg:w-1/2 flex justify-center lg:justify-start">
            <div class="img-wrapper relative lg:left-0 lg:-top-10">
                <img src="{{ asset('/images/Visuals.png') }}" alt="Gambar Inventaris Tanaman" class="w-full sm:w-[120%] mt-10 lg:mt-56">
            </div>
        </div>
        <div class="content-right w-full lg:w-1/2 mt-10 lg:mt-0 text-center lg:text-left">
            <h1 class="heading text-4xl md:text-5xl lg:text-6xl font-bold text-gray-700 mt-10 lg:mt-44">
                Tentang <span class="text-[#009379]">SIM Pantau Tanaman</span>
            </h1>

            <p class="subHeading text-lg md:text-xl text-gray-600 mt-6">
                <span class="text-[#009379] font-extrabold">SIM Pantau Tanaman</span> adalah sistem yang dirancang untuk mengelola inventaris tanaman. Dengan SIM Pantau Tanaman, Anda dapat melacak status pertumbuhan tanaman, mencatat lokasi penanaman, serta mengatur jadwal perawatan dan panen dengan mudah dan efisien.
            </p>

            <!-- Card Components -->
                @include('landing-page.components._about-card')
            <!-- End Card Components -->

        </div>
    </div>
</section>
