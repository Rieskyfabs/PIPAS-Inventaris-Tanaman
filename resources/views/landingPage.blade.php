<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<title>{{ $title ?? 'DAMASU' }}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
	<meta name="description" content="This is meta description">
	<meta name="author" content="Themefisher">
	<link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
	<link rel="icon" href="images/favicon.png" type="image/x-icon">


    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

	<!-- # Google Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

	<!-- # Main Style Sheet -->
	<link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

    <body>

        <!-- navigation -->
        <header class="navigation bg-tertiary">
            <nav class="navbar">
                <div class="container nav-wrapper">
                    <a href="#" class="logo"><span><i class="fa-solid fa-seedling"></i> DAMASU</span></a>
                    <div class="menu-wrapper">
                      <ul class="menu">
                          <li class="{{request()->is('#') ? 'active' : ''}} menu-item"><a href="#" class="menu-link">Home</a></li>
                          <li class="{{request()->is('#about') ? 'active' : ''}} menu-item"><a href="#about" class="menu-link">About P5</a></li>
                          <li class="{{request()->is('#galeri') ? 'active' : ''}} menu-item"><a href="#galeri" class="menu-link">Galeri</a></li>
                          <li class="{{request()->is('#team') ? 'active' : ''}} menu-item"><a href="#team" class="menu-link">Our Team</a></li>
                          <!-- <li class="menu-item"><a href="#contact-form" class="menu-link">Contact</a></li> -->
                      </ul>
                      @if (Route::has('login'))
                          <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                              @auth
                                  @if (Auth::user()->role == 'admin')
                                    <a href="{{ route('admin/dashboard') }}" class="btn-login"><i class="fas fa-sign-in-alt"></i> Admin Dashboard</a>
                                  @else
                                    <a href="{{ route('dashboard') }}" class="btn-login"><i class="fas fa-sign-in-alt"></i> User Dashboard</a>
                                  @endif
                                  {{-- <a href="{{ route('logout') }}" class="btn-login"><i class="fas fa-sign-in-alt"></i> Logout</a> --}}
                              @else
                                  <a href="{{ route('login') }}" class="btn-login"><i class="fas fa-sign-in-alt"></i> Login</a>

                                  {{-- @if (Route::has('register'))
                                      <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                                  @endif --}}
                              @endauth
                          </div>
                      @endif
                    </div>
                </div>
            </nav>
        </header>
        <!-- /navigation -->

        <main>
          <!-- Hero, Home Page Section -->
          <section class="home" id="home">
              <div class="container home-wrapper">
                  <div class="content-left">
                      <h1 class="heading">Tingkatkan <span>Kemampuan</span> mu Dengan <span>P5</span></h1>
                      <p class="subHeading">Bakar semangatmu dengan mengikuti <span>P5 Gaya Hidup Berkelanjutan</span>  yang diadakan di sekolah sebagai ajang bagi dirimu untuk meningkatkan nilai dan sikap bagi para siswa.</p>
                      <div class="box-wrapper">
                          <div class="box">
                              <a href="#" class="btn-login"><i class="fas fa-sign-in-alt"></i> Login Sekarang</a>   
                          </div>
                          <div class="box">
                              <a href="#" class="btn-about"><i class="fas fa-info-circle"></i> Tentang P5</a>
                          </div>
                      </div>
                  </div>
                  <div class="content-right">
                      <div class="img-wrapper">
                          <img src="{{ asset('/images/Hero-tanaman-IMG.png') }}" alt="">
                      </div>
                  </div>      
              </div>
          </section>
          <!-- Hero, Home Page Section -->

          <!-- About Us Page -->
              <section class="about" id="about">
                  <div class="container about-wrapper">
                      <div class="content-left">
                          <div class="img-wrapper">
                              <img src="{{ asset('/images/Visuals.png') }}" alt="">
                          </div>
                      </div>
                      <div class="content-right">
                          <h1 class="heading">Tentang <span>P5</span></h1>
                          <p class="subHeading"><span>P5</span> merupakan karakter dan kemampuan yang dibangun <br> dalam keseharian dan dalam diri setiap individu peserta <br>didik melalui budaya satuan pendidikan, dan <br>pembelajaran intrakurikuler.</p>
                          
                          <div class="card-container">
                              <div class="card">
                                  <div class="icon">
                                      <!-- <img src="../../public/images/icon1.png" alt="Icon Kepedulian"> -->
                                      <i class="fa-solid fa-heart"></i>
                                  </div>
                                  <p>Kepedulian</p>
                              </div>
                              <div class="card">
                                  <div class="icon">
                                      <!-- <img src="../../public/images/icon2.png" alt="Icon Kerja Sama"> -->
                                      <i class="fa-solid fa-people-carry-box"></i>
                                  </div>
                                  <p>Kerja Sama</p>
                              </div>
                              <div class="card">
                                  <div class="icon">
                                      <!-- <img src="../../public/images/icon3.png" alt="Icon Kritis"> -->
                                      <i class="fa-solid fa-lightbulb"></i>
                                  </div>
                                  <p>Kritis</p>
                              </div>
                              <div class="card">
                                  <div class="icon">
                                      <!-- <img src="../../public/images/icon4.png" alt="Icon Gaya Hidup"> -->
                                      <i class="fa-solid fa-dumbbell"></i>
                                  </div>
                                  <p>Gaya Hidup</p>
                              </div>
                          </div>
                      </div>
                  </div>
              </section>
              <!-- End About Us Page -->

              <!-- Galeri Page -->
              <section class="galeri" id="galeri">
                  <div class="container galeri-wrapper">
                      <div class="row1">
                          <h1 class="heading-galeri">Galeri <span>P5</span></h1>
                          <p class="subHeading-galeri">Berbagai kegiatan P5 untuk mengembangkan keterampilan dan karakter siswa, mulai dari urban farming hingga pengelolaan sampah.</p>
                      </div>
                      <div class="row2">
                          <div class="card-galeri">
                              <!-- Card 1 -->
                              <div class="card">
                                  <img src="{{ asset('/images/daur1.jpg') }}" alt="Kegiatan Kepedulian">
                                  <h3>Tanam & Panen Sayuran</h3>
                                  <p>Kepedulian</p>
                              </div>
                              <!-- Card 2 -->
                              <div class="card">
                                  <img src="{{ asset('/images/daur1.jpg') }}" alt="Kegiatan Kerja Sama">
                                  <h3>Tanam & Panen Sayuran</h3>
                                  <p>Kerja Sama</p>
                              </div>
                              <!-- Card 3 -->
                              <div class="card">
                                  <img src="{{ asset('/images/daur1.jpg') }}" alt="Kegiatan Kritis">
                                  <div class="card-text">
                                      <h3>Tanam & Panen Sayuran</h3>
                                      <p>Kritis</p>
                                  </div>  
                              </div>
                          </div>
                      </div>
                      <div class="row3">
                          <h1 class="heading-galeri">Tidak Hanya Itu</h1>
                          <p class="subHeading-galeri">P5 Gaya Hidup Berkelanjutan juga membuat pengalaman lingkungan hidup yang keren dan berorientasi pada masa depan untuk kehidupan bumi pada masa depan. Berpikir kritis, inovasi, kerja sama, pemecahan masalah, kepedulian, berani, pola hidup, dan rajin.</p>
                      </div>
                  </div>
              </section>
              <!-- End Galeri Page -->

              <!-- Start Team Page -->
              <section class="team" id="team">
                  <div class="container team-wrapper">
                      <div class="row1">
                          <h1 class="heading-team">Temui Tim Kami</h1>
                          <p class="subHeading-team">Kenali wajah-wajah di balik layar dan pelajari nilai-nilai yang mendorong kami.</p>
                      </div>
                      <div class="row2">
                          <div class="card-team">
                              <!-- Card 1 -->
                              <div class="card">
                                  <img src="{{ asset('/images/daur1.jpg') }}" alt="Kegiatan Kepedulian">
                                  <h3>Daffy Fauzan</h3>
                                  <p>BackEnd Developer</p>
                                  <p class="description">With a passion for color and a love for clean lines, Riesky brings all our wildest design dreams to life.</p>
                                  <div class="social-links">
                                      <a href="https://instagram.com/rieskyfabs" target="_blank" class="social-icon"><i class="fab fa-instagram"></i></a>
                                      <a href="https://facebook.com/rieskyfabs" target="_blank" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                                      <a href="https://linkedin.com/in/rieskyfabs" target="_blank" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
                                  </div>
                              </div>
                              <!-- Card 2 -->
                              <div class="card">
                                  <img src="{{ asset('/images/daur1.jpg') }}" alt="Kegiatan Kerja Sama">
                                  <h3>Riesky Fabiansyah</h3>
                                  <p>FrontEnd Developer</p>
                                  <p class="description">With a passion for color and a love for clean lines, Riesky brings all our wildest design dreams to life.</p>
                                  <div class="social-links">
                                      <a href="https://instagram.com/rieskyfabs" target="_blank" class="social-icon"><i class="fab fa-instagram"></i></a>
                                      <a href="https://facebook.com/rieskyfabs" target="_blank" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                                      <a href="https://linkedin.com/in/rieskyfabs" target="_blank" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
                                  </div>
                              </div>
                              <!-- Card 3 -->
                              <div class="card">
                                  <img src="{{ asset('/images/daur1.jpg') }}" alt="Kegiatan Kritis">
                                  <div class="card-text">
                                      <h3>Sultan Said</h3>
                                      <p>BackEnd Developer</p>
                                      <p class="description">With a passion for color and a love for clean lines, Riesky brings all our wildest design dreams to life.</p>
                                      <div class="social-links">
                                          <a href="https://instagram.com/rieskyfabs" target="_blank" class="social-icon"><i class="fab fa-instagram"></i></a>
                                          <a href="https://facebook.com/rieskyfabs" target="_blank" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                                          <a href="https://linkedin.com/in/rieskyfabs" target="_blank" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
                                      </div>
                                  </div>  
                              </div>
                          </div>
                      </div>
                  </div>
              </section>
              <!-- End Team Page -->

              <!-- Highlighted CTA -->
              <section class="highlighted-cta" id="highlighted-cta">
                  <div class="container highlighted-cta-wrapper">
                      <div class="content-left">
                          <h2 class="heading">"<span>Aku Ada</span> Lingkunganku <span>Bahagia</span>."</h2>
                          <p class="subHeading">Ayo Bergabung & Berkontribusi dengan P5, Dan Menjadi Pelajar Yang Berani, Jujur & Disiplin.</p>
                          <div class="cta-box-wrapper">
                              <div class="box-cta">
                                  <a href="{{route('login')}}" class="btn-login"><i class="fas fa-sign-in-alt"></i> Login Sekarang</a>   
                              </div>
                          </div>
                      </div>
                      <div class="content-right">
                          <div class="img-wrapper">
                              <img src="{{ asset('/images/Mockup1.png') }}" alt="Dua orang siswa dengan latar belakang tanaman" class="image">
                          </div>
                      </div>
                  </div>
              </section>
              <!-- End Highlighted CTA -->

              <!-- Contact Form -->
              <section class="contact-form" id="contact-form">
                  <div class="container contact-form-wrapper">
                      <div class="content-left">
                          <h2 class="heading">Hubungi Tim Kami!</h2>
                          <p class="subHeading">Memiliki Pertanyaan Seputar Website Ini Atau Tentang P5? Hubungi Kami Dibawah!</p>
                          <a href="https://wa.me/6281310346123" class="btn-contact"><i class="fa-solid fa-phone-volume"></i> +62 813-1034-6123 (Whatsapp)</a>
                          <a href="mailto:kikirizkiromadhoniyah@smkwikrama.sch.id" class="btn-email"><i class="fa-solid fa-envelope"></i> kikirizkiromadhoniyah@smkwikrama.sch.id</a>
                          <div class="contact-form-box-wrapper">
                              <div class="box-contact-form">
                                  <h3>Terhubung Dengan Kami</h3>
                                  <div class="social-media-buttons">
                                      <a href="https://instagram.com" class="social-button instagram" target="_blank" aria-label="Instagram">
                                          <i class="fab fa-instagram"></i>
                                      </a>
                                      <a href="https://twitter.com" class="social-button twitter" target="_blank" aria-label="Twitter">
                                          <i class="fab fa-twitter"></i>
                                      </a>
                                  </div>
                                  <!-- <a href="#" class="btn-login"><i class="fas fa-sign-in-alt"></i> Login Sekarang</a> -->
                              </div>
                          </div>
                      </div>
                      <div class="content-right">
                          <!-- <div class="img-wrapper">
                              <img src="../../public/images/Mockup1.png" alt="Dua orang siswa dengan latar belakang tanaman" class="image">
                          </div> -->
                          <form class="contact-form-fields" action="#" method="post">
                              <div class="form-group">
                                  <span class="icon"><i class="fa-solid fa-user"></i></span>
                                  <input type="text" name="nama_lengkap" placeholder="Nama Lengkap" required>
                              </div>
                              <div class="form-group">
                                  <span class="icon"><i class="fa-solid fa-envelope"></i></span>
                                  <input type="email" name="email" placeholder="Email" required>
                              </div>
                              <button type="submit" class="btn-submit">Kirim</button>
                          </form>
                      </div>
                  </div>
              </section>
              <!-- END Contact Form -->
          </main>

        <!-- Footer -->
        <footer class="footer">
            <div class="footer-content">
                <p>© 2024 DAMASU.</p>
                <div class="social-icons">
                    <a href="#"><i class="fab fa-youtube"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-github"></i></a>
                    <a href="#"><i class="fab fa-linkedin"></i></a>
                </div>
            </div>
        </footer>
        <!-- END Footer -->
        <!-- # JS Plugins -->
        <script src="{{ asset('front/plugins/jquery/jquery.min.js')}}"></script>
        <script src="{{ asset('front/plugins/bootstrap/bootstrap.min.js')}}"></script>

        <!-- Main Script -->
        <script src="{{ asset('js/appScript.js') }}"></script>
    </body>
</html>
