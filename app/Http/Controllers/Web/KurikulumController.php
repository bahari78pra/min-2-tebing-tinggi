<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Office, Profile, Gallery, News,  Slideshow, PaketKeahlian, Fasilitas, Kurikulum, Ekstrakurikuler};

class KurikulumController extends Controller
{
    public function index(Request $request){
        $instansi = Office::first();
        $profil = Profile::orderby('id')->get();
        $kurikulum = Kurikulum::orderby('id')->get();
        $paket_keahlian = PaketKeahlian::orderby('id')->get();
        $sejarah = Profile::where('id', 2)->first();
        $fasilitas = Fasilitas::orderby('id')->get();
        $ekstrakurikuler = Ekstrakurikuler::orderby('id')->get();
        $galeri = Gallery::orderBy('id', 'desc')->limit(6)->get();
        $semua_berita=News::orderBy('id','desc')->limit(5)->get();
        $berita = News::where('jenis','Berita Terkini')->orderBy('id','desc')->limit(5)->get();
        $kegiatan = News::where('jenis','Kegiatan Terkini')->orderBy('id','desc')->limit(5)->get();
        $slides = Slideshow::orderby('id','desc')->limit(6)->get();
        $sambutan = Profile::where('alias','sambutan-kepala-sekolah')->first();
        
        $kurikulum_detail=Kurikulum::where('alias', $request->kurikulum)->first();
        return view('app.web.kurikulum')
                        ->with('instansi', $instansi)
                        ->with('galeri', $galeri)
                        ->with('kurikulum', $kurikulum)
                        ->with('sejarah', $sejarah)
                        ->with('semua_berita', $semua_berita)
                        ->with('berita', $berita)
                        ->with('kegiatan', $kegiatan)
                        ->with('slides', $slides)
                        ->with('profil', $profil)
                        ->with('paket_keahlian', $paket_keahlian)
                        ->with('fasilitas', $fasilitas)
                        ->with('ekstrakurikuler', $ekstrakurikuler)
                        ->with('sambutan', $sambutan)
                        ->with('kurikulum_detail', $kurikulum_detail);
    }
}
