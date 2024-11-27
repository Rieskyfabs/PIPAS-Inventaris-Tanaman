
<div class="container mx-auto px-6 lg:px-10">
    {{-- <h2 class="text-3xl font-bold text-center text-gray-800 mb-10">Statistik Inventaris Tanaman</h2> --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Total Plants -->
        <x-LandingPage.statistic-card
            count="150+"
            title="Tanaman yang Dirawat"
            description="Merawat lebih dari 150 tanaman dengan baik" 
        />

        <!-- Inventory Locations -->
        <x-LandingPage.statistic-card
            count="10+"
            title="Lokasi Inventaris"
            description="Tersebar di 10 lokasi strategis" 
        />

        <!-- Plant Types -->
        <x-LandingPage.statistic-card
            count="25+"
            title="Jenis Tanaman"
            description="Beragam jenis tanaman unik" 
        />
    </div>
</div>
