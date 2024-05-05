<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Redirect;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return Redirect::away('https://isigo-wets-projects.vercel.app');
});
Route::get('/home', function () {
    return view('acceuil');
})->name('home');

Route::get('/signin', function () {
    return view('signin');
})->name('signin');

Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

Route::post('/dologin', [\App\Http\Controllers\AuthController::class ,'dologin'])->name('dologin');
Route::get('/disconect',[\App\Http\Controllers\AuthController::class,'deconnexion'])->name('disconection');

