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

    <section class="section"> 
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{__('Plants Data')}}</h5>
                        <div class="add-btn-container">
                            <a href="{{ route('plants.create') }}" class="btn-add-item">
                                <svg aria-hidden="true" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <!-- SVG content -->
                                    <path
                                        stroke-width="2"
                                        stroke="#fffffff"
                                        d="M13.5 3H12H8C6.34315 3 5 4.34315 5 6V18C5 19.6569 6.34315 21 8 21H11M13.5 3L19 8.625M13.5 3V7.625C13.5 8.17728 13.9477 8.625 14.5 8.625H19M19 8.625V11.8125"
                                        stroke-linejoin="round"
                                        stroke-linecap="round"
                                        ></path>
                                        <path
                                        stroke-linejoin="round"
                                        stroke-linecap="round"
                                        stroke-width="2"
                                        stroke="#fffffff"
                                        d="M17 15V18M17 21V18M17 18H14M17 18H20"
                                    >
                                    </path>
                                </svg>
                                {{ __('Add Plant') }}
                            </a>
                        </div>
                        
                        <div class="table-responsive">
                            <!-- Table with stripped rows -->
                            <table class="table table-bordered table-hover datatable">
                                <thead>
                                    <tr>
                                        <th>{{__('Nama Tanaman')}}</th>
                                        <th>{{__('Tipe Tanaman')}}</th>
                                        <th>{{__('Kategori Tanaman')}}</th>
                                        <th>{{__('Lokasi Tanaman')}}</th>
                                        <th>{{__('Status')}}</th>
                                        <th>{{__('QR Code')}}</th>
                                        <th>{{__('Actions')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($plants as $plant)
                                        <tr>
                                            <td>{{ $plant->name }}</td>
                                            <td>
                                                @if ($plant->type === 'Sayuran')
                                                    <i class="fa fa-carrot" aria-hidden="true"></i> {{ $plant->type }}
                                                @elseif ($plant->type === 'Herbal')
                                                    <i class="fa fa-leaf" aria-hidden="true"></i> {{ $plant->type }}
                                                @else
                                                    {{ $plant->type }}
                                                @endif
                                            </td>
                                            <td>{{ $plant->category->name ?? 'Kategori tidak ditemukan' }}</td>
                                            <td>{{ $plant->location->name ?? 'Lokasi tidak ditemukan' }}</td>
                                            <td>
                                                <span class="badge 
                                                    @if ($plant->status === 'sehat') badge-soft-green <i class='bi bi-check-circle me-1'></i>
                                                    @elseif ($plant->status === 'baik') badge-soft-primary <i class='bi bi-star me-1'></i>
                                                    @elseif ($plant->status === 'layu') badge-soft-warning <i class='bi bi-exclamation-triangle me-1'></i>
                                                    @elseif ($plant->status === 'sakit') badge-soft-danger <i class='bi bi-exclamation-octagon me-1'></i>
                                                    @else bg-secondary @endif">
                                                    {{ $plant->status }}
                                                </span>
                                            </td>
                                            <td>{{ $plant->qr_code }}</td>
                                            <td>
                                                <form action="{{ route('plants.destroy', $plant->id) }}" method="POST" class="action-buttons">
                                                <a href="{{ route('plants.show', $plant->id) }}" class="icon-button"><i class="bi bi-eye"></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="icon-button"><i class="bi bi-trash"></i></button>
                                                <div class="dropdown">
                                                    <button class="icon-button dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="bi bi-three-dots"></i>
                                                    </button>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <li><a class="dropdown-item" href="{{ route('plants.edit', $plant->id) }}">Edit</a></li>
                                                    </ul>
                                                </div>
                                                </form>
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