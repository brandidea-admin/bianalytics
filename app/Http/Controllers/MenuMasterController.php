<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\View;
use App\menu_master;
use Illuminate\Http\Request;
use DB;

class MenuMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $menu_head = array();
        $menu2 = DB::table('167_menu')->select('refid','menu_name')->where([ ['parent_id', '=', 0 ], ['stat', '=', 'A'] ])->get();
        foreach ($menu2 as $value) {
            $menu_head[$value->refid] = addslashes($value->menu_name);
        }
        // echo "<pre>";
        // print_r($menu_head);
        // exit;
        return view('pages.menus.index', compact('menu_head'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\menu_master  $menu_master
     * @return \Illuminate\Http\Response
     */
    public function show(menu_master $menu_master)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\menu_master  $menu_master
     * @return \Illuminate\Http\Response
     */
    public function edit(menu_master $menu_master)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\menu_master  $menu_master
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, menu_master $menu_master)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\menu_master  $menu_master
     * @return \Illuminate\Http\Response
     */
    public function destroy(menu_master $menu_master)
    {
        //
    }
}
