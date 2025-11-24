<x-app-layout>
    <h2 class="text-2xl font-bold mb-4">Editar Cita</h2>

    <form action="{{ route('citas.update', $cita) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Paciente:</label>
        <select name="paciente_id" class="form-control" required>
            <option value="">Seleccione</option>
            @foreach($pacientes as $p)
                <option value="{{ $p->id }}" {{ $p->id == $cita->paciente_id ? 'selected' : '' }}>
                    {{ $p->nombre }} {{ $p->apellido ?? '' }}
                </option>
            @endforeach
        </select>

        <label>Médico:</label>
        <select name="medico_id" class="form-control" required>
            <option value="">Seleccione</option>
            @foreach($medicos as $m)
                <option value="{{ $m->id }}" {{ $m->id == $cita->medico_id ? 'selected' : '' }}>
                    {{ $m->nombre }} - {{ $m->especialidad }}
                </option>
            @endforeach
        </select>

        <label>Fecha y Hora:</label>
        <input type="datetime-local" name="fecha_hora" class="form-control" 
               value="{{ date('Y-m-d\TH:i', strtotime($cita->fecha_hora)) }}" required>

        <label>Estado:</label>
        <select name="estado" class="form-control" required>
            @foreach(['reservada','reprogramada','cancelada','completada'] as $estado)
                <option value="{{ $estado }}" {{ $cita->estado == $estado ? 'selected' : '' }}>{{ ucfirst($estado) }}</option>
            @endforeach
        </select>

        <label>Motivo:</label>
        <textarea name="motivo" class="form-control">{{ $cita->motivo }}</textarea>

        <br>
        <button class="btn btn-warning">Actualizar</button>
        <a href="{{ route('citas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</x-app-layout>

