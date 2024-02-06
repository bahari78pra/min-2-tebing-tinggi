<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Office, Profile, Gallery, News,  Slideshow, PaketKeahlian, Fasilitas, Kurikulum, Ekstrakurikuler, Lembaga};

class GaleriFotoController extends Controller
{
    public function index(Request $request)
    {
        $instansi = Office::first();
        $kurikulum = Kurikulum::orderby('id')->get();
        $profil = Profile::orderby('id')->get();
        $paket_keahlian = PaketKeahlian::orderby('id')->get();
        $fasilitas = Fasilitas::orderby('id')->get();
        $lembaga = Lembaga::orderby('id')->get();
        $sejarah = Profile::where('id', 2)->first();
        $ekstrakurikuler = Ekstrakurikuler::orderby('id')->get();
        $galeri = Gallery::orderBy('id', 'desc')->paginate(16);
        $semua_berita = News::orderBy('id', 'desc')->limit(8)->get();
        $berita = News::where('jenis', 'Berita')->orWhere('jenis', 'Pengumuman')->orderBy('id', 'desc')->limit(5)->get();
        $kegiatan = News::where('jenis', 'Kegiatan Terkini')->orderBy('id', 'desc')->limit(5)->get();
        $slides = Slideshow::orderby('id', 'desc')->limit(6)->get();
        $sambutan = Profile::where('alias', 'sambutan-kepala-sekolah')->first();
        return view('app.web.galeri_foto')
            ->with('instansi', $instansi)
            ->with('galeri', $galeri)
            ->with('semua_berita', $semua_berita)
            ->with('berita', $berita)
            ->with('kurikulum', $kurikulum)
            ->with('kegiatan', $kegiatan)
            ->with('slides', $slides)
            ->with('sejarah', $sejarah)
            ->with('profil', $profil)
            ->with('paket_keahlian', $paket_keahlian)
            ->with('fasilitas', $fasilitas)
            ->with('lembaga', $lembaga)
            ->with('ekstrakurikuler', $ekstrakurikuler)
            ->with('sambutan', $sambutan);
    }
}
