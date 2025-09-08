<?php
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\ProizvodsController;
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
    return view('welcome'); 
})->name('login');

Route::post('/login', function (Request $request) {
    $credentials = $request->validate([
        'username' => ['required'],
        'password' => ['required'],
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->intended('main');
    }

    return back()->withErrors([
        'username' => 'Pogrešno korisničko ime ili lozinka.',
    ])->onlyInput('username');
})->name('login.post');
Route::get('/proizvodi/grupa/{id}', [ProizvodsController::class, 'poGrupi'])->name('proizvodi.poGrupi');
Route::get('/main', function () {
    return view('main'); 
})->name('main');

Route::resource('grupa_proizvodas', App\Http\Controllers\grupa_proizvodasController::class);

Route::resource('narudzbinas', App\Http\Controllers\narudzbinasController::class);

Route::resource('proizvods', App\Http\Controllers\proizvodsController::class);

Route::resource('stavkenarudzbines', App\Http\Controllers\stavkenarudzbineController::class);






