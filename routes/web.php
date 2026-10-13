<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

// Middleware inline para autenticar automáticamente al primer usuario
class AutoLoginMiddleware
{
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            $user = User::first();
            if ($user) {
                Auth::login($user);
            }
        }
        return $next($request);
    }
}

// Ruta fallback para login
Route::get('/login', function () {
    return redirect('/dashboard');
})->name('login');

Route::get('/', function () {
    return redirect('/dashboard');
});

// Grupo de rutas: primero auto-login, luego verificación de permisos
Route::middleware([AutoLoginMiddleware::class])->group(function () {

    Route::get('/dashboard', [UserController::class, 'index'])
        ->name('dashboard')
        ->middleware('permission:ver usuarios');

    Route::get('/users/create', [UserController::class, 'create'])
        ->name('users.create')
        ->middleware('permission:crear usuarios');

    Route::post('/users', [UserController::class, 'store'])
        ->name('users.store')
        ->middleware('permission:crear usuarios');

    Route::get('/users/{id}/edit', [UserController::class, 'edit'])
        ->name('users.edit')
        ->middleware('permission:editar usuarios');

    Route::put('/users/{id}', [UserController::class, 'update'])
        ->name('users.update')
        ->middleware('permission:editar usuarios');

    Route::delete('/users/{id}', [UserController::class, 'destroy'])
        ->name('users.destroy')
        ->middleware('permission:borrar usuarios');
});