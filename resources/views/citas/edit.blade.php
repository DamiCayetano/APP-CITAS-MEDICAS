@extends('layouts.app')

@section('content')
<h2>Editar Cita</h2>

<form action="{{ route('citas.update', $cita) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Paciente:</label>
    <select name="paciente_id" class="form-control" required>
        @foreach($pacientes as $p)
            <option value="{{ $p->id }}" {{ $cita->paciente_id == $p->id ? 'selected' : '' }}>
                {{ $p->nombre }} {{ $p->apellido }}
            </option>
        @endforeach
    </select>

    <label>Médico:</label>
    <select name="medico_id" class="form-control" required>
        @foreach($medicos as $m)
            <option value="{{ $m->id }}" {{ $cita->medico_id == $m->id ? 'selected' : '' }}>
                {{ $m->nombre }} - {{ $m->especialidad }}
            </option>
        @endforeach
    </select>

    <label>Fecha:</label>
    <input type="date" name="fecha" class="form-control" value="{{ $cita->fecha }}" required>

    <label>Hora:</label>
    <input type="time" name="hora" class="form-control" value="{{ $cita->hora }}" required>

    <br>
    <button class="btn btn-warning">Actualizar</button>
    <a href="{{ route('citas.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
