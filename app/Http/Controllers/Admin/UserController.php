<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{

	public function index(){
		return view('app.admin.change_password');
	}

	public function savePassword(Request $request){
		$user = User::findOrFail($request->id);

		if(!empty($request->password)){
			$user->update([
				'name' => $request->name,
				'email' => $request->email,
				'password' => Hash::make($request->password)
			]);
		}
		else{
			$user->update([
				'name' => $request->name,
				'email' => $request->email
			]);
		}

		//session flash for message
        Session::flash('flash_message','successfully saved.');

		return redirect()->route('admin.change-password');
	}


    
}
