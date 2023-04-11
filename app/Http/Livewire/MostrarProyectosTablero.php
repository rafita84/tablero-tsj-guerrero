<?php

namespace App\Http\Livewire;

use App\Models\Proyecto;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class MostrarProyectosTablero extends Component{

    use WithPagination;

    public $buscar = '';
    public $recordatorios = [];
    public $mostrarRecordatorios = false;
    public $mostrar = true;

    public function render(){
        if(Auth::user()->isAdministrador() || Auth::user()->isGerencial()){
            $proyectos = Proyecto::where('nombre','like','%' . $this->buscar .'%')
                ->orderBy('created_at','DESC')->paginate(env('PAGINATE'));
        }else if(Auth::user()->isEncargadoArea()){
            $area_id = Auth::user()->responsable->area->id;
            $proyectos = Proyecto::where('nombre','like','%' . $this->buscar .'%')
                ->whereHas('areas', function ($q) use($area_id){$q->where('id',$area_id);})
                ->orderBy('created_at','DESC')->paginate(env('PAGINATE'));
        }else if(Auth::user()->isEncargadoProyecto()){
            $responsable_id = Auth::user()->responsable->id;
            $proyectos = Proyecto::where('nombre','like','%' . $this->buscar .'%')
                ->where('responsable_id', $responsable_id)
                ->orderBy('created_at','DESC')->paginate(env('PAGINATE'));
        }


        if(Auth::user()->responsable) {
            $actividades = Auth::user()->responsable->proyectos()->with('actividades')->get()->pluck('actividades')->flatten();
        }else{
            $actividades = [];
        }

        $hoy = new \DateTime();
        $this->recordatorios = [];
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
        $this->mostrarRecordatorios = count($this->recordatorios) && $this->mostrar;
        return view('livewire.mostrar-proyectos-tablero')->with('proyectos', $proyectos);
    }

    public function ocultarRecordatorios(){
        $this->mostrar = false;
    }
}
