<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UpdateProduct;
use App\Http\Controllers\PageController;

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

Route::get('/', [PageController::class, 'homepage']);
Route::post('/', [PageController::class, 'store']);
Route::get('/search', [PageController::class, 'search']);
Route::delete('/delete/{id}', [PageController::class, 'destroy']);
Route::get('/update/{id}', [PageController::class, 'update']);
Route::post('/update', [UpdateProduct::class, 'index']);