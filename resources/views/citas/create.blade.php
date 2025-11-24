<x-app-layout>
    <h2 class="text-2xl font-bold mb-4">Registrar Cita</h2>

    <form action="{{ route('citas.store') }}" method="POST">
        @csrf

        <label>Paciente:</label>
        <select name="paciente_id" class="form-control" required>
            <option value="">Seleccione</option>
            @foreach($pacientes as $p)
                <option value="{{ $p->id }}">{{ $p->nombre }} {{ $p->apellido ?? '' }}</option>
            @endforeach
        </select>

        <label>Médico:</label>
        <select name="medico_id" class="form-control" required>
            <option value="">Seleccione</option>
            @foreach($medicos as $m)
                <option value="{{ $m->id }}">{{ $m->nombre }} - {{ $m->especialidad }}</option>
            @endforeach
        </select>

        <label>Fecha y Hora:</label>
        <input type="datetime-local" name="fecha_hora" class="form-control" required>

        <label>Motivo:</label>
        <textarea name="motivo" class="form-control"></textarea>

        <br>
        <button class="btn btn-primary">Guardar</button>
        <a href="{{ route('citas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</x-app-layout>

