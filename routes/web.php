<?php

use Illuminate\Support\Facades\Auth;
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

// * Ruta inicial.
Route::get('/', function () {
    return view('Pages.welcome');
});

Auth::routes(['verify' => true]); //Activa la verificación en las rutas para laravel/ui


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware(['auth','verified'])->name('home');


Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/profile', function () {
    return view('Pages.profile');
})->name('profile');

Route::get('/adminPanel', function () {
    return view('Pages.adminPanel');
})->name('adminPanel');


// ! PRUEBA: Ruta para el formulario de recuperación de contraseña.
Route::get('/f', function () {
    return view('auth.passwords.reset');
})->name('reset');

