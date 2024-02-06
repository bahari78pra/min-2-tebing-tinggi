<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.web.head_ref')
</head>

<body>

    <!-- ======= Header ======= -->
    @include('partials.web.header')
    <!-- End Header -->

    <main id="main">
        <!-- ======= Breadcrumbs ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <b>@yield('kategori')</b>
                    <ol>
                        <li><a href="{{ route('index') }}">Beranda</a></li>
                        <li>@yield('breadcrumb')</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs -->

        <section class="inner-page">
            @yield('content')
        </section>
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    @include('partials.web.footer')
    <!-- End Footer -->

    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('asset_frontend/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('asset_frontend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('asset_frontend/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('asset_frontend/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('asset_frontend/vendor/waypoints/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('asset_frontend/vendor/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('asset_frontend/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('asset_frontend/vendor/venobox/venobox.min.js') }}"></script>
    <script src="{{ asset('asset_frontend/vendor/owl.carousel/owl.carousel.min.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('asset_frontend/js/main.js') }}">
    </script>

</body>

</html>
