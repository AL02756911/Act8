@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Añadir Superheroe</h1>
    <form action="{{ route('superheroes.store') }}" method="POST">
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
            <label for="foto">URL de la Foto</label>
            <input type="url" name="foto" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="informacion_adicional">Información Adicional</label>
            <textarea name="informacion_adicional" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-success mt-3">Guardar</button>
    </form>
</div>
@endsection
