<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProfesorController extends Controller
{
    public function index(){
        $profesorData=DB::select("select * from profesor");
        return view("index-profesor")->with("profesorData",$profesorData);
    }

    public function create(Request $request){
        try {
            $sql=DB::insert(" insert into profesor(nombre_profesor) values (?)", [
                $request->txtNombreProfesor,
            ]);
            
        } catch (\Throwable $th) {
            $sql=0;
        }
        if($sql == true){
            return back()->with("correcto","Profesor registrado correctamente");
        }else{
            return back()->with("incorrecto","Error al registrar");
        }

    }

    public function update(Request $request){
        try {
            $sql=DB::insert(" update profesor set nombre_profesor =? where id=?", [
                $request->txtNombreProfesor,
                $request->txtId,
            ]);
            if ($sql==0){
                $sql=1;
            }
            
        } catch (\Throwable $th) {
            $sql=0;
        }
        if($sql == true){
            return back()->with("correcto","Profesor editado correctamente");
        }else{
            return back()->with("incorrecto","Error al editar profesor");
        }

    }

    public function delete($id){
        try{
            $sql = DB::delete("delete from profesor where id=$id");
        }catch (\Throwable $th){
            $sql = 0;
        }
        if ($sql == true){
            return back()->with("correcto","Profesor eliminado");
        }else{
            return back()->with("incorrecto","Profesor no se eliminó");
        }
    }




}
