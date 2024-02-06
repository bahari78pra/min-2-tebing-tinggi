@extends('layouts.web.page_detail')

@section('content')
{{-- Start Breadcrumb --}}
<div class="sections">
    <div class="container">
        <div class="pages-title">
            <h1>Staff Pengajar</h1>
        </div>
    </div>
</div>
{{-- End breadcrumb --}}

<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-lg mb-4">
                        <figure class="careers-pic">
                            @if($staff_pengajar_detail->image!="")
                                <img src="{{ asset('images/'. $staff_pengajar_detail->image) }}" alt="{{ $staff_pengajar_detail->nama }}" style="height: 370px;object-fit:cover;" class="self-center">
                            @else
                                <img src="{{ asset('images/staff-icon.jpg') }}" alt="{{ $staff_pengajar_detail->nama }}">
                            @endif
                        </figure>
                    </div>
                    <div class="col-lg" >
                        <div class="careers-info">
                        <h6>{{ $staff_pengajar_detail->jabatan }}</h6>
                        <h2>{{ $staff_pengajar_detail->nama }}</h2>
                        <hr class="left">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex">
                                <span style="width: 45%;    :maroon;">
                                    <i class="fa fa-angle-right" aria-hidden="true"></i>  &nbsp; NIGY/NUPTK
                                </span> 
                                <span style="width: 10%" class="text-center"> : </span>
                                <span style="width: 45%; :blue;">
                                    {{ $staff_pengajar_detail->nip }}
                                </span>
                            </li>
                            <li class="list-group-item d-flex">
                                <span style="width: 45%;    :maroon;">
                                    <i class="fa fa-angle-right" aria-hidden="true"></i>  &nbsp; Jabatan
                                </span> 
                                <span style="width: 10%" class="text-center"> : </span>
                                <span style="width: 45%; :blue;">
                                    {{ $staff_pengajar_detail->jabatan }}
                                </span>
                            </li><li class="list-group-item d-flex">
                                <span style="width: 45%;    :maroon;">
                                    <i class="fa fa-angle-right" aria-hidden="true"></i>  &nbsp; Tempat Lahir
                                </span> 
                                <span style="width: 10%" class="text-center"> : </span>
                                <span style="width: 45%; :blue;">
                                    {{ $staff_pengajar_detail->tpt_lahir }}
                                </span>
                            </li><li class="list-group-item d-flex">
                                <span style="width: 45%;    :maroon;">
                                    <i class="fa fa-angle-right" aria-hidden="true"></i>  &nbsp; Tanggal Lahir
                                </span> 
                                <span style="width: 10%" class="text-center"> : </span>
                                <span style="width: 45%; :blue;">
                                    {{ $staff_pengajar_detail->tgl_lahir }}
                                </span>
                            </li><li class="list-group-item d-flex">
                                <span style="width: 45%;    :maroon;">
                                    <i class="fa fa-angle-right" aria-hidden="true"></i>  &nbsp; Agama
                                </span> 
                                <span style="width: 10%" class="text-center"> : </span>
                                <span style="width: 45%; :blue;">
                                    {{ $staff_pengajar_detail->agama }}
                                </span>
                            </li><li class="list-group-item d-flex">
                                <span style="width: 45%;    :maroon;">
                                    <i class="fa fa-angle-right" aria-hidden="true"></i>  &nbsp; Pendidikan Akhir
                                </span> 
                                <span style="width: 10%" class="text-center"> : </span>
                                <span style="width: 45%; :blue;">
                                    {{ $staff_pengajar_detail->pendidikan_akhir }}
                                </span>
                            </li>
                            <li class="list-group-item"></li>
                        </ul>
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

                    {{-- @include('partials.web.widget_sosial_media') --}}
                </aside>
            </div>
            {{-- End sidebar --}}
            
        </div>
    </div>
</section>
@endsection

