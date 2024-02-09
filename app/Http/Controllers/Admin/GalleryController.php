<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Gallery};
use Session;
use Intervention\Image\ImageManagerStatic as Image;
use File;

class GalleryController extends Controller
{
    /**
     * Display all file-manager data
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keywords = $request->q;
        $galleries = Gallery::orderBy('id', 'desc');
        if (!empty($keywords)) {
            $galleries->where('title', 'LIKE', '%' . $keywords . '%');
        }
        $galleries = $galleries->paginate(30);
        $skipped = $galleries->currentPage() * $galleries->perPage() - $galleries->perPage();
        return view('app.admin.gallery.index')
            ->with('keywords', $keywords)
            ->with('skipped', $skipped)
            ->with('galleries', $galleries);
    }

    /**
     * Show the form for creating new profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.admin.gallery.create');
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
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg,JPG',
        ]);
        $image = $request->file('image');

        $file_name = $image->getClientOriginalName();
        $file_size = $image->getSize();
        $file_type = $image->getClientOriginalExtension();


        $destinationPath = 'images';
        $image->move($destinationPath, $file_name);

        $image_resize = Image::make('images/' . $file_name);

        // resize the image to a width of 800 and constrain aspect ratio (auto height)
        $image_resize->resize(800, null, function ($constraint) {
            $constraint->aspectRatio();
        });


        $image_resize->save('images/resize/' . $file_name);

        //dd($request->all());
        Gallery::create([
            'title' => $request->title,
            'image' => $file_name,
            'size' => $file_size,
            'type' => $file_type,
            'jenis' => $request->jenis
        ]);

        //session flash for message
        Session::flash('flash_message', 'successfully saved.');

        return redirect()->route('admin.gallery');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $file_manager = Gallery::findOrFail($request->id);
        if (File::exists(public_path('images/' . $file_manager->image))) {
            File::delete(public_path('images/' . $file_manager->image));
        }
        $file_manager->delete();

        return redirect()->back();
    }

    public function download(Request $request)
    {
        return response()->download(public_path('images/' . $request->file));
    }
}
