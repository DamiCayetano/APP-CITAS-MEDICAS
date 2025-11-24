<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Paciente;
use App\Models\Medico;
use Illuminate\Http\Request;

class CitaController extends Controller
{
    public function index()
    {
        $citas = Cita::with('paciente', 'medico')->get();
        return view('citas.index', compact('citas'));
    }

    public function create()
    {
        $pacientes = Paciente::all();
        $medicos = Medico::all();

        return view('citas.create', compact('pacientes', 'medicos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'paciente_id' => 'required',
            'medico_id' => 'required',
            'fecha' => 'required|date',
            'hora' => 'required',
        ]);

        // Validación de doble reserva
        $existe = Cita::where('medico_id', $request->medico_id)
                      ->where('fecha', $request->fecha)
                      ->where('hora', $request->hora)
                      ->exists();

        if ($existe) {
            return back()->with('error', 'Este médico ya tiene una cita a esa hora.');
        }

        Cita::create($request->all());

        return redirect()->route('citas.index')
            ->with('mensaje', 'Cita registrada correctamente');
    }

    public function edit(Cita $cita)
    {
        $pacientes = Paciente::all();
        $medicos = Medico::all();

        return view('citas.edit', compact('cita', 'pacientes', 'medicos'));
    }

    public function update(Request $request, Cita $cita)
    {
        $cita->update($request->all());

        return redirect()->route('citas.index')
            ->with('mensaje', 'Cita actualizada correctamente');
    }

    public function destroy(Cita $cita)
    {
        $cita->delete();

        return redirect()->route('citas.index');
    }
}
