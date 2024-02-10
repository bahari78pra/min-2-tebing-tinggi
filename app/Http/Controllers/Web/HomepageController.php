<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Office, Profile, Gallery, News,  Slideshow, Fasilitas, Ekstrakurikuler, Staff};

class HomepageController extends Controller
{
    public function index(Request $request)
    {
        $instansi = Office::first();
        $profil = Profile::orderby('id')->get();
        $sejarah = Profile::where('id', 2)->first();
        $fasilitas = Fasilitas::orderby('id')->get();
        $ekstrakurikuler = Ekstrakurikuler::orderby('id')->get();
        $galeri = Gallery::orderBy('id', 'desc')->limit(9)->get();
        $berita = News::where('jenis', 'Berita')->orderBy('id', 'desc')->limit(6)->get();
        $prestasi = News::where('jenis', 'Prestasi')->orderBy('id', 'desc')->limit(6)->get();
        $slides = Slideshow::orderby('id', 'desc')->limit(6)->get();
        $sambutan = Profile::where('alias', 'sambutan-kepala-madrasah')->first();
        $staff = Staff::orderBy('no_urut_tampil', 'asc')->get();

        return view('app.web.index')
            ->with('instansi', $instansi)
            ->with('staff', $staff)
            ->with('sejarah', $sejarah)
            ->with('galeri', $galeri)
            ->with('berita', $berita)
            ->with('prestasi', $prestasi)
            ->with('slides', $slides)
            ->with('profil', $profil)
            ->with('fasilitas', $fasilitas)
            ->with('ekstrakurikuler', $ekstrakurikuler)
            ->with('sambutan', $sambutan);
    }
}
