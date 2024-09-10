@extends('layouts.admin')

@section('title', 'Data Tanaman')

@section('contents')
  <div>
    <main id="main" class="main">

      <x-breadcrumbs 
        title="{{ __('Plants')}}" 
        :items="[
          ['route' => 'home', 'label' => 'Home'],
          ['label' => 'Data Tanaman']
        ]" 
      />

    <section class="section dashboard"> 
      <div class="container">
        <h1>Detail Tanaman: {{ $plant->name }}</h1>
          <ul>
              <li><strong>ID:</strong> {{ $plant->id }}</li>
              <li><strong>Nama:</strong> {{ $plant->name }}</li>
              <li><strong>Nama Ilmiah:</strong> {{ $plant->scientific_name }}</li>
              <li><strong>Tipe:</strong> {{ $plant->type }}</li>
              <li><strong>Kategori:</strong> {{ $plant->category->name }}</li>
              <li><strong>Manfaat:</strong> {{ $plant->benefit->name }}</li>
              <li><strong>Lokasi:</strong> {{ $plant->location->name }}</li>
              <li><strong>Status:</strong> {{ $plant->status }}</li>
              <li><strong>Tanggal Tanam:</strong> {{ \Carbon\Carbon::parse($plant->seeding_date)->format('d M Y') }}</li>
              <li><strong>Tanggal Panen:</strong> {{ \Carbon\Carbon::parse($plant->harvest_date)->format('d M Y') }}</li>
          </ul>
      </div>
    </section>
    
    </main>
  </div>
@endsection