<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use DB;

class ChartController extends Controller
{
    public function index()
    {
        $users['Jan'] = 50;
        $users['Feb'] = 60;
        $users['Mar'] = 80;
        $users['Apr'] = 30;
        $users['May'] = 10;
        $users['Jun'] = 70;
       return view('chart', compact('users'));
    }

    public function viewchart(Request $request, $id)
    {
        // echo $request->chtype;
        // echo "</br>";
        // echo $request->module;
        // echo "</br>";
        // echo $id;
        // exit;
        $users[0] = 50;
        $users[1] = 60;
        $users[2] = 80;
        $users[3] = 30;
        $users[4] = 10;
        $users[5] = 70;
       return view('chart', compact('users'))->with('chtype', $request->chtype);
    }
}