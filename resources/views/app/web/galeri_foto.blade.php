@extends('layouts.web.page_detail')
@section('kategori', 'Galeri Foto')
@section('breadcrumb', 'Galeri Foto')

@section('content')
    <div class="container">
        <div class="row">
            @foreach ($galeri as $data_galeri)
                <div class="col-md-4 col-sm-12 content" style="overflow: hidden;padding:10px;">
                    <img src="{{ asset('images/' . $data_galeri->image) }}" alt="{{ $data_galeri->title }}" class="img-fluid img-thumbnail">
                    <p align="center">{{ $data_galeri->title }}</p>
                </div>
            @endforeach
            <div style="display:block;margin:auto;">{{ $galeri->links() }}</div>
        </div>
    </div>

@endsection
