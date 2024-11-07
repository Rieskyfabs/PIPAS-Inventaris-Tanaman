<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('landing-page/components/_header')
</head>

    <body>
    <!-- navigation -->
        @include('landing-page/components/_navigation')
    <!-- /navigation -->

        <main>
            <!-- Hero, Home Page Section -->
                @include('landing-page/components/_hero-section')
            <!-- Hero, Home Page Section -->

            <!-- About Us Page -->
                @include('landing-page.components._about-section')
            <!-- End About Us Page -->

            <!-- Galeri Page -->
                @include('landing-page.components._galeri-section')
            <!-- End Galeri Page -->

            <!-- Start Team Page -->
                @include('landing-page.components._team-section')
            <!-- End Team Page -->

            <!-- Highlighted CTA -->
                @include('landing-page.components._highlighted-cta')
            <!-- End Highlighted CTA -->

            <!-- Contact Form -->
                @include('landing-page.components._contact-section')
            <!-- END Contact Form -->
        </main>

        <!-- Footer -->
            @include('landing-page.components._footer')
        <!-- END Footer -->

        <!-- # JS Plugins -->
        <script src="{{ asset('front/plugins/jquery/jquery.min.js')}}"></script>
        <script src="{{ asset('front/plugins/bootstrap/bootstrap.min.js')}}"></script>

        <!-- Main Script -->
        <script src="{{ asset('js/appScript.js') }}"></script>

        @include('sweetalert::alert')
    </body>
</html>