<?php

namespace App\Http\Livewire;

use App\Models\Actividad;
use App\Models\Area;
use App\Models\Proyecto;
use App\Models\Recurso;
use App\Models\Responsable;
use Livewire\Component;
use Livewire\WithFileUploads;

class CrearProyecto extends Component{

    use WithFileUploads;

    public $nombre;
    public $eje_estrategico;
    public $objetivo;
    public $justificacion;
    public $responsable_id;
    public $elabora;
    public $aprueba;
    public $fecha_aprobacion;
    public $recursos = [];
    public $areas = [];
    public $actividades = [];
    public $imagen;

    public $concepto, $costo, $periodicidad, $area_id;
    public $actividad, $responsable, $fecha_inicio, $fecha_fin, $entregable;

    public function render(){
        $responsables = Responsable::orderBy('nombre')->get();
        $areasInvolucradas = Area::orderBy('nombre')->get();
        return view('livewire.crear-proyecto', ['responsables' => $responsables, 'areasInvolucradas' => $areasInvolucradas]);
    }

    public function guardar(){
        $this->validate([
            'nombre' => 'required',
            'eje_estrategico' => 'required',
            'objetivo' => 'required',
            'aprueba' => 'required',
            'responsable_id' => 'required|gt:0',
            'imagen' => 'nullable|image|max:4096'
        ]);

        if(count($this->recursos)){
            if(count($this->areas)){
                if(count($this->actividades)){
                    $proyecto = new Proyecto();
                    $proyecto->nombre = $this->nombre;
                    $proyecto->eje_estrategico = $this->eje_estrategico;
                    $proyecto->objetivo = $this->objetivo;
                    $proyecto->responsable_id = $this->responsable_id;
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
                    }
                    $proyecto->save();

                    foreach ($this->recursos as $rec){
                        $recurso = new Recurso();
                        $recurso->concepto = $rec['concepto'];
                        $recurso->costo = $rec['costo'];
                        $recurso->periodicidad = $rec['periodicidad'];
                        $recurso->proyecto_id = $proyecto->id;
                        $recurso->save();
                    }

                    $proyecto->areas()->attach(array_column($this->areas, 'id'));

                    foreach ($this->actividades as $act){
                        $actividad = new Actividad();
                        $actividad->nombre = $act['actividad'];
                        $actividad->responsable_id = $act['responsable_id'];
                        $actividad->proyecto_id = $proyecto->id;
                        $actividad->fecha_inicio = $act['fecha_inicio'];
                        $actividad->fecha_final = $act['fecha_fin'];
                        $actividad->entregable = $act['entregable'];
                        $actividad->save();
                    }

                    return redirect('/proyectos/todos')->with('success','Se ha guardado el proyecto correctamente');
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
        $this->recursos[] = ['concepto' => $this->concepto, 'costo' => $this->costo, 'periodicidad' => $this->periodicidad];
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

        $this->actividades[] = ['actividad' => $this->actividad, 'responsable_id' => $this->responsable,
            'responsable' => $nombre, 'fecha_inicio' => $this->fecha_inicio, 'fecha_fin' => $this->fecha_fin, 'entregable' => $this->entregable];

        $this->actividad = '';
        $this->entregable = '';
    }

    public function borrarActividad($key){
        array_splice($this->actividades, $key, 1);
    }

    public function eliminarFoto(){
        $this->imagen = null;
    }

    public function updatedImagen(){
        $this->validate([
            'imagen' => 'nullable|image|max:4096'
        ]);
    }
}
