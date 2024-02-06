<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Office, Profile, Gallery, News,  Slideshow, PaketKeahlian, Fasilitas, Ekstrakurikuler, Kurikulum, Video, Lembaga};

class HomepageController extends Controller
{
    public function index(Request $request)
    {
        $instansi = Office::first();
        $profil = Profile::orderby('id')->get();
        $kurikulum = Kurikulum::orderby('id')->get();
        $sejarah = Profile::where('id', 2)->first();
        $paket_keahlian = PaketKeahlian::orderby('id')->get();
        $fasilitas = Fasilitas::orderby('id')->get();
        $lembaga = Lembaga::orderby('id')->get();
        $ekstrakurikuler = Ekstrakurikuler::orderby('id')->get();
        $galeri = Gallery::orderBy('id', 'desc')->limit(9)->get();
        $berita = News::where('jenis', 'Berita')->orderBy('id', 'desc')->limit(6)->get();
        $prestasi = News::where('jenis', 'Prestasi')->orderBy('id', 'desc')->limit(6)->get();
        $slides = Slideshow::orderby('id', 'desc')->limit(6)->get();
        $sambutan = Profile::where('alias', 'sambutan-kepala-sekolah')->first();
        $video = Video::orderby('id', 'desc')->first();

        return view('app.web.index')
            ->with('instansi', $instansi)
            ->with('sejarah', $sejarah)
            ->with('kurikulum', $kurikulum)
            ->with('galeri', $galeri)
            ->with('video', $video)
            ->with('berita', $berita)
            ->with('prestasi', $prestasi)
            ->with('slides', $slides)
            ->with('profil', $profil)
            ->with('paket_keahlian', $paket_keahlian)
            ->with('fasilitas', $fasilitas)
            ->with('lembaga', $lembaga)
            ->with('ekstrakurikuler', $ekstrakurikuler)
            ->with('sambutan', $sambutan);
    }
}
