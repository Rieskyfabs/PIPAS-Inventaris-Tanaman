@extends('layouts.admin')

@section('title', 'Data Pengguna')

@section('contents')
  <div>
    <main id="main" class="main">

      <x-breadcrumbs 
        title="{{ __('Add New User')}}" 
        :items="[
          ['route' => 'home', 'label' => 'Home'],
          ['route' => 'users', 'label' => 'Users'],
          ['label' => 'Edit User']
        ]" 
      />

      <section class="section dashboard">
        <div class="row">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Edit User</h5>
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
                        <label for="floatingInput">Username</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" name="email" class="form-control" id="floatingEmail" value="{{ $user->email }}" required>
                        <label for="floatingEmail">Email address</label>
                    </div>
                    <div class="form-floating mb-3">
                      <select name="role_id" class="form-select" id="userRole" required>
                          <option value="" disabled>Silakan pilih role</option>
                          @foreach($roles as $role)
                              <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>
                                  {{ $role->name }}
                              </option>
                          @endforeach
                      </select>
                      <label for="userRole">User Role</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select name="status" class="form-select" id="userStatus" required>
                            <option value="active" {{ $user->status == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ $user->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                        <label for="userStatus">Status</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
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