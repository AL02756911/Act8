@extends('layouts.app')

@section('content')
<div class="container">
  <h1>Superheroes Activos</h1>
  <a href="{{ route('superheroes.create') }}" class="btn btn-success mb-3">Agregar Superheroe</a>
  <a href="{{ route('superheroes.trashed') }}" class="btn btn-secondary mb-3">Ver Eliminados</a>
  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif
  @if($superheroes->count())
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nombre Real</th>
          <th>Alias</th>
          <th>Foto</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach($superheroes as $superheroe)
        <tr>
          <td>{{ $superheroe->id }}</td>
          <td>{{ $superheroe->nombre_real }}</td>
          <td>{{ $superheroe->alias }}</td>
          <td>
            <img src="{{ asset('storage/' . $superheroe->foto) }}" alt="{{ $superheroe->alias }}" width="80">
          </td>
          <td>
            <a href="{{ route('superheroes.show', $superheroe) }}" class="btn btn-info btn-sm">Ver</a>
            <a href="{{ route('superheroes.edit', $superheroe) }}" class="btn btn-warning btn-sm">Editar</a>
            <form action="{{ route('superheroes.destroy', $superheroe) }}" method="POST" style="display:inline-block;">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger btn-sm" onclick="return confirm('Estas seguro?')">Eliminar</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  @else
    <p>No hay superheroes activos.</p>
  @endif
</div>
@endsection
