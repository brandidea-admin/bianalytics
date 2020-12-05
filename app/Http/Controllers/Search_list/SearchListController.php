<?php

namespace App\Http\Controllers\Search_list;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;
use App\Models\SearchList;
use App\Models\Generatedlist;
use App\Models\Company;
use App\Models\Country;
use App\Models\Lead;
use GuzzleHttp\Client;
use File;

class SearchListController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        if($user->type != "Admin") {
            $data['searchlist'] = SearchList::where(['created_by' => $user->id])->orderBy('updated_at','desc')->get();
        } else {
            $data['searchlist'] = SearchList::orderBy('updated_at', 'desc')->get();
        }
        return view('pages.search_list.index', $data);
    }

    public function genlinks($id)
    {
        $data['getlinks'] = Generatedlist::where(['search_id' => $id])->get();
        return view('pages.search_list.genlinks', $data)->with('id', $id);
    }

     public function exportcsv($id)
    {
        $tasks = Generatedlist::select('id', 'full_name', 'designation', 'company', 'linkedin_url')->where(['search_id' => $id, 'status' => 'active'])->get()->toArray();
        // print_r($tasks);
        // exit;

            header( 'Content-Type: application/csv' );
            header( 'Content-Disposition: attachment; filename="searchlinks.csv";' );
            $fp = fopen('php://output', 'w');

            foreach ( $tasks as $value ) {
                fputcsv( $fp, $value , ",");
            }
            fclose($fp);

            exit;

        //return redirect()->route('search_list.index')->with('success', 'Search List Created successfully');

    }

    

    public function gensearchlinks(Request $request, $id)
    {
        $cont1 = Generatedlist::select('id', 'full_name', 'designation', 'company', 'linkedin_url')->where(['search_id' => $id, 'status' => 'active'])->get()->toArray();
        return view('pages.search_list.gensearchlinks')->with('id', $id)->with('cont1', $cont1);
    }

    public function create()
    {
        $data['search_list'] = SearchList::all();
        $data['country_sites'] = Country::select('id', 'country_name', 'country_site')->where(['status' => 'active'])->get();
        return view('pages.search_list.create', $data);
    }

    public function addleadinfo(Request $request, $id)
    {
        $user = auth()->user();

        $model = new Lead();
        $model['first_name'] = str_replace('"', '', $request->fname);
        $model['last_name'] = str_replace('"', '', $request->lname);
        $model['designaion'] = str_replace('"', '', $request->desig);
        $model['company'] = str_replace('"', '', $request->comp);
        $model['location'] = str_replace('"', '', $request->dname);
        $model['emails'] = 'NotValidated';
        $model['created_by'] = $user->id;
        $model['updated_by'] = $user->id;
        $model->save();
        $this->status   = true;
        $this->modal = true;
        $this->message = "Lead Record Added Successfully!";
        $model2 = new Company();
        $model2['company_name'] = str_replace('"', '', $request->comp);
        $model2['address'] = str_replace('"', '', $request->dname);
        $model2['created_by'] = $user->id;
        $model2['updated_by'] = $user->id;
        $model2->save();
        $this->status = true;
        $this->modal = true;
        $this->message = "Company Record Added Successfully!";
        return view('pages.search_list.index')->with('id', $id);
    }

    public function store(Request $request)
    {
        $user = auth()->user();

        $validations = [
            'search_name' => ['required'],
            'country_site' => ['required'],
            'keyword_1' => ['required']
        ];
        $validator = Validator::make($request->all(), $validations, []);
        if ($validator->fails()) {
            $this->message = $validator->errors();
        } else {
            $searchlist = new SearchList();
            $searchlist->search_name = $request->search_name;
            $searchlist->keyword_1 = $request->keyword_1;
            $searchlist->keyword_2 = $request->keyword_2;
            $searchlist->keyword_3 = $request->keyword_3;
            $searchlist->country_site = $request->country_site;
            $searchlist->country = $request->country;
            $searchlist->created_by = $user->id;
            $searchlist->updated_by = $user->id;
            $searchlist->status = 'active';
            $searchlist->save();
            $this->status = true;
            $this->modal = true;
            $this->message = "Search List Added Successfully!";
        }
        $sid = $searchlist->id;
        
        $bepath = config('globals.backend_path');
        $backendpath = $bepath . "search";

        $client = new Client();
        $res = $client->request('POST', $backendpath, [
            'form_params' => [
                'keyword_1' => $request->keyword_1,
                'keyword_2' => $request->keyword_2,
                'keyword_3' => $request->keyword_3,
                'country_site' => $request->country_site
            ]
        ]);
        $response = $res->getBody()->getContents();
        $genresult = json_decode($response);
        $sname = array();
        foreach ($genresult as $values) {
            $sname = explode(" – ",$values->search_title);
            if(count($sname)==1) {
                $sname = explode(" - ",$values->search_title);
            } 
            
            $Genlist = new Generatedlist();
            $Genlist->search_id = $sid;
            $Genlist->full_name = $sname[0];
            if (!isset($sname[1])) {
                $Genlist->designation = "None";
            } else {
                $Genlist->designation = $sname[1];
            }
            if (!isset($sname[2])) {
                $Genlist->company = "None";
            } else {
                $Genlist->company = $sname[2];
            }
            $Genlist->linkedin_url = $values->linkedin_url;
            $Genlist->created_by = $user->id;
            $Genlist->updated_by = $user->id;
            $Genlist->save();
            $this->status = true;
            $this->modal = true;
        }
        return redirect()->route('search_list.index')->with('success', 'Search List Created successfully');
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
        $data['posts'] = SearchList::find($id);
        $data['country_sites'] = Country::select('id', 'country_name', 'country_site')->where(['status' => 'active'])->get();
        return View::make('pages.search_list.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([]);
        $searchlist = SearchList::find($id);
        $searchlist->search_name = $request->search_name;
        $searchlist->keyword_1 = $request->keyword_1;
        $searchlist->keyword_2 = $request->keyword_2;
        $searchlist->keyword_3 = $request->keyword_3;
        $searchlist->country = $request->country;
        $searchlist->country_site = $request->country_site;
        // $searchlist->key_exclude = $request->key_exclude;
        // $searchlist->in_title = $request->in_title;
        // $searchlist->in_url = $request->in_url;
        // $searchlist->company = $request->company;
        // $searchlist->alert_email = $request->alert_email;
        // $searchlist->frequency = $request->frequency;
        // $searchlist->comments = $request->comments;
        $searchlist['created_by'] = 1;
        $searchlist['updated_by'] = 1;
        $searchlist['updated_at'] = now();
        $this->status   = true;
        $this->modal = true;
        $searchlist->save();
        return redirect()->route('search_list.index')->with('success', 'Search List updated successfully');
    }

    public function destroy($id)
    {
        $SearchList = SearchList::findOrFail($id);
        $SearchList->delete();
        return redirect('/search_list')->with('success', 'Record Successfully Deleted');
    }
}

