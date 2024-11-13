<section class="about py-16 pt-20" id="about">
    <div class="container mx-auto flex flex-wrap justify-between px-8">
        <div class="content-left w-full lg:w-1/2 flex justify-center lg:justify-start">
            <div class="img-wrapper relative lg:left-20 lg:-top-10">
                <img src="{{ asset('/images/Visuals.png') }}" alt="" class="w-full lg:w-[110%] mt-10 lg:mt-56">
            </div>
        </div>
        <div class="content-right w-full lg:w-1/2 mt-10 lg:mt-0">
            <h1 class="heading text-4xl md:text-5xl lg:text-6xl font-bold text-gray-700 mt-10 lg:mt-44 text-center lg:text-left">
                Tentang <span class="text-[#009379]">PIPAS</span>
            </h1>
            <p class="subHeading text-lg md:text-xl text-gray-600 mt-6 text-center lg:text-left">
                <span class="text-[#009379] font-extrabold">Kegiatan PIPAS</span> merupakan karakter dan kemampuan yang dibangun<br> dalam keseharian dan dalam diri setiap individu peserta <br> didik melalui budaya satuan pendidikan, dan <br> pembelajaran intrakurikuler.
            </p>
            @include('landing-page.components._about-card')
        </div>
    </div>
</section>
