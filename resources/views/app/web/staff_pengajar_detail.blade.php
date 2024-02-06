@extends('layouts.web.page_detail')
@section('kategori', 'Tenaga Pendidik dan Kependidikan')
@section('breadcrumb', 'Tenaga Pendidik dan Kependidikan')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <img src="{{ asset('images/' . $staff_pengajar_detail->image) }}"
                    alt="{{ $staff_pengajar_detail->nama }}" class="img-fluid">
            </div>
            <div class="col-md-6 col-sm-12 content">
                <h3>{{ $staff_pengajar_detail->nama }}</h3>

                <table cellpadding="5">
                    <tr>
                        <td>Tempat Lahir</td>
                        <td>: {{ $staff_pengajar_detail->tpt_lahir }}</td>
                    </tr>
                    <tr>
                        <td>Tanggal Lahir</td>
                        <td>: {{ date('d-m-Y', strtotime($staff_pengajar_detail->tgl_lahir)) }}</td>
                    </tr>
                    <tr>
                        <td>Pendidikan Akhir</td>
                        <td>: {{ $staff_pengajar_detail->pendidikan_akhir }}</td>
                    </tr>
                    <tr>
                        <td>Jabatan</td>
                        <td>: {{ $staff_pengajar_detail->jabatan }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

@endsection
