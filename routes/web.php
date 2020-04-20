<?php

use App\Mail\OrderPlaced;
use App\Mail\ReceiveOrder;
use App\Order;
use Illuminate\Support\Facades\Auth;

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
// ,'middleware' => ['can:publish articles']


Route::get('/email', function () {
    return new ReceiveOrder(Order::find(3));
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

