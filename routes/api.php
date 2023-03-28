<?php

use App\Http\Controllers\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/users', function (Request $request) {
    Route::get('/{user}', [UsersController::class, 'show'])->name('show');
    Route::patch('/{user}', [UsersController::class, 'edit'])->name('edit');
    Route::delete('/{user}', [UsersController::class, 'delete'])->name('delete');

    Route::post('/', [UsersController::class, 'store'])->name('store');
    Route::get('/', [UsersController::class, 'index'])->name('all');
});
