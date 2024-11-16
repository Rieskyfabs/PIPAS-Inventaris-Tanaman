<div class="row">
    <!-- Card 1 -->
    <x-card
        type="plants"
        title="Total Tanaman"
        period="Hari ini"
        icon="ri-plant-line"
        value="{{ $totalPlantsQuantity }}"
        changePercent="12"
        changeType="increase"
        :filter="true"
        :filterOptions="['Hari ini', 'Bulan Ini', 'Tahun Ini']"
    />
    <!-- End Card 1 -->

    <!-- Card 2 -->
    <x-card
        type="revenue"
        title="Total Tanaman Masuk"
        period="Hari ini"
        icon="bx bx-archive-in"
        value="{{ $totalTransactionIn }}"
        changePercent="12"
        changeType="increase"
        :filter="true"
        :filterOptions="['Hari ini', 'Bulan Ini', 'Tahun Ini']"
    />
    <!-- End Card 2 -->

    <!-- Card 3 -->
    <x-card
        type="location"
        title="Total Tanaman Keluar"
        period="Hari ini"
        icon="bx bx-archive-out"
        value="{{ $totalTransactionOut }}"
        changePercent="12"
        changeType="increase"
        :filter="true"
        :filterOptions="['Hari ini', 'Bulan Ini', 'Tahun Ini']"
    />
    <!-- End Card 3 -->
</div>
