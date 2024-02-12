@extends('layouts.web.page_detail')
@section('kategori', 'Berita dan Pengumuman Terkini')
@section('breadcrumb', 'Berita dan Pengumuman Terkini')

@section('content')
    <div class="container">
        <div class="row">
            @foreach ($berita_page as $data_berita)
                <div class="col-md-4 col-sm-12 mb-3 content">
                    @if ($data_berita->image == '')
                        <img src="{{ asset('images/no-image.png') }}" alt="{{ $data_berita->title }}" class="img-fluid">
                    @else
                        <img src="{{ asset('images/' . $data_berita->image) }}" alt="{{ $data_berita->title }}"
                            class="img-fluid img-thumbnail">
                    @endif
                    <h6><a href="{{ route('berita.detail', $data_berita->alias) }}">{{ $data_berita->title }}</a></h6>
                </div>
            @endforeach
        </div>


        <div style="display: block;margin:auto;margin-top:30px;">{{ $berita_page->links() }}</div>

    </div>

@endsection
