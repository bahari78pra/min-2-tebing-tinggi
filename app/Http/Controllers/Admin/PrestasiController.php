<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Office, Profile, Gallery, News,  Slideshow, PaketKeahlian, Fasilitas, Kurikulum, Ekstrakurikuler};

class PrestasiController extends Controller
{
    public function index(Request $request)
    {
        $instansi = Office::first();
        $kurikulum = Kurikulum::orderby('id')->get();
        $profil = Profile::orderby('id')->get();
        $paket_keahlian = PaketKeahlian::orderby('id')->get();
        $fasilitas = Fasilitas::orderby('id')->get();
        $sejarah = Profile::where('id', 2)->first();
        $ekstrakurikuler = Ekstrakurikuler::orderby('id')->get();
        $galeri = Gallery::orderBy('id', 'desc')->limit(6)->get();
        $semua_berita = News::orderBy('id', 'desc');
        $berita = News::where('jenis', 'Berita Terkini')->orderBy('id', 'desc')->limit(5)->get();
        $kegiatan = News::where('jenis', 'Kegiatan Terkini')->orderBy('id', 'desc')->limit(5)->get();
        $slides = Slideshow::orderby('id', 'desc')->limit(6)->get();
        $sambutan = Profile::where('alias', 'sambutan-kepala-sekolah')->first();

        $q_berita = $request->q_berita;
        if ($q_berita != "") {
            $semua_berita->where('title', 'LIKE', '%' . $request->q_berita . '%');
        }

        $semua_berita = $semua_berita->paginate(6);

        return view('app.web.berita')
            ->with('instansi', $instansi)
            ->with('galeri', $galeri)
            ->with('semua_berita', $semua_berita)
            ->with('berita', $berita)
            ->with('q_berita', $q_berita)
            ->with('sejarah', $sejarah)
            ->with('kegiatan', $kegiatan)
            ->with('slides', $slides)
            ->with('kurikulum', $kurikulum)
            ->with('profil', $profil)
            ->with('paket_keahlian', $paket_keahlian)
            ->with('fasilitas', $fasilitas)
            ->with('ekstrakurikuler', $ekstrakurikuler)
            ->with('sambutan', $sambutan);
    }

    public function detail(Request $request)
    {
        $instansi = Office::first();
        $profil = Profile::orderby('id')->get();
        $paket_keahlian = PaketKeahlian::orderby('id')->get();
        $kurikulum = Kurikulum::orderby('id')->get();
        $sejarah = Profile::where('id', 2)->first();
        $fasilitas = Fasilitas::orderby('id')->get();
        $ekstrakurikuler = Ekstrakurikuler::orderby('id')->get();
        $galeri = Gallery::orderBy('id', 'desc')->limit(6)->get();
        $semua_berita = News::orderBy('id', 'desc')->limit(5)->get();
        $berita = News::where('jenis', 'Berita Terkini')->orderBy('id', 'desc')->limit(5)->get();
        $kegiatan = News::where('jenis', 'Kegiatan Terkini')->orderBy('id', 'desc')->limit(5)->get();
        $slides = Slideshow::orderby('id', 'desc')->limit(6)->get();
        $sambutan = Profile::where('alias', 'sambutan-kepala-sekolah')->first();

        $berita_detail = News::where('alias', $request->berita)->first();
        return view('app.web.berita_detail')
            ->with('instansi', $instansi)
            ->with('galeri', $galeri)
            ->with('semua_berita', $semua_berita)
            ->with('berita', $berita)
            ->with('kurikulum', $kurikulum)
            ->with('sejarah', $sejarah)
            ->with('kegiatan', $kegiatan)
            ->with('slides', $slides)
            ->with('profil', $profil)
            ->with('paket_keahlian', $paket_keahlian)
            ->with('fasilitas', $fasilitas)
            ->with('ekstrakurikuler', $ekstrakurikuler)
            ->with('sambutan', $sambutan)
            ->with('berita_detail', $berita_detail);
    }
}
