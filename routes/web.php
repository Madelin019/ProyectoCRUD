<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RolController;
use App\Models\User;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/usuarios', [UserController::class, 'getUsers'])->name('users');
    Route::post('/usuarios/Nuevo', [UserController::class, 'postUser'])->name('user-post');
    Route::post('/usuarios/Editar/Usuario/{id}', [UserController::class, 'postEditUser'])->name('user-edit-post');
    Route::post('/usuarios/Eliminar/Usuario/{id}', [UserController::class, 'deleteUser'])->name('user-delete'); 
    

    //rutas, sin frontend
    Route::get('/Roles', [RolController::class, 'getRoles'])->name('roles');
    Route::post('/Roles/Nuevo', [RolController::class, 'postRol'])->name('rol-post');
    Route::post('/Roles/Editar/Rol/{id}', [RolController::class, 'postEditRol'])->name('rol-edit-post');

});
