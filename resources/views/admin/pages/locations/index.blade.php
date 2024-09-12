@extends('layouts.admin')

@section('title', 'Dashboard')

@section('contents')
  <div>
    <main id="main" class="main">

      <x-breadcrumbs 
        title="Locations" 
        :items="[
          ['route' => 'home', 'label' => 'Home'],
          ['label' => 'Locations']
        ]" 
      />

      <section class="section dashboard"> 
          <div class="row">
              <div class="col-lg-12">
                  <div class="card">
                      <div class="card-body">
                          <h5 class="card-title">{{__('Locations Data')}}</h5>
                          <div class="add-btn-container">
                              <a href="{{ route('locations.create') }}" class="btn-add-item">
                                  <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier"> 
                                      <path d="M12 13V7M15 10.0008L9 10M19 10.2C19 14.1764 15.5 17.4 12 21C8.5 17.4 5 14.1764 5 10.2C5 6.22355 8.13401 3 12 3C15.866 3 19 6.22355 19 10.2Z" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> 
                                    </g>
                                  </svg>
                                  {{ __('Add Locations') }}
                              </a>
                          </div>
                          
                          <div class="table-responsive">
                              <!-- Table with stripped rows -->
                              <table class="table table-bordered table-hover datatable">
                                  <thead>
                                      <tr>
                                          <th>#</th>
                                          <th>{{__('LOCATIONS')}}</th>
                                          <th>{{__('STATUS')}}</th>
                                          <th>{{__('ACTIONS')}}</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      @foreach ($locations as $location)
                                          <tr>
                                              <td>{{ $loop->iteration }}</td>
                                              <td>{{ $location->name }}</td>
                                              <td>
                                                  @if($location->status == 'active')
                                                      <span class="badge badge-soft-green">Active</span>
                                                  @elseif($location->status == 'inactive')
                                                      <span class="badge badge-soft-gray">Inactive</span>
                                                  @else
                                                      <span class="badge badge-soft-secondary">Unknown</span>
                                                  @endif
                                              </td>
                                              <td>
                                                  <x-action-buttons
                                                      action="{{ route('locations.destroy', $location->id) }}"
                                                      method="DELETE"
                                                      submit="true"
                                                      :dropdown="[ ['href' => route('locations.edit', $location->id), 'label' => 'Edit'] ]"
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