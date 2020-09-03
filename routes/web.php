<?php

use Illuminate\Http\Request;
#use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;



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



// =================================== Todos routes steat here
// Route::get('/todos', 'TodoController@index')->name("todo.index");
// Route::get('/todos/create', 'TodoController@create');
// Route::post('/todos/create', 'TodoController@store');
// // Route::get('/todos/{todo:title}/edit', 'TodoController@edit');
// Route::get('/todos/{todo}/edit', 'TodoController@edit');
// Route::patch('/todos/{todo}/update', 'TodoController@update')->name("todo.update");
// Route::put('/todos/{todo}/complete', 'TodoController@complete')->name("todo.complete");
// Route::delete('/todos/{todo}/delete', 'TodoController@delete')->name("todo.delete");
// ==================================== Todos routes end steat here

// Route::middleware("auth")->group(function () {
    Route::resource('/todo', 'TodoController');
    Route::put('/todos/{todo}/complete', 'TodoController@complete')->name("todo.complete");
// });



Route::get('/', function () {
    return view('welcome');
});

Route::get('/user', function () {
    return view('home');
});

Route::get('/test', 'userController@index');
Auth::routes();


Route::post('/upload', 'userController@uploadAvatar');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/users', function () {
    return view('users');
});
