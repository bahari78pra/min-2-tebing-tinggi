@extends('layouts.web.page_detail')
@section('kategori', 'Berita dan Pengumuman Terkini')
@section('breadcrumb', 'Berita dan Pengumuman Terkini')

@section('content')
    <div class="container">
        @foreach ($berita2 as $data_berita)
            <div class="row" style="margin-bottom: 30px;">

                <div class="col-md-6 col-sm-12">
                    @if ($data_berita->image == '')
                        <img src="{{ asset('images/no-image.png') }}" alt="{{ $data_berita->title }}" class="img-fluid">
                    @else
                        <img src="{{ asset('images/' . $data_berita->image) }}" alt="{{ $data_berita->title }}"
                            class="img-fluid">
                    @endif
                </div>
                <div class="col-md-6 col-sm-12 content">
                    <h5>{{ $data_berita->title }}</h5>
                    {!! $data_berita->news_detail !!}<a href="{{ route('berita.detail', $data_berita->alias) }}">BACA
                        SELENGKAPNYA</a>
                </div>
            </div>
        @endforeach

        <div style="display: block;margin:auto;margin-top:30px;">{{ $berita2->links() }}</div>

    </div>

@endsection
