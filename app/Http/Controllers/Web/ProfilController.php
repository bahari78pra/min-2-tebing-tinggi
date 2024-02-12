<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Office, Profile, Fasilitas, Ekstrakurikuler, Portal, News};


class ProfilController extends Controller
{
    public function index(Request $request)
    {
        $instansi = Office::first();
        $profil = Profile::orderby('id')->get();
        $portal = Portal::orderby('id')->get();
        $fasilitas = Fasilitas::orderby('id')->get();
        $ekstrakurikuler = Ekstrakurikuler::orderby('id')->get();
        $berita = News::orderBy('id', 'desc')->limit(6)->get();
        $profil_detail = Profile::where('alias', $request->profil)->first();

        return view('app.web.profil')
            ->with('instansi', $instansi)
            ->with('berita', $berita)
            ->with('profil', $profil)
            ->with('portal', $portal)
            ->with('fasilitas', $fasilitas)
            ->with('ekstrakurikuler', $ekstrakurikuler)
            ->with('profil_detail', $profil_detail);
    }
}
