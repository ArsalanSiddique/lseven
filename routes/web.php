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
