@extends('layouts.web.page_detail')

@section('content')

{{-- Start Breadcrumb --}}
<div class="sections">
    <div class="container">
        <div class="pages-title">
            <h1>Kurikulum Sekolah</h1>
        </div>
    </div>
</div>
{{-- End breadcrumb --}}

{{-- Start content --}}
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="post-content">
                    <div class="post-caption-image">
                        <figure>
                            @if($kurikulum_detail->gambar!="")
                            <img src="{{ asset('images/'.$kurikulum_detail->gambar) }}" alt="{{ $kurikulum_detail->judul }}">
                            @endif
                        </figure>
                        <div class="date-label">
                        <h6>
                            {{ date('d F Y', strtotime($kurikulum_detail->created_at)) }}
                        </h6>
                        </div>
                    </div>  
                    <div class="fig-caption">
                        <h3>{{ $kurikulum_detail->judul }}</h3>
                        <div class="post-preview-details">
                            <p>Oleh : Admin</p> 
                        </div>
                        <div class="post-text">
                            {!! $kurikulum_detail->detail !!}
                        </div>
                    </div> 
                </div>
            </div>

            {{-- Start sidebar --}}
            <div class="col-lg-4">
                <aside class="blog-right-side">
                    @include('partials.web.widget_pencarian_berita')
                    @include('partials.web.widget_berita_terkini')
                    @include('partials.web.widget_galeri')
                    @include('partials.web.widget_sosial_media')
                </aside>
            </div>
            {{-- End sidebar --}}
            
        </div>
    </div>
</section>
{{-- End Content --}}
@endsection

