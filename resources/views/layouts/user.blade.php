<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<!-- ======= Head ======= -->
  <head>
    @include('partials.head')
  </head>
<!-- ======= End Head ======= -->

  <body>

    <!-- ======= Header ======= -->
      @include('partials.header')
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
      @include('partials.sidebar')
    <!-- End Sidebar-->

    <main>
      @include('partials.main')
    </main>

    <!-- ======= Footer ======= -->
      @include('partials.footer')
    <!-- End Footer -->

    <!-- ======= Back To Top ======= -->
      @include('partials.back-to-top')
    <!-- ======= End Back To Top ======= -->

    <!-- ======= Vendor Js ======= -->
      @include('partials.vendor-js')
    <!-- ======= End Vendor Js ======= -->
    
    @include('sweetalert::alert')

  </body>

</html>