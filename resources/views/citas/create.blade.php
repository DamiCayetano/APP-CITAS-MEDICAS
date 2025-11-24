@extends('layouts.app')

@section('content')
<h2>Registrar Cita</h2>

@if(session('error'))
<div class="alert alert-danger">{{ session('error') }}</div>
@endif

<form action="{{ route('citas.store') }}" method="POST">
    @csrf

    <label>Paciente:</label>
    <select name="paciente_id" class="form-control" required>
        <option value="">Seleccione</option>
        @foreach($pacientes as $p)
            <option value="{{ $p->id }}">{{ $p->nombre }} {{ $p->apellido }}</option>
        @endforeach
    </select>

    <label>Médico:</label>
    <select name="medico_id" class="form-control" required>
        <option value="">Seleccione</option>
        @foreach($medicos as $m)
            <option value="{{ $m->id }}">{{ $m->nombre }} - {{ $m->especialidad }}</option>
        @endforeach
    </select>

    <label>Fecha:</label>
    <input type="date" name="fecha" class="form-control" required>

    <label>Hora:</label>
    <input type="time" name="hora" class="form-control" required>

    <br>
    <button class="btn btn-primary">Guardar</button>
    <a href="{{ route('citas.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
