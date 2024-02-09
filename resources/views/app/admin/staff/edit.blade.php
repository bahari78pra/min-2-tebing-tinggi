@extends('layouts.app')

@section('content')
    <h4 class="c-grey-900 mT-10 mB-10">Edit Staff Pengajar</h4>
    <div>
        <form action="{{ route('admin.staff.update') }}" method="POST" class='row' enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="col-md-12 col-lg-8">
                <div class="bgc-white bd bdrs-3 p-20 mB-20">
                    <h6>Data Staff Pengajar</h6>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <input type="hidden" name="id" value="{{ $staff->id }}">

                    <div class="form-row">
                        <div class="form-group col-sm-12">
                            <label for="nama">Nama<sup style='color:red'>*</sup></label>
                            <input type="text" name="nama" id="nama" class='form-control' required
                                value="{{ old('nama', $staff->nama) }}">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-sm-12">
                            <label for="nip">NIP<sup style='color:red'>*</sup></label>
                            <input type="text" name="nip" id="nip" class='form-control' required
                                value="{{ old('nip', $staff->nip) }}">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-sm-12">
                            <label for="tpt_lahir">Tempat Lahir<sup style='color:red'>*</sup></label>
                            <input type="text" name="tpt_lahir" id="tpt_lahir" class='form-control' required
                                value="{{ old('tpt_lahir', $staff->tpt_lahir) }}">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-sm-12">
                            <label for="tgl_lahir">Tanggal Lahir<sup style='color:red'>*</sup></label>
                            <input type="date" name="tgl_lahir" id="tgl_lahir" class='form-control' required
                                value="{{ old('tgl_lahir', $staff->tgl_lahir) }}">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-sm-12">
                            <label for="agama">Agama<sup style='color:red'>*</sup></label>
                            <input type="text" name="agama" id="agama" class='form-control' required
                                value="{{ old('agama', $staff->agama) }}">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-sm-12">
                            <label for="pendidikan_akhir">Pendidikan Akhir<sup style='color:red'>*</sup></label>
                            <input type="text" name="pendidikan_akhir" id="pendidikan_akhir" class='form-control'
                                required value="{{ old('pendidikan_akhir', $staff->pendidikan_akhir) }}">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-sm-12">
                            <label for="jabatan">Jabatan Saat Ini<sup style='color:red'>*</sup></label>
                            <input type="text" name="jabatan" id="jabatan" class='form-control' required
                                value="{{ old('jabatan', $staff->jabatan) }}">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-sm-12">
                            <label for="image">Foto</label>
                            <input type="file" name="image" id="image" class='form-control'
                                value="{{ old('image') }}">
                            <i>Ukuran gambar yang direkomendasikan : W:350 x H:450</i><br />
                            <i>Kosongkan gambar jika tidak ingin mengubahnya</i>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-sm-12">
                            <label for="no_urut_tampil">No Urut Tampil<sup style='color:red'>*</sup></label>
                            <input type="text" name="no_urut_tampil" id="no_urut_tampil" class='form-control' required
                                value="{{ old('no_urut_tampil', $staff->no_urut_tampil) }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-4">
                <div class="bgc-white bd bdrs-3 p-20 mB-20">
                    <h6>Aksi</h6>
                    <p>Simpan data staff.</p>
                    <button type="submit" class='btn btn-success'>Simpan</button>
                    <a href="{{ route('admin.staff') }}" class='btn btn-danger'>Batal</a>
                </div>
            </div>
            <div class="clearfix"></div>
        </form>
    </div>
@endsection
