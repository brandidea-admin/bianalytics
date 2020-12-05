<?php

namespace App\Http\Controllers\News_read;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\NewsRead;

class NewsReadController extends Controller
{
    public function index()
    {
        $searchlist = NewsRead::all();
        return view('pages.news_read.index', compact('searchlist'));
    }

    public function create()
    {
        return view('pages.news_read.create');
    }

    public function gennews($id)
    {
        $nsrd = NewsRead::find($id);
        $data2 = $id . "~~~" . $nsrd->news_type;
        return view('pages.news_read.gennews')->with('data2', $data2);
    }

    public function store(Request $request)
    {
        $validations = [
            'newsread_name' => ['required'],
            'news_type' => ['required'],
            'keywords' => ['required'],
        ];
        $newsread = new NewsRead();
        $newsread->newsread_name = $request->newsread_name;
        $newsread->news_type = $request->news_type;
        $temp = json_encode($request->news_source_from);
        $newsread->news_source_from = implode(',', json_decode($temp, true));
        $newsread->keywords = $request->keywords;
        $newsread->category = $request->category;
        $newsread->language = $request->language;
        $newsread->country = $request->country;
        $newsread->domain_name = $request->domain_name;
        $newsread->company = $request->company;
        $newsread->sort_by = $request->sort_by;
        $newsread->from_date = $request->from_date;
        $newsread->to_date = $request->to_date;
        $newsread->page = $request->page;
        $newsread->created_by = 1;
        $newsread->updated_by = 1;
        $newsread->save();
        $this->status = true;
        $this->modal = true;
        $this->message = "News Read Added Successfully!";
        return redirect()->route('news_read.index')->with('success', 'News Read Created successfully');
    }

    public function show(NewsRead $newsRead)
    {
    }

    public function edit($id)
    {
        $data1 = NewsRead::find($id);
        return View::make('pages.news_read.edit')->with('posts', $data1);
    }

    public function update(Request $request, $id)
    {
        $request->validate([]);
        $newsread = NewsRead::find($id);
        $newsread->newsread_name = $request->newsread_name;
        $newsread->news_type = $request->news_type;
        $temp = json_encode($request->news_source_from);
        $newsread->news_source_from = implode(',', json_decode($temp, true));
        $newsread->keywords = $request->keywords;
        $newsread->category = $request->category;
        $newsread->language = $request->language;
        $newsread->country = $request->country;
        $newsread->domain_name = $request->domain_name;
        $newsread->company = $request->company;
        $newsread->sort_by = $request->sort_by;
        $newsread->from_date = $request->from_date;
        $newsread->to_date = $request->to_date;
        $newsread->page = $request->page;
        $newsread->created_by = 1;
        $newsread->updated_by = 1;
        $newsread['updated_at'] = now();
        $this->status   = true;
        $this->modal = true;
        $newsread->save();
        return redirect()->route('news_read.index')->with('success', 'News Read updated successfully');
    }

    public function destroy(Request $request, $id)
    {
        $task = NewsRead::findOrFail($id);
        $task->delete();
        return redirect()->route('news_read.index')->with('success', 'News Read Deleted successfully');
    }
}
