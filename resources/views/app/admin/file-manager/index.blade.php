@extends('layouts.app')

<!-- SECTION FOR TITLE CONTENT -->
@section('title', 'File Manager')

<!-- SECTION FOR CONTENT -->
@section('content')

<h4 class="c-grey-900 mT-10 mB-30">File Manager</h4>
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
                    <a href="{{ route('admin.file-manager.create') }}" class="btn btn-primary mB-30">Upload</a>
                </div>
                <div class="col-md-4">
                    <form action="#" method="GET" style='display:flex' class='mB-20'>
                        <input type="text" name="q" placeholder="Cari File" class='form-control' value="{{ $keywords }}">
                        <button type="submit" class='btn btn-primary mL-10'>Cari</button>
                    </form>
                </div>
            </div>
            <div class="row">
                @foreach($file_managers as $file_manager)
                    <div class="col-md-3">
                        <div class="bgc-white bd bdrs-3 p-20 mB-20" style="min-height: 100px;font-size: 20px;">
                            <span style="font-size: 15px;">{{ $file_manager->name }}</span>
                            <p>
                                <div align="center">
                                    @if(strtolower($file_manager->type) == "jpg" || strtolower($file_manager->type)=="png" || strtolower($file_manager->type) == "gif" || strtolower($file_manager->type)=="jpeg")
                                        <img src="{{ asset('images/'. $file_manager->name) }}" width="100%">
                                    @elseif($file_manager->type == "doc" || $file_manager->type == "docx" )
                                        <img src="{{ asset('images/icon-doc.png') }}" width="100%">
                                    @elseif($file_manager->type == "xls" || $file_manager->type == "xlsx" )
                                        <img src="{{ asset('images/icon-xls.png') }}" width="100%">
                                    @elseif($file_manager->type == "jpg" || $file_manager->type == "png" )
                                        <img src="{{ asset('images/icon-images.png') }}" width="100%">
                                    @elseif($file_manager->type == "pdf" )
                                        <img src="{{ asset('images/icon-pdf.jpg') }}" width="100%">
                                    @else
                                        <img src="{{ asset('images/icon-file.png') }}" width="100%">
                                    @endif

                                </div>
                                <p style="font-size: 13px;text-align: center;">Type : {{ $file_manager->type  }} | Size : {{ number_format(($file_manager->size)/1000) }} Kb</p> 
                                <div style="text-align: center;">
                                    <form onsubmit="deleteThis(event)" action="{{ route('admin.file-manager.delete') }}" class="delete" method="post" style="display: inline;">
                                        {{ csrf_field() }} 
                                        {{ method_field('DELETE') }}
                                        <input type="hidden" class="form-control" name="id" value="{{ $file_manager->id }}">
                                        <button class="btn btn-danger"><span class="fa fa-trash"></span></button>
                                    </form>
                                    <a href="{{ route('admin.file-manager.download', $file_manager->name) }}" class="btn btn-primary"><span class="fa fa-download"></span></a>
                                </div>
                                
                            </p>
                            <p></p>
                        </div>
                    </div>
                @endforeach
            </div>
            

            <div style="justify-content: center;display: flex;">
                {{ $file_managers->appends(['q' => $keywords])->links() }}
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