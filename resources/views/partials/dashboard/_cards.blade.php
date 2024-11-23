<div class="row">
  <!-- Plant Card -->
    <x-card
        type="plants"
        title="Total Tanaman"
        icon="ri-plant-line"
        value="{{ $totalPlantsQuantity }}"
    />
  <!-- End Plant Card -->

  <!-- Card 2 -->
    <x-card
        type="revenue"
        title="Tanaman Masuk"
        icon="bx bx-archive-in"
        value="{{ $totalTransactionIn }}"
    />
  <!-- End Card 2 -->

  <!-- Card 3 -->
    <x-card
        type="location"
        title="Tanaman Keluar"
        icon="bx bx-archive-out"
        value="{{ $totalTransactionOut }}"
    />
  <!-- End Card 3 -->
</div>