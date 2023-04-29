<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController; // * Importa el controlador de la vista home.


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
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware(['auth','verified'])->name('home');
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
Route::get('/createUsers', function () {
    return view('adminPanel.users');
})->name('users');

Route::post('/createUsers', function (Illuminate\Http\Request $request) {
    $request->validate([
        'name' => 'required',
        'email' => 'required',
        'password' => 'required',
        'role' => 'required',
    ]);
    // Mapea los valores numéricos a sus respectivas cadenas
    $roleOptions = [
        1 => 'student',
        2 => 'teacher',
        3 => 'admin',
    ];
    $user = new App\Models\User();
    $user->name = $request->name;
    $user->lastname = $request->lastname;
    $user->email = $request->email;
    $user->email_verified_at = now();
    // encripta la contraseña
    $user->password = bcrypt($request->password);
    // Busca la cadena correspondiente para el valor numérico seleccionado en el desplegable
    $user->role = $roleOptions[$request->role];
    $user->save();
    return redirect('/adminPanel');
})->name('users.store');
//--------------------------------------------------------------
//todo NOTA: Esta ruta te lleva a la vista para listar los usuarios.
Route::get('/userList', function () {
    $users = App\Models\User::all();
    // Obtener los parámetros de ordenamiento y dirección de la URL
    $orderBy = request()->query('orderBy', 'name');
    $direction = request()->query('direction', 'asc');

    // Obtener los usuarios ordenados por el campo y dirección especificados
    $users = App\Models\User::orderBy($orderBy, $direction)->paginate(10);

    return view('adminPanel.userList', compact('users'));
})->name('usersList');

//todo NOTA: Esta ruta te lleva a la vista para editar los usuarios.
Route::get('/editUser/{id}', function ($id) {
    $user = App\Models\User::find($id);
    return view('adminPanel.editUser', compact('user'));
})->name('editUser');

Route::put('/editUser/{id}', function (Illuminate\Http\Request $request, $id) {
    $request->validate([
        'name' => 'required',
        'email' => 'required',
        'password' => 'required',
        'role' => 'required',
    ]);
    // Mapea los valores numéricos a sus respectivas cadenas
    $roleOptions = [
        1 => 'student',
        2 => 'teacher',
        3 => 'admin',
    ];
    $user = App\Models\User::find($id);
    $user->name = $request->name;
    $user->lastname = $request->lastname;
    $user->email = $request->email;
    $user->email_verified_at = now();
    $user->password = $request->password;
    // Busca la cadena correspondiente para el valor numérico seleccionado en el desplegable
    $user->role = $roleOptions[$request->role];
    $user->save();
    return redirect('/userList');
})->name('editUser.store');

//todo NOTA: Esta ruta te lleva a la vista para eliminar los usuarios.
Route::get('/deleteUser/{id}', function ($id) {
    $user = App\Models\User::find($id);
    return view('adminPanel.deleteUser', compact('user'));
})->name('deleteUser');

Route::delete('/deleteUser/{id}', function ($id) {
    $user = App\Models\User::find($id);
    $user->delete();
    return redirect('/userList');
})->name('deleteUser.store');


//--------------------------------------------------------------

// ! 💀 PRUEBA: Ruta para el formulario de recuperación de contraseña. 💀
Route::get('/f', function () {
    return view('auth.passwords.reset');
})->name('reset');
