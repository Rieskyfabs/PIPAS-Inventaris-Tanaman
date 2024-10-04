@extends('layouts.admin')

@section('title', 'Dashboard')

@section('contents')
  <div>
    <main id="main" class="main">

      <x-breadcrumbs 
        title="Plant Attributes" 
        :items="[
          ['route' => 'admin/dashboard', 'label' => 'Dashboard'],
          ['label' => 'Atribut Tanaman']
        ]" 
      />

      <section class="section dashboard"> 
          <div class="row">
              <div class="col-lg-12">
                  <div class="card">
                      <div class="card-body">
                          <h5 class="card-title">{{__('Atribut Tanaman')}}</h5>
                          <div class="add-btn-container">
                              <a href="{{ route('plantAttributes.create') }}" class="btn-add-item">
                                  +
                                  {{ __('TAMBAH') }}
                              </a>
                          </div>
                          
                          <div class="table-responsive">
                              <!-- Table with stripped rows -->
                              <table class="table table-bordered table-hover datatable">
                                  <thead>
                                      <tr>
                                          <th>NO</th>
                                          <th>{{__('KODE TANAMAN')}}</th>
                                          <th>{{__('NAMA TANAMAN')}}</th>
                                          <th>{{__('KATEGORI')}}</th>
                                          <th>{{__('MANFAAT')}}</th>
                                          <th>{{__('DESKRIPSI')}}</th>
                                          <th>{{__('CREATED AT')}}</th>
                                          <th>{{__('ACTIONS')}}</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      @foreach ($plantAttributes as $item)
                                          <tr>
                                              <td>{{ $loop->iteration }}</td>
                                              <td>{{ $item->plant_code }}</td>
                                              <td>
                                                <div class="d-flex flex-column">
                                                    <a href="#" class="text-heading text-truncate">
                                                        <span class="fw-medium">{{ $item->name }}</span>
                                                    </a>
                                                    <small>{{ $item->scientific_name ?? 'Unknown' }}</small>
                                                    <small>
                                                        @if ($item->type === 'Sayuran')
                                                            <span class="badge badge-soft-green">
                                                                <i class="fa fa-carrot" aria-hidden="true" style="font-size: 1.2em; margin-right: 0.5em;"></i> {{ $item->type }}
                                                            </span>
                                                        @elseif ($item->type === 'Herbal')
                                                            <span class="badge badge-soft-warning">
                                                                <i class="fa fa-leaf" aria-hidden="true" style="font-size: 1.2em; margin-right: 0.5em;"></i> {{ $item->type }}
                                                            </span>
                                                        @else
                                                            <span class="badge badge-soft-gray">
                                                                {{ $item->type ?? 'Unknown' }}
                                                            </span>
                                                        @endif
                                                    </small>
                                                </div>
                                            </td>
                                            <td>{{ $item->category->name ?? 'Kategori tidak ditemukan' }}</td>
                                            <td>{{ $item->benefit->name ?? 'Manfaat tidak ditemukan' }}</td>
                                            <td>{{ $item->description ?? 'No Description' }}</td>
                                            <td>{{ $item->created_at->format('d F Y, H:i') }}</td>
                                            <td>
                                            <x-action-buttons
                                                deleteData="{{ route('plantAttributes.destroy', $item->id) }}"
                                                method="DELETE"
                                                submit="true" {{-- Tombol hapus akan muncul --}}
                                                :dropdown="[ 
                                                    ['href' => route('plantAttributes.edit', $item->id), 'label' => 'Edit'], 
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