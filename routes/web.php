<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController; // * Importa el controlador de la vista home.
use App\Http\Controllers\UserController; // * Importa el controlador de la vista users.
use App\Http\Controllers\UserListController; // * Importa el controlador de la vista userList.
use App\Models\User; // * Importa el modelo de la tabla users.
use App\Http\Controllers\CourseController; // * Importa el controlador de la vista courses.


/*
|--------------------------------------------------------------------------
| RUTAS WEB
|--------------------------------------------------------------------------
|
| Aquí es donde puede registrar rutas web para su aplicación. Estos
| las rutas son cargadas por el RouteServiceProvider y todas ellas
| asignarse al grupo de middleware "web". ¡Haz algo genial!
|
*/

// * ==================== RUTAS PARA EL FRONTEND ====================

// * Ruta inicial.
Route::get('/', function () {
    return view('Pages.welcome');
});
//--------------------------------------------------------------
//* Activa la verificación en las rutas para laravel/ui
Auth::routes(['verify' => true]);
//--------------------------------------------------------------
//todo NOTA: Esta ruta te lleva a la vista del home.
Route::middleware(['auth', 'verified'])
    ->name('home')
    ->get('/home', [HomeController::class, 'index']);
//--------------------------------------------------------------

//todo NOTA: Esta ruta te lleva a la vista del registro.
Route::get('/register', function () {
    return view('auth.register');
})->name('register');
//--------------------------------------------------------------
//todo NOTA: Esta ruta te lleva a la vista del login.
Route::get('/login', function () {
    return view('auth.login');
})->name('login');
//--------------------------------------------------------------
//todo NOTA: Esta ruta te lleva a la vista del perfil.
Route::get('/profile', function () {
    return view('Pages.profile');
})->name('profile');
//--------------------------------------------------------------
//* =============== RUTAS PARA EL PANEL DE ADMINISTRACIÓN ===============
//todo NOTA: Esta ruta te lleva a la vista del panel de administración.
Route::get('/adminPanel', function () {
    return view('Pages.adminPanel');
})->name('adminPanel');
//--------------------------------------------------------------

//todo NOTA: Esta ruta te lleva a la vista para crear usuarios.

Route::get('/createUsers', [UserController::class, 'create'])->name('users');
Route::post('/createUsers', [UserController::class, 'store'])->name('users.store');

//--------------------------------------------------------------

//todo NOTA: Esta ruta te lleva a la vista para listar los usuarios.

Route::get('/userList', [UserListController::class, 'index'])->name('usersList');

//--------------------------------------------------------------
//todo NOTA: Esta ruta te lleva a la vista para editar los usuarios.

Route::get('/editUser/{id}', [UserController::class, 'edit'])->name('editUser');
Route::put('/editUser/{id}', [UserController::class, 'update'])->name('editUser.store');

//--------------------------------------------------------------

//todo NOTA: Esta ruta te lleva a la vista para eliminar los usuarios.

Route::get('/deleteUser/{id}', [UserController::class, 'deleteConfirmation'])->name('deleteUser');
Route::delete('/deleteUser/{id}', [UserController::class, 'destroy'])->name('deleteUser.store');

//--------------------------------------------------------------

//todo NOTA: Esta ruta te lleva a la vista para crear cursos.
Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');
Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');
Route::get('/courses/{id}/edit', [CourseController::class, 'edit'])->name('courses.edit');
Route::put('/courses/{id}', [CourseController::class, 'update'])->name('courses.update');
Route::delete('/courses/{id}', [CourseController::class, 'destroy'])->name('courses.destroy');