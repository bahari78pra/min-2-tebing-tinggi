<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Session;
use App\Http\Controllers\Controller;
use App\Models\Slideshow;
use Illuminate\Support\Facades\File;

class SlideshowController extends Controller
{
    /**
     * Display all slideshow data
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keywords = $request->q;
        $slideshows = Slideshow::orderBy('id', 'desc');
        if (!empty($keywords)) {
            $slideshows->where('title', 'LIKE', '%' . $keywords . '%');
        }
        $slideshows = $slideshows->paginate(10);
        $skipped = $slideshows->currentPage() * $slideshows->perPage() - $slideshows->perPage();
        return view('app.admin.slideshow.index')
            ->with('keywords', $keywords)
            ->with('skipped', $skipped)
            ->with('slideshows', $slideshows);
    }

    /**
     * Show the form for creating new profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.admin.slideshow.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $file_name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = 'images';
            $image->move($destinationPath, $file_name);
        } else {
            $file_name = '';
        }

        Slideshow::create([
            'title' => $request->title,
            'detail' => $request->detail,
            'status' => $request->status == "on",
            'image' => $file_name
        ]);

        //session flash for message
        Session::flash('flash_message', 'successfully saved.');

        return redirect()->route('admin.slideshow');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Slideshow $slideshow)
    {
        return view('app.admin.slideshow.edit')
            ->with('slideshow', $slideshow);
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
        $slideshow = Slideshow::findOrFail($request->id);

        if ($request->hasFile('image')) {
            if (File::exists("images/" . $slideshow->image)) {
                File::delete("images/" . $slideshow->image);
            }
            $image = $request->file('image');
            $file_name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = 'images';
            $image->move($destinationPath, $file_name);

            $slideshow->update([
                'title' => $request->title,
                'detail' => $request->detail,
                'status' => $request->status == "on",
                'image' => $file_name
            ]);
        } else {
            $file_name = '';
            $slideshow->update([
                'title' => $request->title,
                'detail' => $request->detail,
                'status' => $request->status == "on",
            ]);
        }

        //session flash for message
        Session::flash('flash_message', 'successfully saved.');

        return redirect()->route('admin.slideshow');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $slideshow = Slideshow::findOrFail($request->id);
        if (File::exists("images/" . $slideshow->image)) {
            File::delete("images/" . $slideshow->image);
        }
        $slideshow->delete();

        return redirect()->back();
    }
}
