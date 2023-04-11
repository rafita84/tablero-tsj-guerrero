<?php

namespace App\Http\Livewire;

use App\Models\Actividad;
use App\Models\Observacion;
use App\Models\Proyecto;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class MostrarProyectos extends Component{

    use WithPagination;

    public $buscar = '';
    public $mostrarObservaciones = false;
    public $mostrarActividades = false;
    public $nombre_proyecto;
    public $proyecto_id;
    public $actividades;
    public $observaciones;

    public function render(){
        if(Auth::user()->isAdministrador() || Auth::user()->isGerencial()){
            $proyectos = Proyecto::where('nombre','like','%' . $this->buscar .'%')
                ->orWhere('objetivo','LIKE','%' . $this->buscar . '%')
                ->orWhere('justificacion','LIKE','%' . $this->buscar . '%')
                ->orderBy('created_at','DESC')->paginate(6);
        }else if(Auth::user()->isEncargadoArea()){
            $area_id = Auth::user()->responsable->area->id;
            $proyectos = Proyecto::where('nombre','like','%' . $this->buscar .'%')
                ->whereHas('areas', function ($q) use($area_id){$q->where('id',$area_id);})
                ->where(function ($q) {
                    $q->orWhere('objetivo', 'LIKE', '%'.$this->buscar.'%')
                        ->orWhere('justificacion', 'LIKE', '%'.$this->buscar.'%');
                        })
                ->orderBy('created_at','DESC')->paginate(6);
        }else if(Auth::user()->isEncargadoProyecto()){
            $responsable_id = Auth::user()->responsable->id;
            $proyectos = Proyecto::where('nombre','like','%' . $this->buscar .'%')
                ->where('responsable_id', $responsable_id)
                ->where(function ($q){
                    return $q->orWhere('objetivo','LIKE','%' . $this->buscar . '%')
                            ->orWhere('justificacion','LIKE','%' . $this->buscar . '%');
                })
                ->orderBy('created_at','DESC')->paginate(6);
        }

        return view('livewire.mostrar-proyectos')->with('proyectos', $proyectos);
    }

    public function updatingBuscar(){
        $this->resetPage();
    }

    public function verObservaciones($id){
        $proyecto = Proyecto::find($id);
        $this->nombre_proyecto = $proyecto->nombre;
        $this->proyecto_id = $proyecto->id;
        $this->mostrarObservaciones = true;
    }

    public function verActividades($id){
        $proyecto = Proyecto::find($id);
        $this->nombre_proyecto = $proyecto->nombre;
        $this->proyecto_id = $proyecto->id;
        $this->actividades = $proyecto->actividades()->orderBy('fecha_final')->get();
        $this->mostrarActividades = true;
    }

    public function guardarObservaciones(){
        $observacion = new Observacion();
        $observacion->user_id = Auth::user()->id;
        $observacion->proyecto_id = $this->proyecto_id;
        $observacion->observacion = $this->observaciones;
        $observacion->leida = 0;
        $observacion->save();

        $this->mostrarObservaciones = false;
        $this->observaciones = '';

        session()->flash('message', 'Se ha agregado la observación al proyecto de manera correcta');
    }

    public function marcarActividad($id){
        $actividad = Actividad::find($id);
        $actividad->concluida = 1;
        $actividad->save();
        $this->recargarActividades();
    }

    public function desmarcarActividad($id){
        $actividad = Actividad::find($id);
        $actividad->concluida = 0;
        $actividad->save();
        $this->recargarActividades();
    }

    private function recargarActividades(){
        $this->actividades = Actividad::where('proyecto_id',$this->proyecto_id)->orderBy('fecha_final')->get();
    }
}
