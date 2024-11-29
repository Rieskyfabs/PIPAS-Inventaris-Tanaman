@extends('layouts.admin')

@section('title', 'Dashboard')

@section('contents')
<div>
    <main id="main" class="main">

    <x-breadcrumbs
        title="Atribut Tanaman"
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
                            <x-add-button 
                                target="#plantAttribute" 
                                label="TAMBAH" 
                            />
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
                                        <th>{{__('DIBUAT PADA')}}</th>
                                        <th>{{__('AKSI')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($plantAttributes as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <div class="d-flex flex-column">
                                                    <div class="text-heading text-truncate">
                                                        <span class="fw-medium">{{ $item->plant_code ?? 'Data kode tanaman tidak tersedia' }}</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column">
                                                    <div class="text-heading text-truncate">
                                                        <span class="fw-medium">{{ $item->name ?? 'Nama tanaman tidak ditemukan' }}</span>
                                                    </div>
                                                    <small class="text-muted">{{ $item->scientific_name ?? 'Unknown' }}</small>
                                                    {{-- <small>
                                                        <span class="badge" style="background-color: #e0f7df; color: #388e3c;">
                                                            {{ $item->plantType->name }}
                                                        </span>
                                                    </small> --}}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column">
                                                    <div class="text-heading text-truncate">
                                                        <span class="fw-medium">{{ $item->category->name ?? 'Data Kategori tidak ditemukan' }}</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column">
                                                    <div class="text-heading text-truncate">
                                                        <span class="text-muted">{{ Str::limit($item->benefit ?? 'Data Manfaat tidak ditemukan', 30)}}</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="text-muted">
                                                    {{ $item->description ?? 'Tidak ada deskripsi' }}
                                                </span>
                                            </td>
                                            <td>{{ $item->created_at->format('d F Y, H:i') }}</td>
                                            <td>
                                                <div style="display: flex; align-items: center;">
                                                    <x-action-buttons 
                                                        editModalTarget="#EditPlantAttribute{{ $item->id }}"
                                                        deleteRoute="{{ route('plantAttributes.destroy', $item->id) }}"
                                                    />
                                                </div>
                                            </td>
                                            @include('modals.edit_plantAttributes_modal')
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->
                            @include('modals.create_plantAttributes_modal')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    </main>
</div>
@endsection
