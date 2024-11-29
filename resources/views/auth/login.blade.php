<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<title>{{ $title ?? 'DAMASU | Login Page' }}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
	<meta name="description" content="This is meta description">
	<meta name="author" content="Themefisher">
	<link href="/images/wikrama-logo.png" rel="icon">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
	@vite('resources/css/app.css')
</head>

<body class="flex items-center justify-center min-h-screen bg-cover bg-center bg-no-repeat" style="background-image: url('/images/BG-Login2.png');">
	<main class="w-full max-w-md sm:max-w-screen-sm lg:max-w-screen-lg flex flex-col lg:flex-row bg-white shadow-2xl rounded-xl overflow-hidden mx-4 sm:mx-6 lg:mx-0">
	  
    <!-- Image Section -->
    <div class="hidden lg:flex flex-1 bg-cover bg-center relative" style="background-image: url('/images/login-card-img.jpg');">
      <!-- Tombol Home -->
      <a href="{{ route('home') }}" class="absolute top-4 left-4 bg-white bg-opacity-80 hover:bg-opacity-100 transition-all duration-200 px-3 py-2 rounded-md text-gray-800 text-sm font-semibold flex items-center space-x-2 shadow-lg">
        <i class="fas fa-arrow-left"></i><span>Beranda</span>
      </a>
    </div>

    <!-- Form Section -->
    <div class="flex-1 flex flex-col items-center p-8 sm:p-12 lg:p-16">
      <h1 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-gray-800 mb-4 lg:mb-6">Login</h1>
      <p class="text-center text-sm sm:text-base text-gray-600 mb-6 lg:mb-8">Pastikan Data Email dan Password Harus Benar</p>

      <form method="post" action="{{ route('login.action') }}" class="w-full max-w-sm">
        @csrf
        <div class="mb-6 lg:mb-8">
          <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
          @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
          <input type="email" id="email" name="email" placeholder="emailanda@gmail.com" required class="w-full p-3 sm:p-4 border rounded-lg focus:ring-2 focus:ring-green-500 focus:outline-none transition duration-200">
        </div>

        <div class="mb-6 lg:mb-8 relative">
          <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
          @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
          
          <div class="flex items-center border rounded-lg focus-within:ring-2 focus-within:ring-green-500">
            <input type="password" id="password" name="password" placeholder="********" required class="w-full p-3 sm:p-4 border-none rounded-l-lg focus:outline-none">
            
            <!-- Divider -->
            <div class="w-px h-5 sm:h-6 bg-gray-300 mx-2"></div>
            
            <!-- Eye Icon -->
            <span class="p-4 pl-2 mt-1 text-xl cursor-pointer text-gray-400 hover:text-gray-600 transition duration-200" onclick="togglePassword()">
              <i class="fas fa-eye" id="eye-icon"></i>
            </span> 
          </div>
        </div>

        <div class="mt-6 lg:mt-10 flex justify-center">
          <button type="submit" class="w-full sm:w-3/4 bg-green-600 text-white py-2 sm:py-3 rounded-lg font-semibold shadow-lg hover:bg-green-700 transition duration-300 transform hover:-translate-y-1">
            Login
          </button>
        </div>
      </form>

      <div class="w-full h-px my-6 lg:my-8 bg-gray-300"></div>

      <p class="text-xs sm:text-sm text-gray-500 text-center leading-5 px-4 lg:px-6">
        <b>DAMASU - SIM Inventaris Tanaman</b>, adalah sebuah website / aplikasi yang bertujuan untuk <b>pemantauan, pengelolaan & pendataan tanaman</b>, menyediakan penyajian & pelaporan data yang baik dan mencegah hilangnya tanaman.
      </p>
    </div>
  </main>

	<script src="{{ asset('js/LoginScript.js') }}"></script>
	@include('sweetalert::alert')
</body>

</html>
