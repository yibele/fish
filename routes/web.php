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

Route::get('/', function () {
    return view('public/index');
});

Route::get('/writeLetter','PublicController@letter');

Auth::routes();

Route::prefix('manage')->group(function (){
    Route::get('/dashboard','ManageController@dashboard')->name('manage.dashboard');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/publetter','publetter@index');

Route::get('/shaidan','shaidan@index');

Route::get('/zifei','publicController@zifei');

Route::post('/letter/create','letterController@create');

Route::get('/test',function(){

    $letter = \App\letters::find(1);
    dd($letter->user);

});

Route::get('/my_manfish','HomeController@dashboard')->name('private.dashboard');

Route::get('/editLetter/{letterId}','HomeController@editLetter')->name('private.editLetter');

Route::post('/updateLetter','HomeController@updateLetter')->name('private.updateLetter');

Route::get('/updateContact','HomeController@updateContact')->name('private.updateContact');





