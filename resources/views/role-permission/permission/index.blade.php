@extends('layouts.admin')

@section('title', 'Data Permissions')

@section('contents')
  <div>
    <main id="main" class="main">

      <x-breadcrumbs 
        title="{{ __('Permissions')}}" 
        :items="[
          ['route' => 'home', 'label' => 'Home'],
          ['label' => 'Permissions']
        ]" 
      />

      <section class="section dashboard">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">{{ __('Permissions Data') }}</h5>
                <div class="add-btn-container">
                  <a href="{{ route('permissions.create') }}" class="btn-add-item">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12h4m-2 2v-4M4 18v-1a3 3 0 0 1 3-3h4a3 3 0 0 1 3 3v1a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1Zm8-10a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                    </svg>
                    {{ __('Add Permissions') }}
                  </a>
                </div>
              <div class="table-responsive">
                <!-- Table with stripped rows -->
                <table class="table table-bordered table-hover datatable">
                  <thead>
                      <tr>
                        <th>{{__('PERMISSION NAME')}}</th>
                        <th>{{__('ASSIGNED TO')}}</th>
                        <th>{{__('CREATED AT')}}</th>
                        <th>{{__('ACTIONS')}}</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($permissions as $permission)
                        <tr>
                          <td>{{ $permission->name }}</td>
                          <td>
                            STATIC : ROLE 
                          </td>
                          <td>{{ $permission->created_at->format('d F Y, H:i') }}</td>
                          <td>
                              <x-action-buttons
                                  deleteData="{{ route('permissions.destroy', $permission->id) }}"
                                  method="DELETE"
                                  submit="true" {{-- Tombol hapus akan muncul --}}
                                  :dropdown="[ 
                                      ['href' => route('permissions.edit', $permission->id), 'label' => 'Edit'], 
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