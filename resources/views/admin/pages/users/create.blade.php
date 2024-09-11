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
          ['label' => 'Add New User']
        ]" 
      />

      <section class="section dashboard">
        <div class="row">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Tambahkan User Baru</h5>

                <!-- Advanced Form Elements -->
                  <form action="{{ route('users.store') }}" method="POST">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" name="username" class="form-control" id="floatingInput" placeholder="Username" required>
                        <label for="floatingInput">Username</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" name="email" class="form-control" id="floatingEmail" placeholder="name@example.com" required>
                        <label for="floatingEmail">Email address</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
                        <label for="floatingPassword">Password</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select name="role" class="form-select" id="userRole" required>
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>
                        <label for="userRole">User Role</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select name="status" class="form-select" id="userStatus" required>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                        <label for="userStatus">Status</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
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