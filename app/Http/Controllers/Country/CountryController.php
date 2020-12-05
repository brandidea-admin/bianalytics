<?php

namespace App\Http\Controllers\Country;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;
use App\Models\Country;

class CountryController extends Controller
{
   
    public function index()
    {
        $data['searchlist'] = Country::get();
        return view('pages.country.index', $data);

    }

    
    public function create()
    {
        $searchlist = Country::all();
        return view('pages.country.create', compact('searchlist'));
    }

    
    public function store(Request $request)
    {
        $validations = [
            'country_name' => ['required'],
            'country_site' => ['required']
        ];
        $validator = Validator::make($request->all(), $validations, []);
        if ($validator->fails()) {
            $this->message = $validator->errors();
        } else {
            $searchlist = new Country();
            $searchlist->country_name = $request->country_name;
            $searchlist->country_site = $request->country_site;

            $searchlist->created_by = 1;
            $searchlist->updated_by = 1;
            $searchlist->save();
            $this->status = true;
            $this->modal = true;
            $this->message = "Search List Added Successfully!";
        }

        return redirect()->route('country.index')->with('success', 'Search List Created successfully');
    }

    
    public function show(Country $country)
    {
        //
    }


    public function edit($id)
    {
        $data1 = Country::find($id);
        return View::make('pages.country.edit')->with('posts', $data1);
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([]);
        $searchlist = Country::find($id);
        $searchlist->country_name = $request->country_name;
        $searchlist->country_site = $request->country_site;
        
        $searchlist['created_by'] = 1;
        $searchlist['updated_by'] = 1;
        $searchlist['updated_at'] = now();
        $this->status   = true;
        $this->modal = true;
        $searchlist->save();
        return redirect()->route('country.index')->with('success', 'Search List updated successfully');
    }

    
    public function destroy($id)
    {
        $SearchList = Country::findOrFail($id);
        $SearchList->delete();
        return redirect('/country')->with('success', 'Record Successfully Deleted');
    }
}
