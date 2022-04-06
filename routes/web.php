<?php

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
    return "Home";
    // return view('welcome');
});

Route::get('/home', function(){
    return view('homepage.index');
})->name('home');

Route::get('/dashboard', function () {
    // return view('dashboard');
    return view('homepage.index');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
