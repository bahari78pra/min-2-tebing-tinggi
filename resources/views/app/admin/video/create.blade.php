@extends("layouts.app")

@section("content")
<h4 class="c-grey-900 mT-10 mB-10">Tambah Video</h4>
<div>
    <form action="{{ route('admin.video.insert') }}" method="POST" class='row' enctype="multipart/form-data">
        {{ csrf_field() }} 
        {{ method_field('POST') }}
        <div class="col-md-12 col-lg-8">
            <div class="bgc-white bd bdrs-3 p-20 mB-20">
                <h6>Data Video</h6>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="form-row">
                    <div class="form-group col-sm-12">
                        <label for="title">Judul<sup style='color:red'>*</sup></label>
                        <input type="text" name="title" id="title" class='form-control' required value="{{ old('title') }}">
                    </div>
                </div>

                {{-- <div class="form-row">
                    <div class="form-group col-sm-12">
                        <label for="image_cover">Gambar Sampul<sup style='color:red'>*</sup></label>
                        <input type="file" name="image_cover" id="image_cover" class='form-control' required value="{{ old('image_cover') }}">
                        <i>Ukuran gambar yang direkomendasikan : W:600 x H:400</i>
                    </div>
                </div> --}}
               
                <div class="form-row">
                    <div class="form-group col-sm-12">
                        <label for="video_url">Video URL</label>
                        <input type="text" name="video_url" id="video_url" class='form-control' value="{{ old('video_url') }}">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-sm-5">
                        <label for="status">Tampilkan</label><br/>
                        <input type="checkbox" name="status" id="status" @if(old('status') == "on") checked="true" @endif>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-4">
            <div class="bgc-white bd bdrs-3 p-20 mB-20">
                <h6>Aksi</h6>
                <p>Simpan data video.</p>
                <button type="submit" class='btn btn-success'>Simpan</button>
                <a href="{{ route('admin.news') }}" class='btn btn-danger'>Batal</a>
            </div>
        </div>
        <div class="clearfix"></div>
    </form>
</div>
@endsection
