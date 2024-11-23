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

    <!-- ======= Main ======= -->
      <main>
        @include('partials.main')
      </main>
    <!-- ======= End Main ======= -->

    <!-- ======= Footer ======= -->
      @include('partials.footer')
    <!-- End Footer -->

    <!-- ======= Back To Top ======= -->
      @include('partials.back-to-top')
    <!-- ======= End Back To Top ======= -->

    <!-- ======= Vendor Js ======= -->
      @include('partials.vendor-js')
    <!-- ======= End Vendor Js ======= -->
    
    <!-- ======= Sweet Alert ======= -->
    @include('sweetalert::alert')
    <!-- ======= End Sweet Alert ======= -->
      
  </body>

</html>