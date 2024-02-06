<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Session;
use App\Http\Controllers\Controller;
use App\Models\Download;

class DownloadController extends Controller
{
    /**
     * Display all download data
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keywords=$request->q;
        $downloads = Download::orderBy('judul','asc');
        if (!empty($keywords)){
            $downloads->where('judul','LIKE','%'.$keywords.'%');
        }
        $downloads=$downloads->paginate(10);
        $skipped = $downloads->currentPage() *$downloads->perPage() -$downloads->perPage();
        return view('app.admin.download.index')
                    ->with('keywords',$keywords)
                    ->with('skipped',$skipped)
                    ->with('downloads', $downloads);
    }

    /**
     * Show the form for creating new profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.admin.download.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $name = $file->getClientOriginalName();
            $destinationPath = 'file-downloads';
            $file->move($destinationPath, $name);
        }
        else{
            $name ='';
        }

        Download::create([
            'judul' => $request->title,
            'file' => $name
        ]);

        //session flash for message
        Session::flash('flash_message','successfully saved.');

        return redirect()->route('admin.download');

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Download $download)
    {
        return view('app.admin.download.edit')   
                    ->with('download', $download); 
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
        $download = Download::findOrFail($request->id);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $name = $file->getClientOriginalName();
            $destinationPath = 'file-downloads';
            $file->move($destinationPath, $name);

            $download->update([
                'judul' => $request->title,
                'file' => $name
            ]);
        
        }
        else{
            $download->update([
                'judul' => $request->title,
            ]);
        }

        //session flash for message
        Session::flash('flash_message','successfully saved.');

        return redirect()->route('admin.download');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $download = Download::findOrFail($request->id);
        $download->delete();
    
        return redirect()->back();
    }
}
