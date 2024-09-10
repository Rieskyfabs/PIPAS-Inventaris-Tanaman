@extends('layouts.admin')

@section('title', 'Dashboard')

@section('contents')
  <div>
    <main id="main" class="main">

      <x-breadcrumbs 
        title="Locations" 
        :items="[
          ['route' => 'home', 'label' => 'Home'],
          ['label' => 'Locations']
        ]" 
      />

      <section class="section">
        <div class="row">
          <div class="col-lg-12">

            <div class="card">
              <div class="card-body">
                <h5 class="card-title">{{__('Locations Data')}}</h5>
                <p></p>

                <!-- Table with stripped rows -->
                <table class="table datatable">
                    <thead>
                        <tr>
                          <th>ID</th>
                          <th>Locations</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($locations as $location)
                            <tr>
                              <td>{{ $location->id }}</td>
                              <td>{{ $location->name }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- End Table with stripped rows -->

              </div>
            </div>
          </div>
        </div>
      </section>
      
    </main>
  </div>
@endsection