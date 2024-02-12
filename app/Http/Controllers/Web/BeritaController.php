<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Office, Profile, Fasilitas, Ekstrakurikuler, Portal, News};

class BeritaController extends Controller
{
    public function index(Request $request)
    {
        $instansi = Office::first();
        $profil = Profile::orderby('id')->get();
        $portal = Portal::orderby('id')->get();
        $fasilitas = Fasilitas::orderby('id')->get();
        $ekstrakurikuler = Ekstrakurikuler::orderby('id')->get();
        $berita = News::orderBy('id', 'desc')->limit(6)->get();

        $berita_page = News::orderBy('id');
        $q_berita = $request->q_berita;
        if ($q_berita != "") {
            $berita_page->where('title', 'LIKE', '%' . $request->q_berita . '%');
        }

        $berita_page = $berita_page->paginate(5);

        return view('app.web.berita')
            ->with('instansi', $instansi)
            ->with('berita', $berita)
            ->with('portal', $portal)
            ->with('berita_page', $berita_page)
            ->with('q_berita', $q_berita)
            ->with('profil', $profil)
            ->with('fasilitas', $fasilitas)
            ->with('ekstrakurikuler', $ekstrakurikuler);
    }

    public function detail(Request $request)
    {
        $instansi = Office::first();
        $profil = Profile::orderby('id')->get();
        $portal = Portal::orderby('id')->get();
        $fasilitas = Fasilitas::orderby('id')->get();
        $ekstrakurikuler = Ekstrakurikuler::orderby('id')->get();
        $berita = News::orderBy('id', 'desc')->limit(6)->get();

        $berita_detail = News::where('alias', $request->berita)->first();
        return view('app.web.berita_detail')
            ->with('instansi', $instansi)
            ->with('berita', $berita)
            ->with('profil', $profil)
            ->with('portal', $portal)
            ->with('fasilitas', $fasilitas)
            ->with('ekstrakurikuler', $ekstrakurikuler)
            ->with('berita_detail', $berita_detail);
    }
}
