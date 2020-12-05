<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    public function index()
    {
        $searchlist = Company::all();
        return view('pages.companies.index', compact('searchlist'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
        $lead = Company::findOrFail($id);
        $lead->delete();
        return redirect('/companies')->with('success', 'Record Successfully Deleted');
    }
}
