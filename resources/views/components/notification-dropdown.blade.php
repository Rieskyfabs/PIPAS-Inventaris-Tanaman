<li class="nav-item dropdown">
  <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
    <i class="ri-notification-3-line"></i>
    @if($notificationCount > 0)
        <span class="notification-bubble-header"></span> <!-- Notification bubble without count -->
    @endif
  </a>

  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
    <li class="dropdown-header">
      Kamu Memiliki {{ $notificationCount }} Notifikasi Baru
      
      @if(Auth::user()->role->name == 'user')
        <a href="{{ route('users.notifications') }}">
          <span class="badge rounded-pill bg-primary p-2 ms-2">{{ __('Lihat Semua') }}</span>
        </a>
      @else
        <a href="{{ route('notifications') }}">
          <span class="badge rounded-pill bg-primary p-2 ms-2">{{ __('Lihat Semua') }}</span>
        </a>
      @endif
    </li>
    
    <li>
      <hr class="dropdown-divider">
    </li>

    <div class="scrollable-dropdown">
      @if(empty($notifications))
        <li class="notification-item">
          <i class="bi bi-info-circle"></i>
          <div>
            <h4>{{ __('Tidak Ada Notifikasi Terbaru') }}</h4>
            <p>{{ __('Anda Sudah Up-To-Date!') }}</p>
          </div>
        </li>
      @else
        @foreach ($notifications as $notification)
          <li class="notification-item">
            <i class="bi {{ $notification['icon'] }} {{ $notification['iconColor'] }}"></i>
            <a href="{{ $notification['url'] }}">
              <div>
                <h4>{{ $notification['title'] }}</h4>
                <p>{{ $notification['message'] }}</p>
                <p>{{ $notification['location'] }}</p>
                <p>{{ $notification['timeAgo'] }}</p>
              </div>
            </a>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>
        @endforeach
      @endif
    </div>

    <li class="dropdown-footer">
      @if(Auth::user()->role->name == 'user')
        <a href="{{ route('users.notifications') }}">{{ __('Lihat Semua Notifikasi') }}</a>
      @else
        <a href="{{ route('notifications') }}">{{ __('Lihat Semua Notifikasi') }}</a>
      @endif
    </li>
  </ul>
</li>
