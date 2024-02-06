@extends("layouts.app")

@section("content")
<h4 class="c-grey-900 mT-10 mB-10">Ganti Password</h4>
@if(Session::has('flash_message'))
    <script type="text/javascript">
        swal("Berhasil!", "Data berhasil disimpan!", "success");
    </script>
@endif
<div>

        <form action="{{ route('admin.save-password') }}" method="POST" class='row' enctype="multipart/form-data">
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

                    <input type="hidden" name="id" value="{{ auth()->user()->id }}">

                    <div class="form-row">
                        <div class="form-group col-sm-12">
                            <label for="name">Nama <sup style='color:red'>*</sup></label>
                            <input type="text" name="name" id="name" class='form-control' required value="{{ auth()->user()->name }}">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-sm-12">
                            <label for="email">Email <sup style='color:red'>*</sup></label>
                            <input type="text" name="email" id="email" class='form-control' required value="{{ auth()->user()->email }}">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-sm-12">
                            <label for="password">Password <sup style='color:red'>*</sup></label>
                            <input type="password" name="password" id="password" class='form-control'>
                            <i>Kosongkan password jika tidak ingin menggantinya</i>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-sm-12">
                            <button type="submit" class='btn btn-success'>Simpan</button>
                            <a href="{{ route('admin./') }}" class='btn btn-danger'>Batal</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="clearfix"></div>
        </form>
</div>
@endsection
