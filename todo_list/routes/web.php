
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

Route::resource('todos','TodosController');

//Route::get('/todos','TodosController@index');
Route::get('/', function () {
    return view('welcome');
});
Route::get('/todos/done/{id}','TodosController@done');
Route::get('/todos/delete/{id}','TodosController@delete');
Route::match(['post','get'],'/todos/edit/{id}','TodosController@edit');
