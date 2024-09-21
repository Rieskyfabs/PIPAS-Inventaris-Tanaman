@extends('layouts.admin')

@section('title', 'Data Pengguna')

@section('contents')
  <div>
    <main id="main" class="main">

      <x-breadcrumbs 
        title="{{ __('Edit User')}}" 
        :items="[
          ['route' => 'home', 'label' => 'Home'],
          ['route' => 'users', 'label' => 'Users'],
          ['label' => 'Edit User']
        ]" 
      />

      <section class="section dashboard">
        <div class="row">
          <div class="col-lg-8">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">{{__('Edit User')}}</h5>
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
                  <form action="{{ route('users.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-floating mb-3">
                        <input type="text" name="username" class="form-control" id="floatingInput" value="{{ $user->username }}" required>
                        <label for="floatingInput">{{__('Username')}}</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" name="email" class="form-control" id="floatingEmail" value="{{ $user->email }}" required>
                        <label for="floatingEmail">{{__('Email Address')}}</label>
                    </div>
                    <div class="form-floating mb-3">
                      <select name="role_id" class="form-select" id="userRole" required>
                          <option value="" disabled>{{__('Silakan pilih role')}}</option>
                          @foreach($roles as $role)
                              <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>
                                  {{ $role->name }}
                              </option>
                          @endforeach
                      </select>
                      <label for="userRole">{{__('User Role')}}</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select name="status" class="form-select" id="userStatus" required>
                            <option value="active" {{ $user->status == 'active' ? 'selected' : '' }}>{{__('Active')}}</option>
                            <option value="inactive" {{ $user->status == 'inactive' ? 'selected' : '' }}>{{__('Inactive')}}</option>
                        </select>
                        <label for="userStatus">{{__('Status')}}</label>
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