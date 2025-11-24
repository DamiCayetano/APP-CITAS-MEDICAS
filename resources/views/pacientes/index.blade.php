<x-app-layout>
    <h2 class="text-2xl font-bold mb-4">Listado de Pacientes</h2>

    <a href="{{ route('pacientes.create') }}" class="btn btn-primary mb-3">
        Registrar Nuevo Paciente
    </a>

    @if(session('mensaje'))
        <div class="alert alert-success">{{ session('mensaje') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>DNI</th>
                <th>Teléfono</th>
                <th>Dirección</th>
                <th>Fecha de Nacimiento</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pacientes as $paciente)
            <tr>
                <td>{{ $paciente->id }}</td>
                <td>{{ $paciente->nombre }}</td>
                <td>{{ $paciente->dni }}</td>
                <td>{{ $paciente->telefono ?? '-' }}</td>
                <td>{{ $paciente->direccion ?? '-' }}</td>
                <td>{{ $paciente->fecha_nacimiento ?? '-' }}</td>
                <td>
                    <a href="{{ route('pacientes.edit', $paciente) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('pacientes.destroy', $paciente) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>




