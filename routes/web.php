<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

use App\Http\Controllers\UserRoleController;
use Illuminate\Support\Facades\Input;
use Illuminate\Pagination\Paginator;



Route::get('/', function () {
    return view('welcome');
});

/**
 * @path /users
 * @method GET
 */

// Route::get     ('/users', [\App\Http\Controllers\UserController::class]);




Auth::routes();

Route::group(['middleware' =>['auth']], function () {
    
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/roles', \App\Http\Controllers\UserRoleController::class);
Route::get('kirim-email','App\Http\Controllers\MailController@index');

    Route::group(['middleware' =>['admin']], function () {
        Route::resource('/users', \App\Http\Controllers\UserController::class);
    
    });


});


   
  