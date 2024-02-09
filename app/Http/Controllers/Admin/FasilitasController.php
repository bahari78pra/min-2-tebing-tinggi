<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Fasilitas;
use Session;
use Illuminate\Support\Facades\File;

class FasilitasController extends Controller
{
    /**
     * Display all fasilitas data
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keywords = $request->q;
        $fasilitas = Fasilitas::orderBy('id');
        if (!empty($keywords)) {
            $fasilitas->where('judul', 'LIKE', '%' . $keywords . '%');
        }
        $fasilitas = $fasilitas->paginate(10);
        $skipped = $fasilitas->currentPage() * $fasilitas->perPage() - $fasilitas->perPage();
        return view('app.admin.fasilitas.index')
            ->with('keywords', $keywords)
            ->with('skipped', $skipped)
            ->with('fasilitas', $fasilitas);
    }

    /**
     * Show the form for creating new profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.admin.fasilitas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $this->validate($request, [
        // 'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5000',
        // ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = 'images';
            $image->move($destinationPath, $name);
        } else {
            $name = '';
        }

        Fasilitas::create([
            'judul' => $request->judul,
            'alias' => stripcslashes(str_replace([':', '/', '*', ' ', '(', ')', '&', '!', '@', '#', '$'], "-", strtolower($request->judul))),
            'detail' => $request->detail,
            'status' => $request->status == "on",
            'gambar' => $name
        ]);

        //session flash for message
        Session::flash('flash_message', 'successfully saved.');

        return redirect()->route('admin.fasilitas');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Fasilitas $fasilitas)
    {
        return view('app.admin.fasilitas.edit')
            ->with('fasilitas', $fasilitas);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $fasilitas = Fasilitas::findOrFail($request->id);

        if ($request->hasFile('image')) {
            if (File::exists("images/" . $fasilitas->image)) {
                File::delete("images/" . $fasilitas->image);
            }
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = 'images';
            $image->move($destinationPath, $name);

            $fasilitas->update([
                'judul' => $request->judul,
                'alias' => stripcslashes(str_replace([':', '/', '*', ' ', '(', ')', '&', '!', '@', '#', '$'], "-", strtolower($request->judul))),
                'detail' => $request->detail,
                'status' => $request->status == "on",
                'gambar' => $name
            ]);
        } else {
            $fasilitas->update([
                'judul' => $request->judul,
                'alias' => stripcslashes(str_replace([':', '/', '*', ' ', '(', ')', '&', '!', '@', '#', '$'], "-", strtolower($request->judul))),
                'detail' => $request->detail,
                'status' => $request->status == "on"
            ]);
        }

        //session flash for message
        Session::flash('flash_message', 'successfully saved.');

        return redirect()->route('admin.fasilitas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $fasilitas = Fasilitas::findOrFail($request->id);
        if (File::exists("images/" . $fasilitas->image)) {
            File::delete("images/" . $fasilitas->image);
        }
        $fasilitas->delete();

        return redirect()->back();
    }
}
