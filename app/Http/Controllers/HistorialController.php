<?php

namespace App\Http\Controllers;

use App\Models\Historial;
use App\Models\Cita;
use Illuminate\Http\Request;

class HistorialController extends Controller
{
    public function index()
    {
        $historiales = Historial::with('cita.paciente', 'cita.medico')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('historial.index', compact('historiales'));
    }

    public function create()
    {
        $citas = Cita::all();
        return view('historial.create', compact('citas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cita_id' => 'required|exists:citas,id',
            'diagnostico' => 'nullable|string',
            'receta' => 'nullable|string',
            'notas' => 'nullable|string',
        ]);

        Historial::create($request->all());

        return redirect()->route('historial.index')
            ->with('mensaje', 'Historial registrado correctamente');
    }

    public function edit(Historial $historial)
    {
        $citas = Cita::all();
        return view('historial.edit', compact('historial', 'citas'));
    }

    public function update(Request $request, Historial $historial)
    {
        $request->validate([
            'cita_id' => 'required|exists:citas,id',
            'diagnostico' => 'nullable|string',
            'receta' => 'nullable|string',
            'notas' => 'nullable|string',
        ]);

        $historial->update($request->all());

        return redirect()->route('historial.index')
            ->with('mensaje', 'Historial actualizado correctamente');
    }

    public function destroy(Historial $historial)
    {
        $historial->delete();

        return redirect()->route('historial.index')
            ->with('mensaje', 'Historial eliminado correctamente');
    }
}

