<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Office, Profile, Fasilitas, Ekstrakurikuler, Portal, News, Gallery};

class GaleriFotoController extends Controller
{
    public function index(Request $request)
    {
        $instansi = Office::first();
        $profil = Profile::orderby('id')->get();
        $portal = Portal::orderby('id')->get();
        $fasilitas = Fasilitas::orderby('id')->get();
        $ekstrakurikuler = Ekstrakurikuler::orderby('id')->get();
        $berita = News::orderBy('id', 'desc')->limit(6)->get();

        $galeri = Gallery::orderBy('id', 'desc')->paginate(16);
        return view('app.web.galeri_foto')
            ->with('instansi', $instansi)
            ->with('galeri', $galeri)
            ->with('berita', $berita)
            ->with('profil', $profil)
            ->with('portal', $portal)
            ->with('fasilitas', $fasilitas)
            ->with('ekstrakurikuler', $ekstrakurikuler);
    }
}
