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
                                    <small class="text-muted">{{ $item->description ?? 'Tidak Ada Deskripsi' }}</small>
                                </div>
                              </td>
                              <td>
                                  <div class="d-flex flex-column">
                                      <div class="text-heading text-truncate">
                                          <span class="fw-medium">{{ $item->rombel->name ?? 'data Rombel tidak ditemukan' }}</span>
                                      </div>
                                  </div>
                              </td>
                              <td>
                                  <div class="d-flex flex-column">
                                      <div class="text-heading text-truncate">
                                          <span class="fw-medium">{{ $item->rayon->name ?? 'data Rayon tidak ditemukan' }}</span>
                                      </div>
                                  </div>
                              </td>
                              <td>
                                  <div class="d-flex flex-column">
                                      <div class="text-heading text-truncate">
                                          <span class="fw-medium">{{ $item->nis ?? 'data Nis tidak ditemukan' }}</span>
                                      </div>
                                  </div>
                              </td>
                              <td>
                                  <div class="d-flex flex-column">
                                      <div class="text-heading text-truncate">
                                          <span class="text-muted">
                                              <i class="ri-mail-line me-2"></i>{{ $item->email ?? 'data Email tidak ditemukan' }}
                                          </span>
                                      </div>
                                  </div>
                              </td>
                              <td>
                                  <div class="d-flex flex-column">
                                      <div class="text-heading text-truncate">
                                          @if ($item->gender === 'laki-laki')
                                              <span class="fw-medium badge" style="background-color: #d9edf7; color: #5a738e;">{{ ucfirst($item->gender) }}</span>
                                          @elseif ($item->gender === 'perempuan')
                                              <span class="fw-medium badge" style="background-color: #fde8e8; color: #a94442;">{{ ucfirst($item->gender) }}</span>
                                          @else
                                              <span class="fw-medium text-muted">{{__('Data Gender tidak ditemukan')}}</span>
                                          @endif
                                      </div>
                                  </div>
                              </td>
                              <td>
                                  <div class="d-flex align-items-center">
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