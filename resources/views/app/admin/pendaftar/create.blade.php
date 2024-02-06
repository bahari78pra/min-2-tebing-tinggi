@extends("layouts.app")

@section("content")
<h4 class="c-grey-900 mT-10 mB-10">Tambah Pendaftar</h4>
<div>
    <form action="{{ route('admin.pendaftar.insert') }}" method="POST" class='row' enctype="multipart/form-data">
        {{ csrf_field() }} 
        {{ method_field('POST') }}
        <div class="col-md-12 col-lg-8">
            <div class="bgc-white bd bdrs-3 p-20 mB-20">
                <h6>Data Pendaftar</h6>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif  
                <p class="font-weight-bold" style="width: 100%;padding:10px;background: #7c7d7d;color: #fff" align="center">Data Identitas Pribadi</p>
                <div class="form-row">
                    <div class="form-group col-sm-12">
                        <label for="nama_lengkap" >Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap') }}" required>
                    </div>
                  </div>
                  
                  <div class="form-row">
                    
                    <div class="form-group col-sm-12">
                        <label for="jk" >Jenis Kelamin</label>
                        <select name="jk" id="jk" class="form-control" required>
                            <option value="">- Pilih Jenis Kelamin -</option>
                            <option value="Laki-laki" @if(old('jk')=="Laki-laki") selected @endif>Laki-laki</option>
                            <option value="Perempuan" @if(old('jk')=="Perempuan") selected @endif>Perempuan</option>
                        </select>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-sm-12">
                        <label for="tpt_lahir" >Tempat Lahir</label>
                        <input type="text" class="form-control" id="tpt_lahir" name="tpt_lahir" value="{{ old('tpt_lahir') }}" required>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-sm-12">
                        <label for="tgl_lahir" >Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir"value="{{ old('tgl_lahir') }}" required> 
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-sm-12">
                        <label for="agama" >Agama</label>
                        <select class="form-control" name="agama" required>
                            <option value="">- Pilih Agama -</option>
                            <option>Islam</option>
                            <option>Kristen</option>
                            <option>Khatolik</option>
                            <option>Hindu</option>
                            <option>Budha</option>
                        </select> 
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-sm-12">
                        <label for="alamat" >Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" value="{{ old('alamat') }}" required>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-sm-12">
                        <label for="no_hp" >No HP</label>
                      <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{ old('no_hp') }}" required>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-sm-12">
                        <label for="asal_sekolah" >Asal Sekolah</label>
                        <input type="text" class="form-control" id="asal_sekolah" name="asal_sekolah" value="{{ old('asal_sekolah') }}" required>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-sm-12">
                        <label for="tahun_tamat" >Tahun Lulus</label>
                        <input type="number" class="form-control" id="tahun_tamat" name="tahun_tamat" value="{{ old('tahun_tamat') }}" required>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-sm-12">
                        <label for="alamat_smp" >Alamat Sekolah Asal</label>
                        <input type="text" class="form-control" id="alamat_smp" name="alamat_smp" value="{{ old('alamat_smp') }}" required>
                    </div>
                  </div>
                  
                  <p class="font-weight-bold" style="width: 100%;padding:10px;background: #7c7d7d;color: #fff" align="center">Data Orang Tua</p>
                  <div class="form-row">
                    <div class="form-group col-sm-12">
                        <label for="nama_ayah" >Nama Ayah</label>
                         <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" value="{{ old('nama_ayah') }}" required>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-sm-12">
                        <label for="nama_ibu" >Nama Ibu</label>
                        <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" value="{{ old('nama_ibu') }}" required>
                    </div>
                  </div>
                  <div class="form-row">
                    
                    <div class="form-group col-sm-12">
                        <label for="alamat_ortu" >Alamat Orang Tua</label>
                        <input type="text" class="form-control" id="alamat_ortu" name="alamat_ortu" value="{{ old('alamat_ortu') }}" required>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-sm-12">
                        <label for="pekerjaan_ayah" >Pekerjaan Ayah</label>
                       <input type="text" class="form-control" id="pekerjaan_ayah" name="pekerjaan_ayah" value="{{ old('pekerjaan_ayah') }}" required>
                    </div>
                  </div>
                   <div class="form-row">
                    <div class="form-group col-sm-12">
                        <label for="pekerjaan_ibu" >Pekerjaan Ibu</label>
                        <input type="text" class="form-control" id="pekerjaan_ibu" name="pekerjaan_ibu" value="{{ old('pekerjaan_ibu') }}" required>
                    </div>
                  </div>
                   <div class="form-row">
                    <div class="form-group col-sm-12">
                        <label for="no_hp_ortu" >No HP Orang Tua</label>
                        <input type="text" class="form-control" id="no_hp_ortu" name="no_hp_ortu" value="{{ old('no_hp_ortu') }}" required>
                    </div>
                  </div>

                  <p class="font-weight-bold" style="width: 100%;padding:10px;background: #7c7d7d;color: #fff" align="center">Data Wali</p>
                  <div class="form-row">
                    <div class="form-group col-sm-12">
                        <label for="nama_wali" >Nama Wali</label>
                        <input type="text" class="form-control" id="nama_wali" name="nama_wali" value="{{ old('nama_wali') }}" required>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-sm-12">
                        <label for="pekerjaan_wali" >Pekerjaan Wali</label>
                        <input type="text" class="form-control" id="pekerjaan_wali" name="pekerjaan_wali" value="{{ old('pekerjaan_wali') }}" required>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-sm-12">
                        <label for="no_hp_wali" >No HP Wali</label>
                        <input type="text" class="form-control" id="no_hp_wali" name="no_hp_wali" value="{{ old('no_hp_wali') }}" required>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-sm-12">
                        <label for="alamat_wali" >Alamat Wali</label>
                        <input type="text" class="form-control" id="alamat_wali" name="alamat_wali" value="{{ old('alamat_wali') }}" required>
                    </div>
                  </div>

                  <p class="font-weight-bold" style="width: 100%;padding:10px;background: #7c7d7d;color: #fff" align="center">Data Detail Pendaftaran</p>
                  <div class="form-row">
                    <div class="form-group col-sm-12">
                        <label for="paket_keahlian_id" >Paket Keahlian</label>
                        <select type="text" class="form-control" id="paket_keahlian_id" name="paket_keahlian_id" required>
                            <option value="">-Pilih Paket Keahlian-</option>
                            @foreach ($paket_keahlian as $paket_keahlian_data)
                              <option value="{{ $paket_keahlian_data->id }}" @if(old('paket_keahlian_id')==$paket_keahlian_data->id) selected @endif>{{ $paket_keahlian_data->judul }}</option>
                            @endforeach
                        </select>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-sm-12">
                        <label for="ekstrakurikuler_id" >Ekstrakurikuler</label>
                        <select type="text" class="form-control" id="ekstrakurikuler_id" name="ekstrakurikuler_id" required>
                            <option value="">-Pilih Ekstrakurikuler-</option>
                            @foreach ($ekstrakurikuler as $ekstrakurikuler_data)
                              <option value="{{ $ekstrakurikuler_data->id }}" @if(old('ekstrakurikuler_id')==$ekstrakurikuler_data->id) selected @endif>{{ $ekstrakurikuler_data->judul }}</option>
                            @endforeach
                        </select>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-sm-12">
                        <label for="ref_pendaftaran" >Referensi Pendaftaran</label>
                        <input type="text" class="form-control" id="ref_pendaftaran" name="ref_pendaftaran" value="{{ old('ref_pendaftaran') }}" required>
                    </div>
                  </div>

                  <input type="hidden" name="tahun_ajaran_ppdb_id" value="{{ $tahun_ajaran_ppdb->id }}">
            </div>
        </div>
        <div class="col-md-12 col-lg-4">
            <div class="bgc-white bd bdrs-3 p-20 mB-20">
                <h6>Aksi</h6>
                <p>Simpan data pendaftar.</p>
                <button type="submit" class='btn btn-success'>Simpan</button>
                <a href="{{ route('admin.pendaftar') }}" class='btn btn-danger'>Batal</a>
            </div>
        </div>
        <div class="clearfix"></div>
    </form>
</div>
@endsection
