<?php

Route::get('/', function () {
    return view('public/index');
});

Route::get('/writeLetter','PublicController@letter');
Auth::routes();
// 管理员部分route
Route::prefix('admin')->group(function () {
    Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('admin.login.submit');
    Route::post('/login','Auth\AdminLoginController@login')->name('admin.login');
    Route::get('/','adminController@index')->name('admin.index');
    Route::get('/dashboard','adminController@dashboard')->name('admin.dashboard');
    Route::get('/dd','ManageController@dd')->name('manage.dd');
    Route::get('/qx','ManageController@qx')->name('manage.qx');
    Route::get('/yc','ManageController@yc')->name('manage.yc');
    Route::get('/xj','ManageController@xj')->name('manage.xj');
    Route::get('/mxp','ManageController@mxp')->name('manage.mxp');
    Route::get('/zt','ManageController@zt')->name('manage.zt');
    Route::get('/yh','ManageController@yh')->name('manage.yh');
    Route::get('/yy','ManageController@yy')->name('manage.yy');
    Route::get('/jg','ManageController@jg')->name('manage.jg');
    Route::get('/djq','ManageController@djq')->name('manage.djq');
    Route::get('/xx','ManageController@xx')->name('manage.xx');
    Route::resource('/yincais','YincaiController');
    Route::resource('/xinjian','XinjianController');
    Route::get('/yincais/getxinzhiyincai/{id}','YincaiController@getxinzhiyincai')->name('getxinzhiyincai');
    Route::resource('/ziti','ZitiController');
    Route::resource('/postcard','PostCardController');
    Route::get('/yincais/getpostcardyincai/{id}','YincaiController@getpostcardyincai');
//超级管理员才可以访问的项目
    //Route::resource('/users','UserController');
    Route::get('/manager','adminController@index')->name('manager.index');
    Route::get('/manager/create','adminController@create')->name('manager.create');
    Route::post('/manager','adminController@store')->name('manager.store');
    Route::get('/manager/{id}','adminController@show')->name('manager.show');
    Route::get('/manager/edit','adminController@edit')->name('manager.edit');
});


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/shaidan','shaidan@index');
Route::get('/zifei','PublicController@zifei');
Route::post('/letter/create','HomeController@create');
Route::get('/test',function(){
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
Route::get('/postCard','PublicController@postcard')->name('public.postCard');
Route::get('/postCard/{id}','PublicController@getCantPostCard');
Route::post('/uploadimg/stamp','UploadController@uploadstamp');


