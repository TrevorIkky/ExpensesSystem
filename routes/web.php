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



Route::get('/index', 'PagesController@index');
Route::get('/cart', 'PagesController@cart');
Route::get('/foodAdmin', 'PagesController@foodAdmin');
Route::get('/order', 'PagesController@order');
Route::get('/Total', 'PagesController@Total');
Route::get('/', 'InventoryController@index');

Route::resource('posts','PostsController');
Route::resource('post','InventoryController');
RouteRoute::get('/inventory', function(){
    return view('inventory');
});
RouteRoute::get('/inventoryedit', function(){
    return view('inventoryedit');
});

