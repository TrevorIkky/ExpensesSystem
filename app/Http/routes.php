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


Route::get('/dashboard','FilterController@index');



Route::get('/add', function(){
    return View::make("input_expenses");
});

Route::get('/add','ExpensesController@index');


Route::post('/addexp', 'ExpensesController@store');



<<<<<<< HEAD
Route::post('/addexp', 'ExpensesController@store');



=======
Route::post('insert','InventoryController@insert');
Route::post('insertFood','FoodController@insertFood');
Route::post('insertCrockery','CrockeryController@insertCrockery');

Route::get('edit/{DrinkNo}','InventoryController@show');
Route::post('edit/{DrinkNo}','InventoryController@edit');
Route::get('delete/{DrinkNo}','InventoryController@destroy');

Route::get('editFood/{foodTypeNo}','FoodController@showFood');
Route::post('editFood/{foodTypeNo}','FoodController@editFood');
Route::get('deleteFood/{foodTypeNo}','FoodController@destroyFood');

Route::get('editCrockery/{crockeryid}','CrockeryController@showCrockery');
Route::post('editCrockery/{crockeryid}','CrockeryController@editCrockery');
Route::get('destroyCrockery/{crockeryid}','CrockeryController@destroyCrockery');
>>>>>>> 8bf12c6cd3296751120a1dd9868d22b12dbb4c9c

Route::post('/addexp', 'ExpensesController@store');
Route::post('/menu/update/{id}','MenuController@update');


Route::post('/addexp', 'ExpensesController@store');
Route::get('/logout','LoginController@auth_logout');

Route::post('/addexp', 'ExpensesController@store');
Route::post('/menu/update/{id}','MenuController@update');
Route::get('/payments','PaymentsController@index');
Route::post('/payments/addpayment','PaymentsController@store');
Route::get('/filter/{month}','FilterController@filter');
Route::post('/payments/searchpayment','PaymentsController@searchPayment');
Route::post('/payments/mpesapayment','PaymentsController@mpesa');
Route::post('/menu/delete/{id}','MenuController@destroy');
Route::post('/menu/update/{id}','MenuController@update');
Route::post('/addmenu','MenuController@store');

Route::group(['prefix' => '/inventory'], function () {
    Route::get('/','InventoryController@index');
    Route::post('/add','InventoryController@store');
    Route::post('/update/{id}','InventoryController@update');
    Route::post('/delete/{id}','InventoryController@destroy');
    Route::get('/search','InventoryController@search');
    Route::get('/options','InventoryController@options');
});

Route::group(['prefix' => 'menu'], function () {
    Route::get('/','MenuController@index');
    Route::post('/update/{id}','MenuController@update');
    Route::post('/addmenu/','MenuController@store');
});
?>
