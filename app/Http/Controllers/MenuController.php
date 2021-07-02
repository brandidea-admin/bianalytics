<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
// use Illuminate\Support\Facades\Redirect;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
// use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\File;
use App\Menu;
use DataTables;

class MenuController extends Controller
{
    //
    public function index()
    {
        return view('showmenu');
    }


    public function create()
    {
        $searchlist = Menu::all();
        return view('pages.menus.create', compact('searchlist'));
    }

    
    public function store(Request $request)
    {
        // echo "<pre>";
        // print_r($request->all());
        // exit;
        $validations = [
            'menu_name' => ['required'],
            'parent_id' => ['required'],
            'stat' => ['required']
        ];

        $refid = Menu::max('refid');
        //echo $refid;
        $newrefid = $refid+1;
        //exit;

        $validator = Validator::make($request->all(), $validations, []);
        if ($validator->fails()) {
            $this->message = $validator->errors();
        } else {
            $searchlist = new Menu();
            $searchlist->menu_name = $request->menu_name;
            $searchlist->refid = $newrefid;
            $searchlist->parent_id = $request->parent_id;
            $searchlist->order_fld = $request->order_fld;
            $searchlist->stat = $request->stat;
            // $searchlist->refid = $request->refid;
            // $searchlist->refid = $request->refid;

            // $searchlist->created_by = 1;
            // $searchlist->updated_by = 1;
            $searchlist->save();
            // $this->status = true;
            // $this->modal = true;
            $this->message = "New Menu Added Successfully!";
        }

        return redirect()->route('menus.index')->with('success', 'New Menu Created successfully');
    }

    public function edit($id)
    {
        // echo $id . " <<<==== ";
        $data1 = Menu::find($id);
        // print_r($data1);
        // exit;
        // $data['country_sites'] = Menu::select('id', 'country_name', 'country_site')->where(['status' => 'active'])->get();
        return View::make('pages.menus.edit')->with('menus', $data1);
    }

    public function update(Request $request, $id)
    {
        $request->validate([]);
        $searchlist = Menu::find($id);
        $searchlist->menu_name = $request->menu_name;
        $searchlist->refid = $request->refid;
        $searchlist->parent_id = $request->parent_id;
        $searchlist->order_fld = $request->order_fld;
        $searchlist->stat = $request->stat;
        // $searchlist['created_by'] = 1;
        // $searchlist['updated_by'] = 1;
        //  $searchlist['updated_at'] = now();
        $this->status   = true;
        $this->modal = true;
        $searchlist->save();
        return redirect()->route('menus.index')->with('success', 'Menus updated successfully');
    }

    public function destroy($id)
    {
        // Menu::find($id)->delete($id);
        // return View::make('pages.menus.index');
        $res = Menu::where('id',$id)->delete();
        
        //echo $res . " <<<==== ";
        // ///print_r($request);
        //exit;
        // $SearchList = Menu::findOrFail($id);
        // $SearchList->delete();
        
        return redirect('/menus')->with('success', 'Record Successfully Deleted');
    }

    public function getChilds(Request $request)
    {
        $data = Menu::select('id','refid', 'menu_name')->where('parent_id','=',$request['menuid'])->where('stat','=','A')->orderBy('order_fld','ASC')->get();
        return $data;
        // print_r($data);
        // exit;
    }

    public function syncJson(Request $request)
    {
        $data = Menu::select('id','refid', 'menu_name', 'is_child', 'parent_id', 'order_fld')->where('stat','=','A')->get();
        File::put(public_path('/tree-menu/menus_table.json'), json_encode($data));
        return redirect('/menus')->with('success', 'Menu Synch with Json file Successfully');
    }


    public function getMenus(Request $request)
    {
        if ($request->ajax()) {
            //$data = Menu::where('parent_id','=',0)->orderBy('parent_id','ASC')->orderBy('refid','ASC')->orderBy('parent_id','ASC')->get();
            $data = Menu::orderBy('parent_id','ASC')->orderBy('refid','ASC')->orderBy('parent_id','ASC')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="menus/' . $row->id . '/edit" class="btn btn-sm menuid btn-success btn-icon-text"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                  </svg></i></a> &nbsp;&nbsp;&nbsp; <a href="menu/' . $row->id . '/delete" class="btn btn-sm menuid2 btn-danger btn-icon-text" alt="'.$row->refid.'"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                </svg></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
}

