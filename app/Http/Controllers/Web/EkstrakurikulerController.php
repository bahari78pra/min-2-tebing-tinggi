<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Office, Profile, Fasilitas, Ekstrakurikuler, Portal, News};

class EkstrakurikulerController extends Controller
{
    public function index(Request $request)
    {
        $instansi = Office::first();
        $profil = Profile::orderby('id')->get();
        $portal = Portal::orderby('id')->get();
        $fasilitas = Fasilitas::orderby('id')->get();
        $ekstrakurikuler = Ekstrakurikuler::orderby('id')->get();
        $berita = News::orderBy('id', 'desc')->limit(6)->get();

        $ekskul_detail = Ekstrakurikuler::where('alias', $request->ekstrakurikuler)->first();
        return view('app.web.ekstrakurikuler')
            ->with('instansi', $instansi)
            ->with('berita', $berita)
            ->with('profil', $profil)
            ->with('portal', $portal)
            ->with('fasilitas', $fasilitas)
            ->with('ekstrakurikuler', $ekstrakurikuler)
            ->with('ekskul_detail', $ekskul_detail);
    }
}
