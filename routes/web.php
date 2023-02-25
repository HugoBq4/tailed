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
Route::post('/registrar/enviar', [App\Http\Controllers\Padrao\UserController::class, 'store'])->name('register-submit');
Route::get('/login', [App\Http\Controllers\Padrao\HomeController::class, 'login'])->name('login');
Route::post('/login/enviar', [App\Http\Controllers\Padrao\HomeController::class, 'submitLogin'])->name('login-submit');
Route::get('/logout', [App\Http\Controllers\Padrao\HomeController::class, 'logout'])->name('logout');
Route::get('/privacidade', [App\Http\Controllers\Padrao\HomeController::class, 'privacidade'])->name('privacity');
Route::get('/termos-de-uso', [App\Http\Controllers\Padrao\HomeController::class, 'termos'])->name('terms');


Route::get('/admin/reset-db', [App\Http\Controllers\Padrao\HomeController::class, 'resetDB'])->name('resetDB');
Route::get('/admin/optimize', [App\Http\Controllers\Padrao\HomeController::class, 'optimize'])->name('optimize');

//categories
Route::get('/categoria/{category_id}', [App\Http\Controllers\Padrao\CategoriaController::class, 'index'])->name('categoria');


/**
 * Verification Routes
 */
Route::get('/email/verify', [App\Http\Controllers\Padrao\CategoriaController::class, 'verification.notice'])->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', 'VerificationController@verify')->name('verification.verify')->middleware(['signed']);
Route::post('/email/resend', 'VerificationController@resend')->name('verification.resend');
