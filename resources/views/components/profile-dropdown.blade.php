<li class="nav-item dropdown pe-3">
  <!-- Profile Icon with Dropdown -->
  <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
    <!-- Profile Image or Initials Avatar -->
    @if ($profileImage && filter_var($profileImage, FILTER_VALIDATE_URL))
        <img src="{{ $profileImage }}" alt="Profile" class="rounded-circle" style="width: 40px; height: 40px;">
    @else
        <div class="initials-avatar rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
            <img src="{{ Avatar::create($username)->toBase64() }}" class="users-image" />
        </div>
    @endif

    <!-- Username -->
    <span class="d-none d-md-block dropdown-toggle ps-2">{{ $username }}</span>
  </a>

  <!-- Dropdown Menu -->
  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
    <!-- User Details -->
    <li class="dropdown-header custom-profile-header d-flex align-items-center">
      <!-- Profile Image in the Dropdown Header -->
      <img src="{{ $profileImage }}" alt="Profile" class="custom-profile-image">
      
      <!-- User Info -->
      <div class="custom-user-info">
        <h6 class="custom-username">{{ $username }}</h6>
        <span class="custom-role">{{ $role }}</span>
      </div>
    </li>
    <li><hr class="dropdown-divider"></li>

    <!-- Menu Items -->
    <li>
      <a class="dropdown-item d-flex align-items-center" href="{{ $profileUrl }}">
        <i class="bi bi-person"></i>
        <span>{{ __('My Profile') }}</span>
      </a>
    </li>

    {{-- <li>
      <a class="dropdown-item d-flex align-items-center" href="#">
        <i class="bi bi-credit-card"></i>
        <span>{{ __('Billing Plan') }}</span>
        <span class="badge bg-danger text-white ms-auto">4</span>
      </a>
    </li> --}}

    {{-- <li>
      <a class="dropdown-item d-flex align-items-center" href="#">
        <i class="bi bi-currency-dollar"></i>
        <span>{{ __('Pricing') }}</span>
      </a>
    </li> --}}

    <li>
      <a class="dropdown-item d-flex align-items-center" href="#">
        <i class="bi bi-question-circle"></i>
        <span>{{ __('FAQ') }}</span>
      </a>
    </li>

    <li><hr class="dropdown-divider"></li>

    <!-- Logout -->
    <li>
      <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}">
        <i class="bi bi-box-arrow-right"></i>
        <span>{{ __('Log Out') }}</span>
      </a>
    </li>
  </ul>
</li>
