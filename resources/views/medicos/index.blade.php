<x-app-layout>
    <h2 class="text-2xl font-bold mb-4">Listado de Médicos</h2>

    <a href="{{ route('medicos.create') }}" class="btn btn-primary mb-3">
        Registrar Nuevo Médico
    </a>

    @if(session('mensaje'))
        <div class="alert alert-success">{{ session('mensaje') }}</div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Especialidad</th>
            <th>Teléfono</th>
            <th>Consultorio</th>
            <th>Acciones</th>
        </tr>

        @foreach($medicos as $medico)
        <tr>
            <td>{{ $medico->id }}</td>
            <td>{{ $medico->nombre }}</td>
            <td>{{ $medico->especialidad }}</td>
            <td>{{ $medico->telefono }}</td>
            <td>{{ $medico->consultorio }}</td>
            <td>
                <a href="{{ route('medicos.edit', $medico) }}" class="btn btn-warning btn-sm">Editar</a>

                <form action="{{ route('medicos.destroy', $medico) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</x-app-layout>
