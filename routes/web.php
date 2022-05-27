<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudUserController;
use App\Http\Controllers\CrudAdController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AdController;
use App\Http\Controllers\MessageController;

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

Route::get('/', [Controller::class, 'index'])->name('ads');
Route::get('/dashboard', [Controller::class, 'dashboard'])->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::get('/ad', [AdController::class, 'create'])->middleware(['auth'])->name('ad.create');
Route::post('/ad/create',  [AdController::class, 'store'])->name('ad.store');
Route::get('/search',  [AdController::class, 'search'])->name('ads.search');
Route::get('detail/{id}', [AdController::class, 'detail']);
Route::get('/destroy/{id}', [AdController::class, 'destroy']);

/* CRUD */
Route::resource('/users', CrudUserController::class)->middleware(['is_admin']);
Route::resource('/ads', CrudAdController::class)->middleware(['is_admin']);
Route::get('/ads_crud', [CrudAdController::class, 'index'])->middleware(['is_admin'])->name('ads_crud');
Route::get('/users_crud', [CrudUserController::class, 'index'])->middleware(['is_admin'])->name('users_crud');

/* Messages */
Route::get('/message/{seller_id}/{ad_id}', [MessageController::class, 'create'])->name('message.create');
Route::post('message', [MessageController::class, 'store'])->name('message.store');
Route::get('/inbox', [MessageController::class, 'inbox'])->name('inbox');
