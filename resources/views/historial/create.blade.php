<x-app-layout>
    <h2 class="text-2xl font-bold mb-4">Agregar Historial</h2>

    <form action="{{ route('historial.store') }}" method="POST">
        @csrf

        <label>Cita:</label>
        <select name="cita_id" class="form-control" required>
            <option value="">Seleccione</option>
            @foreach($citas as $cita)
                <option value="{{ $cita->id }}">
                    {{ $cita->paciente->nombre ?? '' }} - {{ $cita->medico->nombre ?? '' }} - {{ $cita->fecha_hora }}
                </option>
            @endforeach
        </select>

        <label>Diagnóstico:</label>
        <textarea name="diagnostico" class="form-control"></textarea>

        <label>Receta:</label>
        <textarea name="receta" class="form-control"></textarea>

        <label>Notas:</label>
        <textarea name="notas" class="form-control"></textarea>

        <br>
        <button class="btn btn-primary">Guardar</button>
        <a href="{{ route('historial.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</x-app-layout>
