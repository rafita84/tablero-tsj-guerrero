<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Observacion extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'proyecto_id',
        'observacion',
        'leida'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function proyecto(){
        return $this->belongsTo(Proyecto::class);
    }
}
