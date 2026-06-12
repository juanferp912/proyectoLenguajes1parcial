<?php

namespace App\Http\Controllers;
use App\Models\Equipo;
use Illuminate\Http\Request;

class EquipoController extends Controller
{
    // Mostrar lista de equipos al Admin
    public function index()
    {
        $equipos = Equipo::all();
        return view('admin.equipos.index', compact('equipos'));
    }

    // Mostrar formulario de creación
    public function create()
    {
        return view('admin.equipos.create');
    }

    // Guardar el nuevo equipo
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|unique:equipos|max:255',
            'bandera_url' => 'required|url', // Validamos que sea un link del CDN
        ]);

        Equipo::create($request->all());

        return redirect()->route('equipos.index')->with('success', 'Equipo creado exitosamente.');
    }

    // Mostrar formulario de edición
    public function edit($id)
    {
        $equipo = Equipo::findOrFail($id);
        return view('admin.equipos.edit', compact('equipo'));
    }

    // Actualizar el equipo
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|max:255|unique:equipos,nombre,' . $id,
            'bandera_url' => 'required|url',
        ]);

        $equipo = Equipo::findOrFail($id);
        $equipo->update($request->all());

        return redirect()->route('equipos.index')->with('success', 'Equipo actualizado exitosamente.');
    }

    // Eliminar el equipo
    public function destroy($id)
    {
        $equipo = Equipo::findOrFail($id);
        $equipo->delete();

        return redirect()->route('equipos.index')->with('success', 'Equipo eliminado correctamente.');
    }
}