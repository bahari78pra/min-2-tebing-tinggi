 <header id="header" class="fixed-top">
     <div class="container d-flex align-items-center">
         <img src="{{ asset('imgs/logo-kemenag.png') }}" width="50" alt="logo kemenag">
         <h1 class="logo mr-auto"><a href="{{ route('index') }}">
                 MIN 2 Tebing Tinggi
             </a>
         </h1>
         <!-- Uncomment below if you prefer to use an image logo -->
         <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

         <nav av class="nav-menu d-none d-lg-block">
             <ul>
                 <li class="active"><a href="{{ route('index') }}">Beranda</a></li>
                 <li class="drop-down"><a href="">Profil</a>
                     <ul>
                         @foreach ($profil as $data_profil)
                             <li><a href="{{ route('profil', $data_profil->alias) }}">{{ $data_profil->judul }}</a>
                             </li>
                         @endforeach
                         <li><a href="{{ route('staff_pengajar') }}">Tenaga Pendidik / Kependidikan</a></li>
                     </ul>
                 </li>
                 <li class="drop-down"><a href="">Fasilitas</a>
                     <ul>
                         @foreach ($fasilitas as $data_fasilitas)
                             <li><a
                                     href="{{ route('fasilitas', $data_fasilitas->alias) }}">{{ $data_fasilitas->judul }}</a>
                             </li>
                         @endforeach
                     </ul>
                 </li>
                 <li class="drop-down"><a href="">Ekstrakurikuler</a>
                     <ul>
                         @foreach ($ekstrakurikuler as $data_ekstrakurikuler)
                             <li><a
                                     href="{{ route('ekstrakurikuler', $data_ekstrakurikuler->alias) }}">{{ $data_ekstrakurikuler->judul }}</a>
                             </li>
                         @endforeach
                     </ul>
                 </li>
                 <li class="drop-down"><a href="">Publikasi</a>
                     <ul>
                         <li><a href="{{ route('prestasi') }}">Prestasi</a></li>
                         <li><a href="{{ route('berita') }}">Berita</a></li>
                         <li><a href="{{ route('galeri_foto') }}">Galeri Foto</a></li>
                         {{-- <li><a href="{{ route('galeri_video') }}">Galeri Video</a></li> --}}
                     </ul>
                 </li>
                 {{-- <li><a href="{{ route('pendaftaran') }}">Pendaftaran</a></li> --}}
             </ul>
         </nav><!-- .nav-menu -->

     </div>
 </header>
