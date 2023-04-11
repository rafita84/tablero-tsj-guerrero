<?php

namespace App\Http\Livewire;

use App\Models\Area;
use Livewire\Component;
use Livewire\WithPagination;

class MostrarAreas extends Component{

    use WithPagination;

    public $buscar = '';

    public function render(){
        $areas = Area::where('nombre','LIKE','%' . $this->buscar . '%')
            ->orWhere('titular','LIKE','%' . $this->buscar . '%')
            ->orderBy('nombre')
            ->paginate(env('PAGINATE'));
        return view('livewire.mostrar-areas')->with('areas', $areas);
    }

    public function updatingBuscar(){
        $this->resetPage();
    }
}
