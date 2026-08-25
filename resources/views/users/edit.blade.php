@extends('layouts.master')

@section('contenido')
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Editar Usuario</h1>
        </div>
      </div>
    </div>
  </div>

  <div class="card p-4">
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="name">Nombre:</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}" required>
            @error('name')
                <span class="text-danger small">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="email">Correo Electrónico:</label>
            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}" required>
            @error('email')
                <span class="text-danger small">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="password">Nueva Contraseña (opcional):</label>
            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror">
            <small class="form-text text-muted">Déjalo en blanco si no deseas cambiar la contraseña.</small>
            @error('password')
                <span class="text-danger small">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-warning">
            <i class="fas fa-sync-alt"></i> Actualizar Usuario
        </button>
        <a href="{{ route('dashboard') }}" class="btn btn-secondary">
            Cancelar
        </a>
    </form>
  </div>
@endsection