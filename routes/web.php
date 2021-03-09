<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\DashboardController;
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

Route::get('/', [MainController::class, 'login']);
Route::post('/login', [MainController::class, 'home']);
Route::get('/logout', [MainController::class, 'logout']);

Route::get('/dashboard', [DashboardController::class, 'index']);
Route::post('/save', [DashboardController::class, 'createnew']);
Route::get('/create', [DashboardController::class, 'create']);
Route::get('/edit/{any}', [DashboardController::class, 'edit']);
Route::post('/ubah', [DashboardController::class, 'update']);
Route::get('/delete/{any}', [DashboardController::class, 'delete']);