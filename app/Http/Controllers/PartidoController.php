<?php

namespace App\Http\Controllers;
use App\Models\Partido;
use App\Models\Equipo;
use Illuminate\Http\Request;

class PartidoController extends Controller
{
    public function index()
    {
        // Usamos con('equipoLocal', 'equipoVisitante') para evitar el problema de consultas N+1
        $partidos = Partido::with(['equipoLocal', 'equipoVisitante'])->get();
        return view('admin.partidos.index', compact('partidos'));
    }

    public function create()
    {
        $equipos = Equipo::all(); // Necesarios para elegir local y visitante
        return view('admin.partidos.create', compact('equipos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'equipo_local_id' => 'required|exists:equipos,id',
            'equipo_visitante_id' => 'required|exists:equipos,id|different:equipo_local_id', // No pueden jugar contra sí mismos
            'fecha_partido' => 'required|date',
        ]);

        // Se crea con goles en null o 0 por defecto hasta que se juegue
        Partido::create([
            'equipo_local_id' => $request->equipo_local_id,
            'equipo_visitante_id' => $request->equipo_visitante_id,
            'goles_local' => $request->goles_local ?? 0,
            'goles_visitante' => $request->goles_visitante ?? 0,
            'fecha_partido' => $request->fecha_partido,
        ]);

        return redirect()->route('partidos.index')->with('success', 'Partido creado exitosamente.');
    }

    public function edit($id)
    {
        $partido = Partido::findOrFail($id);
        $equipos = Equipo::all();
        return view('admin.partidos.edit', compact('partido', 'equipos'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'equipo_local_id' => 'required|exists:equipos,id',
            'equipo_visitante_id' => 'required|exists:equipos,id|different:equipo_local_id',
            'goles_local' => 'nullable|integer|min:0',
            'goles_visitante' => 'nullable|integer|min:0',
            'fecha_partido' => 'required|date',
        ]);

        $partido = Partido::findOrFail($id);
        $partido->update($request->all());

        return redirect()->route('partidos.index')->with('success', 'Partido actualizado con éxito.');
    }

    public function destroy($id)
    {
        $partido = Partido::findOrFail($id);
        $partido->delete();

        return redirect()->route('partidos.index')->with('success', 'Partido eliminado.');
    }
}