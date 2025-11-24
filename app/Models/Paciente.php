<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    // Campos que se pueden llenar masivamente
    protected $fillable = [
        'user_id',
        'nombre',
        'dni',
        'telefono',
        'direccion',
        'fecha_nacimiento',
    ];

    // Relación con usuario (opcional)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

