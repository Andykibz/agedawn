<?php

use App\Http\Resources\MetaCollection;


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
Route::get('admin/isBackend','Auth\AuthController@is_admin');

Route::group( ['namespace' => 'Admin', 'prefix' => 'admin', 'as' => 'admin.'],function () {


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

    Route::get('orders', 'OrderController@index')->name('order.index');

    Route::get('categories', 'CategoryController@index')->name('category.index');
    Route::post('category', 'CategoryController@store')->name('category.store');
    Route::post('category/{category}', 'CategoryController@update')->name('category.update');
    Route::delete('category/{category}', 'CategoryController@destroy')->name('category.destroy');

    Route::get('members', 'MetaController@listMembers');
    Route::post('member', 'MetaController@storeMember');
    Route::post('member/{id}', 'MetaController@updateMember');
    Route::delete('member/{id}', 'MetaController@deleteMember');

    Route::post('user/{id}/permission', 'UserController@assignPermissions');
    Route::get('users', 'UserController@index');
    Route::delete('user/{id}', 'UserController@destroy');

});

Route::group( [ 'as' => 'frontend.' ],function () {

    Route::GET('getHomeInfoArr', function(){
        return new MetaCollection( App\Meta::where('type','adawnageArr')->get() );
    } );
    Route::GET('getHomeInfo', function(){
        return App\Meta::where('type','adawnage')->get();
    } );

    Route::GET('news', 'NewsController@index');
    Route::GET('homenews', 'NewsController@homeindex');
    Route::GET('news/{news}', 'NewsController@show');

    Route::GET('shop', 'ShopController@index');
    Route::GET('category/{name}', 'ShopController@getByCatName');
    Route::GET('product/{id}', 'ShopController@getProduct');

    Route::POST('order', 'OrdersController@store');
    
    Route::POST('product/{product}/rate', 'ReviewController@storeReview');
    Route::GET('product/{product}/reviews', 'ReviewController@getReviews');

    Route::GET('/metas/about-us', 'MetaController@getAbout');
    Route::GET('/metas/accolades', 'MetaController@getAccolades');
    Route::GET('/metas/discography', 'MetaController@getDiscography');

    Route::POST('reachus', 'ReviewController@contactus');

});


Route::group( [ 'as' => 'metas.' ],function () {
    

    Route::GET('metas/getmembers', 'MetaController@getMembers');
    Route::GET('members/updatemembers', 'MetaController@updateMembers');
    Route::GET('category/{name}', 'ShopController@getByCatName');
    Route::GET('product/{id}', 'ShopController@getProduct');

    Route::POST('order', 'OrdersController@store');
    Route::POST('order', 'OrdersController@store');
});


// Route::group( ['namespace' => 'Auth', 'as' => 'auth.' ],function () {
//     Route::POST('signup', 'RegisterController@signup')->name('signup');
// });
// Route::POST('auth/signup', 'Auth\AuthController@signup');

Route::group(['namespace' => 'Auth','prefix' => 'auth'], function ($router) {
    Route::post('signup', 'AuthController@signup');
    Route::post('google/authenticate', 'AuthController@googleAuthenticate');
    Route::post('signin', 'AuthController@signin');
    Route::post('signout', 'AuthController@signout');
    Route::post('refresh', 'AuthController@refresh');
    Route::get('getuser', 'AuthController@getuser')->middleware('auth');;
});
