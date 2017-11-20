<?php

use Illuminate\Http\Request;



Route::get('/display','ResumeController@index');
Route::post('/insert', 'ResumeController@store');
Route::delete('/delete', 'ResumeController@destory');
Route::patch('/update','ResumeController@update');
Route::get('/templates','TemplateController@setUp');
Route::get('/userTemplates','Resum eController@userTemplates');

//pdf Downlaod
Route::get('/pdf','AllController@pdfDownload');

Route::post('/update', [
  'uses' => 'ResumeController@update',
  'middleware' => 'jwt.auth'
]);

Route::post('/changePassword', [
  'uses' => 'ChangePassword@postReset',
  'middleware' => 'jwt.auth'
]);

Route::get('/resetEmail','ChangePassword@sendMail');

Route::get('/userProfile', [
  'uses' => 'UserController@userProfile',
  'middleware' => 'jwt.auth'
]);
// Route::post('auth/register', 'UserController@register');
// Route::post('auth/login', 'UserController@login');

Route::post('/register',[
  'uses' => 'UserController@register'
]);
Route::post('/login',[
  'uses' => 'UserController@login'

]);
// Route::group(['middleware' => 'jwt.auth'], function () {
//     Route::get('user', 'UserController@getAuthUser');
// });
