@extends("layouts.app")

@section("content")
<h4 class="c-grey-900 mT-10 mB-10">Set Username dan Password</h4>
<div>
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
                        <input type="text" name="nip" id="nip" class='form-control' disabled required value="{{ $teacher->nip }}">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-sm-12">
                        <label for="name">Nama PTK <sup style='color:red'>*</sup></label>
                        <input type="text" name="name" id="name" class='form-control' disabled required value="{{ $teacher->name }}">
                    </div>
                </div>
            </div>
        </div>

        <form action="{{ route('admin.teacher.save-user') }}" method="POST" class='row' enctype="multipart/form-data">
            {{ csrf_field() }} 
            {{ method_field('POST') }}
            <div class="col-md-12 col-lg-8">
                <div class="bgc-white bd bdrs-3 p-20 mB-20">
                    <h6>Data Akun</h6>
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
                            <label for="email">Email <sup style='color:red'>*</sup></label>
                            <input type="text" class='form-control' required disabled value="{{ $teacher->email }}">
                            <input type="hidden" name="email" id="email" value="{{ $teacher->email }}">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-sm-12">
                            <label for="password">Password <sup style='color:red'>*</sup></label>
                            <input type="password" name="password" id="password" class='form-control' required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-sm-12">
                            <button type="submit" class='btn btn-success'>Simpan</button>
                            <a href="{{ route('admin.teacher') }}" class='btn btn-danger'>Batal</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="clearfix"></div>
        </form>
</div>
@endsection
