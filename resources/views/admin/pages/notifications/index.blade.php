@extends('layouts.admin')

@section('title', 'Dashboard')

@section('contents')
  <div>
    <main id="main" class="main">
      <x-breadcrumbs 
        title="Notifikasi" 
        :items="[ 
          ['route' => 'admin/dashboard', 'label' => 'Dashboard'], 
          ['label' => 'Semua Notifikasi'] 
        ]" 
      />

      <section class="section dashboard">
          <div class="row">
              <div class="col-lg-12">
                  <div class="card shadow-sm">
                      <div class="card-header bg-primary text-white">
                          <h4 class="m-0">{{__('Notifikasi')}}</h4>
                      </div>
                      <div class="card-body" style="max-height: 600px; overflow-y: auto;">                         
                          <ul class="list-group">
                              @forelse($notifications as $notification)
                                  <li class="list-group-item {{ $notification->is_read ? 'bg-light' : 'bg-light text-dark' }} border-0 rounded-0 mt-3">
                                      <a href="{{ route('plants.show', $notification->plant->plantAttribute->plant_code) }}" class="text-decoration-none" onclick="event.preventDefault(); document.getElementById('mark-as-read-{{ $notification->id }}').submit();">
                                          <div class="d-flex justify-content-between align-items-start">
                                              <div>
                                                  <h5 class="mb-1">{{ $notification->title }}</h5>
                                                  <p class="mb-1">{{ $notification->message }}</p>
                                                  @if ($notification->plant)
                                                    <p class="mb-1"><strong>Lokasi:</strong> {{ $notification->plant->location->name }}</p>
                                                  @endif
                                                  <p class="mb-1"><strong>Perkiraan Tanggal Panen: </strong>{{ $notification->plant->harvest_date }}</p>
                                                  <small class="text-muted">{{ $notification->created_at->diffForHumans() }}</small>
                                                  @if(!$notification->is_read)
                                                      <span class="badge bg-warning text-dark">{{__('Belum dibaca')}}</span>
                                                  @endif
                                              </div>
                                              @if(!$notification->is_read)
                                                  <span class="badge bg-danger">{{__('Baru')}}</span>
                                              @endif
                                          </div>
                                      </a>
                                      <form id="mark-as-read-{{ $notification->id }}" action="{{ route('notifications.markAsRead', $notification->id) }}" method="POST" style="display: none;">
                                          @csrf
                                      </form>
                                  </li>
                              @empty
                                  <li class="mt-3 list-group-item text-center">{{__('Tidak ada notifikasi terbaru.')}}</li>
                              @endforelse
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
      </section>
      
    </main>
  </div>
@endsection
