@extends("layouts.app")

@section("content")
<h4 class="c-grey-900 mT-10 mB-10">Tambah PTK</h4>
<div>
    <form action="{{ route('admin.teacher.insert') }}" method="POST" class='row' enctype="multipart/form-data">
        {{ csrf_field() }} 
        {{ method_field('POST') }}
        <div class="col-md-12 col-lg-8">
            <div class="bgc-white bd bdrs-3 p-20 mB-20">
                <h6>Data PTK</h6>
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
                        <label for="nip">NIP/NIY <sup style='color:red'>*</sup></label>
                        <input type="text" name="nip" id="nip" class='form-control' required value="{{ old('nip') }}">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-sm-12">
                        <label for="name">Nama PTK <sup style='color:red'>*</sup></label>
                        <input type="text" name="name" id="name" class='form-control' required value="{{ old('name') }}">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-sm-12">
                        <label for="email">Email <sup style='color:red'>*</sup></label>
                        <input type="email" name="email" id="email" class='form-control' required value="{{ old('email') }}">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-sm-12">
                        <label for="type">Jenis PTK <sup style='color:red'>*</sup></label>
                        <select class="form-control" name="type" required>
                            <option value="">- Pilih Jenis PTK -</option>
                            <option value="PNS">PNS</option>
                            <option value="Non PNS">Non PNS</option>
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-sm-12">
                        <label for="position_id">Jabatan <sup style='color:red'>*</sup></label>
                        <select class="form-control" name="position_id" required>
                            <option value="">- Pilih Jabatan PTK -</option>
                            @foreach($positions as $position)
                                <option value="{{ $position->id  }}">{{ $position->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
               
                <div class="form-row">
                    <div class="form-group col-sm-12">
                        <label for="photo">Gambar</label>
                        <input type="file" name="photo" id="photo" class='form-control' value="{{ old('photo') }}">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-sm-5">
                        <label for="status">Status Aktif</label><br/>
                        <input type="checkbox" name="status" id="status" @if(old('status') == "on") checked="true" @endif> AKtif
                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-12 col-lg-4">
            <div class="bgc-white bd bdrs-3 p-20 mB-20">
                <h6>Aksi</h6>
                <p>Simpan data PTK.</p>
                <button type="submit" class='btn btn-success'>Simpan</button>
                <a href="{{ route('admin.teacher') }}" class='btn btn-danger'>Batal</a>
            </div>
        </div>
        <div class="clearfix"></div>
    </form>
</div>
@endsection
