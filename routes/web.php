<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VisitController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['auth', 'verified'], 'prefix' => 'dashboard'], function () {

    Route::get('/links', [LinkController::class, 'index']);
    Route::get('/links/new', [LinkController::class, 'create']);
    Route::post('/links/new', [LinkController::class, 'store']);
    Route::get('/links/{link}', [LinkController::class, 'edit']);
    Route::post('/links/{link}', [LinkController::class, 'update']);
    Route::delete('/links/{link}', [LinkController::class, 'destroy']);

    Route::get('/settings', [UserController::class, 'edit']);
    Route::post('/settings', [UserController::class, 'update']);
});

Route::post('/visit/{link}', [VisitController::class, 'store']);

Route::get('/{user}', [UserController::class, 'show']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
