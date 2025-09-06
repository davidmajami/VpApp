<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('/')
    ->middleware('auth')
    ->group(function () {});


Route::resource('users', App\Http\Controllers\usersController::class);

Route::get('/login', function () {
    return view('login'); // login.blade.php
})->name('login');

Route::post('/login', function (\Illuminate\Http\Request $request) {
    // Ovde možeš proveriti korisnika iz baze
    $username = $request->username;
    $password = $request->password;

    // Za sada, samo redirect na main panel
    return redirect()->route('main');
})->name('login.post');

Route::get('/main', function () {
    return view('main'); // main.blade.php
})->name('main');