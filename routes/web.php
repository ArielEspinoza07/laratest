<?php

use Illuminate\Support\Facades\Auth;
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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
     ->name('home');

Route::prefix('foods')
     ->group(function () {
         Route::name('foods.')
              ->group(function () {
                  Route::patch('types/{type}/restore', [\App\Http\Controllers\TypeFoodController::class, 'restore'])
                       ->name('types.restore');
                  Route::resource('types', \App\Http\Controllers\TypeFoodController::class)
                       ->except('edit');
              });
     });

Route::prefix('settings')
    ->name('settings.')
     ->group(function () {
         Route::patch('users/{user}/restore', [\App\Http\Controllers\UserController::class, 'restore'])
              ->name('users.restore');
         Route::resource('users', \App\Http\Controllers\UserController::class)
              ->except('edit');
         Route::resource('roles', \App\Http\Controllers\UserController::class)
              ->except('edit');
         Route::resource('permissions', \App\Http\Controllers\UserController::class)
              ->except('edit');
     });
