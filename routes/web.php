<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth', 'prefix' => 'dashboard'], function () {

    Route::get('/links', [LinkController::class, 'index']);
    Route::get('/links/new', [LinkController::class, 'create']);
    Route::post('/links/new', [LinkController::class, 'store']);
    Route::get('/links/new', [LinkController::class, 'edit']);
    Route::post('/links/new', [LinkController::class, 'update']);
    Route::delete('/links/new', [LinkController::class, 'destroy']);

    Route::get('/settings', [LinkController::class, 'edit']);
    Route::post('/settings', [LinkController::class, 'update']);
});

Route::post('/visit/{link}', [VisitController::class, 'store']);

Route::get('/{user}', [UserController::class, 'show']);
