<li class="nav-item dropdown">
  <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
    <i class="ri-notification-3-line"></i>
    <span class="badge bg-primary badge-number">{{ $notificationCount }}</span>
  </a>
  <!-- End Notification Icon -->

  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
    <li class="dropdown-header">
      You have {{ $notificationCount }} new notifications
      <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
    </li>
    <li>
      <hr class="dropdown-divider">
    </li>

    @foreach ($notifications as $notification)
      <li class="notification-item">
        <i class="bi {{ $notification['icon'] }} {{ $notification['iconColor'] }}"></i>
        <div>
          <h4>{{ $notification['title'] }}</h4>
          <p>{{ $notification['message'] }}</p>
          <p>{{ $notification['timeAgo'] }}</p>
        </div>
      </li>
      <li>
        <hr class="dropdown-divider">
      </li>
    @endforeach

    <li class="dropdown-footer">
      <a href="#">Show all notifications</a>
    </li>
  </ul>
  <!-- End Notification Dropdown Items -->
</li>
<!-- End Notification Nav -->
