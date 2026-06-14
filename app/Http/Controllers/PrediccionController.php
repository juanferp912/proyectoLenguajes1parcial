<?php

namespace App\Http\Controllers;
use App\Models\Prediccion;
use App\Models\Partido;
use Illuminate\Http\Request;

class PrediccionController extends Controller
{
    public function index()
    {
        // El usuario solo ve sus propias predicciones
        $predicciones = Prediccion::where('user_id', auth()->id())
            ->with(['partido.equipoLocal', 'partido.equipoVisitante'])
            ->get();

        return view('usuario.predicciones.index', compact('predicciones'));
    }

    public function create()
    {
        $partidosApostados = Prediccion::where('user_id', auth()->id())->pluck('partido_id');
        $partidos = Partido::whereNotIn('id', $partidosApostados)
                            ->where('fecha_partido', '>', now())
                            ->with(['equipoLocal', 'equipoVisitante'])
                            ->orderBy('fecha_partido', 'asc')
                            ->get();

        return view('usuario.predicciones.create', compact('partidos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'partido_id' => 'required|exists:partidos,id',
            'goles_local_prediccion' => 'required|integer|min:0',
            'goles_visitante_prediccion' => 'required|integer|min:0',
        ]);

        $yaAposto = Prediccion::where('user_id', auth()->id())
                            ->where('partido_id', $request->partido_id)
                            ->exists();

        if ($yaAposto) {
            return back()->withErrors(['partido_id' => 'Ya registraste una predicción para este partido.']);
        }

        // 3. Crear el registro con tu estructura exacta
        Prediccion::create([
            'user_id' => auth()->id(),
            'partido_id' => $request->partido_id,
            'goles_local_prediccion' => $request->goles_local_prediccion,
            'goles_visitante_prediccion' => $request->goles_visitante_prediccion,
        ]);

        return redirect()->route('predicciones.index')->with('success', '¡Predicción guardada con éxito!');
    }

    public function edit($id)
    {
        // Aseguramos que la predicción pertenezca al usuario antes de dejarlo editar
        $prediccion = Prediccion::where('user_id', auth()->id())->findOrFail($id);
        return view('usuario.predicciones.edit', compact('prediccion'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'goles_local_prediccion' => 'required|integer|min:0',
            'goles_visitante_prediccion' => 'required|integer|min:0',
        ]);

        $prediccion = Prediccion::where('user_id', auth()->id())->findOrFail($id);
        $prediccion->update($request->only(['goles_local_prediccion', 'goles_visitante_prediccion']));

        return redirect()->route('predicciones.index')->with('success', 'Predicción actualizada.');
    }

    public function destroy($id)
    {
        $prediccion = Prediccion::where('user_id', auth()->id())->findOrFail($id);
        $prediccion->delete();

        return redirect()->route('predicciones.index')->with('success', 'Predicción eliminada.');
    }
}