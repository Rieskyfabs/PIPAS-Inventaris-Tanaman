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

      <section class="section dashboard">
        <div class="row">
          <!-- Total Users Card -->
            <x-card
              type="plants"
              title="Total Pengguna"
              period="Hari ini"
              icon="bi bi-people"
              value="{{$users->count()}}"
              changePercent="12"
              changeType="increase"
              :filter="true"
              :filterOptions="['Hari ini', 'Bulan Ini', 'Tahun Ini']"
            />
            <!-- End Total Users Card -->
            
            <!-- Total Users Active Card -->
            <x-card
              type="revenue"
              title="Total Pengguna Aktif"
              period="Hari ini"
              icon="bi bi-person-check"
              value="{{$activeUsersCount}}"
              changePercent="8"
              changeType="decrease"
              :filter="true"
              :filterOptions="['Hari ini', 'Bulan Ini', 'Tahun Ini']"
            />
            <!-- End Total Users Active Card -->

            <!-- Total Users Inactive Card -->
            <x-card
              type="location"
              title="Total Pengguna Tidak Aktif"
              period="Hari ini"
              icon="bi bi-person-dash"
              value="{{$inactiveUsersCount}}"
              changePercent="12"
              changeType="increase"
              :filter="true"
              :filterOptions="['Hari ini', 'Bulan Ini', 'Tahun Ini']"
            />
            <!-- End Total Users Inactive Card -->

          <div class="col-lg-12">

            <div class="card">
              <div class="card-body">
                <h5 class="card-title">{{ __('Users Data') }}</h5>
                <div class="add-btn-container">
                  <a href="{{ route('users.create') }}" class="btn-add-item">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12h4m-2 2v-4M4 18v-1a3 3 0 0 1 3-3h4a3 3 0 0 1 3 3v1a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1Zm8-10a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                    </svg>
                    {{ __('Add Users') }}
                  </a>
                </div>
              <div class="table-responsive">
                <!-- Table with stripped rows -->
                <table class="table table-bordered table-hover datatable">
                  <thead>
                      <tr>
                        <th>{{__('USER')}}</th>
                        <th>{{__('ROLE')}}</th>
                        <th>{{__('STATUS')}}</th>
                        <th>{{__('ACTIONS')}}</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($users as $user)
                        <tr>
                          <td>
                            <div class="d-flex justify-content-start align-items-center user-name">
                              <div class="avatar-wrapper"><div class="avatar avatar-sm me-4">
                                @if ($user->profile_image)
                                    <img src="{{ asset($user->profile_image) }}" alt="Profile Image" class="users-image">
                                @else
                                    <div class="initials-avatar" style="background-color: {{ $user->colors['background'] }}; color: {{ $user->colors['text'] }};">
                                      {{ strtoupper(substr($user->username, 0, 2)) }}
                                    </div>
                                @endif
                              </div>
                            </div>
                            <div class="d-flex flex-column">
                              <a href="app-user-view-account.html" class="text-heading text-truncate">
                                <span class="fw-medium">{{ $user->username }}</span>
                              </a><small>{{ $user->email }}</small>
                            </div>
                          </td>
                          <td>
                            <span class="role-label {{ strtolower($user->role->name) }}">
                                @if($user->role->name === 'admin')
                                    <i class="fas fa-crown"></i>
                                @elseif($user->role->name === 'user')
                                    <i class="fas fa-user"></i>
                                @else
                                    <i class="fas fa-user-tag"></i>
                                @endif
                                {{ ucfirst($user->role->name) }}
                            </span>
                          </td>
                          <td>
                              @if($user->status == 'active')
                                  <span class="badge badge-soft-green">{{__('Active')}}</span>
                              @elseif($user->status == 'inactive')
                                  <span class="badge badge-soft-gray">{{__('Inactive')}}</span>
                              @else
                                  <span class="badge badge-soft-secondary">{{__('Unknown')}}</span>
                              @endif
                          </td>
                          <td>
                              <x-action-buttons
                                  viewData="{{ route('users.show', $user->id) }}"
                                  deleteData="{{ route('users.destroy', $user->id) }}"
                                  method="DELETE"
                                  submit="true" {{-- Tombol hapus akan muncul --}}
                                  :dropdown="[ 
                                      ['href' => route('users.edit', $user->id), 'label' => 'Edit'], 
                                      ['href' => '#', 'label' => 'Suspend User'] 
                                  ]"
                              />
                          </td>
                        </tr>
                      @endforeach
                  </tbody>
                </table>
                <!-- End Table with stripped rows -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      
    </main>
  </div>
@endsection