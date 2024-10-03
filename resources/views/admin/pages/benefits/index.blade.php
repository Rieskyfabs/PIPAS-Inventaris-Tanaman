@extends('layouts.admin')

@section('title', 'Dashboard')

@section('contents')
  <div>
    <main id="main" class="main">

      <x-breadcrumbs 
        title="Manfaat" 
        :items="[
          ['route' => 'home', 'label' => 'Home'],
          ['label' => 'Manfaat']
        ]" 
      />

      <section class="section dashboard">
        <div class="row">
          <div class="col-lg-12">

            <div class="card">
              <div class="card-body">
                <h5 class="card-title">{{__('BENEFITS')}}</h5>
                <div class="add-btn-container">
                    <a href="{{ route('benefits.create') }}" class="btn-add-item">
                        <svg fill="#ffffff" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff">
                          <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                          <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                          <g id="SVGRepo_iconCarrier">
                            <path d="M18,22a1,1,0,0,0,1-1V8L12,2,5,8V21a1,1,0,0,0,1,1ZM12,7a2,2,0,1,1-2,2A2,2,0,0,1,12,7ZM9,16h2V14h2v2h2v2H13v2H11V18H9Z"></path>
                          </g>
                        </svg>
                        {{ __('Add Benefits') }}
                    </a>
                </div>

                <!-- Table with stripped rows -->
                <table class="table table-bordered table-hover datatable">
                    <thead>
                        <tr>
                          <th>{{__('NO')}}</th>
                          <th>{{__('NAMA MANFAAT')}}</th>
                          <th>{{__('CREATED AT')}}</th>
                          <th>{{__('ACTIONS')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($benefits as $benefit)
                            <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ $benefit->name }}</td>
                              <td>{{ $benefit->created_at->format('d F Y, H:i') }}</td>
                              <td>
                                  <x-action-buttons
                                      deleteData="{{ route('benefits.destroy', $benefit->id) }}"
                                      method="DELETE"
                                      submit="true" {{-- Tombol hapus akan muncul --}}
                                      :dropdown="[ 
                                          ['href' => route('benefits.edit', $benefit->id), 'label' => 'Edit'], 
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
      </section>
      
    </main>
  </div>
@endsection