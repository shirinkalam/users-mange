<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Models\Role;
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



Route::get('/', function () {
    return view('layouts.app');
})->name('home');

Route::prefix('auth')->namespace('Auth')->group(function () {
    Route::get('register',[RegisterController::class,'showRegisterForm'])->name('auth.register.form');
    Route::post('register',[RegisterController::class,'register'])->name('auth.register');
    Route::get('login',[LoginController::class,'showLoginForm'])->name('auth.login.form');
    Route::post('login',[LoginController::class,'login'])->name('auth.login');
    Route::get('logout',[LoginController::class,'logout'])->name('auth.logout');
});

Route::prefix('panel')->middleware('can:show panel')->group(function(){
    Route::get('users',[UserController::class,'index'])->name('users.index');
    Route::get('users/{user}/edit',[UserController::class,'edit'])->name('users.edit');
    Route::post('users/{user}/edit',[UserController::class,'update'])->name('users.update');
    Route::get('roles',[RoleController::class,'index'])->name('roles.index');
    Route::post('roles',[RoleController::class,'store'])->name('roles.store');
    Route::get('roles/{role}/edit',[RoleController::class,'edit'])->name('roles.edit');
    Route::post('roles/{role}/edit',[RoleController::class,'update'])->name('roles.update');
});
