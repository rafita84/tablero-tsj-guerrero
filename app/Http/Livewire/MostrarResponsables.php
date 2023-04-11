<?php

namespace App\Http\Livewire;

use App\Models\Responsable;
use Livewire\Component;
use Livewire\WithPagination;

class MostrarResponsables extends Component{

    use WithPagination;

    public $buscar = '';

    public function render(){
        $responsables = Responsable::where('nombre','LIKE','%' . $this->buscar . '%')
            ->orderBy('nombre')
            ->paginate(env('PAGINATE'));
        return view('livewire.mostrar-responsables')->with('responsables', $responsables);
    }

    public function updatingBuscar(){
        $this->resetPage();
    }
}
