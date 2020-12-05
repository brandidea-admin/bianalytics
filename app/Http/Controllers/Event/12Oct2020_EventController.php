<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MasterKeyword;
use GuzzleHttp\Client;

class EventController extends Controller
{
    public function index()
    {
        $kwds = MasterKeyword::select('id', 'keyword')->where(['status' => 'active'])->get()->toArray();
        foreach ($kwds as $kk) {
            $keywords[$kk['id']] = $kk['keyword'];
        }
        $client = new Client();
        foreach ($keywords as $kid => $kwds) {
            $res = $client->request('POST', 'http://localhost:5000/news/top_headlines', [
                'form_params' => [
                    'sources' => "",
                    'keyword_1' => $kwds,
                    'category' => "",
                    'language' => "en",
                    'country' => ""
                ]
            ]);
            $response = $res->getBody()->getContents();
            $conts[$kid] = json_decode($response);
        }
        return view('pages.events.index')->with('conts', $conts)->with('kwds', $keywords);
    }

    public function viewnews($id)
    {
        $kwds = MasterKeyword::select('id', 'keyword')->where(['status' => 'active', 'id' => $id])->get()->toArray();
        foreach ($kwds as $kk) {
            $keywords[$kk['id']] = $kk['keyword'];
        }
        $client = new Client();
        foreach ($keywords as $kid => $kwds) {
            $res = $client->request('POST', 'http://localhost:5000/news/top_headlines', [
                'form_params' => [
                    'sources' => "",
                    'keyword_1' => $kwds,
                    'category' => "",
                    'language' => "en",
                    'country' => ""
                ]
            ]);
            $response = $res->getBody()->getContents();
            $conts2[$kid] = json_decode($response);
            $totRes = $conts2[$kid]->totalResults;
            if ($totRes > 0) {
                $str1 = "";
                $str1 .= "<table class='table table-hover table-bordered mb-0'><thead><tr><th>Source</th><th>Author</th><th>Title</th><th>Description</th><th>URL</th><th>url to Image</th><th>publishedAt</th>
                <th>content</th><th>Action</th></tr></thead><tbody>";
                foreach ($conts2[$kid]->articles as $slist) {
                    $str1 .= '<tr>';
                    $str1 .= '<td title="' . $slist->source->id . ', ' . $slist->source->name . '">' . substr($slist->source->id, 0, 10) . '</td>';
                    $str1 .= '<td title="' . $slist->author . '">' . substr($slist->author, 0, 10) . '</td>';
                    $str1 .= '<td title="' . $slist->title . '">' . substr($slist->title, 0, 10) . '</td>';
                    $str1 .= '<td title="' . $slist->description . '">' . substr($slist->description, 0, 10) . '</td>';
                    $str1 .= '<td><a href="' . $slist->url . '" taraget="_blank">' . substr($slist->url, 0, 10) . '</a></td>';
                    $str1 .= '<td><a href="' . $slist->urlToImage . '" taraget="_blank">' . substr($slist->urlToImage, 0, 10) . '</a></td>';
                    $str1 .= '<td title="' . $slist->publishedAt . '">' . substr($slist->publishedAt, 0, 10) . '</td>';
                    $str1 .= '<td title="' . $slist->content . '">' . substr($slist->content, 0, 20) . '</td>';
                    $str1 .= '<td></td>';
                    $str1 .= '</tr>';
                }
                $str1 .= "</tbody></table>";
                return $str1;
            }
        }
    }

    public function create()
    {
    }

    public function store(Request $request, $id)
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
    }
}
