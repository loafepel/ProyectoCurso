<?php

use App\Http\Controllers\PageController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
//use App\Http\Controllers\BackEnd\PostController;


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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [PageController::class, 'posts']);
Route::get ('blog/{post}', [App\Http\Controllers\PageController::class, 'post'])->name('post');


//reduce el espacio ocupado por las rutas, añade las 7 rutas principales para el controlador.
Route::resource('posts', 'App\Http\Controllers\BackEnd\PostController')->middleware('auth');
