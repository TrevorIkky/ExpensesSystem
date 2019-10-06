<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('login');
});  
Route::get('/login','LoginController@index');
Route::post('/login/serve', 'LoginController@execute_login');
Route::get('/login/ok', 'LoginController@successful_login');
Route::post('/login/register','LoginController@register');
Route::get('/inventory',function(){
	return view('inventory');
});
Route::get('/expenses',function(){
	return view('expenses');
});


Route::get('inventory','InventoryController@index');
Route::get('/add','ExpensesController@index');
Route::get('/dashboard','LoginController@successful_login');

Route::post('/addexp', 'ExpensesController@store');
Route::get('/menu','MenuController@index');
Route::post('/addmenu','MenuController@store');

?>
