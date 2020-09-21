<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::post('/magic', [MagicController::class, 'store']);
// Route::get('/magic', [MagicController::class,'index']);
// Route::get('/magic/{uid}', [MagicController::class,'show']);
// Route::patch('/magic', [MagicController::class, 'update']);
// Route::delete('/magic/{uid}', [MagicController::class, 'destroy']);

Route::resource('magic', MagicController::class);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
 