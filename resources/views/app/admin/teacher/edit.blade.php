@extends("layouts.app")

@section("content")
<h4 class="c-grey-900 mT-10 mB-10">Edit PTK</h4>
<div>
    <form action="{{ route('admin.teacher.update') }}" method="POST" class='row' enctype="multipart/form-data">
        {{ csrf_field() }} 
        {{ method_field('PUT') }}
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

                <input type="hidden" name="id" value="{{ $teacher->id }}">

                <div class="form-row">
                    <div class="form-group col-sm-12">
                        <label for="nip">NIP/NIY <sup style='color:red'>*</sup></label>
                        <input type="text" name="nip" id="nip" class='form-control' required value="{{ old('nip', $teacher->nip) }}">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-sm-12">
                        <label for="name">Nama PTK <sup style='color:red'>*</sup></label>
                        <input type="text" name="name" id="name" class='form-control' required value="{{ old('name', $teacher->name) }}">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-sm-12">
                        <label for="type">Jenis PTK <sup style='color:red'>*</sup></label>
                        <select class="form-control" name="type" required>
                            <option value="">- Pilih Jenis PTK -</option>
                            <option value="PNS" @if(old('type', $teacher->type)=="PNS") selected @endif>PNS</option>
                            <option value="Non PNS" @if(old('type', $teacher->type)=="Non PNS") selected @endif>Non PNS</option>
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-sm-12">
                        <label for="position_id">Jabatan <sup style='color:red'>*</sup></label>
                        <select class="form-control" name="position_id" required>
                            <option value="">- Pilih Jabatan PTK -</option>
                            @foreach($positions as $position)
                                <option value="{{ $position->id  }}" @if(old('position_id', $teacher->position_id)==$position->id) selected @endif>{{ $position->title }}</option>
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
                        <input type="checkbox" name="status" id="status" @if(old('status') == "on" || $teacher->status==1) checked="true" @endif> AKtif
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
