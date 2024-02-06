<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Profile, Lembaga, Fasilitas, Ekstrakurikuler, News};

class SiteMapController extends Controller
{
    public function index()
    {
        $profil = Profile::orderBy('id', 'DESC')->get();
        $lembaga = Lembaga::orderBy('id', 'DESC')->get();
        $fasilitas = Fasilitas::orderBy('id', 'DESC')->get();
        $ekstrakurikuler = Ekstrakurikuler::orderBy('id', 'DESC')->get();
        $prestasi = News::where('jenis', 'Prestasi')->orderBy('id', 'DESC')->get();
        $berita = News::where('jenis', 'Berita')->orderBy('id', 'DESC')->get();

        return response()->view('app.web.sitemap', compact('profil', 'lembaga', 'fasilitas', 'ekstrakurikuler', 'prestasi', 'berita'))->header('Content-Type', 'text/xml');

        // return view('app.web.sitemap')->with('profil', $profil)->with('lembaga', $lembaga)->with('fasilitas', $fasilitas)->with('ekstrakurikuler', $ekstrakurikuler)->with('prestasi', $prestasi)->with('berita', $berita);
    }
}
