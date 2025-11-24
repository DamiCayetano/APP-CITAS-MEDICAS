<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medico;

class MedicoController extends Controller
{
    public function index()
    {
        $medicos = Medico::orderBy('id', 'desc')->get();
        return view('medicos.index', compact('medicos'));
    }

    public function create()
    {
        return view('medicos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre'       => 'required|string|max:255',
            'especialidad' => 'required|string|max:255',
            'telefono'     => 'nullable|string|max:20',
            'consultorio'  => 'nullable|string|max:255',
        ]);

        $data = $request->all();
        if (auth()->check()) {
            $data['user_id'] = auth()->id();
        }

        Medico::create($data);

        return redirect()->route('medicos.index')
            ->with('mensaje', 'Médico registrado correctamente');
    }

    public function edit(Medico $medico)
    {
        return view('medicos.edit', compact('medico'));
    }

    public function update(Request $request, Medico $medico)
    {
        $request->validate([
            'nombre'       => 'required|string|max:255',
            'especialidad' => 'required|string|max:255',
            'telefono'     => 'nullable|string|max:20',
            'consultorio'  => 'nullable|string|max:255',
        ]);

        $medico->update($request->all());

        return redirect()->route('medicos.index')
            ->with('mensaje', 'Médico actualizado correctamente');
    }

    public function destroy(Medico $medico)
    {
        $medico->delete();

        return redirect()->route('medicos.index')
            ->with('mensaje', 'Médico eliminado correctamente');
    }
}


