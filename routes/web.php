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
    // Config::set('auth.defines','admin');
// use DB;
// use Illuminate\Support\Facades\Hash;

// Route::get('insert', function () {
//     $passord=  Hash::make('123456');
//     DB::insert('insert into admins ( username , email,password) values (?, ?,?)', ['mohamed','admin@admin.com',$passord]);
// });
    //language middleware
    
    Route::group(['middleware' => ['lang']], function () {
        
    Route::group(['middleware' => 'admin:admin'], function () {
        Route::get('/','HomeController@index');
        Route::any('logout','HomeController@logout');
    });
   

Route::get('/login','HomeController@login');
Route::post('/login','HomeController@make_login');
Route::get('set_lang/{locale}', function ($locale) {
    //return $locale;
    session()->put('lang', $locale);
    return redirect()->back();
});




});