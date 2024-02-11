<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\Models\Portal;

class PortalController extends Controller
{
    public function index(Request $request)
    {
        $keywords = $request->q;
        $portal = Portal::orderBy('id', 'asc');
        if (!empty($keywords)) {
            $portal->where('judul', 'LIKE', '%' . $keywords . '%');
        }
        $portal = $portal->paginate(10);
        $skipped = $portal->currentPage() * $portal->perPage() - $portal->perPage();
        return view('app.admin.portal.index')
            ->with('keywords', $keywords)
            ->with('skipped', $skipped)
            ->with('portal', $portal);
    }

    /**
     * Show the form for creating new profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.admin.portal.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Portal::create([
            'judul' => $request->judul,
            'url' => $request->url
        ]);

        //session flash for message
        Session::flash('flash_message', 'successfully saved.');

        return redirect()->route('admin.portal');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Portal $portal)
    {
        return view('app.admin.portal.edit')
            ->with('portal', $portal);
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
        $portal = Portal::findOrFail($request->id);

        $portal->update([
            'judul' => $request->judul,
            'url' => $request->url,
        ]);


        //session flash for message
        Session::flash('flash_message', 'successfully saved.');

        return redirect()->route('admin.portal');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $portal = Portal::findOrFail($request->id);
        $portal->delete();

        return redirect()->back();
    }
}
