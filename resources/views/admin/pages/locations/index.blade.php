@extends('layouts.admin')

@section('title', 'Dashboard')

@section('contents')
  <div>
    <main id="main" class="main">

      <x-breadcrumbs
        title="Lokasi Penyimpanan"
        :items="[
          ['route' => 'admin/dashboard', 'label' => 'Dashboard'],
          ['label' => 'Lokasi Penyimpanan']
        ]"
      />

      <section class="section dashboard">
          <div class="row">
              <div class="col-lg-12">
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">{{ __('Data Tipe Tanaman') }}</h5>
                      <x-atoms.table.error-alert />
                      <div class="add-btn-container">
                        <x-atoms.table.add-button 
                          target="#Location" 
                          label="TAMBAH" 
                        />
                      </div>
                      <x-organisms.table.universal-table 
                          :columns="[
                              ['key' => 'iteration', 'label' => 'NO'],
                              ['key' => 'name', 'label' => 'Nama'],
                              ['key' => 'created_at', 'label' => 'Dibuat Pada'],
                              ['key' => 'actions_buttons_column', 'label' => 'Aksi'],
                          ]"
                          :data="$locations"
                      />
                      @include('modals.edit_location_modal')
                      @include('modals.create_location_modal')
                    </div>
                  </div>
              </div>
          </div>
      </section>

    </main>
  </div>
@endsection
