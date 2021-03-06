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
    return view('welcome');
});
Route::get('/p', function () {
    return view('pdfFile');
});
//Route::get('/pdf','AllController@pdfDownload');
// Route::get('/pdf', function () {
//     $pdf = PDF::loadView('pdfFile');
//     return $pdf->download('Dance.pdf');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//Route::get('/email', 'ForgotPassword@sendMail');

Route::post('register', 'UserController@register');
Route::post('login', 'UserController@login');
Route::group(['middleware' => 'jwt.auth'], function () {
    Route::get('user', 'UserController@getAuthUser');
});
