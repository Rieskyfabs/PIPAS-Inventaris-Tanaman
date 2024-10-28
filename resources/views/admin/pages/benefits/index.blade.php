@extends('layouts.admin')

@section('title', 'Dashboard')

@section('contents')
  <div>
    <main id="main" class="main">

      <x-breadcrumbs 
        title="Manfaat Tanaman" 
        :items="[
          ['route' => 'admin/dashboard', 'label' => 'Dashboard'],
          ['label' => 'Manfaat Tanaman']
        ]" 
      />

      <section class="section dashboard">
        <div class="row">
          <div class="col-lg-12">

            <div class="card">
              <div class="card-body">
                <h5 class="card-title">{{__('DATA MANFAAT TANAMAN')}}</h5>
                <div class="add-btn-container">
                    <button type="button" class="btn-add-item" data-bs-toggle="modal" data-bs-target="#Benefit">
                        +
                        {{ __('TAMBAH') }}
                    </button>
                </div>

                <!-- Table with stripped rows -->
                <table class="table table-bordered table-hover datatable">
                    <thead>
                        <tr>
                          <th>{{__('NO')}}</th>
                          <th>{{__('NAMA MANFAAT')}}</th>
                          <th>{{__('DIBUAT PADA')}}</th>
                          <th>{{__('AKSI')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($benefits as $benefit)
                            <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ $benefit->name }}</td>
                              <td>{{ $benefit->created_at->format('d F Y, H:i') }}</td>
                              <td style="display: flex; align-items: center;">
                                      <button type="button" class="icon-button" data-bs-toggle="modal" data-bs-target="#EditBenefit{{ $benefit->id }}">
                                      <i class='bx bx-edit'></i>
                                  </button>
                                  <x-action-buttons
                                      deleteData="{{ route('benefits.destroy', $benefit->id) }}"
                                      method="DELETE"
                                      submit="true"
                                  />
                              </td>
                              @include('modals.edit_benefit_modal')
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- End Table with stripped rows -->
                @include('modals.create_benefit_modal')
              </div>
            </div>
          </div>
        </div>
      </section>
      
    </main>
  </div>
@endsection