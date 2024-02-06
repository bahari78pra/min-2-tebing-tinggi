<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Session;
use App\Http\Controllers\Controller;
use App\Models\FileManager;
use File;


class FileManagerController extends Controller
{
    /**
     * Display all file-manager data
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keywords = $request->q;
        $file_managers = FileManager::orderBy('id', 'desc');
        if (!empty($keywords)) {
            $file_managers->where('name', 'LIKE', '%' . $keywords . '%');
        }
        $file_managers = $file_managers->paginate(30);
        $skipped = $file_managers->currentPage() * $file_managers->perPage() - $file_managers->perPage();
        return view('app.admin.file-manager.index')
            ->with('keywords', $keywords)
            ->with('skipped', $skipped)
            ->with('file_managers', $file_managers);
    }

    /**
     * Show the form for creating new profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.admin.file-manager.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->image->getSize());

        $image = $request->file('image');
        $file_name = $image->getClientOriginalName();
        $file_size = $image->getSize();
        $file_type = $image->getClientOriginalExtension();
        $destinationPath = 'file-manager';
        $image->move($destinationPath, $file_name);

        FileManager::create([
            'name' => $file_name,
            'size' => $file_size,
            'type' => $file_type,
        ]);

        //session flash for message
        Session::flash('flash_message', 'successfully saved.');

        return redirect()->route('admin.file-manager');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $file_manager = FileManager::findOrFail($request->id);
        if (File::exists(public_path('file-manager/' . $file_manager->name))) {
            File::delete(public_path('file-manager/' . $file_manager->name));
        }
        $file_manager->delete();

        return redirect()->back();
    }

    public function download(Request $request)
    {
        return response()->download(public_path('file-manager/' . $request->file));
    }
}
