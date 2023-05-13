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

Auth::routes();

Route::get('/', [App\Http\Controllers\TemplateController::class, 'index'])->name('home');
Route::post('/get-username', [App\Http\Controllers\TemplateController::class, 'user'])->name('user');
Route::get('/do-quiz', [App\Http\Controllers\TemplateController::class, 'quiz'])->name('quiz');
Route::post('/do-store', [App\Http\Controllers\TemplateController::class, 'store'])->name('store');

Route::get('/logout', [App\Http\Controllers\TemplateController::class, 'logout'])->name('logout');




