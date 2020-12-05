<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

Route::get('/', function () {
    return view('dashboard');
});

Route::resource('search_list', 'Search_list\SearchListController');
Route::get('/search_list/{id}/genlinks', 'Search_list\SearchListController@genlinks');
Route::post('/search_list/{id}/addleadinfo', 'Search_list\SearchListController@addleadinfo');
Route::post('/search_list/{id}/gensearchlinks', 'Search_list\SearchListController@gensearchlinks');

Route::resource('master_keyword', 'MasterKeywordController');
Route::resource('country', 'Country\CountryController');

Route::resource('lead', 'Lead\LeadController');
Route::get('/lead/{id}/validemail', 'Lead\LeadController@validemail');
Route::get('/lead/{id}/validemail2', 'Lead\LeadController@validemail2');
Route::post('/lead/{id}/getnews', 'Lead\LeadController@getnews');
Route::post('/lead/{id}/viewnews', 'Lead\LeadController@viewnews');

Route::resource('companies', 'Company\CompanyController');

Route::resource('events', 'Event\EventController');
Route::post('/events/{id}/viewnews', 'Event\EventController@viewnews');


Route::resource('api', 'Api\ApiController');


Route::group(['prefix' => 'auth'], function () {
    Route::get('login', function () {
        return view('pages.auth.login');
    });
    Route::get('register', function () {
        return view('pages.auth.register');
    });
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
