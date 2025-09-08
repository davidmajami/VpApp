<?php
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

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
    return view('login'); 
})->name('login');

Route::post('/login', function (\Illuminate\Http\Request $request) {
    
    $username = $request->username;
    $password = $request->password;

    
    return redirect()->route('main');
})->name('login.post');

Route::get('/main', function () {
    return view('main'); 
})->name('main');

Route::resource('grupa_proizvodas', App\Http\Controllers\grupa_proizvodasController::class);

Route::resource('narudzbinas', App\Http\Controllers\narudzbinasController::class);

Route::resource('proizvods', App\Http\Controllers\proizvodsController::class);

Route::resource('stavkenarudzbines', App\Http\Controllers\stavkenarudzbineController::class);
