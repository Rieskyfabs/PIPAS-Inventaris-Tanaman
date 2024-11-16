<div class="card">
    <div class="card-body">
        <h5 class="card-title">{{ __('Aktivitas Terbaru') }}</h5>
        <div class="activity">
            @forelse ($activityLogs as $log)
                <div class="activity-item d-flex mb-3">
                    <div class="activite-label text-muted small me-3" style="min-width: 70px;">
                        {{ $log->performed_at->diffForHumans() }}
                    </div>
                    <i class='bi bi-circle-fill activity-badge text-success me-3'></i>
                    <div class="activity-content">
                        <strong>{{ $log->action }}</strong> - {!! $log->description !!}
                        <br><small class="text-muted">{{ __('Oleh') }}: {{ $log->user->username }}</small>
                    </div>
                </div>
            @empty
                <div class="activity-item d-flex">
                    <div class="activity-content">
                        {{ __('Tidak Ada Aktivitas Terbaru') }}
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</div>
