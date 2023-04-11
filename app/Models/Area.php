<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'observaciones',
        'titular',
        'direccion',
        'ciudad',
        'numero_telefonico'
    ];

    public function responsables(){
        return $this->hasMany(Responsable::class);
    }

    public function proyectos(){
        return $this->belongsToMany(Proyecto::class);
    }

}
