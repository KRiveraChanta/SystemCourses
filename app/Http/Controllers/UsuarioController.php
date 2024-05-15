<?php

namespace App\Http\Controllers;

use App\Models\Usuario;

use App\Models\Rol;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index(){
        $usuarioData=Usuario::all();
        $rolData=Rol::all();
        return view("index-usuario")->with(['usuarioData' => $usuarioData, 'rolData' => $rolData]);
    } 

    public function create(Request $request){

        try {
            $sql=new Usuario;
            $sql->login=$request->input('txtLogin');
            $sql->contrasenia=$request->input('txtContrasenia');
            $sql->nickname=$request->input('txtNickname');
            $sql->correo=$request->input('txtCorreo');
            $sql->id_rol=$request->input('idRol');
            $sql->save();
            
        } catch (\Throwable $th) {
            $sql=0;
        }
        if($sql == true){
            return back()->with("correcto","Usuario registrado correctamente");
        }else{
            return back()->with("incorrecto","Error al registrar");
        } 


    }

    public function update(Request $request, $id){

        try {
            $usuario = Usuario::find($id);
            $usuario->login = $request->input('txtLogin');
            $usuario->contrasenia = $request->input('txtContrasenia');
            $usuario->nickname = $request->input('txtNickname');
            $usuario->correo = $request->input('txtCorreo');
            $usuario->id_rol = $request->input('idRol');
            
            $usuario->update();
            
            if ($usuario) {
                return back()->with("correcto", "Usuario editado correctamente");
            } else {
                return back()->with("incorrecto", "Error al editar usuario");
            }
        } catch (\Throwable $th) {
            return back()->with("incorrecto", "Error al editar usuario");
        }

    }

    public function delete($id){
        try{
            $usuario = Usuario::findOrFail($id);
            $usuario -> delete();
        }catch (\Throwable $th){
            $usuario = 0;
        }
        if ($usuario == true){
            return back()->with("correcto","Usuario eliminado");
        }else{
            return back()->with("incorrecto","Usuario no se eliminó");
        }
    }



}
