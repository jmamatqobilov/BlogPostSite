<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/register', [UserController::class, 'registerView']);
Route::post('/register', [UserController::class, 'register'])->name('register-route');
Route::get('/login', [UserController::class, 'loginView'])->name('login');
Route::post('/login', [UserController::class, 'login'])->name('login-route');
Route::get('/sign_out', [UserController::class, 'signOut']);




Route::get('/', [ApplicationController::class, 'index']);
Route::get('/applications', [ApplicationController::class, 'index']);
Route::get('/application/{id}',[ApplicationController::class,'show'])->name('application-show');

Route::middleware(['authMidd', 'post'])->group(function() {
    Route::get('/application-create', [ApplicationController::class, 'create'])->name('application-create');
    Route::post('/application-store', [ApplicationController::class, 'store'])->name('application-store');
    Route::get('/{id}/application-edit',[ApplicationController::class,'edit'])->name('application-edit');
    Route::put('/application/{id}',[ApplicationController::class,'update'])->name('application-update');
    Route::delete('/application-delete/{id}',[ApplicationController::class,'delete'])->name('application-delete');
});


