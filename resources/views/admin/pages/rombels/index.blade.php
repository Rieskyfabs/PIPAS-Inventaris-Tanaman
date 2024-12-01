@extends('layouts.admin')

@section('title', 'List Data Rombel')

@section('contents')
  <div>
    <main id="main" class="main">
      <x-breadcrumbs 
        title="List Data Rombel" 
        :items="[
          ['route' => 'admin/dashboard', 'label' => 'Dashboard'],
          ['label' => 'List Data Rombel']
        ]" 
      />
      <section class="section">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">{{ __('Data Rombel') }}</h5>
                <x-atoms.table.error-alert />
                <div class="add-btn-container">
                  <x-atoms.table.add-button 
                    target="#Rombels" 
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
                    :data="$rombels"
                />
                @include('modals.edit_rombels_modal')
                @include('modals.create_rombels_modal')
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
  </div>
@endsection