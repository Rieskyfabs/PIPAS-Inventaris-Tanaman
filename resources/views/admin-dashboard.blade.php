@extends('layouts.admin')

@section('title', 'Dashboard')

@section('contents')
  <div>
    <main id="main" class="main">

      <x-breadcrumbs 
        title="Halo, {{Auth::user()->username}}!" 
        :items="[
            ['route' => 'home', 'label' => 'Home'],
            ['label' => 'Dashboard']
        ]" 
      />  

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

            <!-- Plant Card -->
            <x-card
              type="plants"
              title="Tanaman"
              period="Today"
              icon="ri-plant-fill"
              value="145"
              changePercent="12"
              changeType="increase"
              :filter="true"
              :filterOptions="['Today', 'This Month', 'This Year']"
            />

            <!-- End Plant Card -->

            <!-- Borrow Card -->
            {{-- <x-card
              type="revenue"
              title="Dipinjam"
              period="Today"
              icon="bi-arrow-left-right"
              value="64"
              changePercent="12"
              changeType="decrease"
              :filter="true"
              :filterOptions="['Today', 'This Month', 'This Year']"
            /> --}}
            <!-- End Borrow Card -->

            <!-- Users Card -->
            <x-card
              type="users"
              title="Pengguna"
              period="Today"
              icon="bi bi-people"
              value="64"
              changePercent="12"
              changeType="increase"
              :filter="true"
              :filterOptions="['Today', 'This Month', 'This Year']"
            />
            <!-- End Users Card -->

          </div>
        </div>
        <!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">
          
        </div>
        <!-- End Right side columns -->

      </div>
    </section>

    </main>
  </div>
@endsection