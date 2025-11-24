<x-app-layout>
<h2>Registrar Médico</h2>

<form action="{{ route('medicos.store') }}" method="POST">
    @csrf

    <label>Nombre:</label>
    <input type="text" name="nombre" class="form-control" required>

    <label>Especialidad:</label>
    <input type="text" name="especialidad" class="form-control" required>

    <label>Teléfono:</label>
    <input type="number" name="telefono" class="form-control" required>

    <label>Consultorio:</label>
    <input type="text" name="consultorio" class="form-control" required>

    <br>
    <button class="btn btn-primary">Guardar</button>
    <a href="{{ route('medicos.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
</x-app-layout>
