@extends('layouts.app')

<!-- SECTION FOR TITLE CONTENT -->
@section('title', 'Pendaftar Daftar Ulang')

<!-- SECTION FOR CONTENT -->
@section('content')

<h4 class="c-grey-900 mT-10 mB-30">Pendaftar Daftar Ulang</h4>
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
                        <th width="5%">Aksi</th>
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
                                <form onsubmit="abortThis(event)" action="{{ route('admin.daftar_ulang.batal') }}" class="batalkan" method="post" style="display: inline;">
                                    {{ csrf_field() }} 
                                    {{ method_field('POST') }}
                                    <input type="hidden" class="form-control" name="id" value="{{ $pendaftar_data->id }}">
                                    <button class="btn btn-danger" type="submit"><i class="fa fa-remove"></i></button>
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
    function abortThis(e){
        e.preventDefault();
        swal({
          title: "Apakah anda yakin ingin membatalkan verifikasi data ini ?",
          text: "Verifikasi Data Pendaftar",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willAbort) => {
          if (willAbort) {
            e.target.submit();
            swal("Data telah dibatalkan", {
              icon: "success",
            });
          }
        });
        return false;
    }
</script>
@endsection