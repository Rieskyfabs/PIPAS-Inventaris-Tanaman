<li class="nav-item dropdown">
  <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
    <i class="ri-notification-3-line"></i>
    <span class="badge bg-primary badge-number">{{ $notificationCount }}</span>
  </a>
  <!-- End Notification Icon -->

  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
    <li class="dropdown-header">
      Kamu Memiliki {{ $notificationCount }} Notifikasi Baru
      <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">Lihat Semua</span></a>
    </li>
    <li>
      <hr class="dropdown-divider">
    </li>

    @if(empty($notifications))
      <li class="notification-item">
        <i class="bi bi-info-circle"></i>
        <div>
          <h4>{{__('TIdak Ada Notifikasi Terbaru')}}</h4>
          <p>{{__('Anda Sudah Up-To Date!')}}</p>
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
              {{-- <p>{{ $notification['subMessage'] }}</p> --}}
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

    <li class="dropdown-footer">
      <a href="#">{{__('Lihat Semua Notifikasi')}}</a>
    </li>
  </ul>
  <!-- End Notification Dropdown Items -->
</li>
<!-- End Notification Nav -->
