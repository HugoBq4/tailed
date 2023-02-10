<?php

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

Route::get('/', [App\Http\Controllers\Padrao\HomeController::class, 'index'])->name('home');
Route::get('/registrar', [App\Http\Controllers\Padrao\HomeController::class, 'register'])->name('register');
Route::get('/login', [App\Http\Controllers\Padrao\HomeController::class, 'login'])->name('login');
Route::get('/login/enviar', [App\Http\Controllers\Padrao\HomeController::class, 'submitLogin'])->name('login-submit');
Route::get('/logout', [App\Http\Controllers\Padrao\HomeController::class, 'logout'])->name('logout');
Route::get('/privacidade', [App\Http\Controllers\Padrao\HomeController::class, 'privacidade'])->name('privacidade');
