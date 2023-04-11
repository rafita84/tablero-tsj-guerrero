<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    public static $niveles = [
        1 => 'Encargado de Proyecto',
        2 => 'Encargado de Área',
        3 => 'Administrador de Proyectos',
        4 => 'Administrador Gerencial',
        99 => 'Administrador del Sistema'
    ];

    public function getNivel($nivel){
        return User::$niveles[$nivel];
    }

    public function responsable(){
        return $this->hasOne(Responsable::class);
    }

    public function observacions(){
        return $this->hasMany(Observacion::class);
    }

    public function isAdministrador(){
        return $this->nivel == 3 || $this->nivel == 99;
    }

    public function isGerencial(){
        return $this->nivel == 4;
    }

    public function isEncargadoArea(){
        return $this->nivel == 2;
    }

    public function isEncargadoProyecto(){
        return $this->nivel == 1;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'nivel',
        'username',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];
}
