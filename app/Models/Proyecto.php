<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    use HasFactory;

    public static $ejes = [
        'Justicia efectiva, transparente y confiable',
        'Justicia integral para todas y todos',
        'Justicia innovadora y funcional',
        'Justicia profesional de calidad y con rostro humano',
        'Justicia laboral, derechos humanos e igualdad de género'
    ];

    protected $fillable = [
        'nombre',
        'eje_estrategico',
        'objetivo',
        'responsable_id',
        'justificacion',
        'elabora',
        'aprueba',
        'fecha_aprobacion'
    ];

    public function responsable(){
        return $this->belongsTo(Responsable::class);
    }

    public function actividades(){
        return $this->hasMany(Actividad::class);
    }

    public function recursos(){
        return $this->hasMany(Recurso::class);
    }

    public function bitacoras(){
        return $this->hasMany(Bitacora::class);
    }

    public function areas(){
        return $this->belongsToMany(Area::class);
    }

    public function observacions(){
        return $this->hasMany((Observacion::class));
    }

    public function avance(){
        $concluidas = 0;
        $conteo = 0;
        foreach ($this->hasMany(Actividad::class)->get() as $actividad){
            $concluidas += $actividad->concluida;
            $conteo++;
        }
        $conteo == 0 ? $devolver = 0 : $devolver = $concluidas / $conteo;
        return number_format($devolver * 100, 2);
    }

    public function costo() {
        $costo = 0;
        foreach ($this->hasMany(Recurso::class)->get() as $recurso){
            $costo += $recurso->costo * $recurso->periodicidad;
        }

        return number_format($costo, 2);
    }

    public function fechaInicio(){
        if(count($this->hasMany(Actividad::class)->get()))
        return $this->hasMany(Actividad::class)->orderBy('fecha_inicio', 'ASC')->first()->fecha_inicio;
        else return '';
    }

    public function fechaFinal(){
        if(count($this->hasMany(Actividad::class)->get()))
            return $this->hasMany(Actividad::class)->orderBy('fecha_final', 'DESC')->first()->fecha_final;
        else return '';
    }

    public function restarDias(){
        if($this->fechaFinal() != '') {
            $fechaFin = new \DateTime($this->fechaFinal());
            $hoy = new \DateTime();
            return $hoy->diff($fechaFin)->days;
        }else{
            return '';
        }
    }

}
