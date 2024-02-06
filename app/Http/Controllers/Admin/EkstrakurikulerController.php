<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Ekstrakurikuler;
use Session;

class EkstrakurikulerController extends Controller
{
    /**
     * Display all ekstrakurikuler data
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keywords = $request->q;
        $ekstrakurikuler = Ekstrakurikuler::orderBy('id');
        if (!empty($keywords)) {
            $ekstrakurikuler->where('judul', 'LIKE', '%' . $keywords . '%');
        }
        $ekstrakurikuler = $ekstrakurikuler->paginate(10);
        $skipped = $ekstrakurikuler->currentPage() * $ekstrakurikuler->perPage() - $ekstrakurikuler->perPage();
        return view('app.admin.ekstrakurikuler.index')
            ->with('keywords', $keywords)
            ->with('skipped', $skipped)
            ->with('ekstrakurikuler', $ekstrakurikuler);
    }

    /**
     * Show the form for creating new ekstrakurikuler.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.admin.ekstrakurikuler.create');
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

        Ekstrakurikuler::create([
            'judul' => $request->judul,
            'alias' => stripcslashes(str_replace([':', '/', '*', ' ', '(', ')', '&', '!', '@', '#', '$'], "-", strtolower($request->judul))),
            'detail' => $request->detail,
            'status' => $request->status == "on",
            'gambar' => $name
        ]);

        //session flash for message
        Session::flash('flash_message', 'successfully saved.');

        return redirect()->route('admin.ekstrakurikuler');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $ekstrakurikuler
     * @return \Illuminate\Http\Response
     */
    public function edit(Ekstrakurikuler $ekstrakurikuler)
    {
        return view('app.admin.ekstrakurikuler.edit')
            ->with('ekstrakurikuler', $ekstrakurikuler);
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
        $ekstrakurikuler = Ekstrakurikuler::findOrFail($request->id);
        // $this->validate($request, [
        // 'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5000',
        // ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = 'images';
            $image->move($destinationPath, $name);

            $ekstrakurikuler->update([
                'judul' => $request->judul,
                'alias' => stripcslashes(str_replace([':', '/', '*', ' ', '(', ')', '&', '!', '@', '#', '$'], "-", strtolower($request->judul))),
                'detail' => $request->detail,
                'status' => $request->status == "on",
                'gambar' => $name
            ]);
        } else {
            $ekstrakurikuler->update([
                'judul' => $request->judul,
                'alias' => stripcslashes(str_replace([':', '/', '*', ' ', '(', ')', '&', '!', '@', '#', '$'], "-", strtolower($request->judul))),
                'detail' => $request->detail,
                'status' => $request->status == "on"
            ]);
        }

        //session flash for message
        Session::flash('flash_message', 'successfully saved.');

        return redirect()->route('admin.ekstrakurikuler');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $zona_integritas = ZonaIntegritas::findOrFail($request->id);
        $zona_integritas->delete();

        return redirect()->back();
    }
}
