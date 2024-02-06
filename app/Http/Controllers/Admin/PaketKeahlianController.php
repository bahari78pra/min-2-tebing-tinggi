<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Session;
use App\Http\Controllers\Controller;
use App\Models\PaketKeahlian;

class PaketKeahlianController extends Controller
{
    /**
     * Display all paket_keahlian data
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keywords=$request->q;
        $paket_keahlian = PaketKeahlian::orderBy('id');
        if (!empty($keywords)){
            $paket_keahlian->where('judul','LIKE','%'.$keywords.'%');
        }
        $paket_keahlian=$paket_keahlian->paginate(10);
        $skipped = $paket_keahlian->currentPage() *$paket_keahlian->perPage() -$paket_keahlian->perPage();
        return view('app.admin.paket-keahlian.index')
                    ->with('keywords',$keywords)
                    ->with('skipped',$skipped)
                    ->with('paket_keahlian', $paket_keahlian);
    }

    /**
     * Show the form for creating new paket keahlian.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.admin.paket-keahlian.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
        'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5000',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = 'images';
            $image->move($destinationPath, $name);
        }
        else{
            $name ='';
        }

        PaketKeahlian::create([
            'judul' => $request->judul,
            'alias' => stripcslashes(str_replace([':', '/', '*',' ','(',')','&','!','@','#','$'], "-", strtolower($request->judul))),
            'detail' => $request->detail,
            'status' => $request->status=="on",
            'gambar' => $name
        ]);

        //session flash for message
        Session::flash('flash_message','successfully saved.');

        return redirect()->route('admin.paket_keahlian');

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(PaketKeahlian $paket_keahlian)
    {
        return view('app.admin.paket-keahlian.edit')   
                    ->with('paket_keahlian', $paket_keahlian); 
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
        $paket_keahlian = PaketKeahlian::findOrFail($request->id);
        $this->validate($request, [
        'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5000',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = 'images';
            $image->move($destinationPath, $name);

            $paket_keahlian->update([
                'judul' => $request->judul,
                'alias' => stripcslashes(str_replace([':', '/', '*',' ','(',')','&','!','@','#','$'], "-", strtolower($request->judul))),
                'detail' => $request->detail,
                'status' => $request->status == "on",
                'gambar' => $name
            ]);
        }
        else{
            $paket_keahlian->update([
                'judul' => $request->judul,
                'alias' => stripcslashes(str_replace([':', '/', '*',' ','(',')','&','!','@','#','$'], "-", strtolower($request->judul))),
                'detail' => $request->detail,
                'status' => $request->status == "on"
            ]);
        }

        //session flash for message
        Session::flash('flash_message','successfully saved.');

        return redirect()->route('admin.paket_keahlian');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $paket_keahlian = PaketKeahlian::findOrFail($request->id);
        $paket_keahlian->delete();
    
        return redirect()->back();
    }
}
