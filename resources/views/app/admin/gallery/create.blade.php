@extends("layouts.app")

@section("content")
<h4 class="c-grey-900 mT-10 mB-10">Upload Gambar</h4>
<div>
    <form action="{{ route('admin.gallery.insert') }}" method="POST" class='row' enctype="multipart/form-data">
        {{ csrf_field() }} 
        {{ method_field('POST') }}
        <div class="col-md-12 col-lg-8">
            <div class="bgc-white bd bdrs-3 p-20 mB-20">
                <h6>File</h6>
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
                        <label for="title">Judul</label>
                        <input type="text" name="title" id="title" class='form-control' value="{{ old('title') }}" required="">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-sm-12">
                        <label for="image">Gambar</label>
                        <input type="file" name="image" id="image" class='form-control' value="{{ old('image') }}" required="">
                        <i>Ukuran gambar yang direkomendasikan : W:600 x H:400</i>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-sm-12">
                        <label for="title">Jenis Gambar</label>
                        <select class="form-control" name="jenis" required>
                            <option value="">- Pilih Jenis Gambar -</option>
                            <option value="kegiatan_sekolah">Kegiatan Sekolah</option>
                            <option value="kesiswaan">Kesiswaan</option>
                            <option value="prestasi">Prestasi</option>
                            <option value="lainnya">Lainnya</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-4">
            <div class="bgc-white bd bdrs-3 p-20 mB-20">
                <h6>Aksi</h6>
                <p>Upload Gambar.</p>
                <button type="submit" class='btn btn-success'>Upload</button>
                <a href="{{ route('admin.gallery') }}" class='btn btn-danger'>Batal</a>
            </div>
        </div>
        <div class="clearfix"></div>
    </form>
</div>
@endsection
