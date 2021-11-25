<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// use Illuminate\Routing\Route;

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'AdvertisementController@index')->middleware('auth');

Route::prefix('languages')->group(function ()
{
    Route::get('/', 'AdvertisementController@index');
    Route::get('show', 'AdvertisementController@show');
    Route::get('create', 'AdvertisementController@create');
    Route::post('store', 'AdvertisementController@store');
    Route::post('get', 'AdvertisementController@get');
});

Route::prefix('boards')->group(function ()
{
    Route::get('/','BoardController@index');
    Route::get('create','BoardController@create');
    Route::post('store','BoardController@store');
    Route::delete('delete','BoardController@delete');
    Route::get('{board}','BoardController@show');
});

Route::prefix('comments')->group(function ()
{
    Route::post('store','CommentController@store');
    Route::delete('delete','CommentController@delete');
});

Route::prefix('messages')->group(function ()
{
    Route::get('/', 'MessageController@index');
    Route::post('/', 'MessageController@create');
});

Route::prefix('profiles')->group(function ()
{
    Route::get('edit', 'ProfileController@edit');
    Route::post('create','ProfileController@store');
    Route::post('edit', 'ProfileController@update');
    Route::get('delete', 'ProfileController@delete');
    Route::get('{profile}', 'ProfileController@show');    
});

Route::get('/about', function(){ return view('about'); });

Route::get('/users/update', 'UserController@update');

Route::get('/home', 'HomeController@index')->name('home');

