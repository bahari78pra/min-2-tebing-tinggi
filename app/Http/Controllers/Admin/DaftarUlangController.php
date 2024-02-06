<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Pendaftar, PaketKeahlian, Ekstrakurikuler, TahunAjaranPpdb};
use App\User;
use Session;
use Illuminate\Support\Facades\Hash;

class DaftarUlangController extends Controller
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
        $pendaftar = Pendaftar::where('status_daftar_ulang',1)->orderBy('id', 'desc');
        if(!empty($key_nama)){
            $pendaftar->where('nama_lengkap','LIKE','%'.$key_nama.'%');
        }
        if(!empty($key_paket_keahlian)){
            $pendaftar->where('paket_keahlian_id',$key_paket_keahlian);
        }
        $pendaftar=$pendaftar->paginate(30);
        $skipped = $pendaftar->currentPage() *$pendaftar->perPage() -$pendaftar->perPage();
        return view('app.admin.daftar-ulang.index')
                    ->with('key_nama',$key_nama)
                    ->with('key_paket_keahlian',$key_paket_keahlian)
                    ->with('skipped',$skipped)
                    ->with('paket_keahlian', $paket_keahlian)
                    ->with('pendaftar', $pendaftar);
    }

    public function batal(Request $request)
    {
        $pendaftar = Pendaftar::findOrFail($request->id);
        $pendaftar->update([
        	'status_daftar_ulang'=>0
        ]);
    
        return redirect()->back();
    }
}
