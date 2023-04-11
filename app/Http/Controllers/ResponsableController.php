<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Responsable;
use App\Models\User;
use Illuminate\Http\Request;

class ResponsableController extends Controller
{

    public function index(){
        if(\Auth::user()->isAdministrador())
            return view('catalogos.responsables');
        else
            return redirect()->to('/');
    }

    public function create(){
        if(\Auth::user()->isAdministrador()) {
            $areas = Area::orderBy('nombre')->get();
            $usuarios = User::orderBy('name')->get();
            return view('catalogos.responsable.crear')->with('areas', $areas)->with('usuarios', $usuarios);
        }else{
            return redirect()->to('/');
        }
    }

    public function store(Request $request) {
        if(\Auth::user()->isAdministrador()) {
            $request->validate([
                'nombre' => 'required',
                'telefono' => 'required',
                'email' => 'email'
            ]);

            $usuario = $request->get('usuario');
            if ($usuario === '0') {
                $usuario = null;
            }

            $responsable = new Responsable([
                'nombre' => $request->get('nombre'),
                'telefono' => $request->get('telefono'),
                'observaciones' => $request->get('observaciones'),
                'email' => $request->get('email'),
                'area_id' => $request->get('area'),
                'user_id' => $usuario
            ]);

            $responsable->save();

            return redirect('/responsables')->with('success', 'Se ha guardado el responsable correctamente');
        }else{
            return redirect()->to('/');
        }
    }

    public function show($id) {
        if(\Auth::user()->isAdministrador()) {
            $responsable = Responsable::find($id);
            return view('catalogos.responsable.mostrar')->with('responsable', $responsable);
        }else{
            return redirect()->to('/');
        }
    }

    public function edit($id) {
        if(\Auth::user()->isAdministrador()) {
            $responsable = Responsable::find($id);
            $areas = Area::orderBy('nombre')->get();
            $usuarios = User::orderBy('name')->get();
            return view('catalogos.responsable.editar')->with('responsable', $responsable)->with('areas',
                $areas)->with('usuarios', $usuarios);
        }else{
            return redirect()->to('/');
        }
    }

    public function update(Request $request, $id) {
        if(\Auth::user()->isAdministrador()) {
            $request->validate([
                'nombre' => 'required',
                'telefono' => 'required',
                'email' => 'email'
            ]);

            $usuario = $request->get('usuario');
            if ($usuario === '0') {
                $usuario = null;
            }

            $responsable = Responsable::find($id);
            $responsable->nombre = $request->get('nombre');
            $responsable->telefono = $request->get('telefono');
            $responsable->observaciones = $request->get('observaciones');
            $responsable->email = $request->get('email');
            $responsable->area_id = $request->get('area');
            $responsable->user_id = $usuario;

            $responsable->save();

            return redirect('/responsables')->with('success', 'Se ha actualizado el responsable correctamente');
        }else{
            return redirect()->to('/');
        }
    }

    public function destroy($id) {
        if(\Auth::user()->isAdministrador()) {
            $responsable = Responsable::find($id);
            $nombre = $responsable->nombre;
            try {
                $responsable->delete();
                return redirect('/responsables')->with('success',
                    "El responsable $nombre ha sido eliminado correctamente");
            } catch (\Throwable $e) {
                return redirect('/responsables')->with('failure',
                    "No se ha podido eliminar el responsable $nombre, verifica que no esté asociado a un Proyecto");
            }
        }else{
            return redirect()->to('/');
        }
    }
}
