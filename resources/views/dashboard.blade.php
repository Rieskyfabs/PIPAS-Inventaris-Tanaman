@extends('layouts.user')

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
                        <!-- Cards -->
                            @include('partials.dashboard._cards')
                        <!-- End Cards -->

                        <!-- Reports -->
                            @include('partials.dashboard._reports')
                        <!-- End Reports -->

                        <!-- Recent Plants -->
                            @include('partials.dashboard._recentPlants')
                        <!-- End Recent Sales -->
                    </div>

                <!-- End Left side columns -->

                <!-- Right side columns -->

                    <div class="col-lg-4">
                        <!-- Plant Gallery -->
                            @include('partials.dashboard._plantGallery')
                        <!-- End Plant Gallery -->
                        
                        <!-- Total Plant Chart -->
                            @include('partials.dashboard._totalPlantChart')
                        <!-- End Total Plant Chart -->
                    </div>

                <!-- End Right side columns -->
                
            </div>
        </section>
    </main>
</div>
@endsection