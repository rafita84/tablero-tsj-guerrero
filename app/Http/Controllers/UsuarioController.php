<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller{

    public static $password = '12345678';

    public function index(){
        if(\Auth::user()->isAdministrador())
            return view('catalogos.usuarios');
        else
            return redirect()->to('/');
    }

    public function create(){
        if(\Auth::user()->isAdministrador())
            return view('catalogos.usuario.crear');
        else
            return redirect()->to('/');
    }

    public function store(Request $request) {
        if(\Auth::user()->isAdministrador()) {
            $request->validate([
                'name' => 'required',
                'identity' => 'required|unique:users',
                'email' => 'required|email|unique:users'
            ]);

            $usuario = new User([
                'name' => $request->get('name'),
                'identity' => $request->get('identity'),
                'email' => $request->get('email'),
                'nivel' => $request->get('nivel'),
                'password' => Hash::make(UsuarioController::$password)
            ]);

            $usuario->save();

            return redirect('/usuarios')->with('success',
                "Se ha guardado el usuario correctamente, de manera inicial deberá usar la contraseña ".UsuarioController::$password);
        }else{
            return redirect()->to('/');
        }
    }

    public function show($id) {
        if(\Auth::user()->isAdministrador()) {
            $usuario = User::find($id);
            return view('catalogos.usuario.mostrar')->with('usuario', $usuario);
        }else{
            return redirect()->to('/');
        }
    }

    public function edit($id) {
        if(\Auth::user()->isAdministrador()) {
            $usuario = User::find($id);
            return view('catalogos.usuario.editar')->with('usuario', $usuario);
        }else{
            return redirect()->to('/');
        }
    }

    public function generate($id) {
        $usuario = User::find($id);
        $usuario->password = Hash::make(UsuarioController::$password);
        $nombre = $usuario->name;
        $usuario->save();

        return redirect('/usuarios')->with('success', "Se ha restaurado la contraseña del usuario $nombre, ahora podrá ingresar nuevamente con la contraseña inicial ". UsuarioController::$password);
    }

    public function update(Request $request, $id) {
        if(\Auth::user()->isAdministrador()) {
            $request->validate([
                'name' => 'required',
                'identity' => 'required|unique:users,identity,'.$id,
                'email' => 'required|email|unique:users,email,'.$id
            ]);

            $usuario = User::find($id);
            $usuario->name = $request->get('name');
            $usuario->identity = $request->get('identity');
            $usuario->email = $request->get('email');
            $usuario->nivel = $request->get('nivel');

            $nombre = $usuario->name;

            $usuario->save();

            return redirect('/usuarios')->with('success', "Se ha actualizado el usuario $nombre correctamente");
        }else{
            return redirect()->to('/');
        }
    }

    public function destroy($id) {
        if(\Auth::user()->isAdministrador()) {
            $usuario = User::find($id);
            $nombre = $usuario->name;

            try {
                $usuario->delete();
                return redirect('/usuarios')->with('success', "El usuario $nombre ha sido eliminado correctamente");
            } catch (\Throwable $e) {
                return redirect('/usuarios')->with('failure',
                    "No se ha podido eliminar el usuario $nombre, verifica que no esté asociado a un Responsable");
            }
        }else{
            return redirect()->to('/');
        }
    }
}
