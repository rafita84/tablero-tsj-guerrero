<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recurso extends Model
{
    use HasFactory;

    public static $periodicidades = [
        1 => 'Anual',
        2 => 'Semestral',
        3 => 'Cuatrimestral',
        4 => 'Trimestral',
        6 => 'Bimestral',
        12 => 'Mensual',
        24 => 'Quincenal',
        52 => 'Semanal'
    ];

    public static function getPeriodicidad($indice){
        return Recurso::$periodicidades[$indice];
    }

    protected $fillable = [
        'concepto',
        'costo',
        'proyecto_id'
    ];

    public function proyecto(){
        return $this->belongsTo(Proyecto::class);
    }
}
