@extends('layouts.web.page_detail')

@section('content')

{{-- Start Breadcrumb --}}
<div class="sections">
    <div class="container">
        <div class="pages-title">
            <h1>Video Kegiatan Sekolah</h1>
        </div>
    </div>
</div>
{{-- Start galeri --}}
<div class="container filterable-portfolio">
    <div class="section-title">
    <h2>Kegiatan Terbaru</h2>
    <hr class="center">
    <p>Dokumentasi seluruh kegiatan sekolah,siswa,prestasi dan dokumentasi lainnya yang merupakan wujud dari komitmen kami dalam memajukan pendidikan di masyarakat luas.</p>
    </div>
    <div class="row portfolio-items">
        @foreach($video as $video_data)
        <figure class="col-md-6 consulting mb-3">
            <iframe style="width: 100%" height="315" src="{!! $video_data->video_url !!}"></iframe>
            <h4 class="mt-2 text-center">{{ $video_data->title }}</h4>
        </figure>
        @endforeach
    </div>
    <div class="d-flex justify-content-center">
        {{ $video->links() }}
    </div>
</div>
{{-- End galeri --}}
@endsection



