<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    public function index()
    {
        $pacientes = Paciente::orderBy('id', 'desc')->get();
        return view('pacientes.index', compact('pacientes'));
    }

    public function create()
    {
        return view('pacientes.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'nombre' => 'required',
        'dni' => 'required|digits:8|unique:pacientes',
        'telefono' => 'nullable',
        'direccion' => 'nullable',
        'fecha_nacimiento' => 'nullable|date',
    ]);

    $data = $request->all();
    $data['user_id'] = auth()->id(); // Rutas protegidas con auth

    Paciente::create($data);

    return redirect()->route('pacientes.index')
        ->with('mensaje', 'Paciente registrado correctamente');
}

    public function edit(Paciente $paciente)
    {
        return view('pacientes.edit', compact('paciente'));
    }

    public function update(Request $request, Paciente $paciente)
{
    $request->validate([
        'nombre'           => 'required|string|max:255',
        'dni'              => 'required|digits:8|unique:pacientes,dni,' . $paciente->id,
        'telefono'         => 'nullable|string|max:20',
        'direccion'        => 'nullable|string|max:255',
        'fecha_nacimiento' => 'nullable|date',
    ]);

    // Solo campos permitidos
    $data = $request->only(['nombre', 'dni', 'telefono', 'direccion', 'fecha_nacimiento']);

    $paciente->update($data);

    return redirect()->route('pacientes.index')
        ->with('mensaje', 'Paciente actualizado correctamente');
}


    public function destroy(Paciente $paciente)
    {
        $paciente->delete();

        return redirect()->route('pacientes.index')
            ->with('mensaje', 'Paciente eliminado correctamente');
    }
}




