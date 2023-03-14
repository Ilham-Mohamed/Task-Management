<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ApiController;


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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
// Route::resource('task', TaskController::class);
Route::get('/index', [ApiController::class,'index']);
Route::get('/create', [ApiController::class,'create']);
Route::get('/show/{id}', [ApiController::class,'show']);
Route::put('/update/{id}', [ApiController::class,'update']);
Route::post('/store', [ApiController::class,'store']);
Route::delete('/delete/{id}', [ApiController::class,'destroy']);