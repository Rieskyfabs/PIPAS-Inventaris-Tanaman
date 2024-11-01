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
                            <button type="button" class="btn-add-item" data-bs-toggle="modal" data-bs-target="#plantAttribute">
                                +
                                {{ __('TAMBAH') }}
                            </button>
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
                                            <td>{{ $item->plant_code }}</td>
                                            <td>
                                                <div class="d-flex flex-column">
                                                    <a href="#" class="text-heading text-truncate">
                                                        <!-- Nama tanaman dibuat bold -->
                                                        <span class="fw-bold">{{ $item->name }}</span>
                                                    </a>
                                                    <!-- Nama ilmiah dibuat pudar dan italic -->
                                                    <small class="text-muted fst-italic">{{ $item->scientific_name ?? 'Unknown' }}</small>
                                                    <!-- Tipe tanaman dengan background warna smooth -->
                                                    <small>
                                                        <span class="badge" style="background-color: #e0f7df; color: #388e3c;">
                                                            <i class="fa fa-leaf" aria-hidden="true" style="font-size: 1.2em; margin-right: 0.5em;"></i> {{ $item->plantType->name }}
                                                        </span>
                                                    </small>
                                                </div>
                                            </td>
                                            <td>{{ $item->category->name ?? 'Kategori tidak ditemukan' }}</td>
                                            <td>{{ Str::limit($item->benefit ?? 'Manfaat tidak ditemukan', 20)}}</td>
                                            <td>{{ $item->description ?? 'No Description' }}</td>
                                            <td>{{ $item->created_at->format('d F Y, H:i') }}</td>
                                            <td style="text-align: center;">
                                                <div style="display: flex; align-items: center; justify-content: center;">
                                                    <button type="button" class="icon-button" data-bs-toggle="modal" data-bs-target="#EditPlantAttribute{{ $item->id }}">
                                                        <i class='bx bx-edit'></i>
                                                    </button>
                                                    <x-action-buttons
                                                        deleteData="{{ route('plantAttributes.destroy', $item->id) }}"
                                                        method="DELETE"
                                                        submit="true"
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
