@extends('layouts.admin')

@section('title', 'Data Permissions')

@section('contents')
  <div>
    <main id="main" class="main">

      <x-breadcrumbs 
        title="{{ __('Add New Permissions')}}" c
        :items="[
          ['route' => 'home', 'label' => 'Home'],
          ['route' => 'permissions', 'label' => 'Permissions'],
          ['label' => 'Add New Permissions']
        ]" 
      />

      <section class="section dashboard">
        <div class="row">
          <div class="col-lg-8">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">{{__('Tambahkan Permissions Baru')}}</h5>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <!-- Advanced Form Elements -->
                  <form action="{{ route('permissions.store') }}" method="POST">
                    @csrf

                      <div class="form-floating mb-3">
                          <input type="text" name="name" class="form-control" id="floatingInput" placeholder="Permission Name" required>
                          <label for="floatingInput">{{__('Permission Name')}}</label>
                      </div>

                    <hr>
                    <button type="submit" class="btn btn-primary">{{__('Submit')}}</button>
                  </form>
                <!-- End General Form Elements -->
              </div>
            </div>
          </div>
        </div>
      </section>
      
    </main>
  </div>
@endsection