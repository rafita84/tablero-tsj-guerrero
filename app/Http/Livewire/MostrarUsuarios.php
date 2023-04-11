<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class MostrarUsuarios extends Component{

    use WithPagination;

    public $buscar = '';

    public function render(){
        $usuarios = User::where('name','LIKE','%' . $this->buscar . '%')
            ->paginate(env('PAGINATE'));
        return view('livewire.mostrar-usuarios')->with('usuarios', $usuarios);
    }

    public function updatingBuscar(){
        $this->resetPage();
    }
}
