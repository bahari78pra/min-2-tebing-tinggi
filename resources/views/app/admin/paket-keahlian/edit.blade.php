@extends("layouts.app")

@section("content")
<h4 class="c-grey-900 mT-10 mB-10">Edit Paket Keahlian</h4>
<div>
    <form action="{{ route('admin.paket_keahlian.update') }}" method="POST" class='row' enctype="multipart/form-data">
        {{ csrf_field() }} 
        {{ method_field('PUT') }}
        <div class="col-md-12 col-lg-8">
            <div class="bgc-white bd bdrs-3 p-20 mB-20">
                <h6>Data Paket Keahlian</h6>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <input type="hidden" name="id" value="{{ $paket_keahlian->id }}">
                <div class="form-row">
                    <div class="form-group col-sm-12">
                        <label for="judul">Judul <sup style='color:red'>*</sup></label>
                        <input type="text" name="judul" id="judul" class='form-control' required value="{{ old('judul', $paket_keahlian->judul) }}">
                    </div>
                </div>
               
                <div class="form-row">
                    <div class="form-group col-sm-12">
                        <label for="gambar">Gambar</label>
                        <input type="file" name="image" id="image" class='form-control' value="">
                        <i>- Ukuran gambar yang direkomendasikan : W:600 x H:400</i><br/>
                        <i>- Kosongkan gambar jika tidak ingin mengubah gambar</i>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-sm-5">
                        <label for="status">Tampilkan</label><br/>
                        <input type="checkbox" name="status" id="status" @if(old('status')=="on" || $paket_keahlian->status==1) checked="true" @endif>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-sm-12">
                        <label for="detail">Detail <sup style='color:red'>*</sup></label>
                        <textarea class="form-control" id="detail" name="detail" rows="10" required>
                            {{ old('detail', $paket_keahlian->detail) }}
                        </textarea>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-12 col-lg-4">
            <div class="bgc-white bd bdrs-3 p-20 mB-20">
                <h6>Aksi</h6>
                <p>Simpan data paket keahlian.</p>
                <button type="submit" class='btn btn-success'>Simpan</button>
                <a href="{{ route('admin.paket_keahlian') }}" class='btn btn-danger'>Batal</a>
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
