<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Session;
use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Support\Facades\File;

class NewsController extends Controller
{
    /**
     * Display all news data
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keywords = $request->q;
        $news = News::orderBy('id', 'desc');
        if (!empty($keywords)) {
            $news->where('title', 'LIKE', '%' . $keywords . '%');
        }
        $news = $news->paginate(10);
        $skipped = $news->currentPage() * $news->perPage() - $news->perPage();
        return view('app.admin.news.index')
            ->with('keywords', $keywords)
            ->with('skipped', $skipped)
            ->with('news', $news);
    }

    /**
     * Show the form for creating new news.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.admin.news.create');
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

        News::create([
            'title' => $request->title,
            'alias' => stripcslashes(str_replace([':', '/', '*', ' ', '(', ')', '&', '!', '@', '#', '$'], "-", strtolower($request->title))),
            'detail' => $request->detail,
            'status' => $request->status == "on",
            'jenis' => $request->jenis,
            'image' => $name
        ]);

        //session flash for message
        Session::flash('flash_message', 'successfully saved.');
        return redirect()->route('admin.news');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        return view('app.admin.news.edit')
            ->with('news', $news);
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
        $news = News::findOrFail($request->id);


        if ($request->hasFile('image')) {
            if (File::exists("images/" . $news->image)) {
                File::delete("images/" . $news->image);
            }

            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = 'images';
            $image->move($destinationPath, $name);

            $news->update([
                'title' => $request->title,
                'alias' => stripcslashes(str_replace([':', '/', '*', ' ', '(', ')', '&', '!', '@', '#', '$'], "-", strtolower($request->title))),
                'detail' => $request->detail,
                'status' => $request->status == "on",
                'jenis' => $request->jenis,
                'image' => $name
            ]);
        } else {
            $news->update([
                'title' => $request->title,
                'alias' => stripcslashes(str_replace([':', '/', '*', ' ', '(', ')', '&', '!', '@', '#', '$'], "-", strtolower($request->title))),
                'detail' => $request->detail,
                'jenis' => $request->jenis,
                'status' => $request->status == "on"
            ]);
        }

        //session flash for message
        Session::flash('flash_message', 'successfully saved.');

        return redirect()->route('admin.news');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $news = News::findOrFail($request->id);
        if (File::exists("images/" . $news->image)) {
            File::delete("images/" . $news->image);
        }
        $news->delete();

        return redirect()->back();
    }
}
