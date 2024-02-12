@extends('layouts.web.page_detail')
@section('kategori', 'Download')
@section('breadcrumb', 'Download')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-8 col-sm-12">
                <table class="table table-sm table-bordered" style="font-size: 17px; font-family:poppins;">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th class="text-center">Download</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($download as $download_data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $download_data->judul }}</td>
                                <td class="text-center">
                                    <a href="{{ asset('file-downloads/' . $download_data->file) }}" target="_blank"><button
                                            class="btn btn-success btn-sm">Download</button></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div style="display: block;margin:auto;margin-top:30px;">{{ $download->links() }}</div>
            </div>
        </div>
    </div>

@endsection
