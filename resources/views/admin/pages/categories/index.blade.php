@extends('layouts.admin')

@section('title', 'Dashboard')

@section('contents')
  <div>
    <main id="main" class="main">

      <x-breadcrumbs 
        title="Kategori" 
        :items="[
          ['route' => 'home', 'label' => 'Home'],
          ['label' => 'Kategori']
        ]" 
      />

      <section class="section">
        <div class="row">
          <div class="col-lg-12">

            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Kategori</h5>
                <p></p>

                <!-- Table with stripped rows -->
                <table class="table datatable">
                    <thead>
                        <tr>
                          <th>{{__('ID')}}</th>
                          <th>{{__('CATEGORIES NAME')}}</th>
                          <th>{{__('DESCRIPTIONS')}}</th>
                          <th>{{__('STATUS')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                              <td>{{ $category->id }}</td>
                              <td>{{ $category->name }}</td>
                              <td>{{ $category->description ?? 'No Description' }}</td>
                              <td>{{ $category->status }}</td>
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