@extends('layouts.admin')

@section('title', 'List Data Siswa')

@section('contents')
  <div>
    <main id="main" class="main">

      <x-breadcrumbs 
        title="List Data Siswa" 
        :items="[
          ['route' => 'admin/dashboard', 'label' => 'Dashboard'],
          ['label' => 'List Data Siswa']
        ]" 
      />

      <section class="section">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">{{ __('Data Siswa') }}</h5>
                <x-error-alert />
                <div class="add-btn-container">
                    <x-add-button 
                      target="#Students" 
                      label="TAMBAH" 
                    />
                </div>
                <!-- Table with stripped rows -->
                <table class="table table-bordered table-hover datatable">
                    <thead>
                        <tr>
                          <th>{{__('NO')}}</th>
                          <th>{{__('NAMA')}}</th>
                          <th>{{__('ROMBEL')}}</th>
                          <th>{{__('RAYON')}}</th>
                          <th>{{__('NIS')}}</th>
                          <th>{{__('EMAIL')}}</th>
                          <th>{{__('GENDER')}}</th>
                          <th>{{__('AKSI')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $item)
                            <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td>
                                <div class="d-flex flex-column">
                                    <div class="text-heading text-truncate">
                                      <span class="fw-medium">{{ $item->name }}</span>
                                    </div>
                                    <small>{{ $item->description ?? 'Tidak Ada Deskripsi' }}</small>
                                </div>
                              </td>
                              <td>{{ $item->rombel->name ?? 'Rombel tidak ditemukan' }}</td>
                              <td>{{ $item->rayon->name ?? 'Rayon tidak ditemukan' }}</td>
                              <td>{{ $item->nis ?? 'Nis tidak ditemukan' }}</td>
                              <td>{{ $item->email ?? 'Email tidak ditemukan' }}</td>
                              <td>{{ $item->gender ?? 'Gender tidak ditemukan' }}</td>
                              <td>
                                  <div style="display: flex; align-items: center;">
                                      <x-action-buttons 
                                        editModalTarget="#EditStudents{{ $item->id }}"
                                        deleteRoute="{{ route('student-data.destroy', $item->id) }}"
                                      />
                                  </div>
                              </td>
                            </tr>
                            @include('modals.edit_students_modal')
                        @endforeach
                    </tbody>
                </table>
                <!-- End Table with stripped rows -->
                @include('modals.create_students_modal')
              </div>
            </div>
          </div>
        </div>
      </section>
      
    </main>
  </div>
@endsection