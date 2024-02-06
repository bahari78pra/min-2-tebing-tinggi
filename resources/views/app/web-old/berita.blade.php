@extends('layouts.web.page_detail')

@section('content')

{{-- Start Breadcrumb --}}
<div class="sections">
    <div class="container">
        <div class="pages-title">
            <h1>Berita dan Kegiatan Terkini</h1>
        </div>
    </div>
</div>
{{-- End breadcrumb --}}

{{-- Start Blog --}}
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                @if(!empty($q_berita))
                    <div class="single-item">
                        <div class="item">
                            <div class="info">
                                <div class="meta">
                                    <h3>Hasil Pencarian</h3>
                                </div>
                                <div class="content">
                                        @if(count($semua_berita)==0)
                                            <p>
                                                <b><i>Berita tidak ditemukan</i></b>
                                            </p>
                                        @else
                                            <p>
                                                <b><i>Hasil Pencarian : {{ count($semua_berita) }} berita ditemukan</i></b>
                                            </p>
                                        @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                @foreach($semua_berita as $berita_data)
                <div class="posts-list">
                    <div class="row">
                        <div class="col-lg-5 col-md-5">
                            <div class="post-preview-image">
                                <figure>
                                    <a href="{{ route('berita.detail', $berita_data->alias) }}">
                                        <img src="{{ asset('images/'.$berita_data->image) }}" alt="{{ $berita_data->title }}" class="img-berita-responsive">
                                    </a>
                                </figure>
                                <div class="date-label">
                                <h6>
                                    @php echo(date('d, m Y', strtotime($berita_data->updated_at)))  @endphp
                                </h6>
                                </div>
                            </div>  
                        </div>
                        <div class="col-lg-7 col-md-7">
                            <div class="fig-caption">
                                <div class="title-post-responsive"><a href="{{ route('berita.detail', $berita_data->alias) }}">{{ $berita_data->title }}</a></div>
                                <div class="post-preview-details">
                                    <p>Oleh : Admin</p> 
                                </div>
                                <div>{!! \Illuminate\Support\Str::limit($string = $berita_data->detail, 100, $end = '...') !!}</div>
                                <div style="margin-top: -10px">
                                    <a href="{{ route('berita.detail', $berita_data->alias) }}">
                                        <button class="btn-custom">Baca Selengkapnya</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            {{-- Start sidebar --}}
            <div class="col-lg-4">
                <aside class="blog-right-side">
                    @include('partials.web.widget_pencarian_berita')
                    @include('partials.web.widget_galeri')
                    @include('partials.web.widget_sosial_media')
                </aside>
            </div>
            {{-- End sidebar --}}
        </div>
        <div class="d-flex justify-content-center">
            {{ $semua_berita->links() }}
        </div>
    </div>
    </section>
{{-- End Blog --}}
@endsection

