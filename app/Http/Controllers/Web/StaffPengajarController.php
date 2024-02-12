<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Office, Profile, Fasilitas, Ekstrakurikuler, Portal, Staff, News};

class StaffPengajarController extends Controller
{
    public function index(Request $request)
    {
        $instansi = Office::first();
        $profil = Profile::orderby('id')->get();
        $portal = Portal::orderby('id')->get();
        $berita = News::orderBy('id', 'desc')->limit(6)->get();
        $sejarah = Profile::where('id', 2)->first();
        $fasilitas = Fasilitas::orderby('id')->get();
        $ekstrakurikuler = Ekstrakurikuler::orderby('id')->get();
        $staff_pengajar = Staff::orderBy('no_urut_tampil', 'asc')->paginate(28);

        return view('app.web.staff_pengajar')
            ->with('instansi', $instansi)
            ->with('berita', $berita)
            ->with('portal', $portal)
            ->with('sejarah', $sejarah)
            ->with('profil', $profil)
            ->with('fasilitas', $fasilitas)
            ->with('ekstrakurikuler', $ekstrakurikuler)
            ->with('staff_pengajar', $staff_pengajar);
    }

    public function detail(Request $request)
    {
        $instansi = Office::first();
        $profil = Profile::orderby('id')->get();
        $portal = Portal::orderby('id')->get();
        $berita = News::orderBy('id', 'desc')->limit(6)->get();
        $sejarah = Profile::where('id', 2)->first();
        $fasilitas = Fasilitas::orderby('id')->get();
        $ekstrakurikuler = Ekstrakurikuler::orderby('id')->get();
        $sambutan = Profile::where('alias', 'sambutan-kepala-sekolah')->first();

        $staff_pengajar_detail = Staff::where('id', $request->staff_pengajar)->first();
        return view('app.web.staff_pengajar_detail')
            ->with('instansi', $instansi)
            ->with('berita', $berita)
            ->with('portal', $portal)
            ->with('profil', $profil)
            ->with('fasilitas', $fasilitas)
            ->with('ekstrakurikuler', $ekstrakurikuler)
            ->with('staff_pengajar_detail', $staff_pengajar_detail);
    }
}
