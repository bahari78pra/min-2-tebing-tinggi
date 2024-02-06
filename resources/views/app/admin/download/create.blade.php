@extends("layouts.app")

@section("content")
<h4 class="c-grey-900 mT-10 mB-10">Tambah File Download</h4>
<div>
    <form action="{{ route('admin.download.insert') }}" method="POST" class='row' enctype="multipart/form-data">
        {{ csrf_field() }} 
        {{ method_field('POST') }}
        <div class="col-md-12 col-lg-8">
            <div class="bgc-white bd bdrs-3 p-20 mB-20">
                <h6>Data File Download</h6>
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
                        <label for="title">Judul File<sup style='color:red'>*</sup></label>
                        <input type="text" name="title" id="title" class='form-control' required value="{{ old('title') }}">
                    </div>
                </div>
               
                <div class="form-row">
                    <div class="form-group col-sm-12">
                        <label for="file">File</label>
                        <input type="file" name="file" id="file" class='form-control' value="{{ old('file') }}" required>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-12 col-lg-4">
            <div class="bgc-white bd bdrs-3 p-20 mB-20">
                <h6>Aksi</h6>
                <p>Simpan data file download.</p>
                <button type="submit" class='btn btn-success'>Simpan</button>
                <a href="{{ route('admin.download') }}" class='btn btn-danger'>Batal</a>
            </div>
        </div>
        <div class="clearfix"></div>
    </form>
</div>
@endsection
