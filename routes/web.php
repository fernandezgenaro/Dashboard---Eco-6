<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');

// Muestra el formulario
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');

// Guarda el nuevo usuario
Route::post('/users', [UserController::class, 'store'])->name('users.store');

// Elimina al usario creado
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

// Muestra el formulario con los datos cargados
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');

// Actualiza los datos en la base de datos
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');