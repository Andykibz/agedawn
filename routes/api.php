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
    Route::POST('article/{article}', 'ArticleController@update')->name('article.update');
    Route::DELETE('article/{article}', 'ArticleController@destroy')->name('article.destroy');

    Route::post('product', 'ProductController@store')->name('product.store');
    Route::post('product/{product}', 'ProductController@update')->name('product.update');

    Route::get('products', 'ProductController@index')->name('product.index');
    Route::get('product/{product}', 'ProductController@edit')->name('product.edit');
    Route::post('product', 'ProductController@store')->name('product.store');
    Route::post('product/{product}', 'ProductController@update')->name('product.update');
    Route::delete('product/{product}', 'ProductController@destroy')->name('product.destroy');

    Route::get('categories', 'CategoryController@index')->name('category.index');
    Route::post('category', 'CategoryController@store')->name('category.store');
    Route::post('category/{category}', 'CategoryController@update')->name('category.update');
    Route::delete('category/{category}', 'CategoryController@destroy')->name('category.destroy');
});

Route::group( [ 'as' => 'news.' ],function () {
    Route::GET('news', 'NewsController@index');
    Route::GET('news/{news}', 'NewsController@show');

    Route::GET('shop', 'ShopController@index');
    Route::GET('category/{name}', 'ShopController@getByCatName');
    Route::GET('product/{id}', 'ShopController@getProduct');
});


// Route::group( ['namespace' => 'Auth', 'as' => 'auth.' ],function () {
//     Route::POST('signup', 'RegisterController@signup')->name('signup');
// });
// Route::POST('auth/signup', 'Auth\AuthController@signup');

Route::group(['namespace' => 'Auth','prefix' => 'auth'], function ($router) {
    Route::post('signup', 'AuthController@signup');
    Route::post('signin', 'AuthController@signin');
    Route::post('signout', 'AuthController@signout');
    Route::post('refresh', 'AuthController@refresh');
    Route::get('getuser', 'AuthController@getuser')->middleware('auth');;
});
