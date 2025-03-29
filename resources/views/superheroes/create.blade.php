@extends('layouts.app')

@section('content')
<div class="container">
  <h1>Agregar Superheroe</h1>
  <form action="{{ route('superheroes.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="nombre_real">Nombre Real</label>
      <input type="text" name="nombre_real" class="form-control" required>
    </div>
    <div class="form-group">
      <label for="alias">Alias</label>
      <input type="text" name="alias" class="form-control" required>
    </div>
    <div class="form-group">
      <label for="foto">Foto (imagen)</label>
      <input type="file" name="foto" class="form-control-file" required>
    </div>
    <div class="form-group">
      <label for="informacion_adicional">Informacion Adicional</label>
      <textarea name="informacion_adicional" class="form-control"></textarea>
    </div>
    <button type="submit" class="btn btn-success mt-3">Guardar</button>
  </form>
  <a href="{{ route('superheroes.index') }}" class="btn btn-secondary mt-3">Volver</a>
</div>
@endsection
