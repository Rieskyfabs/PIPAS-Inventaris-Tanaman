@extends('layouts.admin')

@section('title', 'Dashboard')

@section('contents')
  <div>
    <main id="main" class="main">

      <x-breadcrumbs 
        title="Manfaat" 
        :items="[
          ['route' => 'home', 'label' => 'Home'],
          ['label' => 'Manfaat']
        ]" 
      />

      <section class="section">
        <div class="row">
          <div class="col-lg-12">

            <div class="card">
              <div class="card-body">
                <h5 class="card-title">{{__('Manfaat')}}</h5>
                <p></p>

                <!-- Table with stripped rows -->
                <table class="table datatable">
                    <thead>
                        <tr>
                          <th>{{__('ID')}}</th>
                          <th>{{__('BENEFITS NAME')}}</th>
                          <th>{{__('STATUS')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($benefits as $benefit)
                            <tr>
                              <td>{{ $benefit->id }}</td>
                              <td>{{ $benefit->name }}</td>
                              <td>{{ $benefit->status }}</td>
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