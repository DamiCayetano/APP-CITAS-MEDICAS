<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
    use HasFactory;

    protected $fillable = [
        'cita_id',
        'diagnostico',
        'receta',
        'notas',
    ];

    // Relación con Cita
    public function cita()
    {
        return $this->belongsTo(Cita::class);
    }
}
