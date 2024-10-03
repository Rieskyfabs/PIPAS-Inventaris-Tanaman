@extends('layouts.admin')

@section('title', 'Data Permissions')

@section('contents')
  <div>
    <main id="main" class="main">

      <x-breadcrumbs 
        title="{{ __('Edit Permissions')}}" 
        :items="[
          ['route' => 'home', 'label' => 'Home'],
          ['route' => 'permissions', 'label' => 'Permissions'],
          ['label' => 'Edit Permissions']
        ]" 
      />

      <section class="section dashboard">
        <div class="row">
          <div class="col-lg-8">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">{{__('Edit Permissions')}}</h5>
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
                  <form action="{{ route('permissions.update', $permission->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-floating mb-3">
                        <input type="text" name="name" class="form-control" id="floatingInput" value="{{ old('name', $permission->name) }}" required>
                        <label for="floatingInput">{{__('PERMISSION NAME')}}</label>
                    </div>

                    <hr>
                    <button type="submit" class="btn btn-primary">{{__('Update')}}</button>
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