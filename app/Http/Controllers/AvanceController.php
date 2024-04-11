<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class AvanceController extends Controller
{
    public function index(){
        $avanceData=DB::select("select * from avance");
        return view("index-avance")->with("avanceData",$avanceData);
    }

    public function create(Request $request){
        try {
            $sql=DB::insert(" insert into avance(avance) values (?)", [
                $request->txtNombreAvance,
            ]);
            
        } catch (\Throwable $th) {
            $sql=0;
        }
        if($sql == true){
            return back()->with("correcto","Avance registrado correctamente");
        }else{
            return back()->with("incorrecto","Error al registrar");
        }

    }

    public function update(Request $request){
        try {
            $sql=DB::insert(" update avance set avance =? where id=?", [
                $request->txtNombreAvance,
                $request->txtIdAvance,
            ]);
            if ($sql==0){
                $sql=1;
            }
            
        } catch (\Throwable $th) {
            $sql=0;
        }
        if($sql == true){
            return back()->with("correcto","Avance editada correctamente");
        }else{
            return back()->with("incorrecto","Error al editar avance");
        }

    }

    public function delete($id){
        try{
            $sql = DB::delete("delete from avance where id=$id");
        }catch (\Throwable $th){
            $sql = 0;
        }
        if ($sql == true){
            return back()->with("correcto","Avance eliminado");
        }else{
            return back()->with("incorrecto","Avance no se eliminó");
        }
    }




}
