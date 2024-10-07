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
                <div class="col-lg-6">
                    <div class="card shadow-sm">
                        <div class="card-header bg-primary text-white">
                            <h4 class="m-0">{{__('Notifikasi')}}</h4>
                        </div>
                        <div class="card-body mt-3">
                            <!-- Tabs -->
                            <ul class="nav nav-tabs" id="notificationTabs" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="all-tab" data-bs-toggle="tab" href="#all" role="tab" aria-controls="all" aria-selected="true">{{__('Semua')}}
                                        @if($notifications->where('is_read', false)->count() > 0)
                                            <span class="badge bg-warning ">{{ $notifications->where('is_read', false)->count() }}</span>
                                        @endif
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="seen-tab" data-bs-toggle="tab" href="#seen" role="tab" aria-controls="seen" aria-selected="false">{{__('Dibaca')}}</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="unseen-tab" data-bs-toggle="tab" href="#unseen" role="tab" aria-controls="unseen" aria-selected="false">{{__('Belum dibaca')}}</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="notificationTabContent" style="max-height: 550px; overflow-y: auto;">
                                <!-- All Notifications -->
                                <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                                    <ul class="list-group list-group-flush">
                                        @forelse($notifications as $notification)
                                            <li class="list-group-item d-flex align-items-start justify-content-between border-0 rounded-0 mt-3 position-relative {{ $notification->is_read ? 'bg-light' : 'bg-light text-dark' }}">
                                                <form id="mark-as-read-{{ $notification->id }}" action="{{ route('notifications.markAsRead', $notification->id) }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                                <a href="{{ route('plants.show', $notification->plant->plantAttribute->plant_code) }}" class="text-decoration-none flex-grow-1 notification-link" onclick="event.preventDefault(); document.getElementById('mark-as-read-{{ $notification->id }}').submit();">
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{ asset('storage/' . $notification->plant->image) }}" alt="Image of {{ $notification->plant->plantAttribute->name ?? 'Unknown' }}" class="img-fluid me-3" style="width: 80px; height: 80px; border-radius: 10px;">
                                                        <div>
                                                            <h5 class="mb-1 fw-bold">{{ $notification->title }}</h5>
                                                            <p class="mb-1 text-truncate">{{ $notification->message }}</p>
                                                            @if ($notification->plant)
                                                                <p class="mb-1"><strong>Lokasi:</strong> {{ $notification->plant->location->name }}</p>
                                                            @endif
                                                            <p class="mb-1"><strong>Perkiraan Tanggal Panen: </strong>{{ $notification->plant->harvest_date }}</p>
                                                            <small class="text-muted">{{ $notification->created_at->diffForHumans() }}</small>
                                                        </div>
                                                    </div>
                                                </a>
                                                <div class="position-absolute top-0 end-0 mt-0 p-3">
                                                    @if(!$notification->is_read)
                                                        <span class="badge bg-danger">{{__('Baru')}}</span>
                                                    @endif
                                                    @if(!$notification->is_read)
                                                        <span class="badge bg-warning text-dark">{{__('Belum dibaca')}}</span>
                                                    @endif
                                                </div>
                                            </li>
                                        @empty
                                            <li class="mt-3 list-group-item text-center">{{__('Tidak ada notifikasi terbaru.')}}</li>
                                        @endforelse
                                    </ul>
                                </div>

                                <!-- Seen Notifications -->
                                <div class="tab-pane fade" id="seen" role="tabpanel" aria-labelledby="seen-tab">
                                    <ul class="list-group list-group-flush">
                                        @forelse($notifications->where('is_read', true) as $notification)
                                            <li class="list-group-item d-flex align-items-start justify-content-between border-0 rounded-0 mt-3 position-relative bg-light text-dark">
                                                <a href="{{ route('plants.show', $notification->plant->plantAttribute->plant_code) }}" class="text-decoration-none flex-grow-1 notification-link">
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{ asset('storage/' . $notification->plant->image) }}" alt="Image of {{ $notification->plant->plantAttribute->name ?? 'Unknown' }}" class="img-fluid me-3" style="width: 80px; height: 80px; border-radius: 10px;">
                                                        <div>
                                                            <h5 class="mb-1 fw-bold">{{ $notification->title }}</h5>
                                                            <p class="mb-1 text-truncate">{{ $notification->message }}</p>
                                                            @if ($notification->plant)
                                                                <p class="mb-1"><strong>Lokasi:</strong> {{ $notification->plant->location->name }}</p>
                                                            @endif
                                                            <p class="mb-1"><strong>Perkiraan Tanggal Panen: </strong>{{ $notification->plant->harvest_date }}</p>
                                                            <small class="text-muted">{{ $notification->created_at->diffForHumans() }}</small>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                        @empty
                                            <li class="mt-3 list-group-item text-center">{{__('Tidak ada notifikasi dibaca.')}}</li>
                                        @endforelse
                                    </ul>
                                </div>

                                <!-- Unseen Notifications -->
                                <div class="tab-pane fade" id="unseen" role="tabpanel" aria-labelledby="unseen-tab">
                                    <ul class="list-group list-group-flush">
                                        @forelse($notifications->where('is_read', false) as $notification)
                                            <li class="list-group-item d-flex align-items-start justify-content-between border-0 rounded-0 mt-3 position-relative bg-light text-dark">
                                                <a href="{{ route('plants.show', $notification->plant->plantAttribute->plant_code) }}" class="text-decoration-none flex-grow-1 notification-link" onclick="event.preventDefault(); document.getElementById('mark-as-read-{{ $notification->id }}').submit();">
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{ asset('storage/' . $notification->plant->image) }}" alt="Image of {{ $notification->plant->plantAttribute->name ?? 'Unknown' }}" class="img-fluid me-3" style="width: 80px; height: 80px; border-radius: 10px;">
                                                        <div>
                                                            <h5 class="mb-1 fw-bold">{{ $notification->title }}</h5>
                                                            <p class="mb-1 text-truncate">{{ $notification->message }}</p>
                                                            @if ($notification->plant)
                                                                <p class="mb-1"><strong>Lokasi:</strong> {{ $notification->plant->location->name }}</p>
                                                            @endif
                                                            <p class="mb-1"><strong>Perkiraan Tanggal Panen: </strong>{{ $notification->plant->harvest_date }}</p>
                                                            <small class="text-muted">{{ $notification->created_at->diffForHumans() }}</small>
                                                        </div>
                                                    </div>
                                                </a>
                                                <div class="position-absolute top-0 end-0 mt-0 p-3">
                                                    @if(!$notification->is_read)
                                                        <span class="badge bg-danger">{{__('Baru')}}</span>
                                                    @endif
                                                    @if(!$notification->is_read)
                                                        <span class="badge bg-warning text-dark">{{__('Belum dibaca')}}</span>
                                                    @endif
                                                </div>
                                            </li>
                                        @empty
                                            <li class="mt-3 list-group-item text-center">{{__('Tidak ada notifikasi belum dibaca.')}}</li>
                                        @endforelse
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
@endsection
