<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">
    @auth
        <!-- User Info -->
        @include('partials.sidebar.user-info')

        @if (Auth::user()->role->name == 'user')
          <!-- User Menu -->
            @include('partials.sidebar.user-menu')
        @else
          <!-- Admin Menu -->
            @include('partials.sidebar.admin-menu')
        @endif
        
    @endauth
  </ul>

</aside>
<!-- End Sidebar -->
