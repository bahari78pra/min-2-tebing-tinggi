<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Pendaftar, PaketKeahlian, Ekstrakurikuler, TahunAjaranPpdb};
use App\User;
use Session;
use Illuminate\Support\Facades\Hash;

class PendaftarController extends Controller
{
    /**
     * Display all pendaftar data
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $key_nama=$request->q_nama;
        $key_paket_keahlian=$request->q_paket_keahlian;
        $paket_keahlian=PaketKeahlian::orderBy('id')->get();
        $pendaftar = Pendaftar::where('status_daftar_ulang',0)->orderBy('id', 'desc');
        if(!empty($key_nama)){
            $pendaftar->where('nama_lengkap','LIKE','%'.$key_nama.'%');
        }
        if(!empty($key_paket_keahlian)){
            $pendaftar->where('paket_keahlian_id',$key_paket_keahlian);
        }
        $pendaftar=$pendaftar->paginate(30);
        $skipped = $pendaftar->currentPage() *$pendaftar->perPage() -$pendaftar->perPage();
        return view('app.admin.pendaftar.index')
                    ->with('key_nama',$key_nama)
                    ->with('key_paket_keahlian',$key_paket_keahlian)
                    ->with('skipped',$skipped)
                    ->with('paket_keahlian', $paket_keahlian)
                    ->with('pendaftar', $pendaftar);
    }

    /**
     * Show the form for creating new profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$tahun_ajaran_ppdb=TahunAjaranPpdb::where('status',1)->first();
    	$paket_keahlian=PaketKeahlian::orderBy('judul')->get();
    	$ekstrakurikuler=Ekstrakurikuler::orderBy('judul')->get();
        return view('app.admin.pendaftar.create')
        					->with('paket_keahlian', $paket_keahlian)
        					->with('tahun_ajaran_ppdb', $tahun_ajaran_ppdb)
        					->with('ekstrakurikuler', $ekstrakurikuler);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $daftar = Pendaftar::create([
            'nama_lengkap' => ucwords(strtolower($request->nama_lengkap)),
            'jk' => ucwords(strtolower($request->jk)),
            'tpt_lahir' => ucwords(strtolower($request->tpt_lahir)),
            'tgl_lahir' => $request->tgl_lahir,
            'agama' => ucwords(strtolower($request->agama)),
            'alamat' => ucwords(strtolower($request->alamat)),
            'no_hp' => $request->no_hp,
            'asal_sekolah' => ucwords(strtolower($request->asal_sekolah)),
            'tahun_tamat' => $request->tahun_tamat,
            'alamat_smp' => ucwords(strtolower($request->alamat_smp)),

            'nama_ayah' => ucwords(strtolower($request->nama_ayah)),
            'nama_ibu' => ucwords(strtolower($request->nama_ibu)),
            'pekerjaan_ayah' => ucwords(strtolower($request->pekerjaan_ayah)),
            'pekerjaan_ibu' => ucwords(strtolower($request->pekerjaan_ibu)),
            'alamat_ortu' => ucwords(strtolower($request->alamat_ortu)),
            'no_hp_ortu' => ucwords(strtolower($request->no_hp_ortu)),

            'nama_wali' => ucwords(strtolower($request->nama_wali)),
            'no_hp_wali' => ucwords(strtolower($request->no_hp_wali)),
            'alamat_wali' => ucwords(strtolower($request->alamat_wali)),
            'pekerjaan_wali' => ucwords(strtolower($request->pekerjaan_wali)),
            'ref_pendaftaran' => ucwords(strtolower($request->ref_pendaftaran)),

            'tahun_ajaran_ppdb_id' => $request->tahun_ajaran_ppdb_id,
            'paket_keahlian_id' => $request->paket_keahlian_id,
            'ekstrakurikuler_id' => $request->ekstrakurikuler_id,
            'email' => ""

        ]);

        //Pembuatan User
        User::create([
            'name' => $request->nama_lengkap,
            'user_level' => 'Siswa',
            'email' => "cpd_".$daftar->id."@smkkaryautama.sch.id",
            'password' => Hash::make('12345678')
        ]);


        //Update email di table pendaftar
        $pendaftar=Pendaftar::findOrFail($daftar->id);
        $pendaftar->update([
            'email'=>"cpd_".$daftar->id."@smkkaryautama.sch.id"
        ]);

        //session flash for message
        Session::flash('flash_message','successfully saved.');

        return redirect()->route('admin.pendaftar');

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Pendaftar $pendaftar)
    {
    	$tahun_ajaran_ppdb=TahunAjaranPpdb::where('status',1)->first();
        $paket_keahlian = PaketKeahlian::orderBy('judul','ASC')->get();
        $ekstrakurikuler = Ekstrakurikuler::orderBy('judul','ASC')->get();
        return view('app.admin.pendaftar.edit')
        			->with('paket_keahlian', $paket_keahlian)
					->with('tahun_ajaran_ppdb', $tahun_ajaran_ppdb)
					->with('ekstrakurikuler', $ekstrakurikuler)   
                    ->with('pendaftar', $pendaftar); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $pendaftar = Pendaftar::findOrFail($request->id);
        $pendaftar->update([
            'nama_lengkap' => ucwords(strtolower($request->nama_lengkap)),
            'jk' => ucwords(strtolower($request->jk)),
            'tpt_lahir' => ucwords(strtolower($request->tpt_lahir)),
            'tgl_lahir' => $request->tgl_lahir,
            'agama' => ucwords(strtolower($request->agama)),
            'alamat' => ucwords(strtolower($request->alamat)),
            'no_hp' => $request->no_hp,
            'asal_sekolah' => ucwords(strtolower($request->asal_sekolah)),
            'tahun_tamat' => $request->tahun_tamat,
            'alamat_smp' => ucwords(strtolower($request->alamat_smp)),

            'nama_ayah' => ucwords(strtolower($request->nama_ayah)),
            'nama_ibu' => ucwords(strtolower($request->nama_ibu)),
            'pekerjaan_ayah' => ucwords(strtolower($request->pekerjaan_ayah)),
            'pekerjaan_ibu' => ucwords(strtolower($request->pekerjaan_ibu)),
            'alamat_ortu' => ucwords(strtolower($request->alamat_ortu)),
            'no_hp_ortu' => ucwords(strtolower($request->no_hp_ortu)),

            'nama_wali' => ucwords(strtolower($request->nama_wali)),
            'no_hp_wali' => ucwords(strtolower($request->no_hp_wali)),
            'alamat_wali' => ucwords(strtolower($request->alamat_wali)),
            'pekerjaan_wali' => ucwords(strtolower($request->pekerjaan_wali)),
            'ref_pendaftaran' => ucwords(strtolower($request->ref_pendaftaran)),

            'tahun_ajaran_ppdb_id' => $request->tahun_ajaran_ppdb_id,
            'paket_keahlian_id' => $request->paket_keahlian_id,
            'ekstrakurikuler_id' => $request->ekstrakurikuler_id,
        ]);

        //session flash for message
        Session::flash('flash_message','successfully saved.');

        return redirect()->route('admin.pendaftar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $pendaftar = Pendaftar::findOrFail($request->id);
        $pendaftar->delete();
    
        return redirect()->back();
    }

    public function verifikasi(Request $request)
    {
        $pendaftar = Pendaftar::findOrFail($request->id);
        $pendaftar->update([
        	'status_daftar_ulang'=>1
        ]);
    
        return redirect()->back();
    }


}
