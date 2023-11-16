<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


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

Route::get('/login', function () {
    return Inertia::render('Login', [
    ]);
})->name('login');

Route::get('/register', function () {
    return Inertia::render('Register', [
    ]);
})->name('register');

Route::get('/home', [UserController::class, 'getAllUsers'])->name('home');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
});

