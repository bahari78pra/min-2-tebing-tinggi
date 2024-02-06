<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kurikulum;
use Session;

class KurikulumController extends Controller
{
    /**
     * Display all kurikulum data
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keywords = $request->q;
        $kurikulum = Kurikulum::orderBy('id');
        if (!empty($keywords)) {
            $kurikulum->where('judul', 'LIKE', '%' . $keywords . '%');
        }
        $kurikulum = $kurikulum->paginate(10);
        $skipped = $kurikulum->currentPage() * $kurikulum->perPage() - $kurikulum->perPage();
        return view('app.admin.kurikulum.index')
            ->with('keywords', $keywords)
            ->with('skipped', $skipped)
            ->with('kurikulum', $kurikulum);
    }

    /**
     * Show the form for creating new paket keahlian.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.admin.kurikulum.create');
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

        Kurikulum::create([
            'judul' => $request->judul,
            'alias' => stripcslashes(str_replace([':', '/', '*', ' ', '(', ')', '&', '!', '@', '#', '$'], "-", strtolower($request->judul))),
            'detail' => $request->detail,
            'status' => $request->status == "on",
            'gambar' => $name
        ]);

        //session flash for message
        Session::flash('flash_message', 'successfully saved.');

        return redirect()->route('admin.kurikulum');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Kurikulum $kurikulum)
    {
        return view('app.admin.kurikulum.edit')
            ->with('kurikulum', $kurikulum);
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
        $kurikulum = Kurikulum::findOrFail($request->id);
        // $this->validate($request, [
        // 'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5000',
        // ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = 'images';
            $image->move($destinationPath, $name);

            $kurikulum->update([
                'judul' => $request->judul,
                'alias' => stripcslashes(str_replace([':', '/', '*', ' ', '(', ')', '&', '!', '@', '#', '$'], "-", strtolower($request->judul))),
                'detail' => $request->detail,
                'status' => $request->status == "on",
                'gambar' => $name
            ]);
        } else {
            $kurikulum->update([
                'judul' => $request->judul,
                'alias' => stripcslashes(str_replace([':', '/', '*', ' ', '(', ')', '&', '!', '@', '#', '$'], "-", strtolower($request->judul))),
                'detail' => $request->detail,
                'status' => $request->status == "on"
            ]);
        }

        //session flash for message
        Session::flash('flash_message', 'successfully saved.');

        return redirect()->route('admin.kurikulum');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $kurikulum = Kurikulum::findOrFail($request->id);
        $kurikulum->delete();

        return redirect()->back();
    }
}
