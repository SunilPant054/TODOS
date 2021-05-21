<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use Illuminate\Routing\RouteUrlGenerator;
use Illuminate\Routing\Route as RoutingRoute;

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

//TODOS
Route::middleware('auth')->group(function () {
    Route::get('/todos', 'TodoController@index')->name('todo.index');
    Route::get('/todos/create', 'TodoController@create')->name('todo.create');
    Route::post('/todos', 'TodoController@store')->name('todo.store');
    Route::get('/todos/{todo}/edit', 'TodoController@edit')->name('todo.edit');
    Route::put('/todos/{todo}/update', 'TodoController@update')->name('todo.update');
    Route::put('/todos/{todo}/complete', 'TodoController@complete')->name('todo.complete');
    Route::put('/todos/{todo}/incomplete', 'TodoController@incomplete')->name('todo.incomplete');
    Route::delete('/todos/{todo}/delete', 'TodoController@destroy')->name('todo.destroy');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
