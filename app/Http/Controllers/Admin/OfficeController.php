<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Session;
use App\Http\Controllers\Controller;
use App\Models\Office;

class OfficeController extends Controller
{
    public function index()
    {
        $office = Office::first();
        return view('app.admin.office.index')->with('office', $office);
    }

    public function update(Request $request)
    {
        $office = Office::first();
        $this->validate($request, [
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5000',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5000',
            'email' => 'email'
        ]);

        $office->update([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'url_facebook' => $request->url_facebook,
            'url_twitter' => $request->url_twitter,
            'url_instagram' => $request->url_instagram,
            'url_youtube' => $request->url_youtube,
            // 'jlh_siswa' => $request->jlh_siswa,
            // 'jlh_guru' => $request->jlh_guru,
            // 'jlh_prestasi' => $request->jlh_prestasi,
            // 'jlh_fasilitas' => $request->jlh_fasilitas,

        ]);

        // if ($request->hasFile('photo')) {
        //     $image = $request->file('photo');
        //     $photo_filename = "SMK Karya Utama - " . time() . '.' . $image->getClientOriginalExtension();
        //     $destinationPath = public_path('images');
        //     $image->move($destinationPath, $photo_filename);

        //     $office->update([
        //         'photo' => $school_photo_filename
        //     ]);
        // }

        // if ($request->hasFile('logo')) {
        //     $image = $request->file('logo');
        //     $logo_filename = "SMK Karya Utama - " . time() . '.' . $image->getClientOriginalExtension();
        //     $destinationPath = public_path('images');
        //     $image->move($destinationPath, $logo_filename);

        //     $office->update([
        //         'logo' => $logo_filename
        //     ]);
        // }

        //session flash for message
        Session::flash('flash_message', 'Data instansi berhasil disimpan');

        return redirect()->route('admin.office');
    }
}
