<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;

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
    return view('home', ['title' => 'Home']);
});
Route::get('/dashboard', function () {
    return view('dashboard.index', ['title' => 'Dashboard']);
})->middleware('auth');


Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->middleware('guest');
Route::post('/login', [LoginController::class, 'auth'])->middleware('throttle:login');;
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/dashboard/profile', [UserController::class, 'profile'])->middleware('auth');
Route::put('/dashboard/profile/edit', [UserController::class, 'update'])->middleware('auth');
Route::get('/dashboard/changepassword', [UserController::class, 'editPassword'])->middleware('auth');
Route::put('/dashboard/changepassword', [UserController::class, 'updatePassword'])->middleware('auth');
