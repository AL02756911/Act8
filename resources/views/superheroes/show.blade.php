@extends('layouts.app')

@section('content')
<div class="container">
  <h1>Detalles del Superheroe</h1>
  <div class="card mb-3">
    <img src="{{ asset('storage/' . $superheroe->foto) }}" class="card-img-top" alt="{{ $superheroe->alias }}">
    <div class="card-body">
      <h2 class="card-title">{{ $superheroe->alias }}</h2>
      <p class="card-text"><strong>Nombre Real:</strong> {{ $superheroe->nombre_real }}</p>
      <p class="card-text"><strong>Informacion Adicional:</strong> {{ $superheroe->informacion_adicional }}</p>
      <a href="{{ route('superheroes.index') }}" class="btn btn-primary">Volver</a>
    </div>
  </div>
</div>
@endsection
