<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [MovieController::class, 'index']);
Route::get('/{category:title}', [MovieController::class, 'getMovieByCategory']);
Route::get('/details/{id}', [MovieController::class, 'findMovie']);

Route::get('/auth/login', [AuthController::class, 'index'])->name("login");
Route::post('/auth/login', [AuthController::class, 'login']);
Route::post('/auth/logout', [AuthController::class, 'logout'])->middleware('auth');

Route::get('/dashboard/masterCategories', [CategoryController::class, 'index'])->middleware('auth');
Route::post('/dashboard/masterCategories', [CategoryController::class, 'store'])->middleware('auth');
Route::get('/masterCategories/edit', [CategoryController::class, 'edit'])->middleware('auth');
Route::post('/masterCategories/update', [CategoryController::class, 'update'])->middleware('auth');
Route::get('/dashboard/masterCategories/destroy/{id}', [CategoryController::class, 'destroy'])->middleware('auth');
