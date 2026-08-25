@extends('layouts.master')

@section('contenido')
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Agregar Nuevo Usuario</h1>
        </div>
      </div>
    </div>
  </div>

  <div class="card p-4">
    <form action="{{ route('users.store') }}" method="POST">
        @csrf

        <div class="form-group mb-3">
            <label for="name">Nombre:</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
            @error('name')
                <span class="text-danger small">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="email">Correo Electrónico:</label>
            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
            @error('email')
                <span class="text-danger small">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="password">Contraseña:</label>
            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" required>
            @error('password')
                <span class="text-danger small">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">
            <i class="fas fa-save"></i> Guardar Usuario
        </button>
        <a href="{{ route('dashboard') }}" class="btn btn-secondary">
            Cancelar
        </a>
    </form>
  </div>
@endsection