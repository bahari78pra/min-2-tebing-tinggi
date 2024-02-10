<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="footer-info">
                        <h3>MIN 2 Tebing Tinggi</h3>

                        <p>
                            {{ $instansi->address }}<br><br>
                            <strong>Telepon:</strong> {{ $instansi->phone }}<br>
                            <strong>Email:</strong> {{ $instansi->email }}<br>
                        </p>
                        <div class="social-links mt-3">
                            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                            <a href="#" class="google-plus"><i class="bx bxl-youtube"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Berita Terkini</h4>
                    <ul>
                        @foreach ($berita as $data_berita)
                            <li><i class="bx bx-chevron-right"></i> <a href="#">{{ $data_berita->title }}</a>
                            </li>
                        @endforeach

                    </ul>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12 footer-links">
                    <h4>Link Terkait</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">KANWIL KEMENAG Kota Tebing Tinggi</a>
                        </li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">KANWIL KEMENAG Prov.Sumatera Utara</a>
                        </li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Dinas Pendidikan Kota Tebing
                                Tinggi</a>
                        </li>
                    </ul>
                </div>


                <div class="col-lg-2 col-md-6 footer-newsletter">
                    <img src="{{ asset('imgs/logo-kemenag.png') }}" alt="logo-kemenag" width="150"
                        class="d-block mx-auto">
                    <p align="center">MIN 2 Tebing Tinggi</p>

                </div>

            </div>
        </div>
    </div>

    <div class="container">
        <div class="copyright">
            &copy; Copyright <strong><span>MIN 2 Tebing Tinggi</span></strong>. All Rights
            Reserved
        </div>
        <div class="credits">
            {{-- Designed by <a href="#">BpMediaSolusindo</a> --}}
        </div>
    </div>
</footer>
