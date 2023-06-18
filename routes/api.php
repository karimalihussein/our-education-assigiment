<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\Api\V1\UsersController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



// Route::get('test', [TestController::class, 'index']);


Route::group(['prefix' => 'v1', 'as' => 'api.v1.company.', 'middleware' => ['language']], function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::get('users', [UsersController::class, 'index'])->name('users.index');
        Route::get('users/{user:uuid}', [UsersController::class, 'show'])->name('users.show');
    });
});