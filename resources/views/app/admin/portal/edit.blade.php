@extends('layouts.app')

@section('content')
    <h4 class="c-grey-900 mT-10 mB-10">Edit Portal</h4>
    <div>
        <form action="{{ route('admin.portal.update') }}" method="POST" class='row' enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="col-md-12 col-lg-8">
                <div class="bgc-white bd bdrs-3 p-20 mB-20">
                    <h6>Data Portal</h6>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <input type="hidden" name="id" value="{{ $portal->id }}">
                    <div class="form-row">
                        <div class="form-group col-sm-12">
                            <label for="judul">Judul File <sup style='color:red'>*</sup></label>
                            <input type="text" name="judul" id="judul" class='form-control' required
                                value="{{ old('judul', $portal->judul) }}">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-sm-12">
                            <label for="url">URL <sup style='color:red'>*</sup></label>
                            <input type="text" name="url" id="url" class='form-control' required
                                value="{{ old('url', $portal->url) }}">
                        </div>
                    </div>



                </div>
            </div>
            <div class="col-md-12 col-lg-4">
                <div class="bgc-white bd bdrs-3 p-20 mB-20">
                    <h6>Aksi</h6>
                    <p>Simpan data portal.</p>
                    <button type="submit" class='btn btn-success'>Simpan</button>
                    <a href="{{ route('admin.portal') }}" class='btn btn-danger'>Batal</a>
                </div>
            </div>
            <div class="clearfix"></div>
        </form>
    </div>
@endsection
