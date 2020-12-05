<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Request;

use Illuminate\Support\Facades\Auth;

// Route::get('/', function () {
//     return view('dashboard');
// });


Route::get('/', function () {
    return view('pages.auth.login');
});



Route::post('logincheck', function() {

    $rules = array (
        'email' => 'required|max:25',
        'password' => 'required|max:25',
    );

    $v = Validator::make(Request::all(), $rules);


    if ($v->fails()) {
        Request::flash ("Unauthorized Acesss !!!!");
        return Redirect::to('/auth/login')->withErrors($v->messages());
    } else {
        $userdata = array (
            'email' => Request::get('email'),
            'password' => Request::get('password')
        );

        If (Auth::attempt($userdata)) {
            return Redirect::to('/dashboard');
        } else {
            return Redirect::to('/auth/login')->withErrors('Incorrect login details');
        }
    }

});


Route::get ('logout',function(){
    Auth::logout();
    return Redirect::to('/auth/login');
});



    Route::resource('dashboard', 'DashboardController')->middleware('auth3');

    Route::resource('search_list', 'Search_list\SearchListController')->middleware('auth3');
    Route::get('/search_list/{id}/genlinks', 'Search_list\SearchListController@genlinks');
    Route::get('/search_list/{id}/genlinks', 'Search_list\SearchListController@genlinks');
    Route::post('/search_list/{id}/addleadinfo', 'Search_list\SearchListController@addleadinfo');
    Route::get('/search_list/{id}/exportcsv', 'Search_list\SearchListController@exportcsv');

    Route::resource('master_keyword', 'MasterKeywordController')->middleware('auth3');
    Route::resource('country', 'Country\CountryController')->middleware('auth3');

    Route::resource('lead', 'Lead\LeadController')->middleware('auth3');
    Route::get('/lead/{id}/validemail', 'Lead\LeadController@validemail');
    Route::get('/lead/{id}/validemail2', 'Lead\LeadController@validemail2');
    Route::post('/lead/{id}/getnews', 'Lead\LeadController@getnews');
    Route::post('/lead/{id}/viewnews', 'Lead\LeadController@viewnews');

    Route::resource('companies', 'Company\CompanyController')->middleware('auth3');

    Route::resource('events', 'Event\EventController')->middleware('auth3');
    Route::post('/events/{id}/viewnews', 'Event\EventController@viewnews');


    Route::resource('user', 'User\UserController');
    Route::post('/user/setpasswd', 'User\UserController@setpasswd');
    Route::post('/user/register', 'User\UserController@register');
    Route::get('/user/{id}/changepwd', 'User\UserController@changepwd')->middleware('auth3');
    Route::post('/user/resetpwd', 'User\UserController@resetpwd')->middleware('auth3');
    Route::post('/user/updatepwd', 'User\UserController@updatepwd')->middleware('auth3');


Route::group(['prefix' => 'auth'], function(){
    Route::get('login', function () { return view('pages.auth.login'); });
    Route::get('register', function () { return view('pages.auth.register'); });
    Route::get('setpasswd', function () { return view('pages.auth.setpasswd'); });

});

Route::group(['prefix' => 'error'], function () {
    Route::get('404', function () {
        return view('pages.error.404');
    });
    Route::get('500', function () {
        return view('pages.error.500');
    });
});

Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

// 404 for undefined routes
Route::any('/{page?}', function () {
    return view('pages.error.404');
})->where('page', '.*');
