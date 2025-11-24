<x-app-layout>
    <h2 class="text-2xl font-bold mb-4">Historial de Citas</h2>

    <a href="{{ route('historial.create') }}" class="btn btn-primary mb-3">Agregar Historial</a>

    @if(session('mensaje'))
        <div class="alert alert-success">{{ session('mensaje') }}</div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Paciente</th>
            <th>Médico</th>
            <th>Diagnóstico</th>
            <th>Receta</th>
            <th>Notas</th>
            <th>Acciones</th>
        </tr>
        @foreach($historiales as $historial)
        <tr>
            <td>{{ $historial->id }}</td>
            <td>{{ $historial->cita->paciente->nombre ?? 'N/A' }}</td>
            <td>{{ $historial->cita->medico->nombre ?? 'N/A' }}</td>
            <td>{{ $historial->diagnostico }}</td>
            <td>{{ $historial->receta }}</td>
            <td>{{ $historial->notas }}</td>
            <td>
                <a href="{{ route('historial.edit', $historial) }}" class="btn btn-warning btn-sm">Editar</a>

                <form action="{{ route('historial.destroy', $historial) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</x-app-layout>
