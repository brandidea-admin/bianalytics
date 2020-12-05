<?php

namespace App\Http\Controllers\Lead;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;
use App\Models\Lead;
use App\Models\MasterKeyword;
use GuzzleHttp\Client;

class LeadController extends Controller
{
    public function index()
    {
        $searchlist = Lead::all();
        $kwds = MasterKeyword::select('id', 'keyword')->where(['status' => 'active'])->get()->toArray();
        return view('pages.leads.index', compact('searchlist'))->with('kwds', $kwds);
    }

    public function validemail($id)
    {
        $leadinfo = Lead::select('first_name', 'last_name', 'location')->where(['id' => $id, 'status' => 'active', 'emails' => 'NotValidated'])->get()->toArray();
        $client = new Client();
        $res = $client->request('POST', 'http://localhost:5000/generate_emails', [
            'form_params' => [
                'first_name' => strtolower($leadinfo[0]['first_name']),
                'last_name' => strtolower($leadinfo[0]['last_name']),
                'nick_name' => "",
                'middle_name' => "",
                'domain_name_1' => strtolower($leadinfo[0]['location']),
                'domain_name_2' => "",
                'domain_name_3' => ""
            ]
        ]);

        $response = $res->getBody()->getContents();
        $genresult = json_decode($response,true);

        $validreqid = "";

        foreach($genresult['response'] as $arr3) {
            $validreqid = (int)$arr3;
        }

        //print_r($validreqid);
        //$validreqid = 25873;

        // $response2 = Http::post('http://localhost:3000/validation/results', [
        //         'validation_id' => $validreqid
        // ]);

        // print_r($response2->getBody()->getContents());
        // exit;

        // $client2 = new Client();
        // $res2 = $client2->request('POST', 'http://localhost:3000/validation/results', [
        //     'form_params' => [
        //         'validation_id' => 25873
        //     ]
        // ]);

        // $response2 = $res2->getBody()->getContents();
        // $genresult2 = json_decode($response2,true);

        // print_r($genresult2);
        // exit;

        $model = Lead::find($id);
        $model->email_req_id = $validreqid;
        $model->save();
        $this->status   = true;
        $this->modal = true;
        return redirect('/lead')->with('success', 'Eamil ID Updated Successfully');
    }


    public function validemail2($id)
    {
        //$leadinfo = Lead::select('email_req_id')->where(['id' => $id, 'status' => 'active', 'emails' => 'NotValidated'])->get()->toArray();
        $leadinfo = Lead::select('email_req_id')->where(['id' => $id, 'status' => 'active'])->get()->toArray();

        $validreqid = $leadinfo[0]['email_req_id'];

        $response2 = Http::post('http://localhost:5000/validation/results', [
                'validation_id' => $validreqid
        ]);

        $validemails = json_decode($response2->getBody()->getContents(), true);
        //print_r($validemails);
        //exit;
        $allvalids = "";
        foreach($validemails as $valmail) {
            //echo $valmail['email_address'] . "</br></br>";
            $allvalids .= $valmail['email_address'] . ", ";
        }
        //echo $allvalids;
        //exit;

        $model = Lead::find($id);
        $model->emails = $allvalids;
        $model->save();
        $this->status   = true;
        $this->modal = true;
        return redirect('/lead')->with('success', 'Eamil ID Updated Successfully');
    }

    public function viewnews(Request $request, $id)
    {
        $model = Lead::find($id);
        $model->keyword = $request->kwdid1 . "," .  $request->kwdid2 . "," .  $request->kwdid3;
        $model->save();
        $this->status   = true;
        $this->modal = true;
        $kwds = MasterKeyword::select('id', 'keyword')->where(['status' => 'active'])->get()->toArray();
        $kids = Lead::select('keyword')->where(['status' => 'active', 'id' => $id])->get()->toArray();
        $selkid = explode(",", $kids[0]['keyword']);
        foreach ($kwds as $kk) {
            $keywords[$kk['id']] = $kk['keyword'];
        }
        foreach ($selkid as $cc => $kk) {
            $kwd3 = "kwd5{$cc}";
            $$kwd3 = $keywords[$kk];
        }
        $client = new Client();
        $res = $client->request('POST', 'http://localhost:5000/news/everything', [
            'form_params' => [
                'sources' => "",
                'keyword_1' => $kwd50,
                'from_date' => "",
                'to_date' => "",
                'language' => "en",
                'domains' => "",
                'sortBy' => ""
            ]
        ]);
        $response = $res->getBody()->getContents();
        $result0 = json_decode($response);
        $res = $client->request('POST', 'http://localhost:5000/news/everything', [
            'form_params' => [
                'sources' => "",
                'keyword_1' => $kwd51,
                'from_date' => "",
                'to_date' => "",
                'language' => "en",
                'domains' => "",
                'sortBy' => ""
            ]
        ]);
        $response = $res->getBody()->getContents();
        $result1 = json_decode($response);
        $res = $client->request('POST', 'http://localhost:5000/news/everything', [
            'form_params' => [
                'sources' => "",
                'keyword_1' => $kwd52,
                'from_date' => "",
                'to_date' => "",
                'language' => "en",
                'domains' => "",
                'sortBy' => ""
            ]
        ]);
        $response = $res->getBody()->getContents();
        $result2 = json_decode($response);
        $htmlstr = "";
        $htmlstr = "<table style='border:solid 1px #888; font-size:12px;'>";
        $htmlstr .= "<tr><th style='background-color:#F4F6F6; text-align:center;'><b>" . strtoupper($kwd50) . "</b></th></tr>";
        foreach ($result0->articles as $article) {
            $htmlstr .= "<tr><td>";
            $htmlstr .= "<b>Title : </b>" . $article->title . "</br>";
            $htmlstr .= "<b>Author : </b>" . $article->author . "</br>";
            $htmlstr .= "<b>Content : </b>" . $article->content . "</br>";
            $htmlstr .= "<b>URL : </b><a href='" . $article->url . "' target='_blank'>" . substr($article->url, 0, 30) . "</a></b>";
            $htmlstr .= "</td></tr><tr><td><hr></td></tr>";
        }
        $htmlstr .= "<tr><th style='background-color:#F4F6F6; text-align:center;'><b>" . strtoupper($kwd51) . "</b></th></tr>";
        foreach ($result1->articles as $article) {
            $htmlstr .= "<tr><td>";
            $htmlstr .= "<b>Title : </b>" . $article->title . "</br>";
            $htmlstr .= "<b>Author : </b>" . $article->author . "</br>";
            $htmlstr .= "<b>Content : </b>" . $article->content . "</br>";
            $htmlstr .= "<b>URL : </b><a href='" . $article->url . "' target='_blank'>" . substr($article->url, 0, 30) . "</a></b>";
            $htmlstr .= "</td></tr><tr><td><hr></td></tr>";
        }
        $htmlstr .= "<tr><th style='background-color:#F4F6F6; text-align:center;'><b>" . strtoupper($kwd52) . "</b></th></tr>";
        foreach ($result2->articles as $article) {
            $htmlstr .= "<tr><td>";
            $htmlstr .= "<b>Title : </b>" . $article->title . "</br>";
            $htmlstr .= "<b>Author : </b>" . $article->author . "</br>";
            $htmlstr .= "<b>Content : </b>" . $article->content . "</br>";
            $htmlstr .= "<b>URL : </b><a href='" . $article->url . "' target='_blank'>" . substr($article->url, 0, 30) . "</a></b>";
            $htmlstr .= "</td></tr><tr><td><hr></td></tr>";
        }
        $htmlstr .= "</table>";
        return $htmlstr;
        exit;
    }

    public function getnews(Request $request, $id)
    {
        $model = Lead::find($id);
        $model->keyword = $request->kwdid1 . "," .  $request->kwdid2 . "," .  $request->kwdid3;
        $model->save();
        $this->status   = true;
        $this->modal = true;
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function show(Lead $lead)
    {
    }

    public function edit(Lead $lead)
    {
    }

    public function update(Request $request, Lead $lead)
    {
    }

    public function destroy($id)
    {
        $coronacase = Lead::findOrFail($id);
        $coronacase->delete();
        return redirect('/lead')->with('success', 'Record Successfully Deleted');
    }
}
