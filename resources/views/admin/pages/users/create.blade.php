@extends('layouts.admin')

@section('title', 'Data Pengguna')

@section('contents')
  <div>
    <main id="main" class="main">

      <x-breadcrumbs 
        title="{{ __('Add New User')}}" c
        :items="[
          ['route' => 'home', 'label' => 'Home'],
          ['route' => 'users', 'label' => 'Users'],
          ['label' => 'Add New User']
        ]" 
      />

      <section class="section dashboard">
        <div class="row">
          <div class="col-lg-8">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">{{__('Tambahkan User Baru')}}</h5>
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
                  <form action="{{ route('users.store') }}" method="POST">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" name="username" class="form-control" id="floatingInput" placeholder="Username" required>
                        <label for="floatingInput">{{__('Username')}}</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="email" name="email" class="form-control" id="floatingEmail" placeholder="name@example.com" required>
                        <label for="floatingEmail">{{__('Email address')}}</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
                        <label for="floatingPassword">{{__('Password')}}</label>
                    </div>

                    <div class="form-floating mb-3">
                        <select name="role_id" class="form-select" id="userRole" required>
                            <option value="" disabled selected>{{__('Silahkan pilih role')}}</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                        <label for="userRole">{{__('User Role')}}</label>
                    </div>

                    <div class="form-floating mb-3">
                        <select name="status" class="form-select" id="userStatus" required>
                            <option value="active">{{__('Active')}}</option>
                            <option value="inactive">{{__('Inactive')}}</option>
                        </select>
                        <label for="userStatus">{{__('Status')}}</label>
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