<li class="nav-item dropdown pe-3">
  <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
    @if ($profileImage && filter_var($profileImage, FILTER_VALIDATE_URL))
        <img src="{{ $profileImage }}" alt="Profile" class="rounded-circle">
    @else
        <div class="initials-avatar rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 50px;">
            <img src="{{ Avatar::create($username)->toBase64() }}" class="users-image" />
        </div>
    @endif

    <span class="d-none d-md-block dropdown-toggle ps-2">{{ $username }}</span>
  </a>

  <!-- End Profile Image Icon -->

  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
    <li class="dropdown-header">
      <h6>{{ $username }}</h6>
      <span>{{ $email }}</span>
      <br><hr>
      <span>{{ $role }}</span>
    </li>
    <li>
      <hr class="dropdown-divider">
    </li>

    <li>
      <a class="dropdown-item d-flex align-items-center" href="{{ $profileUrl }}">
        <i class="bi bi-person"></i>
        <span>{{__('Profile Saya')}}</span>
      </a>
    </li>
    <li>
      <hr class="dropdown-divider">
    </li>

    <li>
      <a class="dropdown-item d-flex align-items-center" href="{{ $helpUrl }}">
        <i class="bi bi-question-circle"></i>
        <span>{{__('Butuh Bantuan?')}}</span>
      </a>
    </li>
    <li>
      <hr class="dropdown-divider">
    </li>

    <li>
      <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}">
        <i class="bi bi-box-arrow-right"></i>
        <span>{{__('Keluar')}}</span>
      </a>
    </li>
  </ul>
  <!-- End Profile Dropdown Items -->
</li>
<!-- End Profile Nav -->
