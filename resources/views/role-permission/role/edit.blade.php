@extends('layouts.admin')

@section('title', 'Data Permissions')

@section('contents')
  <div>
    <main id="main" class="main">

      <x-breadcrumbs 
        title="{{ __('Edit Roles')}}" 
        :items="[
          ['route' => 'home', 'label' => 'Home'],
          ['route' => 'permissions', 'label' => 'Roles'],
          ['label' => 'Edit Roles']
        ]" 
      />

      <section class="section dashboard">
        <div class="row">
          <div class="col-lg-8">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">{{__('Edit Roles')}}</h5>
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
                  <form action="{{ route('roles.update', $role->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-floating mb-3">
                        <input type="text" name="name" class="form-control" id="floatingInput" value="{{ old('name', $role->name) }}" required>
                        <label for="floatingInput">{{__('ROLE NAME')}}</label>
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