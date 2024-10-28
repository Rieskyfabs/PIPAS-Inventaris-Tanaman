@extends('layouts.admin')

@section('title', 'Dashboard')

@section('contents')
  <div>
    <main id="main" class="main">

      <x-breadcrumbs 
        title="Kategori" 
        :items="[
          ['route' => 'admin/dashboard', 'label' => 'Dashboard'],
          ['label' => 'Kategori']
        ]" 
      />

      <section class="section">
        <div class="row">
          <div class="col-lg-12">

            <div class="card">
              <div class="card-body">
                <h5 class="card-title">{{ __('KATEGORI TANAMAN') }}</h5>
                <div class="add-btn-container">
                    <button type="button" class="btn-add-item" data-bs-toggle="modal" data-bs-target="#Category">
                        +
                        {{ __('TAMBAH') }}
                    </button>
                </div>

                <!-- Table with stripped rows -->
                <table class="table table-bordered table-hover datatable">
                    <thead>
                        <tr>
                          <th>{{__('NO')}}</th>
                          <th>{{__('NAMA KATEGORI')}}</th>
                          <th>{{__('DIBUAT PADA')}}</th>
                          <th>{{__('AKSI')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td>
                                  <div class="d-flex flex-column">
                                      <div class="text-heading text-truncate">
                                        <span class="fw-medium">{{ $category->name }}</span>
                                      </div>
                                      <small>{{ $category->description ?? 'Tidak Ada Deskripsi' }}</small>
                                  </div>
                              </td>
                              <td>{{ $category->created_at->format('d F Y, H:i') }}</td>
                              <td style="display: flex; align-items: center;">
                                  <button type="button" class="icon-button" data-bs-toggle="modal" data-bs-target="#EditCategory{{ $category->id }}">
                                    <i class='bx bx-edit'></i>
                                  </button>
                                  <x-action-buttons
                                      deleteData="{{ route('categories.destroy', $category->id) }}"
                                      method="DELETE"
                                      submit="true"
                                  />
                              </td>
                            </tr>
                            @include('modals.edit_category_modal')
                        @endforeach
                    </tbody>
                </table>
                <!-- End Table with stripped rows -->
                @include('modals.create_category_modal')
              </div>
            </div>
          </div>
        </div>
      </section>
      
    </main>
  </div>
@endsection