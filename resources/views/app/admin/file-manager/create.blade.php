@extends("layouts.app")

@section("content")
<h4 class="c-grey-900 mT-10 mB-10">Upload File</h4>
<div>
    <form action="{{ route('admin.file-manager.insert') }}" method="POST" class='row' enctype="multipart/form-data">
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
                        <label for="image">File</label>
                        <input type="file" name="image" id="image" class='form-control' value="{{ old('image') }}" required="">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-4">
            <div class="bgc-white bd bdrs-3 p-20 mB-20">
                <h6>Aksi</h6>
                <p>Upload File.</p>
                <button type="submit" class='btn btn-success'>Upload</button>
                <a href="{{ route('admin.file-manager') }}" class='btn btn-danger'>Batal</a>
            </div>
        </div>
        <div class="clearfix"></div>
    </form>
</div>
@endsection
