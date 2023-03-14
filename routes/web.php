<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\MailController;
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
Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/postlogin', [LoginController::class, 'logIn'])->name('postlogin');
Route::get('signout', [LoginController::class, 'signout'])->name('signout');
// Route::get('signup', [LoginController::class, 'signup'])->name('register');
// Route::post('/postsignup', [LoginController::class, 'registration'])->name('postsignup');

Route::get('/index', [TaskController::class, 'index'])->name('index');
Route::resource('task', TaskController::class);

// Route::get('/', [MailController::class, 'sendMail']);