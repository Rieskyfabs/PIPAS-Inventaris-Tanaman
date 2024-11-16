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

                        <!-- Cards Overview -->
                            @include('admin/dashboard._cards')
                        <!-- End Cards Overview -->

                        <!-- Reports -->
                            @include('admin/dashboard._reports')
                        <!-- End Reports -->

                        <!-- Recent Plants -->
                            @include('admin/dashboard._recentPlants')
                        <!-- End Recent Plants -->

                    </div>
                <!-- End Left side columns -->

                <!-- Right side columns -->
                    <div class="col-lg-4">

                        <!-- Recent Activity -->
                            @include('admin/dashboard._recentActivity')
                        <!-- End Recent Activity -->
                        
                        <!-- Total Plant Locations -->
                            @include('admin/dashboard._total-plant-locations')
                        <!-- End Total Plant Locations -->

                        <!-- Galeries -->
                            {{-- @include('admin/dashboard._plantGalery') --}}
                        <!-- END Galeries -->

                        <!-- Plant Condition Chart -->
                            @include('admin/dashboard._plantConditionChart')
                        <!-- End Plant Condition Chart -->
                        
                    </div>
                <!-- End Right side columns -->
            </div>
        </section>

    </main>
</div>
@endsection