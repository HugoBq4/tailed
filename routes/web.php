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
Route::get('/registrar', [App\Http\Controllers\Padrao\UserController::class, 'create'])->name('register');
Route::post('/registrar/enviar', [App\Http\Controllers\Padrao\UserController::class, 'store'])->name('register-send');
Route::get('/login', [App\Http\Controllers\Padrao\HomeController::class, 'login'])->name('login');
Route::get('/login/enviar', [App\Http\Controllers\Padrao\HomeController::class, 'submitLogin'])->name('login-submit');
Route::get('/logout', [App\Http\Controllers\Padrao\HomeController::class, 'logout'])->name('logout');
Route::get('/privacidade', [App\Http\Controllers\Padrao\HomeController::class, 'privacidade'])->name('privacity');
Route::get('/termos-de-uso', [App\Http\Controllers\Padrao\HomeController::class, 'termos'])->name('terms');

//categorias
Route::get('/categoria/{category_id}', [App\Http\Controllers\Padrao\CategoriaController::class, 'index'])->name('categoria');
