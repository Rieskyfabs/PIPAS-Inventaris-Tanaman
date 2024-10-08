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
                    <button type="button" class="btn-add-item" data-bs-toggle="modal" data-bs-target="#createCategoryModal">
                        <i class="ri-add-fill"></i>
                        {{ __('TAMBAH') }}
                    </button>
                </div>

                <!-- Table with stripped rows -->
                <table class="table datatable">
                    <thead>
                        <tr>
                          <th>{{__('NO')}}</th>
                          <th>{{__('NAMA KATEGORI')}}</th>
                          <th>{{__('CREATED AT')}}</th>
                          <th>{{__('ACTIONS')}}</th>
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
                              <td>
                                  <x-action-buttons
                                      deleteData="{{ route('categories.destroy', $category->id) }}"
                                      method="DELETE"
                                      submit="true"
                                      :dropdown="[ 
                                        ['href' => route('categories.edit', $category->id), 'label' => 'Edit'], 
                                      ]"
                                  />
                              </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- End Table with stripped rows -->

                <!-- Create Category Modal -->
                <div class="modal fade" id="createCategoryModal" tabindex="-1" aria-labelledby="createCategoryModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="createCategoryModalLabel">{{ __('Tambahkan Kategori Baru') }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <form action="{{ route('categories.store') }}" method="POST">
                                    @csrf
                                    <div class="form-floating mb-3">
                                        <input type="text" name="name" class="form-control" id="floatingInputName" placeholder="name" required>
                                        <label for="floatingInputName">{{ __('Kategori') }}</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" name="description" class="form-control" id="floatingInputDescription" placeholder="description">
                                        <label for="floatingInputDescription">{{ __('Deskripsi') }}</label>
                                    </div>
                                    <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Create Category Modal -->

              </div>
            </div>
          </div>
        </div>
      </section>
      
    </main>
  </div>
@endsection