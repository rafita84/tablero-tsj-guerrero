<?php

namespace App\Http\Livewire;

use App\Models\Proyecto;
use Livewire\Component;

class VerProyecto extends Component{

    public $proyecto;
    public $ruta_imagen;

    public function mount($id){
        $this->proyecto = Proyecto::find($id);
        $this->ruta_imagen = $this->proyecto->imagen ? \Storage::disk('public')->url('proyectos/'.$this->proyecto->imagen) :
            asset('images/proyecto_default2.jpg');
    }

    public function render(){
        return view('livewire.ver-proyecto');
    }
}
