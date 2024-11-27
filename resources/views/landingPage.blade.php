<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('landing-page.partials._header')
</head>

    <body>
        
        <!-- navigation -->
            @include('landing-page.partials._navigation')
        <!-- /navigation -->

        <main>
            <!-- Hero, Home Page Section -->
                @include('landing-page.partials._hero-section')
            <!-- Hero, Home Page Section -->

            <!-- About Us Page -->
                @include('landing-page.partials._about-section')
            <!-- End About Us Page -->

            <!-- Galeri Page -->
                @include('landing-page.partials._galeri-section')
            <!-- End Galeri Page -->

            <!-- Start Team Page -->
                @include('landing-page.partials._team-section')
            <!-- End Team Page -->

            <!-- Highlighted CTA -->
                @include('landing-page.partials._highlighted-cta')
            <!-- End Highlighted CTA -->

            <!-- Contact Form -->
                @include('landing-page.partials._contact-section')
            <!-- END Contact Form -->
        </main>

        <!-- Footer -->
            @include('landing-page.partials._footer')
        <!-- END Footer -->

        <!-- Vendor Js -->
            @include('landing-page.partials._vendor-js')
        <!-- End Vendor Js -->

        @include('sweetalert::alert')

    </body>
</html>