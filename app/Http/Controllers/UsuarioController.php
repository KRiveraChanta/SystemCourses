<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index(){
        $usuarioData=Usuario::all();
        return view("index-usuario")->with("usuarioData",$usuarioData);


       /*  $usuarioData=DB::select("select * from usuario");
        return view("index-usuario")->with("usuarioData",$usuarioData); */
    } 

    public function create(Request $request){

        try {
            $sql=new Usuario;
            $sql->login=$request->input('txtLogin');
            $sql->contrasenia=$request->input('txtContrasenia');
            $sql->nickname=$request->input('txtNickname');
            $sql->correo=$request->input('txtCorreo');
            $sql->id_rol=$request->input('txtRol');
            $sql->save();
            
        } catch (\Throwable $th) {
            $sql=0;
        }
        if($sql == true){
            return back()->with("correcto","Usuario registrado correctamente");
        }else{
            return back()->with("incorrecto","Error al registrar");
        } 

        /* try {
            $sql=DB::insert(" insert into usuario(login, contrasenia, nickname, correo, id_rol) values (?) (?) (?) (?) (?)", [
                $request->txtLogin,
                $request->txtContrasenia,
                $request->txtNickname,
                $request->txtCorreo,
                $request->txtRol,
            ]);
            
        } catch (\Throwable $th) {
            $sql=0;
        }
        if($sql == true){
            return back()->with("correcto","Usuario registrado correctamente");
        }else{
            return back()->with("incorrecto","Error al registrar");
        } */

    }

    public function update(Request $request, $id){

        try {
            $usuario = Usuario::find($id);
            $usuario->login = $request->input('txtLogin');
            $usuario->contrasenia = $request->input('txtContrasenia');
            $usuario->nickname = $request->input('txtNickname');
            $usuario->correo = $request->input('txtCorreo');
            $usuario->id_rol = $request->input('txtRol');
            $usuario->update();
            
            if ($usuario) {
                return back()->with("correcto", "Usuario editado correctamente");
            } else {
                return back()->with("incorrecto", "Error al editar usuario");
            }
        } catch (\Throwable $th) {
            return back()->with("incorrecto", "Error al editar usuario");
        }

        /* try {
            $sql=DB::insert(" update usuario set login =?,contrasenia =?,nickname =?, correo =?, id_rol =? where id=?", [
                $request->txtLogin,
                $request->txtContrasenia,
                $request->txtNickname,
                $request->txtCorreo,
                $request->txtRol,
                $request->txtId,
            ]);
            if ($sql==0){
                $sql=1;
            }
            
        } catch (\Throwable $th) {
            $sql=0;
        }
        if($sql == true){
            return back()->with("correcto","Usuario editado correctamente");
        }else{
            return back()->with("incorrecto","Error al editar usuario");
        } */

    }

    public function delete($id){
        try{
            $sql = DB::delete("delete from usuario where id=$id");
        }catch (\Throwable $th){
            $sql = 0;
        }
        if ($sql == true){
            return back()->with("correcto","Usuario eliminado");
        }else{
            return back()->with("incorrecto","Usuario no se eliminó");
        }
    }



}
