<div class="row">
    
    <!-- Card 1 -->
    <x-card
        type="plants"
        title="Total Tanaman"
        icon="ri-plant-line"
        value="{{ $totalPlantsQuantity }}"
    />
    <!-- End Card 1 -->

    <!-- Card 2 -->
    <x-card
        type="revenue"
        title="Total Tanaman Masuk"
        icon="bx bx-archive-in"
        value="{{ $totalTransactionIn }}"
    />
    <!-- End Card 2 -->

    <!-- Card 3 -->
    <x-card
        type="location"
        title="Total Tanaman Keluar"
        icon="bx bx-archive-out"
        value="{{ $totalTransactionOut }}"
    />
    <!-- End Card 3 -->

</div>
