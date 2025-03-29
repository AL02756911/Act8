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
        'foto' => 'required|image|max:2048',
        'informacion_adicional' => 'nullable|string',
    ]);

    if ($request->hasFile('foto')) {
        $path = $request->file('foto')->store('imagenes', 'public');
        $data = $request->all();
        $data['foto'] = $path;
    }

    Superheroe::create($data);

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
        'foto' => 'sometimes|image|max:2048',
        'informacion_adicional' => 'nullable|string',
    ]);

    $data = $request->all();

    if ($request->hasFile('foto')) {
        $path = $request->file('foto')->store('imagenes', 'public');
        $data['foto'] = $path;
    }

    $superheroe->update($data);

    return redirect()->route('superheroes.index')->with('success', 'Superheroe actualizado correctamente');
    }

    // Eliminar un superheroe
    public function destroy(Superheroe $superheroe)
    {
        $superheroe->delete();

        return redirect()->route('superheroes.index')->with('success', 'Superheroe eliminado correctamente');
    }

    public function restore($id)
    {
    $superheroe = Superheroe::withTrashed()->findOrFail($id);
    $superheroe->restore();

    return redirect()->route('superheroes.trashed')->with('success', 'Superheroe restaurado correctamente');
    }

    public function trashed()
    {
    $superheroes = Superheroe::onlyTrashed()->get();
    return view('superheroes.trashed', compact('superheroes'));
    }
}
