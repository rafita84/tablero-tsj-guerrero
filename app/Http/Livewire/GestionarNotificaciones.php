<?php

namespace App\Http\Livewire;

use App\Models\Observacion;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class GestionarNotificaciones extends Component{

    public $notificaciones;
    public $recordatorios = [];

    public function render(){
        $this->notificaciones = Auth::user()->observacions()->where('leida',0)->orderBy('created_at','DESC')->get();
        if(Auth::user()->responsable) {
            $actividades = Auth::user()->responsable->proyectos()->with('actividades')->get()->pluck('actividades')->flatten();
        }else{
            $actividades = [];
        }

        $hoy = new \DateTime();

        foreach ($actividades as $actividad){
            if($actividad->concluida === 0 && $actividad->fecha_final < date('Y-m-d')){
                $this->recordatorios[] = ['proyecto' => $actividad->proyecto->nombre, 'mensaje' => 'La actividad ' . $actividad->nombre . ' está desfasada',
                    'fecha' => 'Finalizó: ' . $actividad->fecha_final];
            }
            $fechaInicio = new \DateTime($actividad->fecha_inicio);
            $dias = (int)$hoy->diff($fechaInicio)->format('%r%a');
            if($dias <= 3 && $dias >= 0){
                $this->recordatorios[] = ['proyecto' => $actividad->proyecto->nombre, 'mensaje' => 'La actividad ' . $actividad->nombre . ' está por iniciar',
                    'fecha' => 'Comienza: ' . $actividad->fecha_inicio];
            }
        }
        return view('livewire.gestionar-notificaciones');
    }

    public function marcar($id){
        $observacion = Observacion::find($id);
        $observacion->leida = 1;
        $observacion->save();
    }
}
