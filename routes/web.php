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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'OrderController@index');
Route::get('/orders', 'OrderController@index')->name('list_orders');
Route::group(['prefix' => 'orders'], function () {
    Route::get('/drafts', 'OrderController@drafts')
        ->name('list_orders')
        ->middleware('auth');
    Route::get('/show/{id}', 'OrderController@show')
        ->name('show_order');
    Route::get('/create', 'OrderController@create')
        ->name('create_order')
        ->middleware('can:create-order');
    Route::post('/create', 'OrderController@store')
        ->name('store_order')
        ->middleware('can:create-order');
    Route::get('/edit/{order}', 'OrderController@edit')
        ->name('edit_order')
        ->middleware('can:update-order,order');
    Route::post('/edit/{order}', 'OrderController@update')
        ->name('update_order')
        ->middleware('can:update-order,order');
    Route::get('/publish/{order}', 'OrderController@publish')
        ->name('publish_order')
        ->middleware('can:publish-order');
});
