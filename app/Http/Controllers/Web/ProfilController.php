<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Office, Profile, Gallery, News,  Slideshow, PaketKeahlian, Fasilitas, Ekstrakurikuler, Kurikulum, Lembaga};


class ProfilController extends Controller
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
        $galeri = Gallery::orderBy('id', 'desc')->limit(6)->get();
        $semua_berita = News::orderBy('id', 'desc')->limit(5)->get();
        $berita = News::where('jenis', 'Berita')->orWhere('jenis', 'Pengumuman')->orderBy('id', 'desc')->limit(5)->get();
        $kegiatan = News::where('jenis', 'Kegiatan Terkini')->orderBy('id', 'desc')->limit(5)->get();
        $slides = Slideshow::orderby('id', 'desc')->limit(6)->get();
        $sambutan = Profile::where('alias', 'sambutan-kepala-sekolah')->first();

        $profil_detail = Profile::where('alias', $request->profil)->first();

        return view('app.web.profil')
            ->with('instansi', $instansi)
            ->with('sejarah', $sejarah)
            ->with('galeri', $galeri)
            ->with('kurikulum', $kurikulum)
            ->with('semua_berita', $semua_berita)
            ->with('berita', $berita)
            ->with('kegiatan', $kegiatan)
            ->with('slides', $slides)
            ->with('profil', $profil)
            ->with('paket_keahlian', $paket_keahlian)
            ->with('fasilitas', $fasilitas)
            ->with('lembaga', $lembaga)
            ->with('ekstrakurikuler', $ekstrakurikuler)
            ->with('sambutan', $sambutan)
            ->with('profil_detail', $profil_detail);
    }
}
