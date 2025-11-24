<x-app-layout>
    <h2 class="text-2xl font-bold mb-4">Editar Historial</h2>

    <form action="{{ route('historiales.update', $historial) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Cita:</label>
        <select name="cita_id" class="form-control" required>
            @foreach($citas as $cita)
                <option value="{{ $cita->id }}" {{ $historial->cita_id == $cita->id ? 'selected' : '' }}>
                    {{ $cita->paciente->nombre ?? '' }} - {{ $cita->medico->nombre ?? '' }} - {{ $cita->fecha_hora }}
                </option>
            @endforeach
        </select>

        <label>Diagnóstico:</label>
        <textarea name="diagnostico" class="form-control">{{ $historial->diagnostico }}</textarea>

        <label>Receta:</label>
        <textarea name="receta" class="form-control">{{ $historial->receta }}</textarea>

        <label>Notas:</label>
        <textarea name="notas" class="form-control">{{ $historial->notas }}</textarea>

        <br>
        <button class="btn btn-warning">Actualizar</button>
        <a href="{{ route('historial.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</x-app-layout>
