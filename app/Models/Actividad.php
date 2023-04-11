<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'responsable_id',
        'proyecto_id',
        'fecha_inicio',
        'fecha_final',
        'entregable',
        'concluida',
        'recurrente'
    ];

    public function responsable(){
        return $this->belongsTo(Responsable::class);
    }

    public function proyecto(){
        return $this->belongsTo(Proyecto::class);
    }
}
