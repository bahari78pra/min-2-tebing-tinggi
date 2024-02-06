<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Session;
use App\Http\Controllers\Controller;
// use App\Models\{Bdt2, Kks, Pkh, Submission, Complaint};
use App\Models\{Bdt2, Kks, Submission, Complaint};
use Carbon\Carbon;
class DashboardController extends Controller
{
    public function index(){
    	return view('app.admin.dashboard');
    }
}
