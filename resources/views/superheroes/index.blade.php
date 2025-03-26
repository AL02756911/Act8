@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Superheroes</h1>
    <a href="{{ route('superheroes.create') }}" class="btn btn-primary">Añadir Superheroe</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre Real</th>
                <th>Alias</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($superheroes as $superheroe)
            <tr>
                <td>{{ $superheroe->id }}</td>
                <td>{{ $superheroe->nombre_real }}</td>
                <td>{{ $superheroe->alias }}</td>
                <td>
                    <a href="{{ route('superheroes.show', $superheroe->id) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('superheroes.edit', $superheroe->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('superheroes.destroy', $superheroe->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Seguro que deseas eliminarlo?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
