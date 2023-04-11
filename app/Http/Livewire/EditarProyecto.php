<?php

namespace App\Http\Livewire;

use App\Models\Actividad;
use App\Models\Area;
use App\Models\Bitacora;
use App\Models\Proyecto;
use App\Models\Recurso;
use App\Models\Responsable;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditarProyecto extends Component{

    use WithFileUploads;

    public $id_;
    public $responsable_nombre;

    public $nombre;
    public $eje_estrategico;
    public $objetivo;
    public $justificacion;
    public $elabora;
    public $aprueba;
    public $fecha_aprobacion;
    public $recursos = [];
    public $areas = [];
    public $actividades = [];
    public $imagen;
    public $ruta_imagen;

    public $concepto, $costo, $periodicidad, $area_id;
    public $actividad, $responsable, $fecha_inicio, $fecha_fin, $entregable;

    public function mount($id){
        $this->id_ = $id;
        $proyecto = Proyecto::find($id);
        $this->responsable_nombre = $proyecto->responsable->nombre;
        $this->nombre = $proyecto->nombre;
        $this->eje_estrategico = $proyecto->eje_estrategico;
        $this->objetivo = $proyecto->objetivo;
        $this->justificacion = $proyecto->justificacion;
        $this->elabora = $proyecto->elabora;
        $this->aprueba = $proyecto->aprueba;
        $this->fecha_aprobacion = $proyecto->fecha_aprobacion;
        $this->ruta_imagen = $proyecto->imagen ? \Storage::disk('public')->url('proyectos/' . $proyecto->imagen) :
            '';

        foreach ($proyecto->recursos as $recurso){
            $this->recursos[] = ['id' => $recurso->id, 'concepto' => $recurso->concepto, 'costo' => $recurso->costo];
        }

        foreach ($proyecto->areas()->get() as $area){
            $this->areas[] = ['id' => $area->id, 'nombre' => $area->nombre];
        }

        foreach ($proyecto->actividades()->orderBy('fecha_final')->get() as $actividad){
            $this->actividades[] = ['id' => $actividad->id, 'actividad' => $actividad->nombre, 'responsable_id' => $actividad->responsable_id,
                'responsable' => $actividad->responsable->nombre, 'fecha_inicio' => $actividad->fecha_inicio, 'fecha_fin' => $actividad->fecha_final,
                'entregable' => $actividad->entregable];
        }
    }

    public function render(){
        $areasInvolucradas = Area::orderBy('nombre')->get();
        $responsables = Responsable::orderBy('nombre')->get();
        return view('livewire.editar-proyecto', ['areasInvolucradas' => $areasInvolucradas, 'responsables' => $responsables]);
    }

    public function guardar(){
        $this->validate([
            'nombre' => 'required',
            'eje_estrategico' => 'required',
            'objetivo' => 'required',
            'aprueba' => 'required',
            'imagen' => 'nullable|image|max:4096'
        ]);

        if(count($this->recursos)){
            if(count($this->areas)){
                if(count($this->actividades)){
                    $proyecto = Proyecto::find($this->id_);
                    $proyecto->nombre = $this->nombre;
                    $proyecto->eje_estrategico = $this->eje_estrategico;
                    $proyecto->objetivo = $this->objetivo;
                    $proyecto->justificacion = $this->justificacion;
                    $proyecto->elabora = $this->elabora;
                    $proyecto->aprueba = $this->aprueba;
                    if($this->fecha_aprobacion != '') {
                        $proyecto->fecha_aprobacion = $this->fecha_aprobacion;
                    }
                    if($this->imagen) {
                        $nombre_archivo = bin2hex(random_bytes(16));
                        $this->imagen->storeAs('public/proyectos', $nombre_archivo);
                        $proyecto->imagen = $nombre_archivo;
                    }elseif ($this->ruta_imagen == null && $proyecto->imagen){
                        $proyecto->imagen = null;
                    }
                    $proyecto->save();

                    $recursos = $proyecto->recursos()->get();

                    foreach ($recursos as $rec){
                        $rec = Recurso::find($rec->id);
                        if(!in_array($rec->id, array_column($this->recursos, 'id'))){
                            $bitacora = new Bitacora();
                            $bitacora->user_id = \Auth::user()->id;
                            $bitacora->proyecto_id = $proyecto->id;
                            $bitacora->accion = 'Eliminó el recurso ' . $rec->concepto . ', costo: ' . $rec->costo;
                            $bitacora->save();
                            $rec->delete();
                        }
                    }

                    foreach ($this->recursos as $rec){
                        if($rec['id'] == 0) {
                            $recurso = new Recurso();
                            $recurso->concepto = $rec['concepto'];
                            $recurso->costo = $rec['costo'];
                            $recurso->periodicidad = $rec['periodicidad'];
                            $recurso->proyecto_id = $proyecto->id;
                            $recurso->save();
                            $bitacora = new Bitacora();
                            $bitacora->user_id = \Auth::user()->id;
                            $bitacora->proyecto_id = $proyecto->id;
                            $bitacora->accion = 'Agregó el recurso ' . $recurso->concepto . ', costo: ' . $recurso->costo;
                            $bitacora->save();
                        }
                    }

                    $proyecto->areas()->sync(array_column($this->areas, 'id'));

                    $actividades = $proyecto->actividades()->get();

                    foreach ($actividades as $actividad){
                        $actividad = Actividad::find($actividad->id);
                        if(!in_array($actividad->id, array_column($this->actividades, 'id'))){
                            $bitacora = new Bitacora();
                            $bitacora->user_id = \Auth::user()->id;
                            $bitacora->proyecto_id = $proyecto->id;
                            $bitacora->accion = 'Eliminó la actividad ' . $actividad->nombre . ', responsable: ' . $actividad->responsable->nombre
                            . ', fecha inicio: ' . $actividad->fecha_inicio . ', fecha fin: ' . $actividad->fecha_final . ', entregable: ' . $actividad->entregable;
                            $bitacora->save();
                            $actividad->delete();
                        }
                    }

                    foreach ($this->actividades as $act){
                        if($act['id'] == 0) {
                            $actividad = new Actividad();
                            $actividad->nombre = $act['actividad'];
                            $actividad->responsable_id = $act['responsable_id'];
                            $actividad->proyecto_id = $proyecto->id;
                            $actividad->fecha_inicio = $act['fecha_inicio'];
                            $actividad->fecha_final = $act['fecha_fin'];
                            $actividad->entregable = $act['entregable'];
                            $actividad->save();

                            $bitacora = new Bitacora();
                            $bitacora->user_id = \Auth::user()->id;
                            $bitacora->proyecto_id = $proyecto->id;
                            $bitacora->accion = 'Agregó la actividad ' . $actividad->nombre . ', responsable: ' . $actividad->responsable->nombre
                                . ', fecha inicio: ' . $actividad->fecha_inicio . ', fecha fin: ' . $actividad->fecha_final . ', entregable: ' . $actividad->entregable;
                            $bitacora->save();
                        }
                    }

                    return redirect('/proyectos/todos')->with('success','Se ha actualizado el proyecto correctamente');
                }else{
                    session()->flash('messages', 'No se han agregado actividades al proyecto');
                }
            }else{
                session()->flash('messages', 'No se han agregado áreas al proyecto');
            }
        }else{
            session()->flash('messages', 'No se han agregado recursos al proyecto');
        }
    }

    public function borrarRecurso($key){
        array_splice($this->recursos, $key, 1);
    }

    public function agregarRecurso(){
        $this->validate([
            'costo' => 'gt:0',
            'concepto' => 'min:5',
            'periodicidad' => 'required|gt:0'
        ]);
        $this->recursos[] = ['id' => 0, 'concepto' => $this->concepto, 'costo' => $this->costo, 'periodicidad' => $this->periodicidad];
        $this->concepto = '';
        $this->costo = '';
    }

    public function agregarArea(){
        $this->validate([
            'area_id' => 'required|gt:0'
        ]);

        if(in_array($this->area_id, array_column($this->areas, 'id'))){
            session()->flash('messages','Ya se ha asignado esta área');
        }else {
            $nombre = Area::find($this->area_id)->nombre;
            $this->areas[] = ['id' => $this->area_id, 'nombre' => $nombre];
        }
    }

    public function borrarArea($key){
        array_splice($this->areas, $key, 1);
    }

    public function agregarActividad(){
        $this->validate([
            'actividad' => 'required',
            'responsable' => 'required|gt:0',
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required',
            'entregable' => 'required'
        ]);

        $nombre = Responsable::find($this->responsable)->nombre;

        $this->actividades[] = ['id' => 0, 'actividad' => $this->actividad, 'responsable_id' => $this->responsable,
            'responsable' => $nombre, 'fecha_inicio' => $this->fecha_inicio, 'fecha_fin' => $this->fecha_fin, 'entregable' => $this->entregable];

        array_multisort(array_column($this->actividades, 'fecha_fin'), $this->actividades);

        $this->actividad = '';
        $this->entregable = '';
    }

    public function borrarActividad($key){
        array_splice($this->actividades, $key, 1);
    }

    public function eliminarFoto(){
        $this->imagen = null;
        $this->ruta_imagen = null;
    }

    public function updatedImagen(){
        if($this->imagen){
            $this->ruta_imagen = $this->imagen->temporaryUrl();
        }
    }
}
