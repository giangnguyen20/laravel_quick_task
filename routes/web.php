<?php

use App\Http\Controllers\OfficeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LangController;
use App\User;
use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    return view('welcome');
})->name('/');

Route::prefix('users')->name('users.')->middleware('checkAdmin')->group(function () {
    Route::get('/', 'UserController@index')->name('index');
    Route::post('/', 'UserController@store')->name('store');
    Route::get('/create', 'UserController@create')->name('create');
    Route::get('/{id}', 'UserController@show')->name('show');
    Route::get('/{id}/edit', 'UserController@edit')->name('edit');
    Route::post('/{id}', 'UserController@update')->name('update');
    Route::delete('/{id}', 'UserController@destroy')->name('destroy');
});

Route::resource('offices', 'OfficeController')->middleware('checkAdmin');
Route::get('/search', 'OfficeController@search')->name('search');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('lang/{lang}','LangController@changeLang')->name('lang');
