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

Route::group(['namespace' => 'Auth','prefix' => 'auth'], function ($router) {
    Route::get('login/google', 'AuthController@redirectToProvider');
    Route::get('callback/google', 'AuthController@handleProviderCallback');
});

Route::namespace('Admin')->prefix('admin')->group(function () {
    // Controllers Within The "App\Http\Controllers\Admin" Namespace
    Route::get('{any?}', function () {
        return view('admin.admin');
    })->where('any','.*');
});

Route::get('/{any}', function () {
    return view('index');
})->where('any', '.*');

// Auth::routes();

