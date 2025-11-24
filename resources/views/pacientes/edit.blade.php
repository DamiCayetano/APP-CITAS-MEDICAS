<x-app-layout>
    <h2 class="text-2xl font-bold mb-4">Editar Paciente</h2>

    <form action="{{ route('pacientes.update', $paciente) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nombre:</label>
            <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $paciente->nombre) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">DNI:</label>
            <input type="number" name="dni" class="form-control" value="{{ old('dni', $paciente->dni) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Teléfono:</label>
            <input type="text" name="telefono" class="form-control" value="{{ old('telefono', $paciente->telefono) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Dirección:</label>
            <input type="text" name="direccion" class="form-control" value="{{ old('direccion', $paciente->direccion) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Fecha de Nacimiento:</label>
            <input type="date" name="fecha_nacimiento" class="form-control" value="{{ old('fecha_nacimiento', $paciente->fecha_nacimiento) }}">
        </div>

        <button type="submit" class="btn btn-warning">Actualizar</button>
        <a href="{{ route('pacientes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</x-app-layout>


