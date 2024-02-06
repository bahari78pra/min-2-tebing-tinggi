@extends('layouts.web.page_detail')

@section('content')

{{-- Start Breadcrumb --}}
<div class="sections">
    <div class="container">
        <div class="pages-title">
            <h1>Download</h1>
        </div>
    </div>
</div>
{{-- End breadcrumb --}}

{{-- Start content --}}
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <table class="table table-sm" style="font-size: 17px; font-family:poppins;">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th class="text-center">Download</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($download as $download_data)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $download_data->judul }}</td>
                        <td class="text-center"><a href="{{ asset('file-downloads/'. $download_data->file) }}" target="_blank"><span class="fa fa-download"></span></a></td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                  <div class="d-flex justify-content-center mt-3">
                    {{ $download->links() }}
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

