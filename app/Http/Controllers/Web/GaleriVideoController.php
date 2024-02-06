<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Office, Profile, Gallery, News,  Slideshow, PaketKeahlian, Fasilitas, Kurikulum, Ekstrakurikuler, Video};

class GaleriVideoController extends Controller
{
    public function index(Request $request){
        $instansi = Office::first();
        $profil = Profile::orderby('id')->get();
        $paket_keahlian = PaketKeahlian::orderby('id')->get();
        $fasilitas = Fasilitas::orderby('id')->get();
        $ekstrakurikuler = Ekstrakurikuler::orderby('id')->get();
        $sejarah = Profile::where('id', 2)->first();
        $kurikulum = Kurikulum::orderby('id')->get();
        $galeri = Gallery::orderBy('id', 'desc')->limit(9)->get();
        $semua_berita=News::orderBy('id','desc')->limit(8)->get();
        $berita = News::where('jenis','Berita Terkini')->orderBy('id','desc')->limit(5)->get();
        $kegiatan = News::where('jenis','Kegiatan Terkini')->orderBy('id','desc')->limit(5)->get();
        $slides = Slideshow::orderby('id','desc')->limit(6)->get();
        $sambutan = Profile::where('alias','sambutan-kepala-sekolah')->first();
        $video= Video::orderBy('id','desc')->paginate(8);
        return view('app.web.galeri_video')
                        ->with('instansi', $instansi)
                        ->with('kurikulum', $kurikulum)
                        ->with('galeri', $galeri)
                        ->with('semua_berita', $semua_berita)
                        ->with('berita', $berita)
                        ->with('kegiatan', $kegiatan)
                        ->with('slides', $slides)
                        ->with('profil', $profil)
                        ->with('sejarah', $sejarah)
                        ->with('paket_keahlian', $paket_keahlian)
                        ->with('fasilitas', $fasilitas)
                        ->with('ekstrakurikuler', $ekstrakurikuler)
                        ->with('sambutan', $sambutan)
                        ->with('video', $video);
    }
}
