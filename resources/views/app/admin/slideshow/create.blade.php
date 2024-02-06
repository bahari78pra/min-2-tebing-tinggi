@extends("layouts.app")

@section("content")
<h4 class="c-grey-900 mT-10 mB-10">Tambah Slideshow</h4>
<div>
    <form action="{{ route('admin.slideshow.insert') }}" method="POST" class='row' enctype="multipart/form-data">
        {{ csrf_field() }} 
        {{ method_field('POST') }}
        <div class="col-md-12 col-lg-8">
            <div class="bgc-white bd bdrs-3 p-20 mB-20">
                <h6>Data Slideshow</h6>
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
                        <label for="title">Judul <sup style='color:red'>*</sup></label>
                        <input type="text" name="title" id="title" class='form-control' required value="{{ old('title') }}">
                    </div>
                </div>
               
                <div class="form-row">
                    <div class="form-group col-sm-12">
                        <label for="image">Gambar</label>
                        <input type="file" name="image" id="image" class='form-control' value="{{ old('image') }}">
                        <i>Ukuran gambar yang direkomendasikan : W:1200 x H:400</i>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-sm-5">
                        <label for="image">Tampilkan</label><br/>
                        <input type="checkbox" name="status" id="status" @if(old('status') == "on") checked="true" @endif>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-sm-12">
                        <label for="detail">Detail <sup style='color:red'>*</sup></label>
                        <textarea class="form-control" id="detail" name="detail" rows="10" required=""></textarea>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-12 col-lg-4">
            <div class="bgc-white bd bdrs-3 p-20 mB-20">
                <h6>Aksi</h6>
                <p>Simpan data slideshow.</p>
                <button type="submit" class='btn btn-success'>Simpan</button>
                <a href="{{ route('admin.slideshow') }}" class='btn btn-danger'>Batal</a>
            </div>
        </div>
        <div class="clearfix"></div>
    </form>
</div>
@endsection

@section('footer-scripts')
<script>
    $(document).ready(function() {
        $('#detail').summernote({
            height: 200
        });
    });
</script>
@endsection