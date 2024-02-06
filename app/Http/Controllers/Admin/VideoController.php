<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Session;
use App\Http\Controllers\Controller;
use App\Models\Video;

class VideoController extends Controller
{
    /**
     * Display all video data
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keywords=$request->q;
        $videos = Video::orderBy('id','desc');
        if (!empty($keywords)){
            $videos->where('title','LIKE','%'.$keywords.'%');
        }
        $videos=$videos->paginate(10);
        $skipped = $videos->currentPage() *$videos->perPage() -$videos->perPage();
        return view('app.admin.video.index')
                    ->with('keywords',$keywords)
                    ->with('skipped',$skipped)
                    ->with('videos', $videos);
    }

    /**
     * Show the form for creating new video.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.admin.video.create');
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
        'image_cover' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5000',
        ]);

        if ($request->hasFile('image_cover')) {
            $image_cover = $request->file('image_cover');
            $name = "Dinas sosial tebing tinggi - ".time().'.'.$image_cover->getClientOriginalExtension();
            $destinationPath = public_path('images');
            $image_cover->move($destinationPath, $name);
        }
        else{
            $name='';
        }

        Video::create([
            'title' => $request->title,
            'alias' => stripcslashes(str_replace([':', '/', '*',' ','(',')','&','!','@','#','$'], "-", strtolower($request->title))),
            'video_url' => $request->video_url,
            'status' => $request->status=="on"
        ]);

        //session flash for message
        Session::flash('flash_message','successfully saved.');
        return redirect()->route('admin.video');   
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        return view('app.admin.video.edit')   
                    ->with('video', $video); 
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
        $this->validate($request, [
        'image_cover' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5000',
        ]);

        $video = Video::findOrFail($request->id);

        if ($request->hasFile('image_cover')) {
            $image_cover = $request->file('image_cover');
            $name = "Dinas sosial tebing tinggi - ".time().'.'.$image_cover->getClientOriginalExtension();
            $destinationPath = public_path('images');
            $image_cover->move($destinationPath, $name);

            $video->update([
                'title' => $request->title,
                'alias' => stripcslashes(str_replace([':', '/', '*',' ','(',')','&','!','@','#','$'], "-", strtolower($request->title))),
                'video_url' => $request->video_url,
                'status' => $request->status == "on"
            ]);
        }
        else{
             $video->update([
                'title' => $request->title,
                'alias' => stripcslashes(str_replace([':', '/', '*',' ','(',')','&','!','@','#','$'], "-", strtolower($request->title))),
                'video_url' => $request->video_url
            ]);
        }
        
        //session flash for message
        Session::flash('flash_message','successfully saved.');

        return redirect()->route('admin.video');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $video = Video::findOrFail($request->id);
        $video->delete();
    
        return redirect()->back();
    }
}
