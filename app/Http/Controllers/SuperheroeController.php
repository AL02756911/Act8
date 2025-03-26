<?php

namespace App\Http\Controllers;

use App\Models\Superheroe;
use Illuminate\Http\Request;

class SuperheroeController extends Controller
{
    // Mostrar todos los superheroes
    public function index()
    {
        $superheroes = Superheroe::all();
        return view('superheroes.index', compact('superheroes'));
    }

    // Mostrar formulario para crear un nuevo superheroe
    public function create()
    {
        return view('superheroes.create');
    }

    // Guardar un nuevo superheroe
    public function store(Request $request)
    {
        $request->validate([
            'nombre_real' => 'required|string|max:255',
            'alias' => 'required|string|max:255',
            'foto' => 'required|url',
            'informacion_adicional' => 'nullable|string',
        ]);

        Superheroe::create($request->all());

        return redirect()->route('superheroes.index')->with('success', 'Superheroe creado correctamente');
    }

    // Mostrar los detalles de un superheroe
    public function show(Superheroe $superheroe)
    {
        return view('superheroes.show', compact('superheroe'));
    }

    // Mostrar formulario para editar un superheroe
    public function edit(Superheroe $superheroe)
    {
        return view('superheroes.edit', compact('superheroe'));
    }

    // Actualizar el superheroe en la base de datos
    public function update(Request $request, Superheroe $superheroe)
    {
        $request->validate([
            'nombre_real' => 'required|string|max:255',
            'alias' => 'required|string|max:255',
            'foto' => 'required|url',
            'informacion_adicional' => 'nullable|string',
        ]);

        $superheroe->update($request->all());

        return redirect()->route('superheroes.index')->with('success', 'Superheroe actualizado correctamente');
    }

    // Eliminar un superheroe
    public function destroy(Superheroe $superheroe)
    {
        $superheroe->delete();

        return redirect()->route('superheroes.index')->with('success', 'Superheroe eliminado correctamente');
    }
}
