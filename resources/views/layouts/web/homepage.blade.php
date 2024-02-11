<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.web.head_ref')
    <style>

    </style>
</head>

<body>

    <!-- ======= Header ======= -->
    @include('partials.web.header')
    <!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero">
        <div class="hero-container">
            <div id="slide-min2" class="carousel slide carousel-fade" data-ride="carousel">
                <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
                <div class="carousel-inner" role="listbox">
                    <!-- Slide 1 -->
                    @php
                        $no_slide = 1;
                    @endphp
                    @foreach ($slides as $data_slide)
                        <div @if ($no_slide == 1) class="carousel-item active" @else class="carousel-item" @endif
                            style="background: url({{ asset('images/' . $data_slide->image) }}); background-repeat:no-repeat;background-size:cover;">
                            <div class="carousel-container">
                                <div class="carousel-content">
                                    <h2 class="animate__animated animate__fadeInDown">{{ $data_slide->title }}</h2>
                                    <p class="animate__animated animate__fadeInUp">{!! $data_slide->detail !!}</p>
                                    <div>
                                        <a href="#about"
                                            class="btn-get-started animate__animated animate__fadeInUp scrollto">Visi &
                                            Misi Madrasah </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @php
                            $no_slide++;
                        @endphp
                    @endforeach
                </div>

                <a class="carousel-control-prev" href="#slide-min2" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon icofont-simple-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>

                <a class="carousel-control-next" href="#slide-min2" role="button" data-slide="next">
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

                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12" data-aos="fade-left">
                        <h3 style="text-transform: uppercase">Profil</h3>
                        <h2 style="text-transform: uppercase">Madrasah Ibtidaiyah Negeri 2</h2>
                        <h2 style="text-transform: uppercase">Tebing tinggi</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique excepturi asperiores, quia
                            est molestias eligendi eaque at, dignissimos quis ipsa beatae et adipisci quibusdam. Ab
                            aliquid id corrupti fuga praesentium!</p>
                        {{-- {!! str_replace(['<div>', '</div>'], '', $sambutan->profile_detail) !!}
                        <a href="{{ route('profil', $sambutan->alias) }}">Baca Selengkapnya</a> --}}
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12" data-aos="fade-right">
                        {{-- <img src="{{ asset('images/' . $sambutan->gambar) }}" class="img-fluid"
                            alt="foto kepsek min 2 tebing tinggi"> --}}
                        <iframe width="100%" height="315"
                            src="https://www.youtube.com/embed/uE7ZNs3u1jg?si=Y8jgNWjyrEsQJ7mC"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen></iframe>
                    </div>


                </div>

            </div>
        </section>
        <!-- End About Section -->

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
                        <div class="col-lg-4 col-md-6" data-aos="fade-up">
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

        <!-- ======= Fasilitas Section ======= -->
        <section id="services" class="services fixed-bg">
            <div class="container content">
                <div class="section-title">
                    <h2 style="color: white">Fasilitas Madrasah</h2>
                </div>
                <div class="row">
                    @foreach ($fasilitas as $data_fasilitas)
                        <div class="col-lg-4 col-md-6 mt-3" data-aos="fade-up">
                            <div class="card" style="width: 100%;">
                                <img src="{{ asset('images/' . $data_fasilitas->gambar) }}"
                                    class="card-img-top img-fluid rounded" alt="">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $data_fasilitas->judul }}</h5>
                                    <a href="{{ route('fasilitas', $data_fasilitas->alias) }}" class="btn btn-success"
                                        style="background: #006316 !important">Lihat
                                        Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section><!-- End Fasilitas Section -->



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
                        <div
                            @if ($data_galeri->jenis == 'kegiatan_sekolah') class="col-lg-4 col-md-6 portfolio-item filter-app" @elseif($data_galeri->jenis == 'prestasi') class="col-lg-4 col-md-6 portfolio-item filter-card" @elseif($data_galeri->jenis == 'kesiswaan') class="col-lg-4 col-md-6 portfolio-item filter-web" @endif>
                            <div class="portfolio-wrap" data-aos="fade-up">
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


        {{-- <section id="team" class="team">
            <div class="container">

                <div class="section-title">
                    <h2>Tenaga Pendidik</h2>
                </div>

                <div class="row">
                    @foreach ($staff as $data_staff)
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                            <div class="member">
                                @if ($data_staff->image == '')
                                    <img src="{{ asset('images/icon-ptk.png') }}" class="img-fluid" alt="">
                                @else
                                    <img src="{{ asset('images/' . $data_staff->image) }}" class="img-fluid"
                                        alt="">
                                @endif

                                <div class="member-info">
                                    <div class="member-info-content">
                                        <h4>{{ $data_staff->nama }}</h4>
                                        <span>{{ $data_staff->jabatan }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </section> --}}


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
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983.016158991976!2d99.13606207371627!3d3.346156551912635!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3031612a5f1fd0eb%3A0xe604a56b9110d406!2sMIN%202%20TEBING%20TINGGI!5e0!3m2!1sen!2sid!4v1707580663154!5m2!1sen!2sid"
                            width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
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
    <script src="{{ asset('asset_frontend/js/main.js') }}"></script>

    {{-- AOS --}}
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>
