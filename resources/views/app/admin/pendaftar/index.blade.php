@extends('layouts.app')

<!-- SECTION FOR TITLE CONTENT -->
@section('title', 'Pendaftar PPDB Online')

<!-- SECTION FOR CONTENT -->
@section('content')

<h4 class="c-grey-900 mT-10 mB-30">Pendaftar PPDB Online</h4>
@if(Session::has('flash_message'))
    <script type="text/javascript">
        swal("Berhasil!", "Data berhasil disimpan!", "success");
    </script>
@endif
<div class="row">
    <div class="col-md-12">
        <div class="bgc-white bd bdrs-3 p-20 mB-20">
            <div class="row">
                <div class="col-md-6">
                    <a href="{{ route('admin.pendaftar.create') }}" class="btn btn-primary mB-30">Tambah Pendaftar</a>
                </div>
                <div class="col-md-6">
                    <form action="#" method="GET" style='display:flex' class='mB-20'>
                        <input type="text" name="q_nama" placeholder="Nama" class='form-control' value="{{ $key_nama }}">
                        <select name="q_paket_keahlian" class="form-control" style="margin-left: 10px;">
                            <option value="">- Pilih Paket Keahlian -</option>
                            @foreach($paket_keahlian as $paket_keahlian_data)
                                <option value="{{ $paket_keahlian_data->id }}" @if($paket_keahlian_data->id==$key_paket_keahlian) selected @endif>{{ $paket_keahlian_data->judul }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class='btn btn-primary mL-10'>Cari</button>
                    </form>
                </div>
            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th width="5%">#</th>
                        <th>No. Regi</th>
                        <th>Nama</th>
                        <th>J-Kelamin</th>
                        <th>Tgl-Lahir</th>
                        <th>Paket Keahlian</th>
                        <th>Email</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($pendaftar) == 0)
                        <tr>
                            <td colspan="6" class="text-left">
                                @if($key_nama == "" || $key_paket_keahlian=="")
                                <i>Tidak ada data!</i>
                                @else
                                <i>Data tidak ditemukan!</i>
                                @endif
                            </td>
                        </tr>
                    @endif
                    @foreach($pendaftar as $pendaftar_data)
                        <tr>
                            <td>{{ $loop->iteration + $skipped }}</td>
                            <td>{{ $pendaftar_data->id }}</td>
                            <td>{{ $pendaftar_data->nama_lengkap }}</td>
                            <td>{{ $pendaftar_data->jk }}</td>
                            <td>{{ date('d-m-Y', strtotime($pendaftar_data->tgl_lahir)) }}</td>
                            <td>{{ $pendaftar_data->paket_keahlian->judul }}</td>
                            <td>{{ $pendaftar_data->email }}</td>
                            <td>
                                <form onsubmit="verificateThis(event)" action="{{ route('admin.pendaftar.verifikasi') }}" class="verifikasi" method="post" style="display: inline;">
                                    {{ csrf_field() }} 
                                    {{ method_field('POST') }}
                                    <input type="hidden" class="form-control" name="id" value="{{ $pendaftar_data->id }}">
                                    <button class="btn btn-success" type="submit"><i class="fa fa-check"></i></button>
                                </form>

                                <a href="{{ route('admin.pendaftar.edit',$pendaftar_data->id) }}" title="Edit"><button class="btn btn-warning"><span class="fa fa-pencil"></span></button></a>
                                
                                <form onsubmit="deleteThis(event)" action="{{ route('admin.pendaftar.delete') }}" class="delete" method="post" style="display: inline;">
                                    {{ csrf_field() }} 
                                    {{ method_field('DELETE') }}
                                    <input type="hidden" class="form-control" name="id" value="{{ $pendaftar_data->id }}">
                                    <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                                </form>

                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div style="justify-content: center;display: flex;">
                {{ $pendaftar->appends(['q' => $key_nama])->links() }}
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

    function verificateThis(e){
        e.preventDefault();
        swal({
          title: "Apakah anda yakin ingin memverifikasi data ini ?",
          text: "Verifikasi Data Pendaftar",
          icon: "success",
          buttons: true,
          dangerMode: false,
        })
        .then((willVerificate) => {
          if (willVerificate) {
            e.target.submit();
            swal("Data telah diverifikasi", {
              icon: "success",
            });
          }
        });
        return false;
    }
</script>
@endsection