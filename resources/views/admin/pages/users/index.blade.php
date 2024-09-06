@extends('layouts.admin')

@section('title', 'Data Pengguna')

@section('contents')
  <div>
    <main id="main" class="main">

      <x-breadcrumbs 
        title="{{ __('Users')}}" 
        :items="[
          ['route' => 'home', 'label' => 'Home'],
          ['label' => 'Users']
        ]" 
      />

      <section class="section">
        <div class="row">
          <div class="col-lg-12">

            <div class="card">
              <div class="card-body">
                <h5 class="card-title">{{ __('Users Data') }}</h5>
                <p></p>

                <!-- Table with stripped rows -->
                <table class="table datatable">
                    <thead>
                        <tr>
                          <th>{{__('Username')}}</th>
                          <th>{{__('Email')}}</th>
                          <th>{{__('Role')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                              <td>{{ $user->username }}</td>
                              <td>{{ $user->email }}</td>
                              <td>{{ $user->role }}</td>
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