<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;
use const http\Client\Curl\AUTH_ANY;

class AreaController extends Controller
{

    public function index(){
        if(\Auth::user()->isAdministrador())
            return view('catalogos.areas');
        else
            return redirect()->to('/');
    }

    public function create(){
        if(\Auth::user()->isAdministrador())
            return view('catalogos.area.crear');
        else
            return redirect()->to('/');
    }

    public function store(Request $request)
    {
        if(\Auth::user()->isAdministrador()){
            $request->validate([
                'nombre' => 'required',
                'titular' => 'required'
            ]);

            $area = new Area([
                'nombre' => $request->get('nombre'),
                'titular' => $request->get('titular'),
                'observaciones' => $request->get('observaciones'),
                'direccion' => $request->get('direccion'),
                'ciudad' => $request->get('ciudad'),
                'numero_telefonico' => $request->get('numero_telefonico')
            ]);

            $area->save();

            return redirect('/areas')->with('success', 'Se ha guardado el área correctamente');
        }else
            return redirect()->to('/');
    }

    public function show($id) {
        if(\Auth::user()->isAdministrador()){
            $area = Area::find($id);
            return view('catalogos.area.mostrar')->with('area', $area);
        }else
            return redirect()->to('/');
    }

    public function edit($id) {
        if(\Auth::user()->isAdministrador()){
            $area = Area::find($id);
            return view('catalogos.area.editar')->with('area', $area);
        }else
            return redirect()->to('/');
    }

    public function update(Request $request, $id) {
        if(\Auth::user()->isAdministrador()){
            $request->validate([
                'nombre' => 'required',
                'titular' => 'required'
            ]);

            $area = Area::find($id);
            $area->nombre = $request->get('nombre');
            $area->titular = $request->get('titular');
            $area->observaciones = $request->get('observaciones');
            $area->direccion = $request->get('direccion');
            $area->ciudad = $request->get('ciudad');
            $area->numero_telefonico = $request->get('numero_telefonico');

            $area->save();

            return redirect('/areas')->with('success', 'Se ha actualizado el área correctamente');
        }else
            return redirect()->to('/');
    }

    public function destroy($id) {
        if(\Auth::user()->isAdministrador()){
            $area = Area::find($id);
            $nombre = $area->nombre;

            try {
                $area->delete();
                return redirect('/areas')->with('success', "El área $nombre ha sido eliminada correctamente");
            } catch (\Throwable $e) {
                return redirect('/areas')->with('failure',
                    "No se ha podido eliminar el área $nombre, verifica que no tenga Responsables asignados");
            }
        }else
            return redirect()->to('/');
    }
}
