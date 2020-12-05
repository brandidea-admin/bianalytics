<?php

namespace App\Http\Controllers;

use App\Models\MasterKeyword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use DB;

class MasterKeywordController extends Controller
{
    public function index()
    {
        $searchlist = MasterKeyword::all();
        return view('pages.master_keyword.index', compact('searchlist'));
    }

    public function create()
    {
        return view('pages.master_keyword.create');
    }

    public function store(Request $request)
    {
        $validations = [
            'keyword' => ['required'],
        ];
        $validator = Validator::make($request->all(), $validations, []);
        if ($validator->fails()) {
            $this->message = $validator->errors();
        } else {
            $keyword = new MasterKeyword();
            $keyword->keyword = $request->keyword;
            $keyword->remarks = "";
            $keyword->save();
            $this->status = true;
            $this->modal = true;
            $this->message = "Search List Added Successfully!";
        }
        return redirect()->route('master_keyword.index')->with('success', 'Search List Created successfully');
    }

    public function show(MasterKeyword $masterKeyword)
    {
    }

    public function edit(MasterKeyword $masterKeyword)
    {
    }

    public function update(Request $request, MasterKeyword $masterKeyword)
    {
    }

    public function destroy($id)
    {
        MasterKeyword::where('id', $id)->firstorfail()->delete();
        return redirect()->route('master_keyword.index');
    }
}
