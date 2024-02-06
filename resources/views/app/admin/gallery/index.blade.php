@extends('layouts.app')

<!-- SECTION FOR TITLE CONTENT -->
@section('title', 'Galeri')

<!-- SECTION FOR CONTENT -->
@section('content')

<h4 class="c-grey-900 mT-10 mB-30">Galeri Foto</h4>
@if(Session::has('flash_message'))
    <script type="text/javascript">
        swal("Berhasil!", "Upload telah berhasil!", "success");
    </script>
@endif
<div class="row">
    <div class="col-md-12">
        <div class="bgc-white bd bdrs-3 p-20 mB-20">
            <div class="row">
                <div class="col-md-8">
                    <a href="{{ route('admin.gallery.create') }}" class="btn btn-primary mB-30">Upload File</a>
                </div>
                <div class="col-md-4">
                    <form action="#" method="GET" style='display:flex' class='mB-20'>
                        <input type="text" name="q" placeholder="Cari Gambar" class='form-control' value="{{ $keywords }}">
                        <button type="submit" class='btn btn-primary mL-10'>Cari</button>
                    </form>
                </div>
            </div>
            <div class="row">
                @foreach($galleries as $gallery)
                    <div class="col-md-3">
                        <div class="bgc-white bd bdrs-3 p-20 mB-20" style="min-height: 100px;font-size: 20px;">
                            <span style="font-size: 15px;">{{ $gallery->title }}</span>
                            <p>
                                <div align="center">
                                    <img src="{{ asset('images/resize/'. $gallery->image) }}" width="100%">
                                </div>
                                <p style="font-size: 13px;text-align: center;">Type : {{ $gallery->type  }} | Size : {{ number_format(($gallery->size)/1000) }} Kb</p>
                                <div style="text-align: center;">
                                    <form onsubmit="deleteThis(event)" action="{{ route('admin.gallery.delete') }}" class="delete" method="post" style="display: inline;">
                                        {{ csrf_field() }} 
                                        {{ method_field('DELETE') }}
                                        <input type="hidden" class="form-control" name="id" value="{{ $gallery->id }}">
                                        <button class="btn btn-danger"><span class="fa fa-trash"></span></button>
                                    </form>
                                    <a href="{{ route('admin.gallery.download', $gallery->image) }}" class="btn btn-primary"><span class="fa fa-download"></span></a>
                                </div>
                                
                            </p>
                            <p></p>
                        </div>
                    </div>
                @endforeach
            </div>
            

            <div style="justify-content: center;display: flex;">
                {{ $galleries->appends(['q' => $keywords])->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer-scripts')
<script type="text/javascript">
    function deleteThis(e){
        e.preventDefault();
        swal({
          title: "Apakah anda yakin?",
          text: "Data akan dihapus secara permanen!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            e.target.submit();
            swal("Data telah dihapus!", {
              icon: "success",
            });
          }
        });
        return false;
    }
</script>
@endsection