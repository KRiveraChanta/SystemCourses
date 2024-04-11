<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class EtiquetaController extends Controller
{
    //Index

    public function index(){
        $etiquetaData=DB::select("select * from etiqueta");
        return view("index-etiqueta")->with("etiquetaData",$etiquetaData);
    }

    public function create(Request $request){
        try {
            $sql=DB::insert(" insert into etiqueta(nombre_etiqueta) values (?)",[
                $request->txtNombreEtiqueta,
            ]);

        } catch (\Throwable $th){
            $sql=0;
        }
        if($sql == true){
            return back()->with("correcto","Etiqueta registrada correctamente");
        }else{
            return back()->with("incorrecto","Error al registrar");
        }

    }

    public function update(Request $request){
        try{
            $sql=DB::insert(" update etiqueta set nombre_etiqueta =? where id=?",[
                $request->txtNombreEtiqueta,
                $request->txtIdEtiqueta,
            ]);
            if ($sql==0){
                $sql=1;
            }

        }catch(\Throwable $th){
            $sql=0;
        }

        if($sql == true){
            return back()->with("correcto","Etiqueta editada correctamente");
        }else{
            return back()->with("incorrecto","Error al editar etiqueta");
        }

    }

    public function delete($id){
        try{
            $sql = DB::delete("delete from etiqueta where id=$id");
        }catch (\Throwable $th){
            $sql = 0;
        }
        if ($sql == true){
            return back()->with("correcto","Etiqueta eliminada");
        }else{
            return back()->with("incorrecto","Etiqueta no se eliminó");
        }
    }


}
