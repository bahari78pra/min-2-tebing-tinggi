@extends("layouts.app")

@section("content")
<h4 class="c-grey-900 mT-10 mB-10">Data Identitas Instansi</h4>
@if(Session::has('flash_message'))
    <script type="text/javascript">
        swal("Berhasil!", "Data berhasil disimpan!", "success");
    </script>
@endif
<div>
    <form action="{{ route('admin.office.update') }}" method="POST" class='row' enctype="multipart/form-data">
        {{ csrf_field() }} 
        {{ method_field('PUT') }}
        <div class="col-md-12 col-lg-8">
            <div class="bgc-white bd bdrs-3 p-20 mB-20">
                <h6>Data Instansi</h6>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <input type="hidden" name="id" @if(!empty($office->id)) value="{{ $office->id }}" @endif>

                <div class="form-row">
                    <div class="form-group col-sm-12">
                        <label for="name">Nama Instansi <sup style="color:red">*</sup></label>
                        <input type="text" name="name" id="name" class="form-control" required  @if(!empty($office->name)) value="{{ old('name', $office->name) }}" @endif>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-sm-12">
                        <label for="address">Alamat <sup style='color:red'>*</sup></label>
                        <input type="text" name="address" id="address" class='form-control' required  @if(!empty($office->address)) value="{{ old('address', $office->address) }}" @endif>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-sm-12">
                        <label for="email">Email <sup style='color:red'>*</sup></label>
                        <input type="email" name="email" id="email" class='form-control' required  @if(!empty($office->email)) value="{{ old('email', $office->email) }}" @endif>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-sm-12">
                        <label for="phone">No Telepon Kantor <sup style='color:red'>*</sup></label>
                        <input type="text" name="phone" id="phone" class='form-control' required  @if(!empty($office->phone)) value="{{ old('phone', $office->phone) }}" @endif>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-sm-12">
                        <label for="url_facebook">URL Facebook <sup style='color:red'>*</sup></label>
                        <input type="text" name="url_facebook" id="url_facebook" class='form-control' required  @if(!empty($office->url_facebook)) value="{{ old('url_facebook', $office->url_facebook) }}" @endif>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-sm-12">
                        <label for="url_twitter">URL Twitter <sup style='color:red'>*</sup></label>
                        <input type="text" name="url_twitter" id="url_twitter" class='form-control' required  @if(!empty($office->url_twitter)) value="{{ old('url_twitter', $office->url_twitter) }}" @endif>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-sm-12">
                        <label for="url_instagram">URL Instagram <sup style='color:red'>*</sup></label>
                        <input type="text" name="url_instagram" id="url_instagram" class='form-control' required  @if(!empty($office->url_instagram)) value="{{ old('url_instagram', $office->url_instagram) }}" @endif>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-sm-12">
                        <label for="url_youtube">URL Youtube <sup style='color:red'>*</sup></label>
                        <input type="text" name="url_youtube" id="url_youtube" class='form-control' required  @if(!empty($office->url_youtube)) value="{{ old('url_youtube', $office->url_youtube) }}" @endif>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-sm-12">
                        <label for="jlh_siswa">Jumlah Siswa <sup style='color:red'>*</sup></label>
                        <input type="text" name="jlh_siswa" id="jlh_siswa" class='form-control' required  @if(!empty($office->jlh_siswa)) value="{{ old('jlh_siswa', $office->jlh_siswa) }}" @endif>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-sm-12">
                        <label for="jlh_guru">Jumlah Guru <sup style='color:red'>*</sup></label>
                        <input type="text" name="jlh_guru" id="jlh_guru" class='form-control' required  @if(!empty($office->jlh_guru)) value="{{ old('jlh_guru', $office->jlh_guru) }}" @endif>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-sm-12">
                        <label for="jlh_prestasi">Jumlah Prestasi <sup style='color:red'>*</sup></label>
                        <input type="text" name="jlh_prestasi" id="jlh_prestasi" class='form-control' required  @if(!empty($office->jlh_prestasi)) value="{{ old('jlh_prestasi', $office->jlh_prestasi) }}" @endif>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-sm-12">
                        <label for="jlh_fasilitas">Jumlah Fasilitas <sup style='color:red'>*</sup></label>
                        <input type="text" name="jlh_fasilitas" id="jlh_fasilitas" class='form-control' required  @if(!empty($office->jlh_fasilitas)) value="{{ old('jlh_fasilitas', $office->jlh_fasilitas) }}" @endif>
                    </div>
                </div>



                {{-- <div class="form-row">
                    <div class="form-group col-sm-12">
                        <label for="office_photo">Foto Instansi</label>
                        <input type="file" name="photo" id="photo" class='form-control'>
                        <i>Kosongkan foto instansi jika tidak ingin menggantinya</i>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-sm-12">
                        <label for="logo">Logo Instansi</label>
                        <input type="file" name="logo" id="logo" class='form-control' value="{{ old('logo') }}">
                        <i>Kosongkan logo jika tidak ingin menggantinya</i>
                    </div>
                </div> --}}

            </div>
        </div>
        <div class="col-md-12 col-lg-4">
            <div class="bgc-white bd bdrs-3 p-20 mB-20">
                <h6>Aksi</h6>
                <p>Simpan data identitas instansi.</p>
                <button type="submit" class='btn btn-success'>Simpan</button>
            </div>
        </div>
        <div class="clearfix"></div>
    </form>
</div>
@endsection
