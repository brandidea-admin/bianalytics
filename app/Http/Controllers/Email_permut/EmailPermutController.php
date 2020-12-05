<?php

namespace App\Http\Controllers\Email_permut;

use Tintnaingwin\EmailChecker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\EmailPermutat;

class EmailPermutController extends Controller
{
    public function index()
    {
        $searchlist = EmailPermutat::all();
        return view('pages.email_permut.index', compact('searchlist'));
    }

    public function genpermut($id)
    {
        return view('pages.email_permut.genpermut')->with('id', $id);
    }

    public function edit($id)
    {
        $data1 = EmailPermutat::find($id);
        return View::make('pages.email_permut.edit')->with('posts', $data1);
    }

    public function update(Request $request, $id)
    {
        $request->validate([]);
        $emailperm = EmailPermutat::find($id);
        $emailperm->emailpermut_name = $request->emailpermut_name;
        $emailperm->first_name = $request->first_name;
        $emailperm->last_name = $request->last_name;
        $emailperm->domain_name = $request->domain_name;
        $emailperm->nick_name = $request->nick_name;
        $emailperm->middle_name = $request->middle_name;
        $emailperm->comments = $request->comments;
        $emailperm->created_by = 1;
        $emailperm->updated_by = 1;
        $emailperm['updated_at'] = now();
        $this->status = true;
        $this->modal = true;
        $emailperm->save();
        return redirect()->route('email_permut.index')->with('success', 'Email Permutation updated successfully');
    }

    public function destroy(EmailPermutat $emailPermutat, $id)
    {
        $task = EmailPermutat::findOrFail($id);
        $task->delete();
        return redirect()->route('email_permut.index')->with('success', 'Email Permutation Deleted successfully');
    }
}
