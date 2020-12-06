<?php

namespace App\Http\Controllers;

use App\Models\MasterKeyword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\User;
use DB;

class DashboardController extends Controller
{
    public function index()
    {
        $stat = auth()->user()->status;
        if($stat == 'Active') {
        	return view('pages.dashboard');
        } else {
        	return Redirect::to('/auth/login')->with('message',"Get approval from Admin Team from Simreka !!! Thank You");
        }
        
    }

}
