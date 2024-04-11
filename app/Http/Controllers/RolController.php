<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RolController extends Controller
{
    public function index(){
        $rolData=DB::select("select * from roles");
        return view("index-rol")->with("rolData",$rolData);
    }

    public function create(Request $request){
        try {
            $sql=DB::insert(" insert into roles(nombre_rol) values (?)", [
                $request->txtNombreRol,
            ]);
            
        } catch (\Throwable $th) {
            $sql=0;
        }
        if($sql == true){
            return back()->with("correcto","Rol registrado correctamente");
        }else{
            return back()->with("incorrecto","Error al registrar");
        }

    }

    public function update(Request $request){
        try {
            $sql=DB::insert(" update roles set nombre_rol =? where id=?", [
                $request->txtNombreRol,
                $request->txtId,
            ]);
            if ($sql==0){
                $sql=1;
            }
            
        } catch (\Throwable $th) {
            $sql=0;
        }
        if($sql == true){
            return back()->with("correcto","Rol editado correctamente");
        }else{
            return back()->with("incorrecto","Error al editar rol");
        }

    }

    public function delete($id){
        try{
            $sql = DB::delete("delete from roles where id=$id");
        }catch (\Throwable $th){
            $sql = 0;
        }
        if ($sql == true){
            return back()->with("correcto","Rol eliminado");
        }else{
            return back()->with("incorrecto","Rol no se eliminó");
        }
    }



}
