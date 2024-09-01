<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<title>{{ $title ?? 'DAMASU | Login Page' }}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
	<meta name="description" content="This is meta description">
	<meta name="author" content="Themefisher">
	<link rel="shortcut icon" href="/images/favicon.png" type="image/x-icon">
	<link href="/images/wikrama-logo.png" rel="icon">

  <!-- Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

	<!-- # Google Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;700&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

	<!-- #Main Style Sheet -->
	<link rel="stylesheet" href="{{ asset('css/login.css') }}">

  <!-- SweetAlert2 CSS -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

  <body>
    <main>
      <div class="container">
          <div class="image-container">
              <a href="{{ route('home') }}" class="back-button">
                  <i class="fas fa-arrow-left"></i>
                  <span class="back-button-text">Kembali Ke Home</span>
              </a>
          </div>
          <div class="login-form">
              <h1>Login</h1>
              @if (session()->has('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
              @endif
              <p class="subHeading">Pastikan Data Email / Nama dan <br> Password Harus Benar</p>
              <form method="post" action="{{ route('login.action') }}">
                @csrf
                  <div class="input-group">
                    <label for="email">Email</label>
                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                    <input type="text" id="email" name="email" placeholder="example@gmail.com" required>   
                  </div>
                  <div class="input-group password-group">
                      <label for="password">Password</label>
                      @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                      <input type="password" id="password" name="password" placeholder="********" required>
                      <span class="toggle-password" onclick="togglePassword()">
                          <i class="fas fa-eye" id="eye-icon"></i>
                      </span>
                  </div>
                  <div class="button-container">
                      {{-- <button type="submit" class="login-button">Login</button> --}}
                      <button type="submit" class="login-button">Login</button>
                  </div>
              </form>
              <div class="button-underline"></div>
              <p class="note">
                  Jika anda tidak mempunyai akun, sadarlah bahwa anda bukan murid wikrama. Namun jika anda wikrama beneran, maka mintalah data ke kesiswaan sekolah SMK Wikrama Bogor untuk pendataan.
              </p>
          </div>
      </div>
    </main>

    <!-- # JS Plugins -->
    <script src="{{ asset('front/plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('front/plugins/bootstrap/bootstrap.min.js')}}"></script>

    <!-- Main Script -->
    <script src="{{ asset('js/LoginScript.js') }}"></script>

    @include('sweetalert::alert')

  </body>

</html>
