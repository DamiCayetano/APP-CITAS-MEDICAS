@extends('layouts.app')

@section('content')
<h2>Listado de Citas</h2>

<a href="{{ route('citas.create') }}" class="btn btn-primary mb-3">Registrar Cita</a>

@if(session('mensaje'))
<div class="alert alert-success">{{ session('mensaje') }}</div>
@endif

@if(session('error'))
<div class="alert alert-danger">{{ session('error') }}</div>
@endif

<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Paciente</th>
        <th>Médico</th>
        <th>Fecha</th>
        <th>Hora</th>
        <th>Acciones</th>
    </tr>

    @foreach($citas as $cita)
    <tr>
        <td>{{ $cita->id }}</td>
        <td>{{ $cita->paciente->nombre }}</td>
        <td>{{ $cita->medico->nombre }}</td>
        <td>{{ $cita->fecha }}</td>
        <td>{{ $cita->hora }}</td>
        <td>
            <a href="{{ route('citas.edit', $cita) }}" class="btn btn-warning btn-sm">Editar</a>

            <form action="{{ route('citas.destroy', $cita) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm">Eliminar</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
