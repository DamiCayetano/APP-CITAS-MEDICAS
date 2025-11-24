<x-app-layout>
    <h2 class="text-2xl font-bold mb-4">Listado de Citas</h2>

    <a href="{{ route('citas.create') }}" class="btn btn-primary mb-3">Registrar Nueva Cita</a>

    @if(session('mensaje'))
        <div class="alert alert-success">{{ session('mensaje') }}</div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Paciente</th>
            <th>Médico</th>
            <th>Fecha y Hora</th>
            <th>Estado</th>
            <th>Motivo</th>
            <th>Acciones</th>
        </tr>
        @foreach($citas as $cita)
        <tr>
            <td>{{ $cita->id }}</td>
            <td>{{ $cita->paciente->nombre ?? 'Sin paciente' }}</td>
            <td>{{ $cita->medico->nombre ?? 'Sin médico' }}</td>
            <td>{{ $cita->fecha_hora }}</td>
            <td>{{ $cita->estado }}</td>
            <td>{{ $cita->motivo }}</td>
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
</x-app-layout>

