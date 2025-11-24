<x-app-layout>
    <h2 class="text-2xl font-bold mb-4">Editar Médico</h2>

    <form action="{{ route('medicos.update', $medico) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nombre:</label>
            <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $medico->nombre) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Especialidad:</label>
            <input type="text" name="especialidad" class="form-control" value="{{ old('especialidad', $medico->especialidad) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Teléfono:</label>
            <input type="text" name="telefono" class="form-control" value="{{ old('telefono', $medico->telefono) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Consultorio:</label>
            <input type="text" name="consultorio" class="form-control" value="{{ old('consultorio', $medico->consultorio) }}">
        </div>

        <button type="submit" class="btn btn-warning">Actualizar</button>
        <a href="{{ route('medicos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</x-app-layout>

