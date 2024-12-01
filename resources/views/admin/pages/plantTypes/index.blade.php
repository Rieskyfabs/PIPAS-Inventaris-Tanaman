@extends('layouts.admin')

@section('title', 'Dashboard')

@section('contents')
  <div>
    <main id="main" class="main">

      <x-breadcrumbs 
        title="Tipe Tanaman" 
        :items="[
          ['route' => 'admin/dashboard', 'label' => 'Dashboard'],
          ['label' => 'Tipe Tanaman']
        ]" 
      />

      <section class="section">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">{{ __('Data Tipe Tanaman') }}</h5>
                <x-atoms.table.error-alert />
                <div class="add-btn-container">
                  <x-atoms.table.add-button 
                    target="#PlantTypes" 
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
                    :data="$plantTypes"
                />
                @include('modals.edit_plantTypes_modal')
                @include('modals.create_plantTypes_modal')
              </div>
            </div>
          </div>
        </div>
      </section>
      
    </main>
  </div>
@endsection