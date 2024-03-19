<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthenticateController;

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

Route::resource('books', BookController::class);
Route::resource('category', CategoryController::class);

Route::post('/search',[BookController::class,'search'])->name('search');
Route::get('/success', function () {
    if (!auth()->check()) {
        return redirect()->route('login');
    }
    return view('success');
})->name('success');

// Route for login
Route::get('/login', [AuthenticateController::class, 'login'])->name('login');
Route::post('/login', [AuthenticateController::class, 'doLogin'])->name('login');

// Route for register
Route::get('/register', [AuthenticateController::class, 'register'])->name('register');
Route::post('/register', [AuthenticateController::class, 'doRegister'])->name('register');

// Route for logout
Route::get('/logout', [AuthenticateController::class, 'logout'])->name('logout');
