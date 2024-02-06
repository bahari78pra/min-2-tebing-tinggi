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

{{-- Start content --}}
<section>
<div class="container">
    <div class="row">
        <div class="col-md-12 col-lg-12">
        <div class="row">
            <div class="d-flex flex-wrap">
                @foreach($staff_pengajar as $staff_pengajar_data)
                <div class="col-md-4 mb-4">
                    <div class="team-card-3">
                        <figure class="team-photo">
                            @if($staff_pengajar_data->image!="")
                                <img src="{{ asset('images/'. $staff_pengajar_data->image) }}" alt="{{ $staff_pengajar_data->nama }}">
                            @else
                                <img src="{{ asset('images/staff-icon.jpg') }}" alt="{{ $staff_pengajar_data->nama }}">
                            @endif
                        </figure>
                        <div class="caption">
                        <h4>{{ $staff_pengajar_data->nama }}</h4>
                        <p class="">{{ $staff_pengajar_data->jabatan }}</p>
                        <hr>
                        <a href="{{ route('staff_pengajar.detail', $staff_pengajar_data->id) }}" class="btn btn-custom">Data Lengkap</a>
                        </div> 
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        </div>
    </div>
    <div class="d-flex justify-content-center mt-3">
        {{ $staff_pengajar->links() }}
    </div>
</div>
</section>

@endsection