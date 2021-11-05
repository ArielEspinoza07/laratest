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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('foods') // /foods
     ->name('foods.') // foods.
     ->middleware(['auth', 'is.admin'])
     ->group(function () {
         Route::patch('types/{type}/restore', [\App\Http\Controllers\TypeFoodController::class, 'restore'])
              ->name('types.restore');
         Route::resource('types', \App\Http\Controllers\TypeFoodController::class)
              ->except('edit');
     });
