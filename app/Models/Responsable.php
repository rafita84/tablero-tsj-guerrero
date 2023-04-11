<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Responsable extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'telefono',
        'observaciones',
        'email',
        'area_id',
        'user_id'
    ];

    public function area(){
        return $this->belongsTo(Area::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function proyectos(){
        return $this->hasMany(Proyecto::class);
    }

    public function actividades(){
        return $this->hasMany(Actividad::class);
    }
}
