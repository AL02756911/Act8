@extends('layouts.app')

@section('content')
<div class="container">
  <h1>Superheroes Eliminados</h1>
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
            <form action="{{ route('superheroes.restore', $superheroe->id) }}" method="POST" style="display:inline-block;">
              @csrf
              @method('PATCH')
              <button type="submit" class="btn btn-info btn-sm">Restaurar</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  @else
    <p>No hay superheroes eliminados.</p>
  @endif
  <a href="{{ route('superheroes.index') }}" class="btn btn-primary mt-3">Volver</a>
</div>
@endsection
