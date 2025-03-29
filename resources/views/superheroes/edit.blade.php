@extends('layouts.app')

@section('content')
<div class="container">
  <h1>Editar Superheroe</h1>
  <form action="{{ route('superheroes.update', $superheroe) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label for="nombre_real">Nombre Real</label>
      <input type="text" name="nombre_real" class="form-control" value="{{ $superheroe->nombre_real }}" required>
    </div>
    <div class="form-group">
      <label for="alias">Alias</label>
      <input type="text" name="alias" class="form-control" value="{{ $superheroe->alias }}" required>
    </div>
    <div class="form-group">
      <label for="foto">Foto (dejar vacio para mantener la actual)</label>
      <input type="file" name="foto" class="form-control-file">
      <br>
      <img src="{{ asset('storage/' . $superheroe->foto) }}" alt="{{ $superheroe->alias }}" width="80">
    </div>
    <div class="form-group">
      <label for="informacion_adicional">Informacion Adicional</label>
      <textarea name="informacion_adicional" class="form-control">{{ $superheroe->informacion_adicional }}</textarea>
    </div>
    <button type="submit" class="btn btn-success mt-3">Actualizar</button>
  </form>
  <a href="{{ route('superheroes.index') }}" class="btn btn-secondary mt-3">Volver</a>
</div>
@endsection
