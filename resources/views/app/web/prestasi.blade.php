@extends('layouts.web.page_detail')
@section('kategori', 'Tenaga Pendidik dan Kependidikan')
@section('breadcrumb', 'Tenaga Pendidik dan Kependidikan')

@section('content')
    <div class="container">
        @foreach ($prestasi as $data_prestasi)
            <div class="row" style="margin-bottom: 30px;">

                <div class="col-md-6 col-sm-12">
                    @if ($data_prestasi->image == '')
                        <img src="{{ asset('images/no-image.png') }}" alt="{{ $data_prestasi->title }}"
                            class="img-fluid">
                    @else
                        <img src="{{ asset('images/' . $data_prestasi->image) }}" alt="{{ $data_prestasi->title }}"
                            class="img-fluid">
                    @endif
                </div>
                <div class="col-md-6 col-sm-12 content">
                    <h5>{{ $data_prestasi->title }}</h5>
                    {!! $data_prestasi->detail !!}
                </div>
            </div>
        @endforeach

        <div style="display: block;margin:auto;margin-top:30px;">{{ $prestasi->links() }}</div>

    </div>

@endsection
