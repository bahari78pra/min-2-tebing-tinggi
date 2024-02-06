<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Session;
use App\Http\Controllers\Controller;
use App\Models\Staff;

class StaffController extends Controller
{
    /**
     * Display all staff data
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keywords = $request->q;
        $staff = Staff::orderBy('nama', 'asc');
        if (!empty($keywords)) {
            $staff->where('nama', 'LIKE', '%' . $keywords . '%');
        }
        $staff = $staff->paginate(10);
        $skipped = $staff->currentPage() * $staff->perPage() - $staff->perPage();
        return view('app.admin.staff.index')
            ->with('keywords', $keywords)
            ->with('skipped', $skipped)
            ->with('staff', $staff);
    }

    /**
     * Show the form for creating new staff.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.admin.staff.create');
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

        Staff::create([
            'nama' => $request->nama,
            'nip' => $request->nip,
            'tpt_lahir' => $request->tpt_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'agama' => $request->agama,
            'pendidikan_akhir' => $request->pendidikan_akhir,
            'jabatan' => $request->jabatan,
            'image' => $name,
            'no_urut_tampil' => $request->no_urut_tampil
        ]);

        //session flash for message
        Session::flash('flash_message', 'successfully saved.');
        return redirect()->route('admin.staff');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Staff $staff)
    {
        return view('app.admin.staff.edit')
            ->with('staff', $staff);
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
        $staff = Staff::findOrFail($request->id);
        // $this->validate($request, [
        // 'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5000',
        // ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = 'images';
            $image->move($destinationPath, $name);

            $staff->update([
                'nama' => $request->nama,
                'nip' => $request->nip,
                'tpt_lahir' => $request->tpt_lahir,
                'tgl_lahir' => $request->tgl_lahir,
                'agama' => $request->agama,
                'pendidikan_akhir' => $request->pendidikan_akhir,
                'jabatan' => $request->jabatan,
                'image' => $name,
                'no_urut_tampil' => $request->no_urut_tampil
            ]);
        } else {
            $staff->update([
                'nama' => $request->nama,
                'nip' => $request->nip,
                'tpt_lahir' => $request->tpt_lahir,
                'tgl_lahir' => $request->tgl_lahir,
                'agama' => $request->agama,
                'pendidikan_akhir' => $request->pendidikan_akhir,
                'jabatan' => $request->jabatan,
                'no_urut_tampil' => $request->no_urut_tampil
            ]);
        }

        //session flash for message
        Session::flash('flash_message', 'successfully saved.');

        return redirect()->route('admin.staff');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $staff = Staff::findOrFail($request->id);
        $staff->delete();

        return redirect()->back();
    }
}
