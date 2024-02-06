<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.web.head_ref')
</head>

<body>

    <!-- ======= Header ======= -->
    @include('partials.web.header')
    <!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero">
        <div class="hero-container">
            <div id="slide-islamiyah" class="carousel slide carousel-fade" data-ride="carousel">
                <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
                <div class="carousel-inner" role="listbox">
                    <!-- Slide 1 -->
                    @php
                        $no_slide = 1;
                    @endphp
                    @foreach ($slides as $data_slide)
                        <div @if ($no_slide == 1) class="carousel-item active" @else class="carousel-item" @endif style="background: url({{ asset('images/' . $data_slide->image) }})">
                            <div class="carousel-container">
                                <div class="carousel-content">
                                    <h2 class="animate__animated animate__fadeInDown">{{ $data_slide->title }}</h2>
                                    <p class="animate__animated animate__fadeInUp">{!! $data_slide->detail !!}</p>
                                    <div>
                                        <a href="#about"
                                            class="btn-get-started animate__animated animate__fadeInUp scrollto">Sejarah
                                            Singkat</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @php
                            $no_slide++;
                        @endphp
                    @endforeach
                </div>

                <a class="carousel-control-prev" href="#slide-islamiyah" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon icofont-simple-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>

                <a class="carousel-control-next" href="#slide-islamiyah" role="button" data-slide="next">
                    <span class="carousel-control-next-icon icofont-simple-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>

            </div>
        </div>
    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container">

                <div class="row no-gutters">
                    <div class="col-lg-6 col-md-6 col-sm-12 content">
                        <h3>Sejarah Singkat</h3>
                        {!! str_replace(['<div>', '</div>'], '', $sejarah->profile_detail) !!}
                        <a href="{{ route('profil', $sejarah->alias) }}">Baca Selengkapnya</a>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 content">
                        <h3>Lokasi</h3>
                        <p>{{ $instansi->address }}</p>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 text-center content">
                        <img src="{{ asset('images/logo-islamiyah.png') }}" alt="logo islamiyah dolok masihul"
                            width="100" class="d-block m-auto">
                        <p>Yayasan Pendidikan Islamiyah <br />Dolok Masihul</p>
                    </div>
                </div>

            </div>
        </section><!-- End About Section -->

        <!-- ======= Counts Section ======= -->
        <section id="counts" class="counts">
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
                        <div class="count-box">
                            <i class="icofont-users-alt-5"></i>
                            <span data-toggle="counter-up">{{ $instansi->jlh_siswa }}</span>
                            <p><strong>Siswa Aktif</strong><br>Tahun Ini</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
                        <div class="count-box">
                            <i class="icofont-user-suited"></i>
                            <span data-toggle="counter-up">{{ $instansi->jlh_guru }}</span>
                            <p><strong>Guru</strong><br>Profesional</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
                        <div class="count-box">
                            <i class="icofont-badge"></i>
                            <span data-toggle="counter-up">{{ $instansi->jlh_prestasi }}</span>
                            <p><strong>Prestasi Siswa</strong><br> Tahun Ini</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
                        <div class="count-box">
                            <i class="icofont-building"></i>
                            <span data-toggle="counter-up">{{ $instansi->jlh_fasilitas }}</span>
                            <p><strong>Fasilitas</strong> <br> Pembelajaran</p>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Counts Section -->

        <!-- ======= Clients Section ======= -->
        <section id="clients" class="clients section-bg">
            <div class="container">
                <div class="row">
                </div>

            </div>
        </section><!-- End Clients Section -->

        <!-- ======= Berita Terkini Section ======= -->
        <section id="services" class="services">
            <div class="container">
                <div class="section-title">
                    <h2>Berita Terkini</h2>
                    {{-- <p>Kami informasikan berbagai berita dan kegiatan tentang Yayasa Pendidikan Islamiyah Dolok Masihul.
                        Semoga Memberikan informasi yang jelas bagi anda</p> --}}
                </div>

                <div class="row">
                    @foreach ($berita as $data_berita)
                        <div class="col-lg-4 col-md-6">
                            <a href="{{ route('berita.detail', $data_berita->alias) }}"><img
                                    src="{{ asset('images/' . $data_berita->image) }}" class="img-fluid"
                                    alt="Yayasa Pendidikan Islamiyah Domas - {{ $data_berita->judul }}"></a>
                            <h4 class="title"><a
                                    href="{{ route('berita.detail', $data_berita->alias) }}">{{ $data_berita->title }}</a>
                            </h4>
                        </div>
                    @endforeach
                </div>

            </div>
        </section><!-- End Berita Terkini Section -->

        <!-- ======= Galeri Foto Section ======= -->
        <section id="portfolio" class="portfolio">
            <div class="container">

                <div class="section-title">
                    <h2>Galeri Foto</h2>
                </div>

                <div class="row">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <ul id="portfolio-flters">
                            <li data-filter="*" class="filter-active">Semua</li>
                            <li data-filter=".filter-app">Kegiatan Sekolah</li>
                            <li data-filter=".filter-card">Prestasi</li>
                            <li data-filter=".filter-web">Kesiswaan</li>
                        </ul>
                    </div>
                </div>

                <div class="row portfolio-container">
                    @foreach ($galeri as $data_galeri)
                        <div @if ($data_galeri->jenis == 'kegiatan_sekolah') class="col-lg-4 col-md-6 portfolio-item filter-app" @elseif($data_galeri->jenis=="prestasi") class="col-lg-4 col-md-6 portfolio-item filter-card" @elseif($data_galeri->jenis=="kesiswaan") class="col-lg-4 col-md-6 portfolio-item filter-web" @endif>
                            <div class="portfolio-wrap">
                                <a href="{{ asset('images/' . $data_galeri->image) }}" data-gall="portfolioGallery"
                                    class="venobox" title="{{ $data_galeri->title }}">
                                    <img src="{{ asset('images/' . $data_galeri->image) }}" class="img-fluid"
                                        alt="{{ $data_galeri->title }}">
                                    <div class="portfolio-info">
                                        <h4>{{ $data_galeri->title }}</h4>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </section><!-- End Galeri Foto Section -->

        <!-- ======= Prestasi Section ======= -->
        <section id="services" class="services">
            <div class="container">
                <div class="section-title">
                    <h2>Prestasi Sekolah</h2>
                    {{-- <p>Kami informasikan berbagai berita dan kegiatan tentang Yayasa Pendidikan Islamiyah Dolok Masihul.
                        Semoga Memberikan informasi yang jelas bagi anda</p> --}}
                </div>

                <div class="row">
                    @foreach ($prestasi as $data_prestasi)
                        <div class="col-lg-4 col-md-6">
                            <a href="{{ route('prestasi') }}"><img
                                    src="{{ asset('images/' . $data_prestasi->image) }}" class="img-fluid"
                                    alt=""></a>
                            <h4 class="title"><a href="{{ route('prestasi') }}">{{ $data_prestasi->title }}</a>
                            </h4>
                        </div>
                    @endforeach
                </div>

            </div>
        </section><!-- End Prestasi Terkini Section -->



        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container">

                <div class="section-title">
                    <h2>Kontak & Lokasi Sekolah</h2>
                    <p></p>
                </div>

                <div class="row contact-info">

                    <div class="col-md-4">
                        <div class="contact-address">
                            <i class="icofont-google-map"></i>
                            <h3>Alamat</h3>
                            <address>{{ $instansi->address }}</address>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="contact-phone">
                            <i class="icofont-phone"></i>
                            <h3>Telepon</h3>
                            <p><a href="#">{{ $instansi->phone }}</a></p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="contact-email">
                            <i class="icofont-envelope"></i>
                            <h3>Email</h3>
                            <p><a href="#">{{ $instansi->email }}</a></p>
                        </div>
                    </div>

                </div>

                <div class="form">
                    <div class="mapouter">
                        <div class="gmap_canvas"><iframe width="100%" height="400" id="gmap_canvas"
                                src="https://maps.google.com/maps?q=MTS%20Islamiyah,%20Jalan%20Perjuangan%20Gg.%20Benteng%20Link%20I,%20Pekan%20Dolok%20Masihul,%20Dolok%20Masihul,%20Serdang%20Bedagai%20Regency,%20North%20Sumatra&t=&z=13&ie=UTF8&iwloc=&output=embed"
                                frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a
                                href="https://fmovies2.org">fmovies</a><br>
                            <style>
                                .mapouter {
                                    position: relative;
                                    text-align: right;
                                    height: 400px;
                                    width: 100%;
                                }

                            </style><a href="https://www.embedgooglemap.net">how to add map to website</a>
                            <style>
                                .gmap_canvas {
                                    overflow: hidden;
                                    background: none !important;
                                    height: 400px;
                                    width: 100%;
                                }

                            </style>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End Contact Section -->

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
