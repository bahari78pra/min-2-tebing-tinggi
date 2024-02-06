<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Lembaga;
use Session;

class LembagaController extends Controller
{
    /**
     * Display all lembaga data
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keywords = $request->q;
        $lembaga = Lembaga::orderBy('id');
        if (!empty($keywords)) {
            $lembaga->where('judul', 'LIKE', '%' . $keywords . '%');
        }
        $lembaga = $lembaga->paginate(10);
        $skipped = $lembaga->currentPage() * $lembaga->perPage() - $lembaga->perPage();
        return view('app.admin.lembaga.index')
            ->with('keywords', $keywords)
            ->with('skipped', $skipped)
            ->with('lembaga', $lembaga);
    }

    /**
     * Show the form for creating new lembaga.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.admin.lembaga.create');
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

        Lembaga::create([
            'judul' => $request->judul,
            'alias' => stripcslashes(str_replace([':', '/', '*', ' ', '(', ')', '&', '!', '@', '#', '$'], "-", strtolower($request->judul))),
            'detail' => $request->detail,
            'status' => $request->status == "on",
            'gambar' => $name
        ]);

        //session flash for message
        Session::flash('flash_message', 'successfully saved.');

        return redirect()->route('admin.lembaga');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(lembaga $lembaga)
    {
        return view('app.admin.lembaga.edit')
            ->with('lembaga', $lembaga);
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
        $lembaga = Lembaga::findOrFail($request->id);
        // $this->validate($request, [
        // 'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5000',
        // ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = 'images';
            $image->move($destinationPath, $name);

            $lembaga->update([
                'judul' => $request->judul,
                'alias' => stripcslashes(str_replace([':', '/', '*', ' ', '(', ')', '&', '!', '@', '#', '$'], "-", strtolower($request->judul))),
                'detail' => $request->detail,
                'status' => $request->status == "on",
                'gambar' => $name
            ]);
        } else {
            $lembaga->update([
                'judul' => $request->judul,
                'alias' => stripcslashes(str_replace([':', '/', '*', ' ', '(', ')', '&', '!', '@', '#', '$'], "-", strtolower($request->judul))),
                'detail' => $request->detail,
                'status' => $request->status == "on"
            ]);
        }

        //session flash for message
        Session::flash('flash_message', 'successfully saved.');

        return redirect()->route('admin.lembaga');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $lembaga = lembaga::findOrFail($request->id);
        $lembaga->delete();

        return redirect()->back();
    }
}
