<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
// Route::group( ['namespace' => 'Admin', 'prefix' => 'admin', 'as' => 'admin.','middleware' => ['web','api'] ],function () {
Route::group( ['namespace' => 'Admin', 'prefix' => 'admin', 'as' => 'admin.' ],function () {
    Route::resource('event', 'EventController');
    Route::GET('articles', 'ArticleController@index')->name('article.index');
    Route::POST('article', 'ArticleController@store')->name('article.store');
    Route::GET('article/{article}/edit', 'ArticleController@edit')->name('article.edit');
    Route::PUT('article/{article}', 'ArticleController@update')->name('article.update');
    Route::DELETE('article/{article}', 'ArticleController@update')->name('article.destroy');
});


