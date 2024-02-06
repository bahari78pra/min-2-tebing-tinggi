@extends('layouts.app')

<!-- SECTION FOR TITLE CONTENT -->
@section('title', 'Pendidikan dan Tenaga Kependidikan')

<!-- SECTION FOR CONTENT -->
@section('content')

<h4 class="c-grey-900 mT-10 mB-30">Pendidikan dan Tenaga Kependidikan</h4>
@if(Session::has('flash_message'))
    <script type="text/javascript">
        swal("Berhasil!", "Data berhasil disimpan!", "success");
    </script>
@endif
<div class="row">
    <div class="col-md-12">
        <div class="bgc-white bd bdrs-3 p-20 mB-20">
            <div class="row">
                <div class="col-md-8">
                    <a href="{{ route('admin.teacher.create') }}" class="btn btn-primary mB-30">Tambah PTK</a>
                </div>
                <div class="col-md-4">
                    <form action="#" method="GET" style='display:flex' class='mB-20'>
                        <input type="text" name="q" placeholder="Cari PTK" class='form-control' value="{{ $keywords }}">
                        <button type="submit" class='btn btn-primary mL-10'>Cari</button>
                    </form>
                </div>
            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th width="10%">#</th>
                        <th>NIP / NIY</th>
                        <th>Nama PTK</th>
                        <th>PNS/Non PNS</th>
                        <th>Jabatan</th>
                        <th class="text-center">Status Aktif</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($teachers) == 0)
                        <tr>
                            <td colspan="6" class="text-left">
                                @if($keywords == "")
                                <i>Tidak ada PTK!</i>
                                @else
                                <i>PTK tidak ditemukan!</i>
                                @endif
                            </td>
                        </tr>
                    @endif
                    @foreach($teachers as $teacher)
                        <tr>
                            <td>{{ $loop->iteration + $skipped }}</td>
                            <td>{{ $teacher->nip }}</td>
                            <td>{{ $teacher->name }}</td>
                            <td>{{ $teacher->type }}</td>
                            <td>{{ $teacher->position->title }}</td>
                            <td class="text-center">{{ $teacher->status==1 ? "Ya":"Tidak" }}</td>
                            <td>
                                <a href="{{ route('admin.teacher.edit',$teacher->id) }}" title="Edit"><button class="btn btn-warning"><span class="fa fa-pencil"></span></button></a>
                                <form onsubmit="deleteThis(event)" action="{{ route('admin.teacher.delete') }}" class="delete" method="post" style="display: inline;">
                                    {{ csrf_field() }} 
                                    {{ method_field('DELETE') }}
                                    <input type="hidden" class="form-control" name="id" value="{{ $teacher->id }}">
                                    <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                                </form>
                                <a href="{{ route('admin.teacher.set-user', $teacher->id) }}" title="Set Akun"><button class="btn btn-success"><span class="fa fa-user"></span></button></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div style="justify-content: center;display: flex;">
                {{ $teachers->appends(['q' => $keywords])->links() }}
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