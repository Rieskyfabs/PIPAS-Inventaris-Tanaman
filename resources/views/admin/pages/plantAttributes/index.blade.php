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
                        <h5 class="card-title">{{ __('Data Atribut Tanaman') }}</h5>
                        <x-atoms.table.error-alert />
                        <div class="add-btn-container">
                        <x-atoms.table.add-button 
                            target="#plantAttribute" 
                            label="TAMBAH" 
                        />
                        </div>
                        <x-organisms.table.universal-table 
                            :columns="[
                                ['key' => 'iteration', 'label' => 'NO'],
                                ['key' => 'plant_code', 'label' => 'Kode'],
                                ['key' => 'name', 'label' => 'Nama'],
                                ['key' => 'category.name', 'label' => 'Kategori'],
                                ['key' => 'benefit_column', 'label' => 'Manfaat'],
                                ['key' => 'description', 'label' => 'Deskripsi'],
                                ['key' => 'actions_buttons_column', 'label' => 'Aksi'],
                            ]"
                            :data="$plantAttributes"
                        />
                        @include('modals.edit_plantAttributes_modal')
                        @include('modals.create_plantAttributes_modal')
                    </div>
                </div>
            </div>
        </div>
    </section>

    </main>
</div>
@endsection
