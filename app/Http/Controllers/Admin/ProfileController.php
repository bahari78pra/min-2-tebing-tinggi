<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Session;
use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    /**
     * Display all profile data
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keywords = $request->q;
        $profiles = Profile::orderBy('judul', 'asc');
        if (!empty($keywords)) {
            $profiles->where('judul', 'LIKE', '%' . $keywords . '%');
        }
        $profiles = $profiles->paginate(10);
        $skipped = $profiles->currentPage() * $profiles->perPage() - $profiles->perPage();
        return view('app.admin.profile.index')
            ->with('keywords', $keywords)
            ->with('skipped', $skipped)
            ->with('profiles', $profiles);
    }

    /**
     * Show the form for creating new profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.admin.profile.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5000',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = 'images';
            $image->move($destinationPath, $name);
        } else {
            $name = '';
        }

        Profile::create([
            'judul' => $request->judul,
            'alias' => stripcslashes(str_replace([':', '/', '*', ' ', '(', ')', '&', '!', '@', '#', '$'], "-", strtolower($request->judul))),
            'detail' => $request->detail,
            'status' => $request->status == "on",
            'gambar' => $name
        ]);

        //session flash for message
        Session::flash('flash_message', 'successfully saved.');

        return redirect()->route('admin.profile');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        return view('app.admin.profile.edit')
            ->with('profile', $profile);
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
        $profile = Profile::findOrFail($request->id);



        if ($request->hasFile('image')) {
            //hapus file gambar sebelumnya
            if (File::exists("images/" . $profile->image)) {
                File::delete("images/" . $profile->image);
            }

            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = 'images';
            $image->move($destinationPath, $name);

            $profile->update([
                'judul' => $request->judul,
                'alias' => stripcslashes(str_replace([':', '/', '*', ' ', '(', ')', '&', '!', '@', '#', '$'], "-", strtolower($request->judul))),
                'detail' => $request->detail,
                'status' => $request->status == "on",
                'gambar' => $name
            ]);
        } else {
            $profile->update([
                'judul' => $request->judul,
                'alias' => stripcslashes(str_replace([':', '/', '*', ' ', '(', ')', '&', '!', '@', '#', '$'], "-", strtolower($request->judul))),
                'detail' => $request->detail,
                'status' => $request->status == "on"
            ]);
        }

        //session flash for message
        Session::flash('flash_message', 'successfully saved.');

        return redirect()->route('admin.profile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $profile = Profile::findOrFail($request->id);
        if (File::exists("images/" . $profile->image)) {
            File::delete("images/" . $profile->image);
        }
        $profile->delete();

        return redirect()->back();
    }
}
