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


Route::get('/shaidan','shaidan@index');

Route::get('/zifei','publicController@zifei');

Route::post('/letter/create','HomeController@create');

Route::get('/test',function(){
    $letter = App\letters::find(1048);
    $comments = $letter->comment()->get();
    dd($comments);
});

Route::get('/my_manfish','HomeController@dashboard')->name('private.dashboard');

Route::get('/editLetter/{letterId}','HomeController@editLetter')->name('private.editLetter');

Route::post('/updateLetter','HomeController@updateLetter')->name('private.updateLetter');

Route::get('/createContact/{lid}','HomeController@createContact')->name('private.createContact');

Route::post('/saveContact','HomeController@saveContact')->name('private.saveContact');

Route::get('/viewLetter/{id}','HomeController@viewLetter')->name('private.viewLetter');

Route::get('/publetter','PublicController@pubLetter')->name('public.publetter');

Route::get('/publetter/{lid}','PublicController@pubShow')->name('public.pubShow');

Route::get('/charges',function () {
    $kefu = \App\kefu::find(1);
    return view('public.charges')->withKefu($kefu);
});

Route::get('/addLike/{lid}','PublicController@addLike');

Route::post('/comment_public_letter/{lid}','HomeController@commentPublicLetter');

Route::get('/canclePub/{lid}','HomeController@canclePublicLetter')->name('private.canclePub');

Route::get('/setPub/{lid}','HomeController@setPub')->name('private.setPub');

Route::get('/setLetterPublic/{lid}','HomeController@setLetterPublic')->name('private.setLetterPublic');

Route::get('/setLetterPrivate/{lid}','HomeController@setLetterPrivate');

Route::get('/updateContacts/{lid}','HomeController@updateContact');

Route::get('/manage','adminController@index');

Route::get('/postCard','publicController@postcard')->name('public.postCard');


