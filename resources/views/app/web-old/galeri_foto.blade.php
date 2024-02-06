@extends('layouts.web.page_detail')

@section('content')

{{-- Start Breadcrumb --}}
<div class="sections">
    <div class="container">
        <div class="pages-title">
            <h1>Dokumentasi Kegiatan Sekolah</h1>
        </div>
    </div>
</div>
{{-- End breadcrumb --}}

{{-- Start galeri --}}
<div class="container filterable-portfolio">
    <div class="section-title">
    <h2>Kegiatan Terbaru</h2>
    <hr class="center">
    <p>Dokumentasi seluruh kegiatan sekolah,siswa,prestasi dan dokumentasi lainnya yang merupakan wujud dari komitmen kami dalam memajukan pendidikan di masyarakat luas.</p>
    </div>
    <ul class="nav nav-pills center-pills portfolio-filter">
        <li style="margin-bottom: 20px" role="presentation" class="active"><a href="#" data-filter="*">Semua</a></li>
        <li style="margin-bottom: 20px" role="presentation"><a href="#" data-filter=".kegiatan_sekolah">Kegiatan Sekolah</a></li>
        <li style="margin-bottom: 20px" role="presentation"><a href="#" data-filter=".kesiswaan">Kesiswaan</a></li>
        <li style="margin-bottom: 20px" role="presentation"><a href="#" data-filter=".prestasi">Prestasi</a></li>
        <li style="margin-bottom: 20px" role="presentation"><a href="#" data-filter=".lainnya">lainnya</a></li>
    </ul>
    <div class="row portfolio-items">
    @foreach($galeri as $galeri_data)
    <figure class="portfolio-item {{ $galeri_data->jenis }} col-md-4 consulting mb-5" style="height: 280px; object-fit:cover;">
        <div class="magnific-img" style="object-fit: cover">
            <a class="image-popup-vertical-fit" href="{{ asset('images/'. $galeri_data->image)}}">
            <img src="{{ asset('images/'. $galeri_data->image)}}" alt="{{ $galeri_data->title }}" style="object-fit: cover" />
            </a>
        </div>
        <h4 class="mt-3 text-center">{{ $galeri_data->title }}</h4>
    </figure>
    @endforeach
    </div>
    <div class="d-flex justify-content-center">
        {{ $galeri->links() }}
    </div>
</div>
{{-- End galeri --}}
@endsection

