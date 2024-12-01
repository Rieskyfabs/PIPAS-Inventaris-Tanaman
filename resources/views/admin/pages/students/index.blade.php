@extends('layouts.admin')

@section('title', 'List Data Siswa')

@section('contents')
<main id="main" class="main">
  <x-molecules.breadcrumbs 
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
            <x-atoms.table.error-alert />
            <div class="add-btn-container">
              <x-atoms.table.add-button 
                target="#Students" 
                label="TAMBAH" 
              />
            </div>
            <x-organisms.table.universal-table 
                :columns="[
                    ['key' => 'iteration', 'label' => 'NO'],
                    ['key' => 'name', 'label' => 'Nama'],
                    ['key' => 'rombel.name', 'label' => 'Rombel', 'fallback' => 'Data Rombel tidak ditemukan'],
                    ['key' => 'rayon.name', 'label' => 'Rayon', 'fallback' => 'Data Rayon tidak ditemukan'],
                    ['key' => 'nis', 'label' => 'NIS'],
                    ['key' => 'email_column', 'label' => 'Email'],
                    ['key' => 'gender_column', 'label' => 'Gender'],
                    ['key' => 'actions_buttons_column', 'label' => 'Aksi'],
                ]"
                :data="$students"
            />
            @include('modals.edit_students_modal')
            @include('modals.create_students_modal')
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
@endsection