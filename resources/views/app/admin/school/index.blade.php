@extends("layouts.app")

@section("content")
<h4 class="c-grey-900 mT-10 mB-10">Data Identitas Sekolah</h4>
@if(Session::has('flash_message'))
    <script type="text/javascript">
        swal("Berhasil!", "Data berhasil disimpan!", "success");
    </script>
@endif
<div>
    <form action="{{ route('admin.school.update') }}" method="POST" class='row' enctype="multipart/form-data">
        {{ csrf_field() }} 
        {{ method_field('PUT') }}
        <div class="col-md-12 col-lg-8">
            <div class="bgc-white bd bdrs-3 p-20 mB-20">
                <h6>Data Sekolah</h6>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <input type="hidden" name="id" @if(!empty($school->id)) value="{{ $school->id }}" @endif>

                <div class="form-row">
                    <div class="form-group col-sm-12">
                        <label for="name">Nama Sekolah <sup style="color:red">*</sup></label>
                        <input type="text" name="name" id="name" class="form-control" required  @if(!empty($school->name)) value="{{ old('name', $school->name) }}" @endif>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-sm-12">
                        <label for="address">Alamat <sup style='color:red'>*</sup></label>
                        <input type="text" name="address" id="address" class='form-control' required  @if(!empty($school->address)) value="{{ old('address', $school->address) }}" @endif>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-sm-12">
                        <label for="phone">Telepon <sup style='color:red'>*</sup></label>
                        <input type="text" name="phone" id="phone" class='form-control' required  @if(!empty($school->phone)) value="{{ old('phone', $school->phone) }}" @endif>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-sm-12">
                        <label for="email">Email <sup style='color:red'>*</sup></label>
                        <input type="email" name="email" id="email" class='form-control' required  @if(!empty($school->email)) value="{{ old('email', $school->email) }}" @endif>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-sm-12">
                        <label for="head_master">Kepala Sekolah <sup style='color:red'>*</sup></label>
                        <input type="text" name="head_master" id="head_master" class='form-control' required  @if(!empty($school->head_master)) value="{{ old('head_master', $school->head_master) }}" @endif>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-sm-12">
                        <label for="school_photo">Foto Sekolah</label>
                        <input type="file" name="school_photo" id="school_photo" class='form-control'>
                        <i>Kosongkan foto sekolah jika tidak ingin menggantinya</i>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-sm-12">
                        <label for="head_master_photo">Foto Kepala Sekolah</label>
                        <input type="file" name="head_master_photo" id="head_master_photo" class='form-control' value="{{ old('head_master_photo') }}">
                        <i>Kosongkan foto kepala sekolah jika tidak ingin menggantinya</i>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-sm-12">
                        <label for="logo">Logo Sekolah</label>
                        <input type="file" name="logo" id="logo" class='form-control' value="{{ old('logo') }}">
                        <i>Kosongkan logo jika tidak ingin menggantinya</i>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-12 col-lg-4">
            <div class="bgc-white bd bdrs-3 p-20 mB-20">
                <h6>Aksi</h6>
                <p>Simpan data identitas sekolah.</p>
                <button type="submit" class='btn btn-success'>Simpan</button>
            </div>
        </div>
        <div class="clearfix"></div>
    </form>
</div>
@endsection
