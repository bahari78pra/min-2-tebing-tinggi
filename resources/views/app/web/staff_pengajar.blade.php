@extends('layouts.web.page_detail')
@section('kategori', 'Tenaga Pendidik dan Kependidikan')
@section('breadcrumb', 'Tenaga Pendidik dan Kependidikan')

@section('content')
    <div class="container">
        <div class="row">
            @foreach ($staff_pengajar as $data_staff)
                <div class="col-md-3 col-sm-12">
                    @if ($data_staff->image == '')
                        <img src="{{ asset('images/icon-ptk.png') }}" alt="{{ $data_staff->nama }}" class="img-fluid">
                    @else
                        <img src="{{ asset('images/' . $data_staff->image) }}" alt="{{ $data_staff->nama }}" class="img-fluid">
                    @endif

                    <div style="display:block;text-align:center">
                        <b><a
                                href="{{ route('staff_pengajar.detail', $data_staff->id) }}">{{ $data_staff->nama }}</a></b><br />
                        <i>({{ $data_staff->jabatan }})</i>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

@endsection
